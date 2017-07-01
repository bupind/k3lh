<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * K3lProblemSearch represents the model behind the search form about `backend\models\K3lProblem`.
 */
class K3lProblemSearch extends K3lProblem
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'kp_progress'], 'integer'],
            [['kp_problem_number', 'kp_date', 'kp_problem_description', 'kp_mitigation_plan', 'kp_mitigation_dateline_date', 'kp_status_code', 'kp_description'], 'safe'],
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
        $query = K3lProblem::find();

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
            'kp_date' => $this->kp_date,
            'kp_mitigation_dateline_date' => $this->kp_mitigation_dateline_date,
            'kp_progress' => $this->kp_progress,
        ]);

        $query->andFilterWhere(['like', 'kp_problem_number', $this->kp_problem_number])
            ->andFilterWhere(['like', 'kp_problem_description', $this->kp_problem_description])
            ->andFilterWhere(['like', 'kp_mitigation_plan', $this->kp_mitigation_plan])
            ->andFilterWhere(['like', 'kp_status_code', $this->kp_status_code])
            ->andFilterWhere(['like', 'kp_description', $this->kp_description]);

        return $dataProvider;
    }

    public function export() {

        $query = K3lProblem::find()->where([
            'power_plant_id' => $this->power_plant_id,
        ]);

        // add conditions that should always apply here

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
        $filename = sprintf(AppConstants::REPORT_NAME_K3L_PROBLEM, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::FORM_K3L_PROBLEM);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(30);
        $activeSheet->getColumnDimension('B')->setWidth(30);
        $activeSheet->getColumnDimension('C')->setWidth(35);
        $activeSheet->getColumnDimension('D')->setWidth(45);
        $activeSheet->getColumnDimension('E')->setWidth(30);
        $activeSheet->getColumnDimension('F')->setWidth(20);
        $activeSheet->getColumnDimension('G')->setWidth(20);
        $activeSheet->getColumnDimension('H')->setWidth(60);


        //header
        $activeSheet->mergeCells('A3:C4');
        $activeSheet->setCellValue('A3', "MONITORING PERMASALAHAN K3L");

        //header style
        $styleArray = [
            'font' => [
                'bold' => true,
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
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                    ]
                ]
            ]
        ];
        $activeSheet->getStyle('A3:C4')->applyFromArray($styleArray);

        //==========================================================================

        // body header

        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 16,
                'color' => [
                    'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                ]
            ],
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

        $no1 = 6;
        $no2 = 7;
        for($i = 0; $i<5; $i++){
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }

        //body header merge and style
        $activeSheet->mergeCells('F6:G6');

        $activeSheet->getStyle("F6:G6")->applyFromArray($styleArray);
        $activeSheet->getStyle("F7")->applyFromArray($styleArray);
        $activeSheet->getStyle("G7")->applyFromArray($styleArray);

        $activeSheet->mergeCells('H6:H7');

        $activeSheet->getStyle("H6:H7")->applyFromArray($styleArray);

        //body header data
        $activeSheet->setCellValue('A6', AppLabels::KP_PROBLEM_NUMBER);
        $activeSheet->setCellValue('B6', AppLabels::DATE);
        $activeSheet->setCellValue('C6', AppLabels::KP_PROBLEM_DESCRIPTION);
        $activeSheet->setCellValue('D6', AppLabels::KP_MITIGATION_PLAN);
        $activeSheet->setCellValue('E6', AppLabels::KP_MITIGATION_DATELINE_DATE);
        $activeSheet->setCellValue('F6', AppLabels::STATUS);
        $activeSheet->setCellValue('F7', AppLabels::KP_STATUS);
        $activeSheet->setCellValue('G7', AppLabels::KP_PROGRESS);
        $activeSheet->setCellValue('H6', AppLabels::DESCRIPTION);

        //==========================================================================

        //body
        $styleArray = [
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap' => true
            ],
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                    ]
                ]
            ],
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFFFFFFF']
            ],

        ];

        $rowIndex = 8;
        foreach($dataProvider->getModels() as $key => $model){
            $activeSheet->setCellValue('A' . $rowIndex, $model->kp_problem_number);
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('B' . $rowIndex, $model->kp_date);
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $rowIndex, $model->kp_problem_description);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $rowIndex, $model->kp_mitigation_plan);
            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('E' . $rowIndex, $model->kp_mitigation_dateline_date);
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('F' . $rowIndex, $model->kp_status_code);
            $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('G' . $rowIndex, $model->kp_progress);
            $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('H' . $rowIndex, $model->kp_description);
            $activeSheet->getStyle('H' . $rowIndex)->applyFromArray($styleArray);

            $rowIndex++;
        }

        //==========================================================================

        //footer
        $styleArray = [
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                    ]
                ]
            ],
        ];

        $styleArray2 = [
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap' => true
            ],
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                    ]
                ]
            ],
        ];

        $rowIndex = $rowIndex + 2;
        $activeSheet->setCellValue('A' . $rowIndex, "Kode Masalah");

        $rowIndex = $rowIndex +1;
        $activeSheet->mergeCells("A$rowIndex:C$rowIndex");
        $activeSheet->setCellValue('A' . $rowIndex, AppLabels::KP_ENVIRONMENT_PROBLEM);
        $activeSheet->getStyle("A$rowIndex:C$rowIndex")->applyFromArray($styleArray);

        $rowIndex++;

        for($i = $rowIndex; $i<$rowIndex+9; $i++){
            $no1 = $i-$rowIndex;
            $activeSheet->setCellValue('A' . $i, "E$no1");
            $activeSheet->getStyle("A$i")->applyFromArray($styleArray2);
            $activeSheet->mergeCells("B$i:C$i");
            $activeSheet->getStyle("B$i:C$i")->applyFromArray($styleArray2);
        }

        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::KP_E_CONSTANT_1);
        $rowIndex++;
        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::KP_E_CONSTANT_2);
        $rowIndex++;
        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::KP_E_CONSTANT_3);
        $rowIndex++;
        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::KP_E_CONSTANT_4);
        $rowIndex++;
        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::KP_E_CONSTANT_5);
        $rowIndex++;
        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::KP_E_CONSTANT_6);
        $rowIndex++;
        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::KP_E_CONSTANT_7);
        $rowIndex++;
        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::KP_E_CONSTANT_8);
        $rowIndex++;
        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::KP_E_CONSTANT_9);
        $rowIndex++;

        $activeSheet->setCellValue('A' . $rowIndex, AppLabels::FORM_K3L_PROBLEM);
        $activeSheet->mergeCells("A$rowIndex:C$rowIndex");
        $activeSheet->getStyle("A$rowIndex:C$rowIndex")->applyFromArray($styleArray);
        $rowIndex++;

        for($i = $rowIndex; $i<$rowIndex+8; $i++){
            $no1 = $i-$rowIndex;
            $activeSheet->setCellValue('A' . $i, "S$no1");
            $activeSheet->getStyle("A$i")->applyFromArray($styleArray2);
            $activeSheet->mergeCells("B$i:C$i");
            $activeSheet->getStyle("B$i:C$i")->applyFromArray($styleArray2);
        }

        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::KP_S_CONSTANT_1);
        $rowIndex++;
        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::KP_S_CONSTANT_2);
        $rowIndex++;
        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::KP_S_CONSTANT_3);
        $rowIndex++;
        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::KP_S_CONSTANT_4);
        $rowIndex++;
        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::KP_S_CONSTANT_5);
        $rowIndex++;
        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::KP_S_CONSTANT_6);
        $rowIndex++;
        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::KP_S_CONSTANT_7);
        $rowIndex++;
        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::KP_S_CONSTANT_8);

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
