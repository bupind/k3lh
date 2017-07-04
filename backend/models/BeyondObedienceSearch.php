<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;

/**
 * BeyondObedienceSearch represents the model behind the search form about `backend\models\BeyondObedience`.
 */
class BeyondObedienceSearch extends BeyondObedience
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'bo_year'], 'integer'],
            [['bo_form_type_code'], 'safe'],
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
        $query = BeyondObedience::find();

        // add conditions that should always apply here

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
            'sector_id' => $this->sector_id,
            'power_plant_id' => $this->power_plant_id,
            'bo_year' => $this->bo_year,
        ]);

        $query->andFilterWhere(['like', 'bo_form_type_code', $this->bo_form_type_code]);

        return $dataProvider;
    }

    public function export($id) {

        $query = BeyondObedience::find()->where(['id' => $id]);

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
        $filename = sprintf(AppConstants::REPORT_NAME_BEYOND_OBEDIENCE_COMDEV, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::BEYOND_OBEDIENCE);

        //Get model
        $model = $dataProvider->getModels()[0];

        //Get title
        $title = Codeset::getCodesetValue("BO_FORM_TYPE_CODE", $model->bo_form_type_code);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(30);
        $activeSheet->getColumnDimension('B')->setWidth(5);
        $activeSheet->getColumnDimension('C')->setWidth(60);
        $activeSheet->getColumnDimension('D')->setWidth(10);
        $activeSheet->getColumnDimension('E')->setWidth(10);
        $activeSheet->getColumnDimension('F')->setWidth(50);

        //header

        $activeSheet->mergeCells('A1:F3');
        $activeSheet->setCellValue('A1', $title);

        $styleArray = [
            'font' => [
                'bold' => true,
            ],
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

        $activeSheet->getStyle('A1:F3')->applyFromArray($styleArray);

        //==========================================================================

        // body header
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
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
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFC4D79B']
            ],
        ];

        $activeSheet->mergeCells('A4:A5');
        $activeSheet->mergeCells('B4:C5');
        $activeSheet->mergeCells('D4:D5');
        $activeSheet->mergeCells('E4:F4');

        $activeSheet->getStyle('A4:A5')->applyFromArray($styleArray);
        $activeSheet->getStyle('B4:C5')->applyFromArray($styleArray);
        $activeSheet->getStyle('D4:D5')->applyFromArray($styleArray);
        $activeSheet->getStyle('E4:F4')->applyFromArray($styleArray);
        $activeSheet->getStyle('E5')->applyFromArray($styleArray);
        $activeSheet->getStyle('F5')->applyFromArray($styleArray);

        $activeSheet->setCellValue('A4', AppLabels::ASSESSMENT_ASPECT);
        $activeSheet->setCellValue('B4', sprintf("%s %s", AppLabels::DESCRIPTION, AppLabels::CRITERIA));
        $activeSheet->setCellValue('D4', sprintf("%s %s", AppLabels::VALUE, AppLabels::CRITERIA));
        $activeSheet->setCellValue('E4', "Assessment");
        $activeSheet->setCellValue('E5', AppLabels::VALUE);
        $activeSheet->setCellValue('F5', AppLabels::DESCRIPTION);

        //==========================================================================

        //body
        $rowIndex = 6;
        $aspectId = 0;
        $criteriaCounter = 1;
        $criteriaValueTotal = 0;
        $valueTotal = 0;
        foreach($model->boAssessments as $keyA => $assessment){

            $currentAspectId = $assessment->boasCriteria->boAssessmentAspect->id;
            if($aspectId != $currentAspectId){
                $aspectId = $currentAspectId;
                $activeSheet->setCellValue('A' . $rowIndex, $assessment->boasCriteria->boAssessmentAspect->boas_aspect);
                $objPHPExcel->getActiveSheet()->getStyle('A' . $rowIndex)->getAlignment()->setWrapText(true);
                $criteriaCounter = 1;
            }

            $activeSheet->setCellValue('B' . $rowIndex, $criteriaCounter);
            $activeSheet->setCellValue('C' . $rowIndex, $assessment->boasCriteria->boas_description);
            $objPHPExcel->getActiveSheet()->getStyle('C' . $rowIndex)->getAlignment()->setWrapText(true);
            $activeSheet->setCellValue('D' . $rowIndex, $assessment->boasCriteria->boas_value);
            $activeSheet->setCellValue('E' . $rowIndex, $assessment->boa_value);
            $activeSheet->setCellValue('F' . $rowIndex, $assessment->boa_ref);

            $criteriaValueTotal += $assessment->boasCriteria->boas_value;
            $valueTotal += $assessment->boa_value;

            $rowIndex++;
            $criteriaCounter++;
        }

        $rowIndex++;
        $rowIndex++;


        $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
        $activeSheet->setCellValue('C' . $rowIndex, sprintf("%s (%s)", AppLabels::VALUE, AppLabels::CRITERIA));
        $activeSheet->setCellValue('D' . $rowIndex, $criteriaValueTotal);
        $activeSheet->setCellValue('E' . $rowIndex, $valueTotal);

        $rowIndex++;

        $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
        $activeSheet->setCellValue('C' . $rowIndex, sprintf("%s (Existing)", AppLabels::VALUE));
        $activeSheet->setCellValue('D' . $rowIndex, intval($valueTotal));

        $rowIndex++;

        $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
        $activeSheet->setCellValue('C' . $rowIndex, "% Gap");
        $activeSheet->setCellValue('D' . $rowIndex, sprintf("%s %%",number_format($valueTotal / $criteriaValueTotal * 100, 2)));

        $rowIndex++;

        $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
        $activeSheet->setCellValue('C' . $rowIndex, sprintf("%s (Perbaikan)", AppLabels::VALUE));
        $activeSheet->setCellValue('D' . $rowIndex, "-");

        $rowIndex++;

        $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
        $activeSheet->setCellValue('C' . $rowIndex, "% Pemenuhan");
        $activeSheet->setCellValue('D' . $rowIndex, '-');

        $rowIndex++;
        $rowIndex++;

        //==========================================================================

        //footer

        //==========================================================================

        //extra footer
        $activeSheet->setCellValue('C' . $rowIndex, AppLabels::FILES);
        $rowIndex++;
        if (!empty($model->attachmentOwners)) {
            foreach (Converter::attachmentsFullPath($model->attachmentOwners) as $key2 => $attachment) {
                $activeSheet->setCellValue('C' . $rowIndex, $attachment['label']);
                $activeSheet->getCell('C' . $rowIndex)->getHyperlink()->setUrl($attachment['path']);
                $activeSheet->getCell('C' . $rowIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                $activeSheet->getCell('C' . $rowIndex)->getStyle()->getAlignment()->setWrapText(true);

                $rowIndex++;
            }
        }

        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }
}
