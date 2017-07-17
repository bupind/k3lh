<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * HydrantChecklistSearch represents the model behind the search form about `backend\models\HydrantChecklist`.
 */
class HydrantChecklistSearch extends HydrantChecklist
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'hc_number'], 'integer'],
            [['hc_location', 'hc_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = HydrantChecklist::find();

        // add conditions that should always apply here

        $powerPlant = PowerPlant::find()->where(['id' => $params['_ppId']])->one();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'sector_id' => $powerPlant->sector_id,
            'power_plant_id' => $powerPlant->id,
            'hc_number' => $this->hc_number,
            'hc_date' => $this->hc_date,
        ]);

        $query->andFilterWhere(['like', 'hc_location', $this->hc_location]);

        return $dataProvider;
    }

    public function export($id) {

        $query = HydrantChecklist::find()->where(['id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }



        // export to excel

        //main excel setup
        $objPHPExcel = new \PHPExcel();
        $filename = sprintf(AppConstants::REPORT_NAME_HYDRANT_CHECKLIST, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::FORM_CHECKLIST_HYDRANT);

        //Get model
        $model = $dataProvider->getModels()[0];

        // set dimension

        // set row width

        // set column width

        //header

        $activeSheet->mergeCells('A2:C2');
        $activeSheet->setCellValue('A2', sprintf("Form %s",AppLabels::FORM_CHECKLIST_HYDRANT));

        $activeSheet->mergeCells('A4:C4');
        $activeSheet->setCellValue('A4',sprintf("%s :", AppLabels::HC_NUMBER));

        $activeSheet->mergeCells('A5:C5');
        $activeSheet->setCellValue('A5',sprintf("%s :",  AppLabels::LOCATION));

        $activeSheet->mergeCells('A6:C6');
        $activeSheet->setCellValue('A6', sprintf("%s :",AppLabels::DATE));

        //header content
        $activeSheet->mergeCells('D4:F4');
        $activeSheet->setCellValue('D4', $model->hc_number);
        $activeSheet->mergeCells('D5:F5');
        $activeSheet->setCellValue('D5', $model->hc_location);
        $activeSheet->mergeCells('D6:F6');
        $activeSheet->setCellValue('D6', $model->hc_date);

        //header style
        $styleArray = [
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                    ]
                ]
            ]
        ];
        $activeSheet->getStyle('A2:C2')->applyFromArray($styleArray);
        $activeSheet->getStyle('A4:C4')->applyFromArray($styleArray);
        $activeSheet->getStyle('A5:C5')->applyFromArray($styleArray);
        $activeSheet->getStyle('A6:C6')->applyFromArray($styleArray);
        $activeSheet->getStyle('D4:F4')->applyFromArray($styleArray);
        $activeSheet->getStyle('D5:F5')->applyFromArray($styleArray);
        $activeSheet->getStyle('D6:F6')->applyFromArray($styleArray);


        //==========================================================================

        // body header
        $styleArray = [
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                    ]
                ]
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap' => true
            ],
        ];

        $activeSheet->mergeCells('A8:H9');
        $activeSheet->setCellValue('A8', "Ikuti rekomendasi pembuat. Seluruh informasi yang diperlukan harus didokumetnasikan dan ditandatangani");
        $activeSheet->getStyle('A8:H9')->applyFromArray($styleArray);
        $activeSheet->getStyle('A8:H9')->getAlignment()->setWrapText(true);

        $activeSheet->mergeCells('A10:C11');
        $activeSheet->setCellValue('A10', sprintf("%s %s",AppLabels::ITEM, AppLabels::INSPECTION));
        $activeSheet->getStyle('A10:C11')->applyFromArray($styleArray);

        $activeSheet->mergeCells('D10:F10');
        $activeSheet->setCellValue('D10', AppLabels::CONDITION);
        $activeSheet->getStyle('D10:F10')->applyFromArray($styleArray);

        $activeSheet->setCellValue('D11', AppLabels::GOOD);
        $activeSheet->getStyle('D11')->applyFromArray($styleArray);

        $activeSheet->setCellValue('E11', AppLabels::ENOUGH);
        $activeSheet->getStyle('E11')->applyFromArray($styleArray);

        $activeSheet->setCellValue('F11', AppLabels::BAD);
        $activeSheet->getStyle('F11')->applyFromArray($styleArray);

        $activeSheet->mergeCells('G10:H11');
        $activeSheet->setCellValue('G10', AppLabels::DESCRIPTION);
        $activeSheet->getStyle('G10:H11')->applyFromArray($styleArray);

        //==========================================================================

        //body
        $rowIndex = 12;
        $questionCount = HydrantQuestion::find()->count()-1+$rowIndex;
        foreach($model->hcDetails as $keyD => $detail){
            $question = HydrantQuestion::find()->where(['id' => $detail->hydrant_question_id])->one();

            $activeSheet->mergeCells('A' . $rowIndex . ':C' . $rowIndex);
            $activeSheet->setCellValue('A' . $rowIndex, $question->hq_question);
            $activeSheet->getStyle('A' . $rowIndex . ':C' . $rowIndex)->applyFromArray($styleArray);

            switch($detail->hcd_answer){
                case 0:
                    $activeSheet->setCellValue('D' . $rowIndex, 'v');
                    break;
                case 1:
                    $activeSheet->setCellValue('E' . $rowIndex, 'v');
                    break;
                case 2:
                    $activeSheet->setCellValue('F' . $rowIndex, 'v');
                    break;
            }

            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArray);

            $rowIndex++;
        }

        $activeSheet->mergeCells('G' . 12 . ':H' . $questionCount);
        $activeSheet->getStyle('G' . 12 . ':H' . $questionCount)->applyFromArray($styleArray);
        $activeSheet->getStyle('G' . 12 . ':H' . $questionCount)->getAlignment()->setWrapText(true);
        $activeSheet->setCellValue('G12', "Beri tanda v pada kolom : Baik; Cukup; Kurang. Sesuai dengan kondisi sebenarnya.");

        $activeSheet->mergeCells('A' . $rowIndex . ':H' . ($rowIndex+4));
        $activeSheet->getStyle('A' . $rowIndex . ':H' . ($rowIndex+4))->applyFromArray($styleArray);
        $activeSheet->getStyle('A' . $rowIndex . ':H' . ($rowIndex+4))->getAlignment()->setWrapText(true);

        $wizard = new \PHPExcel_Helper_HTML();
        $richText = $wizard->toRichTextObject($model->hc_note);

        $activeSheet->setCellValue('A' . $rowIndex, $richText);

        //==========================================================================

        //footer

        //==========================================================================

        //extra footer

        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }
}
