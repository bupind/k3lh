<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * WorkingEnvDataSearch represents the model behind the search form about `backend\models\WorkingEnvData`.
 */
class WorkingEnvDataSearch extends WorkingEnvData
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id'], 'integer'],
            [['wed_test_date', 'wed_work_area', 'wed_executor'], 'safe'],
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
        $query = WorkingEnvData::find();

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
            'wed_test_date' => $this->wed_test_date,
        ]);

        $query->andFilterWhere(['like', 'wed_work_area', $this->wed_work_area])
            ->andFilterWhere(['like', 'wed_executor', $this->wed_executor]);

        return $dataProvider;
    }

    public function export($id) {

        $query = WorkingEnvData::find()->where(['id' => $id]);

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
        $filename = sprintf(AppConstants::REPORT_NAME_WORK_ENV_DATA, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::FORM_WORK_ENV_DATA);

        //Get model
        $model = $dataProvider->getModels()[0];

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(60);
        $activeSheet->getColumnDimension('B')->setWidth(20);
        $activeSheet->getColumnDimension('C')->setWidth(40);
        $activeSheet->getColumnDimension('D')->setWidth(40);

        //header
        $activeSheet->setCellValue('A1', AppLabels::FORM_WORK_ENV_DATA);
        $activeSheet->setCellValue('A3', AppLabels::TEST_DATE);
        $activeSheet->setCellValue('A4', AppLabels::WORK_AREA);
        $activeSheet->setCellValue('A5', AppLabels::EXECUTOR);

        //header content
        $activeSheet->setCellValue('B3', $model->wed_test_date);
        $activeSheet->setCellValue('B4', $model->wed_work_area);
        $activeSheet->setCellValue('B5', $model->wed_executor);

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
        $activeSheet->getStyle('A3')->applyFromArray($styleArray);
        $activeSheet->getStyle('A4')->applyFromArray($styleArray);
        $activeSheet->getStyle('A5')->applyFromArray($styleArray);

        $activeSheet->mergeCells('B3:D3');
        $activeSheet->mergeCells('B4:D4');
        $activeSheet->mergeCells('B5:D5');

        $activeSheet->getStyle('B3:D3')->applyFromArray($styleArray);
        $activeSheet->getStyle('B4:D4')->applyFromArray($styleArray);
        $activeSheet->getStyle('B5:D5')->applyFromArray($styleArray);


        //==========================================================================

        // body header

        $activeSheet->setCellValue('A6', AppLabels::PARAMETER);
        $activeSheet->setCellValue('B6', AppLabels::UNIT);
        $activeSheet->setCellValue('C6', AppLabels::QUALITY_STANDARD);
        $activeSheet->setCellValue('D6', AppLabels::TEST_RESULT);

        //body header style
        $styleArray = [
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap' => true
            ],
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFFFFF00']
            ],
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                    ]
                ]
            ]
        ];
        $activeSheet->getStyle('A6')->applyFromArray($styleArray);
        $activeSheet->getStyle('B6')->applyFromArray($styleArray);
        $activeSheet->getStyle('C6')->applyFromArray($styleArray);
        $activeSheet->getStyle('D6')->applyFromArray($styleArray);

        //==========================================================================

        //body
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

        $rowIndex = 7;
        foreach($model->wevDetails as $keyD => $detail){
            $activeSheet->setCellValue('A' . $rowIndex, $detail->wevd_parameter);
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('B' . $rowIndex, $detail->wevd_unit_code_desc);
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $rowIndex, $detail->wevd_qs);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $rowIndex, $detail->wevd_test_result);
            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);

            $rowIndex++;
        }

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
