<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;

/**
 * BeyondObedienceProgramSearch represents the model behind the search form about `backend\models\BeyondObedienceProgram`.
 */
class BeyondObedienceProgramSearch extends BeyondObedienceProgram
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'bop_year', 'bop_production'], 'integer'],
            [['bop_form_type_code'], 'safe'],
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
        $query = BeyondObedienceProgram::find();

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
            'bop_year' => $this->bop_year,
            'bop_production' => $this->bop_production,
        ]);

        $query->andFilterWhere(['like', 'bop_form_type_code', $this->bop_form_type_code]);

        return $dataProvider;
    }

    public function export($id) {

        $query = BeyondObedienceProgram::find()->where(['id' => $id]);

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
        $filename = sprintf(AppConstants::REPORT_NAME_BEYOND_OBEDIENCE_PROGRAM, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::PROGRAM);

        //Get model
        $model = $dataProvider->getModels()[0];

        //Get title
        $title = Codeset::getCodesetValue("BO_FORM_TYPE_CODE", $model->bop_form_type_code);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(50);
        $activeSheet->getColumnDimension('C')->setWidth(40);
        $activeSheet->getColumnDimension('D')->setWidth(20);

        //header

        $activeSheet->mergeCells('A2:B2');
        $activeSheet->setCellValue('A2', sprintf("%s %s %s %s",AppLabels::PROGRAM, $title, AppLabels::YEAR, $model->bop_year));

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
                'startcolor' => ['argb' => 'FFFFC000']
            ],
        ];

        $activeSheet->getStyle('A4')->applyFromArray($styleArray);
        $activeSheet->getStyle('B4')->applyFromArray($styleArray);
        $activeSheet->getStyle('C4')->applyFromArray($styleArray);
        $activeSheet->getStyle('D4')->applyFromArray($styleArray);
        $activeSheet->setCellValue('A4', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('B4', sprintf("%s %s", AppLabels::PROGRAM,$title));
        $activeSheet->setCellValue('C4', sprintf("Hasil Absolut %s", $title));
        $activeSheet->setCellValue('D4', AppLabels::UNIT);

        //==========================================================================

        //body
        $rowIndex = 5;
        $resultTotal = 0;
        foreach($model->bopDetails as $keyD => $detail){

            $activeSheet->setCellValue('A' . $rowIndex, ($keyD+1));
            $activeSheet->setCellValue('B' . $rowIndex, $detail->bopd_program);
            $activeSheet->setCellValue('C' . $rowIndex, $detail->bopd_result);
            $activeSheet->setCellValue('D' . $rowIndex, "kWh");

            $resultTotal += $detail->bopd_result;

            $rowIndex++;
        }

        $activeSheet->mergeCells('A' . $rowIndex . ':B' . $rowIndex);
        $activeSheet->getStyle('A' . $rowIndex . ':B' . $rowIndex)->applyFromArray($styleArray);
        $activeSheet->setCellValue('A' . $rowIndex, sprintf("%s %s", AppLabels::TOTAL, $title));

        $activeSheet->setCellValue('C' . $rowIndex, $resultTotal);
        $activeSheet->setCellValue('D' . $rowIndex, "kWh");

        $rowIndex++;

        $activeSheet->mergeCells('A' . $rowIndex . ':B' . $rowIndex);
        $activeSheet->getStyle('A' . $rowIndex . ':B' . $rowIndex)->applyFromArray($styleArray);
        $activeSheet->setCellValue('A' . $rowIndex, AppLabels::PRODUCTION);

        $activeSheet->setCellValue('C' . $rowIndex, $model->bop_production);
        $activeSheet->setCellValue('D' . $rowIndex, "kWh");

        $rowIndex++;$rowIndex++;

        //==========================================================================

        //footer

        //==========================================================================

        //extra footer
        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::FILES);
        $rowIndex++;
        if (!empty($model->attachmentOwners)) {
            foreach (Converter::attachmentsFullPath($model->attachmentOwners) as $key2 => $attachment) {
                $activeSheet->setCellValue('B' . $rowIndex, $attachment['label']);
                $activeSheet->getCell('B' . $rowIndex)->getHyperlink()->setUrl($attachment['path']);
                $activeSheet->getCell('B' . $rowIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                $activeSheet->getCell('B' . $rowIndex)->getStyle()->getAlignment()->setWrapText(true);

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
