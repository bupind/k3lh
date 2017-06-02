<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * BudgetMonitoringSearch represents the model behind the search form about `backend\models\BudgetMonitoring`.
 */
class BudgetMonitoringSearch extends BudgetMonitoring
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id'], 'integer'],
            [['form_type_code', 'k3l_year'], 'safe'],
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
        $query = BudgetMonitoring::find();

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
        ]);

        $query->andFilterWhere(['like', 'form_type_code', $this->form_type_code])
            ->andFilterWhere(['like', 'k3l_year', $this->k3l_year]);

        return $dataProvider;
    }

    public function export($id) {

        $query = BudgetMonitoring::find()->where(['id' => $id]);

        $model = $query->one();


        if (!$model->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $model;
        }


        // export to excel

        //main excel setup
        $objPHPExcel = new \PHPExcel();
        $filename = sprintf(AppConstants::REPORT_NAME_ROADMAP, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle($model->k3l_year);

        // set dimension

        // set row width
        $activeSheet->getRowDimension('4')->setRowHeight(20);

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(35);
        $activeSheet->getColumnDimension('B')->setWidth(35);
        for($i = 2; $i<26; $i++){
            $activeSheet->getColumnDimension($this->toAlphabet($i))->setWidth(15);
        }
        $activeSheet->getColumnDimension('AA')->setWidth(15);

        //header
        $activeSheet->mergeCells('A4:AA4');
        $activeSheet->setCellValue('A4', sprintf("MONITORING RKAP %s TAHUN %s", Codeset::getCodesetValue(AppConstants::CODESET_NAME_FORM_TYPE_CODE, $model->form_type_code), $model->k3l_year));
        $activeSheet->setCellValue('A5', "Unit Induk");
        $activeSheet->setCellValue('B5', ": PT PLN (PERSERO) PEMBANGKITAN SUMATERA BAGIAN SELATAN");
        $activeSheet->setCellValue('A6',AppLabels::SECTOR);
        $activeSheet->setCellValue('B6',  sprintf(": %s",$model->powerPlant->pp_name));

        //header style
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 16,
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
        $activeSheet->getStyle('A4:AA4')->applyFromArray($styleArray);

        $styleArray = [
            'font' => [
                'bold' => true
            ],
        ];
        $activeSheet->getStyle('A5:B6')->applyFromArray($styleArray);

        //==========================================================================

        // body header
        $activeSheet->mergeCells('A8:A9');
        $activeSheet->mergeCells('B8:B9');
        $activeSheet->mergeCells('C8:C9');
        $activeSheet->mergeCells('D8:O8');
        $activeSheet->mergeCells('P8:AA8');

        $activeSheet->setCellValue('A8', AppLabels::PRK_NUMBER);
        $activeSheet->setCellValue('B8', AppLabels::PROGRAM);
        $activeSheet->setCellValue('C8', sprintf("%s (%s.)", AppLabels::VALUE, AppLabels::CURRENCY_IDR_SHORT));
        $activeSheet->setCellValue('D8', sprintf("%s (%s.)", AppLabels::PLAN, AppLabels::CURRENCY_IDR_SHORT));
        $activeSheet->setCellValue('P8', sprintf("%s (%s.)", AppLabels::REALIZATION, AppLabels::CURRENCY_IDR_SHORT));

        $activeSheet->setCellValue('D9', AppLabels::JANUARY);
        $activeSheet->setCellValue('E9', AppLabels::FEBRUARY);
        $activeSheet->setCellValue('F9', AppLabels::MARCH);
        $activeSheet->setCellValue('G9', AppLabels::APRIL);
        $activeSheet->setCellValue('H9', AppLabels::MAY);
        $activeSheet->setCellValue('I9', AppLabels::JUNE);
        $activeSheet->setCellValue('J9', AppLabels::JULY);
        $activeSheet->setCellValue('K9', AppLabels::AUGUST);
        $activeSheet->setCellValue('L9', AppLabels::SEPTEMBER);
        $activeSheet->setCellValue('M9', AppLabels::OCTOBER);
        $activeSheet->setCellValue('N9', AppLabels::NOVEMBER);
        $activeSheet->setCellValue('O9', AppLabels::DECEMBER);

        $activeSheet->setCellValue('P9', AppLabels::JANUARY);
        $activeSheet->setCellValue('Q9', AppLabels::FEBRUARY);
        $activeSheet->setCellValue('R9', AppLabels::MARCH);
        $activeSheet->setCellValue('S9', AppLabels::APRIL);
        $activeSheet->setCellValue('T9', AppLabels::MAY);
        $activeSheet->setCellValue('U9', AppLabels::JUNE);
        $activeSheet->setCellValue('V9', AppLabels::JULY);
        $activeSheet->setCellValue('W9', AppLabels::AUGUST);
        $activeSheet->setCellValue('X9', AppLabels::SEPTEMBER);
        $activeSheet->setCellValue('Y9', AppLabels::OCTOBER);
        $activeSheet->setCellValue('Z9', AppLabels::NOVEMBER);
        $activeSheet->setCellValue('AA9', AppLabels::DECEMBER);

        //body header style
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
            ]
        ];
        $activeSheet->getStyle('A8:C9')->applyFromArray($styleArray);
        $activeSheet->getStyle('D8:O8')->applyFromArray($styleArray);
        $activeSheet->getStyle('P8:AA8')->applyFromArray($styleArray);

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
            ]
        ];
        $activeSheet->getStyle('D9:AA9')->applyFromArray($styleArray);

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
            ]
        ];

        $styleArray2 = [
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                    ]
                ]
            ]
        ];
        $rowIndex = 10;
        foreach($model->budgetMonitoringDetails as $keyD => $detail){
            $activeSheet->setCellValue('A' . $rowIndex, $detail->bmd_no_prk);
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('B' . $rowIndex, $detail->bmd_program);
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $rowIndex, $detail->bmd_value);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray2);
            $activeSheet->getStyle('C' . $rowIndex)->getNumberFormat()->setFormatCode(AppConstants::PHPEXCEL_FORMAT_CURRENCY);

            $columnIndexFromString = \PHPExcel_Cell::columnIndexFromString('C');
            foreach($detail->budgetMonitoringMonths as $keyM => $month){
                $columnIndex = \PHPExcel_Cell::stringFromColumnIndex($columnIndexFromString + $keyM);
                $activeSheet->setCellValue($columnIndex . $rowIndex, $month->bmv_plan_value);
                $activeSheet->getStyle($columnIndex . $rowIndex)->applyFromArray($styleArray2);
                $activeSheet->getStyle($columnIndex . $rowIndex)->getNumberFormat()->setFormatCode(AppConstants::PHPEXCEL_FORMAT_CURRENCY);
            }
            $columnIndexFromString = \PHPExcel_Cell::columnIndexFromString('O');
            foreach($detail->budgetMonitoringMonths as $keyM => $month){
                $columnIndex = \PHPExcel_Cell::stringFromColumnIndex($columnIndexFromString + $keyM);
                $activeSheet->setCellValue($columnIndex . $rowIndex, $month->bmv_realization_value);
                $activeSheet->getStyle($columnIndex . $rowIndex)->applyFromArray($styleArray2);
                $activeSheet->getStyle($columnIndex . $rowIndex)->getNumberFormat()->setFormatCode(AppConstants::PHPEXCEL_FORMAT_CURRENCY);
            }
            $rowIndex++;
        }

        //==========================================================================

        //footer
        $activeSheet->mergeCells('A' . $rowIndex . ':B' . $rowIndex);
        $activeSheet->mergeCells('A' . ($rowIndex+1) . ':C' . ($rowIndex+1));

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
            ]
        ];
        $activeSheet->setCellValue('A' . ($rowIndex+1), AppLabels::ACCUMULATION_MONTH);
        $activeSheet->getStyle('A' . $rowIndex . ':B' . $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle('A' . ($rowIndex+1) . ':C' . ($rowIndex+1))->applyFromArray($styleArray);

        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFFFC000']
            ]
        ];

        $activeSheet->getStyle('A' . $rowIndex . ':AA' . ($rowIndex+1))->applyFromArray($styleArray);

        $styleArray = [
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_BOTTOM,
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
        $activeSheet->setCellValue('C' . $rowIndex, '=SUM(C10:C' . ($rowIndex-1) . ')');
        $activeSheet->getStyle('C' . $rowIndex)->getNumberFormat()->setFormatCode(AppConstants::PHPEXCEL_FORMAT_CURRENCY);
        $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);

        for($i=3; $i<26; $i++){
            $activeSheet->setCellValue($this->toAlphabet($i) . $rowIndex, '=SUM(' . $this->toAlphabet($i) . '10:' . $this->toAlphabet($i) . ($rowIndex-1) . ')');
            $activeSheet->getStyle($this->toAlphabet($i) . $rowIndex)->getNumberFormat()->setFormatCode(AppConstants::PHPEXCEL_FORMAT_CURRENCY);
            $activeSheet->getStyle($this->toAlphabet($i) . $rowIndex)->applyFromArray($styleArray);
        }
        $activeSheet->setCellValue('AA' . $rowIndex, '=SUM(AA10:AA' . ($rowIndex-1) . ')');
        $activeSheet->getStyle('AA' . $rowIndex)->getNumberFormat()->setFormatCode(AppConstants::PHPEXCEL_FORMAT_CURRENCY);
        $activeSheet->getStyle('AA' . $rowIndex)->applyFromArray($styleArray);


        $activeSheet->setCellValue('D' . ($rowIndex+1), '=D' . $rowIndex );
        $activeSheet->getStyle('D' . ($rowIndex+1))->getNumberFormat()->setFormatCode(AppConstants::PHPEXCEL_FORMAT_CURRENCY);
        $activeSheet->getStyle('D' . ($rowIndex+1))->applyFromArray($styleArray);

        for($i=4; $i<15; $i++){
            $activeSheet->setCellValue($this->toAlphabet($i) . ($rowIndex+1), '=' . $this->toAlphabet($i-1) . ($rowIndex+1) . '+' . $this->toAlphabet($i) . ($rowIndex));
            $activeSheet->getStyle($this->toAlphabet($i) . ($rowIndex+1))->getNumberFormat()->setFormatCode(AppConstants::PHPEXCEL_FORMAT_CURRENCY);
            $activeSheet->getStyle($this->toAlphabet($i) . ($rowIndex+1))->applyFromArray($styleArray);
        }

        $activeSheet->setCellValue('P' . ($rowIndex+1), '=P' . $rowIndex );
        $activeSheet->getStyle('P' . ($rowIndex+1))->getNumberFormat()->setFormatCode(AppConstants::PHPEXCEL_FORMAT_CURRENCY);
        $activeSheet->getStyle('P' . ($rowIndex+1))->applyFromArray($styleArray);

        for($i=16; $i<26; $i++){
            $activeSheet->setCellValue($this->toAlphabet($i) . ($rowIndex+1), '=' . $this->toAlphabet($i-1) . ($rowIndex+1) . '+' . $this->toAlphabet($i) . ($rowIndex));
            $activeSheet->getStyle($this->toAlphabet($i) . ($rowIndex+1))->getNumberFormat()->setFormatCode(AppConstants::PHPEXCEL_FORMAT_CURRENCY);
            $activeSheet->getStyle($this->toAlphabet($i) . ($rowIndex+1))->applyFromArray($styleArray);
        }
        $activeSheet->setCellValue('AA' . ($rowIndex+1), '=Z' . ($rowIndex+1) . '+AA' . ($rowIndex));
        $activeSheet->getStyle('AA' . ($rowIndex+1))->getNumberFormat()->setFormatCode(AppConstants::PHPEXCEL_FORMAT_CURRENCY);
        $activeSheet->getStyle('AA' . ($rowIndex+1))->applyFromArray($styleArray);

        //==========================================================================

        //extra footer


        $activeSheet->mergeCells('R' . ($rowIndex+3) . ':' . 'Z' . ($rowIndex+3));
        $activeSheet->setCellValue('R' . ($rowIndex+3), 'Bulan ………………………….. Tahun …………………………..');

        $activeSheet->mergeCells('R' . ($rowIndex+4) . ':' . 'T' . ($rowIndex+4));
        $activeSheet->setCellValue('R' . ($rowIndex+4), 'Disetujui');

        $activeSheet->mergeCells('U' . ($rowIndex+4) . ':' . 'W' . ($rowIndex+4));
        $activeSheet->setCellValue('U' . ($rowIndex+4), 'Diverifikasi');

        $activeSheet->mergeCells('X' . ($rowIndex+4) . ':' . 'Z' . ($rowIndex+4));
        $activeSheet->setCellValue('X' . ($rowIndex+4), 'Dibuat');

        $activeSheet->mergeCells('R' . ($rowIndex+5) . ':' . 'T' . ($rowIndex+5));
        $activeSheet->setCellValue('R' . ($rowIndex+5), 'Manajer Sektor');

        $activeSheet->mergeCells('R' . ($rowIndex+10) . ':' . 'T' . ($rowIndex+10));
        $activeSheet->setCellValue('R' . ($rowIndex+10), '(…………………………………………………………..)');

        $activeSheet->mergeCells('U' . ($rowIndex+5) . ':' . 'W' . ($rowIndex+5));
        $activeSheet->setCellValue('U' . ($rowIndex+5), 'Asman Operasi');

        $activeSheet->mergeCells('U' . ($rowIndex+10) . ':' . 'W' . ($rowIndex+10));
        $activeSheet->setCellValue('U' . ($rowIndex+10), '(…………………………………………………………..)');

        $activeSheet->mergeCells('X' . ($rowIndex+5) . ':' . 'Z' . ($rowIndex+5));
        $activeSheet->setCellValue('X' . ($rowIndex+5), 'Spv. Lingkungan & K2');

        $activeSheet->mergeCells('X' . ($rowIndex+10) . ':' . 'Z' . ($rowIndex+10));
        $activeSheet->setCellValue('X' . ($rowIndex+10), '(…………………………………………………………..)');

        $activeSheet->mergeCells('R' . ($rowIndex+6) . ':' . 'T' . ($rowIndex+9));
        $activeSheet->mergeCells('U' . ($rowIndex+6) . ':' . 'W' . ($rowIndex+9));
        $activeSheet->mergeCells('X' . ($rowIndex+6) . ':' . 'Z' . ($rowIndex+9));

        $styleArray= [
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
            ]
        ];

        $activeSheet->getStyle('R' . ($rowIndex+3) . ':Z' . ($rowIndex+3))->applyFromArray($styleArray);
        $activeSheet->getStyle('R' . ($rowIndex+4) . ':T' . ($rowIndex+4))->applyFromArray($styleArray);
        $activeSheet->getStyle('U' . ($rowIndex+4) . ':W' . ($rowIndex+4))->applyFromArray($styleArray);
        $activeSheet->getStyle('X' . ($rowIndex+4) . ':Z' . ($rowIndex+4))->applyFromArray($styleArray);
        $activeSheet->getStyle('R' . ($rowIndex+5) . ':T' . ($rowIndex+10))->applyFromArray($styleArray);
        $activeSheet->getStyle('U' . ($rowIndex+5) . ':W' . ($rowIndex+10))->applyFromArray($styleArray);
        $activeSheet->getStyle('X' . ($rowIndex+5) . ':Z' . ($rowIndex+10))->applyFromArray($styleArray);

        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }
}
