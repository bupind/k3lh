<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use Yii;
use common\vendor\AppLabels;

/**
 * Plb3BalanceSheetSearch represents the model behind the search form about `backend\models\Plb3BalanceSheet`.
 */
class Plb3BalanceSheetSearch extends Plb3BalanceSheet
{
    public $filename;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'plb3_year'], 'integer'],
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
        $query = Plb3BalanceSheet::find();

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
            'plb3_year' => $this->plb3_year,
        ]);

        return $dataProvider;
    }

    public function export($id)
    {

        $query = Plb3BalanceSheet::find()->where(['id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $model = $dataProvider->getModels()[0];

        // export to excel

        //main excel setup
        $objPHPExcel = new \PHPExcel();
        $filename = sprintf(AppConstants::REPORT_NAME_PLB3_BALANCE_SHEET, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);

        $sheetIndex = 0;
        //Creating sheet

        $this->exportPlb3BalanceSheet($objPHPExcel, $sheetIndex, $model);

        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }

    public function exportPlb3BalanceSheet(\PHPExcel &$objPHPExcel, $sheetIndex, $model)
    {
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(sprintf("%s %s %s", AppLabels::BALANCE_SHEET, AppLabels::WASTE, AppLabels::B3));

        //setting startdate
        $startDate = new \DateTime();
        $startDate->setDate($model->plb3_year - 1, 7, 1);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(4);
        $activeSheet->getColumnDimension('B')->setWidth(20);
        $activeSheet->getColumnDimension('C')->setWidth(10);
        $activeSheet->getColumnDimension('D')->setWidth(10);
        $activeSheet->getColumnDimension('E')->setWidth(25);
        $activeSheet->getColumnDimension('F')->setWidth(20);
        $activeSheet->getColumnDimension('G')->setWidth(10);
        $activeSheet->getColumnDimension('H')->setWidth(10);
        $activeSheet->getColumnDimension('I')->setWidth(10);
        $activeSheet->getColumnDimension('J')->setWidth(10);
        $activeSheet->getColumnDimension('K')->setWidth(10);
        $activeSheet->getColumnDimension('L')->setWidth(10);
        $activeSheet->getColumnDimension('M')->setWidth(10);
        $activeSheet->getColumnDimension('N')->setWidth(10);
        $activeSheet->getColumnDimension('O')->setWidth(10);
        $activeSheet->getColumnDimension('P')->setWidth(10);
        $activeSheet->getColumnDimension('Q')->setWidth(10);
        $activeSheet->getColumnDimension('R')->setWidth(10);
        $activeSheet->getColumnDimension('S')->setWidth(15);
        $activeSheet->getColumnDimension('T')->setWidth(20);
        $activeSheet->getColumnDimension('U')->setWidth(20);
        $activeSheet->getColumnDimension('V')->setWidth(20);
        $activeSheet->getColumnDimension('W')->setWidth(20);
        $activeSheet->getColumnDimension('X')->setWidth(20);
        $activeSheet->getColumnDimension('Y')->setWidth(15);
        $activeSheet->getColumnDimension('Z')->setWidth(17);
        $activeSheet->getColumnDimension('AA')->setWidth(15);
        $activeSheet->getColumnDimension('AB')->setWidth(15);

        //header
        $activeSheet->mergeCells('A1:E1');
        $activeSheet->mergeCells('A2:E2');
        $activeSheet->mergeCells('A3:E3');
        $activeSheet->mergeCells('F2:AB2');
        $activeSheet->mergeCells('F3:AB3');
        $activeSheet->setCellValue('A1', "NERACA PENGELOLAAN LIMBAH B3");
        $activeSheet->setCellValue('A2', "PT.");
        $activeSheet->setCellValue('A3', "PERIODE");
        $activeSheet->setCellValue('F2', $model->powerPlant->pp_name);
        $activeSheet->setCellValue('F3', $model->plb3_year);

        //header style
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
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
            'font' => [
                'bold' => true,
            ],
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
            ]
        ];
        $activeSheet->getStyle('A1:E1')->applyFromArray($styleArray);
        $activeSheet->getStyle('A2:E2')->applyFromArray($styleArray);
        $activeSheet->getStyle('A3:E3')->applyFromArray($styleArray);
        $activeSheet->getStyle('F2:AB2')->applyFromArray($styleArray2);
        $activeSheet->getStyle('F3:AB3')->applyFromArray($styleArray2);

        //==========================================================================

        // body header

        $styleArray = [
            'font' => [
                'bold' => false,
                'size' => 13,
                'color' => [
                    'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                ]
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

        $no1 = 4;
        $no2 = 7;
        for ($i = 0; $i < 6; $i++) {
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }

        $no1 = 6;
        $no2 = 7;

        for ($i = 19; $i < 24; $i++) {
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }

        $activeSheet->mergeCells('G4:L6');
        $activeSheet->mergeCells('M4:R6');
        $activeSheet->mergeCells('T4:X5');
        $activeSheet->mergeCells('S4:S7');
        $activeSheet->mergeCells('Y4:Y7');
        $activeSheet->mergeCells('Z4:Z7');
        $activeSheet->mergeCells('AA4:AA7');
        $activeSheet->mergeCells('AB4:AB7');

        $activeSheet->getStyle("G4:L6")->applyFromArray($styleArray);
        $activeSheet->getStyle("M4:R6")->applyFromArray($styleArray);
        $activeSheet->getStyle("T4:X5")->applyFromArray($styleArray);
        $activeSheet->getStyle("S4:S7")->applyFromArray($styleArray);
        $activeSheet->getStyle("Y4:Y7")->applyFromArray($styleArray);
        $activeSheet->getStyle("Z4:Z7")->applyFromArray($styleArray);
        $activeSheet->getStyle("AA4:AA7")->applyFromArray($styleArray);
        $activeSheet->getStyle("AB4:AB7")->applyFromArray($styleArray);

        $activeSheet->setCellValue('A4', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('B4', sprintf("%s %s", AppLabels::WASTE_TYPE, AppLabels::B3));
        $activeSheet->setCellValue('C4', AppLabels::WASTE_SOURCE);
        $activeSheet->setCellValue('D4', AppLabels::WASTE_UNIT);
        $activeSheet->setCellValue('E4', "Perlakuan");
        $activeSheet->setCellValue('F4', sprintf("%s (Saldo)", AppLabels::PREVIOUS_WASTE));
        $activeSheet->setCellValue('G4', sprintf("%s %s", AppLabels::YEAR, $model->plb3_year - 1));
        $activeSheet->setCellValue('M4', sprintf("%s %s", AppLabels::YEAR, $model->plb3_year));

        $no = 7;
        for ($i = 6; $i < 18; $i++) {
            $alphabet = $this->toAlphabet($i);
            $activeSheet->setCellValue("$alphabet$no", $startDate->format('M'));
            $activeSheet->getStyle("$alphabet$no")->applyFromArray($styleArray);
            $startDate->add(new \DateInterval('P1M'));
        }

        $activeSheet->setCellValue('S4', "Limbah Dihasilkan");
        $activeSheet->setCellValue('T4', "Limbah Dikelola");
        $activeSheet->setCellValue('T6', "Disimpan Di TPS");
        $activeSheet->setCellValue('U6', "Dimanfaatkan Sendiri");
        $activeSheet->setCellValue('V6', "Diolah Sendiri");
        $activeSheet->setCellValue('W6', "Ditimbun Sendiri");
        $activeSheet->setCellValue('X6', "Diserahkan pihak ketiga berizin");
        $activeSheet->setCellValue('Y4', "Limbah Tidak Dikelola");
        $activeSheet->setCellValue('Z4', AppLabels::PERCENTAGE . "(%)");
        $activeSheet->setCellValue('AA4', AppLabels::MANIFEST_CODE);
        $activeSheet->setCellValue('AB4', AppLabels::MANIFEST_CODE);

        //body header style

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
        ];

        $rowIndex = 8;

        foreach ($model->plb3BalanceSheetDetails as $key => $detail) {
            $endRowIndex = $rowIndex+7;
            $objPHPExcel->getActiveSheet()->getStyle("Z$rowIndex:Z$endRowIndex")
                ->getNumberFormat()
                ->setFormatCode('0.00%');

            $activeSheet->mergeCells('A' . $rowIndex . ':A' . ($rowIndex + 6));
            $activeSheet->mergeCells('B' . $rowIndex . ':B' . ($rowIndex + 6));
            $activeSheet->mergeCells('C' . $rowIndex . ':C' . ($rowIndex + 6));
            $activeSheet->mergeCells('D' . $rowIndex . ':D' . ($rowIndex + 6));
            $activeSheet->setCellValue('A' . $rowIndex, ($key + 1));
            $activeSheet->getStyle('A' . $rowIndex . ':A' . ($rowIndex + 6))->applyFromArray($styleArray);
            $activeSheet->setCellValue('B' . $rowIndex, $detail->plb3_waste_type);
            $activeSheet->getStyle('B' . $rowIndex . ':B' . ($rowIndex + 6))->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $rowIndex, $detail->plb3_waste_source_code_desc);
            $activeSheet->getStyle('C' . $rowIndex . ':C' . ($rowIndex + 6))->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $rowIndex, $detail->plb3_waste_unit_code_desc);
            $activeSheet->getStyle('D' . $rowIndex . ':D' . ($rowIndex + 6))->applyFromArray($styleArray);

            $activeSheet->setCellValue('E' . $rowIndex, "Dihasilkan");
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);

            $activeSheet->setCellValue('E' . ($rowIndex + 1), "Disimpan di TPS");
            $activeSheet->getStyle('E' . ($rowIndex + 1))->applyFromArray($styleArray);

            $activeSheet->setCellValue('E' . ($rowIndex + 2), "Dimanfaatkan Sendiri");
            $activeSheet->getStyle('E' . ($rowIndex + 2))->applyFromArray($styleArray);

            $activeSheet->setCellValue('E' . ($rowIndex + 3), "Diolah Sendiri");
            $activeSheet->getStyle('E' . ($rowIndex + 3))->applyFromArray($styleArray);

            $activeSheet->setCellValue('E' . ($rowIndex + 4), "Ditimbun Sendiri");
            $activeSheet->getStyle('E' . ($rowIndex + 4))->applyFromArray($styleArray);

            $activeSheet->setCellValue('E' . ($rowIndex + 5), "Diserahkan Kepihah Ketiga Berizin");
            $activeSheet->getStyle('E' . ($rowIndex + 5))->applyFromArray($styleArray);

            $activeSheet->setCellValue('E' . ($rowIndex + 6), "Tidak Dikelola");
            $activeSheet->getStyle('E' . ($rowIndex + 6))->applyFromArray($styleArray);

            $alphabetNum = 19;
            foreach ($detail->plb3BalanceSheetTreatments as $key2 => $treatment) {
                $nextRowIndex = $rowIndex + $key2;

                if ($key2 == 1) {
                    $activeSheet->setCellValue('F' . $nextRowIndex, $detail->plb3_previous_waste);
                    $activeSheet->getStyle('F' . $nextRowIndex)->applyFromArray($styleArray);

                    for ($i = 6; $i < 18; $i++) {
                        $alphabet = $this->toAlphabet($i);
                        $pAlphabet = $this->toAlphabet($i - 1);
                        $formula = sprintf("%s%s+%s%s-%s%s-%s%s-%s%s-%s%s-%s%s", $pAlphabet, $nextRowIndex, $alphabet, $nextRowIndex - 1, $alphabet, $nextRowIndex + 1, $alphabet, $nextRowIndex + 2, $alphabet, $nextRowIndex + 3, $alphabet, $nextRowIndex + 4, $alphabet, $nextRowIndex + 5);

                        $activeSheet->setCellValue("$alphabet$nextRowIndex", "=$formula");
                        $activeSheet->getStyle("$alphabet$nextRowIndex:$alphabet$nextRowIndex")->applyFromArray($styleArray);
                    }
                } else {
                    $m = 7;
                    for ($i = 6; $i < 18; $i++) {
                        $alphabet = $this->toAlphabet($i);

                        foreach ($treatment->plb3bsdMonths as $key3 => $month) {
                            if ($month->plb3bsdm_month == $m) {
                                $activeSheet->setCellValue("$alphabet$nextRowIndex", $month->plb3bsdm_value);
                                $activeSheet->getStyle("$alphabet$nextRowIndex:$alphabet$nextRowIndex")->applyFromArray($styleArray);
                                break;
                            }
                        }
                        $m++;
                        if ($m == 13) {
                            $m = 1;
                        }
                    }
                }

                if ($key2 != 0) {
                    $alphabet = $this->toAlphabet($alphabetNum);
                    $activeSheet->setCellValue('Z' . $nextRowIndex, "=$alphabet$nextRowIndex/S$rowIndex");
                    $activeSheet->getStyle('Z' . $nextRowIndex)->applyFromArray($styleArray);
                    $alphabetNum++;
                }
                $activeSheet->setCellValue('AA' . $nextRowIndex, $treatment->plb3bst_ref);
                $activeSheet->getStyle('AA' . $nextRowIndex)->applyFromArray($styleArray);

                $activeSheet->setCellValue('AB' . $nextRowIndex, $treatment->plb3bst_manifest_code);
                $activeSheet->getStyle('AB' . $nextRowIndex)->applyFromArray($styleArray);
            }
            $nextRowIndex = $rowIndex + 1;

            $activeSheet->setCellValue('S' . $rowIndex, "=SUM(G$rowIndex:R$rowIndex)+F$nextRowIndex");
            $activeSheet->getStyle('S' . $rowIndex)->applyFromArray($styleArray);

            $activeSheet->setCellValue('T' . ($rowIndex + 1), "=R$nextRowIndex");
            $activeSheet->getStyle('T' . ($rowIndex + 1))->applyFromArray($styleArray);

            $nextRowIndex++;

            $activeSheet->setCellValue('U' . ($rowIndex + 2), "=SUM(F$nextRowIndex:R$nextRowIndex)");
            $activeSheet->getStyle('U' . ($rowIndex + 2))->applyFromArray($styleArray);

            $nextRowIndex++;

            $activeSheet->setCellValue('V' . ($rowIndex + 3), "=SUM(F$nextRowIndex:R$nextRowIndex)");
            $activeSheet->getStyle('V' . ($rowIndex + 3))->applyFromArray($styleArray);

            $nextRowIndex++;

            $activeSheet->setCellValue('W' . ($rowIndex + 4), "=SUM(F$nextRowIndex:R$nextRowIndex)");
            $activeSheet->getStyle('W' . ($rowIndex + 4))->applyFromArray($styleArray);

            $nextRowIndex++;

            $activeSheet->setCellValue('X' . ($rowIndex + 5), "=SUM(F$nextRowIndex:R$nextRowIndex)");
            $activeSheet->getStyle('X' . ($rowIndex + 5))->applyFromArray($styleArray);

            $nextRowIndex++;

            $activeSheet->setCellValue('Y' . ($rowIndex + 6), "=SUM(F$nextRowIndex:R$nextRowIndex)");
            $activeSheet->getStyle('Y' . ($rowIndex + 6))->applyFromArray($styleArray);


            $rowIndex += 7;
        }

    }
}
