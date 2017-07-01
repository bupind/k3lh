<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * FireDetectorSearch represents the model behind the search form about `backend\models\FireDetector`.
 */
class FireDetectorSearch extends FireDetector
{
    public $filename;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'fd_year'], 'integer'],
            [['fd_form_month_type_code', 'fd_floor_code', 'fd_location', 'fd_detector_type_code', 'fd_alarm_zone_code', 'fd_installation', 'fd_detector_physic', 'fd_wiring_condition', 'fd_last_check', 'fd_test_result_record'], 'safe'],
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
        $query = FireDetector::find();

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
            'fd_year' => $this->fd_year,
            'fd_last_check' => $this->fd_last_check,
        ]);

        $query->andFilterWhere(['like', 'fd_form_month_type_code', $this->fd_form_month_type_code])
            ->andFilterWhere(['like', 'fd_floor_code', $this->fd_floor_code])
            ->andFilterWhere(['like', 'fd_location', $this->fd_location])
            ->andFilterWhere(['like', 'fd_detector_type_code', $this->fd_detector_type_code])
            ->andFilterWhere(['like', 'fd_alarm_zone_code', $this->fd_alarm_zone_code])
            ->andFilterWhere(['like', 'fd_installation', $this->fd_installation])
            ->andFilterWhere(['like', 'fd_detector_physic', $this->fd_detector_physic])
            ->andFilterWhere(['like', 'fd_wiring_condition', $this->fd_wiring_condition])
            ->andFilterWhere(['like', 'fd_test_result_record', $this->fd_test_result_record]);

        return $dataProvider;
    }

    public function export() {

        $query = FireDetector::find()->where(
            [
                'fd_form_month_type_code' => $this->fd_form_month_type_code,
                'fd_year' => $this->fd_year,
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
        $filename = sprintf(AppConstants::REPORT_NAME_FIRE_DETECTOR, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::FORM_FIRE_DETECTOR);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(1);
        $activeSheet->getColumnDimension('B')->setWidth(20);
        $activeSheet->getColumnDimension('C')->setWidth(60);
        $activeSheet->getColumnDimension('V')->setWidth(80);
        for($i = 3; $i<21; $i++){
            $activeSheet->getColumnDimension($this->toAlphabet($i))->setWidth(30);
        }

        //header
        $activeSheet->mergeCells('B5:H6');
        $activeSheet->setCellValue('B5', AppLabels::FORM_FIRE_DETECTOR);
        $activeSheet->mergeCells('V5:V6');
        $activeSheet->setCellValue('V5', sprintf("Periode: sd. %s %s", Codeset::getCodesetValue(AppConstants::CODESET_FORM_MONTH_TYPE_CODE,$this->fd_form_month_type_code) , $this->fd_year));

        //header style
        $styleArray = [
            'font' => [
                'bold' => true,
                'color' => [
                    'argb' => \PHPExcel_Style_Color::COLOR_WHITE
                ]
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap' => true
            ],
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFC00000']
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
        $activeSheet->getStyle('B5:H6')->applyFromArray($styleArray);
        $activeSheet->getStyle('V5:V6')->applyFromArray($styleArray);

        //==========================================================================

        // body header

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

        $no1 = 8;
        $no2 = 10;
        for($i = 1; $i<5; $i++){
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }

        $no1 = 9;
        $no2 = 10;
        for($i = 5; $i<21; $i++){
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }

        $activeSheet->mergeCells('F8:H8');
        $activeSheet->mergeCells('I8:U8');
        $activeSheet->mergeCells('V8:V10');

        $activeSheet->getStyle("F8:H8")->applyFromArray($styleArray);
        $activeSheet->getStyle("I8:U8")->applyFromArray($styleArray);
        $activeSheet->getStyle("V8:V10")->applyFromArray($styleArray);

        $activeSheet->setCellValue('B8', AppLabels::FD_NUMBER);
        $activeSheet->setCellValue('C8', AppLabels::LOCATION);
        $activeSheet->setCellValue('D8', AppLabels::FD_DETECTOR_TYPE);
        $activeSheet->setCellValue('E8', AppLabels::FD_ALARM_ZONE);
        $activeSheet->setCellValue('F8', AppLabels::FD_VISUAL_CHECK);
        $activeSheet->setCellValue('I8', AppLabels::FD_TEST_NORMAL_ABNORMAL);
        $activeSheet->setCellValue('V8', AppLabels::FD_TEST_RESULT_RECORD);
        $activeSheet->setCellValue('F9', AppLabels::FD_INSTALLATION);
        $activeSheet->setCellValue('G9', AppLabels::FD_DETECTOR_PHYSIC);
        $activeSheet->setCellValue('H9', AppLabels::FD_WIRING_CONDITION);
        $activeSheet->setCellValue('I9', AppLabels::FD_LAST_CHECK);
        $activeSheet->setCellValue('J9', AppLabels::SHORT_JANUARY);
        $activeSheet->setCellValue('K9', AppLabels::SHORT_FEBRUARY);
        $activeSheet->setCellValue('L9', AppLabels::SHORT_MARCH);
        $activeSheet->setCellValue('M9', AppLabels::SHORT_APRIL);
        $activeSheet->setCellValue('N9', AppLabels::SHORT_MAY);
        $activeSheet->setCellValue('O9', AppLabels::SHORT_JUNE);
        $activeSheet->setCellValue('P9', AppLabels::SHORT_JULY);
        $activeSheet->setCellValue('Q9', AppLabels::SHORT_AUGUST);
        $activeSheet->setCellValue('R9', AppLabels::SHORT_SEPTEMBER);
        $activeSheet->setCellValue('S9', AppLabels::SHORT_OCTOBER);
        $activeSheet->setCellValue('T9', AppLabels::SHORT_NOVEMBER);
        $activeSheet->setCellValue('U9', AppLabels::SHORT_DECEMBER);

        //==========================================================================

        //body
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
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
                'startcolor' => ['argb' => 'FFFFC000']
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
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FF92D050']
            ],

        ];

        $styleArray3 = [
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

        $styleArray4 = [
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
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

        $styleAbnormal = [
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
                'startcolor' => ['argb' => 'FFFF0000']
            ],

        ];

        $styleNormal = [
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
                'startcolor' => ['argb' => 'FF00B0F0']
            ],

        ];

        $styleUnknown = [
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
                'startcolor' => ['argb' => 'FFFFC000']
            ],

        ];

        $styleDetectorUnknown = [
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
                'startcolor' => ['argb' => 'FFFF0000']
            ],

        ];

        $floors = Codeset::find()->where([
                    'cset_name' => AppConstants::CODESET_FD_FLOOR_TYPE,
                ])->all();
        $rowIndex = 11;

        foreach($floors as $keyF => $floor){

            //Find fire detector based on floor type
            $model = FireDetector::find()->where([
                'fd_form_month_type_code' => $this->fd_form_month_type_code,
                'fd_year' => $this->fd_year,
                'fd_floor_code' => $floor->cset_code,
            ])->all();

            // Orange row content
            $modelCount = count($model);
            $activeSheet->getStyle('B' . $rowIndex .':V' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('B' . $rowIndex, $floor->cset_value);
            $activeSheet->setCellValue('C' . $rowIndex, sprintf("%s Unit", $modelCount));

            //save floor row for later purpose
            $floorRow = $rowIndex;
            $normal = [];
            $abnormal = [];
            for($i = 1; $i<13; $i++) {
                $normal[$i] = 0;
                $abnormal[$i] = 0;
            }


            $rowIndex++;
            foreach($model as $keyM => $detail){
                $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray2);
                $activeSheet->setCellValue('B' . $rowIndex, ($keyM+1));

                $activeSheet->setCellValue('C' . $rowIndex, $detail->fd_location);
                if($detail->fd_detector_type_code == AppConstants::FD_DETECTOR_TYPE_UNKNOWN) {
                    $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleDetectorUnknown);
                    $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleDetectorUnknown);
                }else {
                    $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray4);
                    $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray3);
                }
                $activeSheet->setCellValue('D' . $rowIndex, $detail->fd_detector_type_code_desc);
                if($detail->fd_alarm_zone_code == AppConstants::FD_ALARM_ZONE_UNKNOWN){
                    $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleDetectorUnknown);
                }else {
                    $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray3);
                }
                $activeSheet->setCellValue('E' . $rowIndex, $detail->fd_alarm_zone_code_desc);
                $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArray3);
                $activeSheet->setCellValue('F' . $rowIndex, $detail->fd_installation_desc);
                $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArray3);
                $activeSheet->setCellValue('G' . $rowIndex, $detail->fd_detector_physic_desc);
                $activeSheet->getStyle('H' . $rowIndex)->applyFromArray($styleArray3);
                $activeSheet->setCellValue('H' . $rowIndex, $detail->fd_wiring_condition_desc);
                $activeSheet->getStyle('I' . $rowIndex)->applyFromArray($styleArray3);
                $activeSheet->setCellValue('I' . $rowIndex, $detail->fd_last_check_desc);
                $startMonth = 9;
                for($i = 1; $i<13; $i++) {
                    $fdDetail = FdDetail::find()->where([
                        'fire_detector_id' => $detail->id,
                        'fdd_month' => $i,
                    ])->one();
                    if($fdDetail->fdd_monthly_test_code == AppConstants::FD_TEST_RESULT_TYPE_NORMAL){
                        $normal[$i]++;
                        $activeSheet->getStyle($this->toAlphabet($startMonth) . $rowIndex)->applyFromArray($styleNormal);
                    }else if($fdDetail->fdd_monthly_test_code == AppConstants::FD_TEST_RESULT_TYPE_ABNORMAL){
                        $abnormal[$i]++;
                        $activeSheet->getStyle($this->toAlphabet($startMonth) . $rowIndex)->applyFromArray($styleAbnormal);
                    }else if($fdDetail->fdd_monthly_test_code == AppConstants::FD_TEST_RESULT_TYPE_UNKNOWN){
                        $activeSheet->getStyle($this->toAlphabet($startMonth) . $rowIndex)->applyFromArray($styleUnknown);
                    }else{
                        $activeSheet->getStyle($this->toAlphabet($startMonth) . $rowIndex)->applyFromArray($styleArray3);
                    }
                    $activeSheet->setCellValue($this->toAlphabet($startMonth) . $rowIndex, $fdDetail->fdd_monthly_test_code_desc);
                    $startMonth++;
                }

                $activeSheet->getStyle('V' . $rowIndex)->applyFromArray($styleArray3);
                $activeSheet->setCellValue('V' . $rowIndex, $detail->fd_test_result_record);
                $rowIndex++;
            }

            $startMonth = 9;
            for($i = 1; $i<13; $i++) {
                if(($normal[$i] + $abnormal[$i]) > 0){
                    $activeSheet->setCellValue($this->toAlphabet($startMonth) . $floorRow, sprintf("%s%%", number_format(($normal[$i]/($normal[$i]+$abnormal[$i])*100), 2)));
                }
                $startMonth++;
            }
        }

        //==========================================================================

        //footer

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

        $activeSheet->mergeCells('B' . $rowIndex . ':I' . $rowIndex);
        $activeSheet->getStyle('B' . $rowIndex . ':I' . $rowIndex)->applyFromArray($styleArray);
        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::CHECK_DATE);
        $activeSheet->getStyle('V' . $rowIndex)->applyFromArray($styleArray);

        $startMonth = 9;
        $dates = FdCheckDate::find()->where([
            'power_plant_id' => $this->power_plant_id,
        ])->one();

        $dates = $dates->fcdDetails;
        foreach($dates as $keyD => $date) {

            $activeSheet->getStyle($this->toAlphabet($startMonth) . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue($this->toAlphabet($startMonth) . $rowIndex, $date->fcd_date);
            $startMonth++;
        }


        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }
}
