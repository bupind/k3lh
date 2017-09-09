<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;

/**
 * PpaSearch represents the model behind the search form about `backend\models\Ppa`.
 */
class PpaSearch extends Ppa {
    
    public $filename;
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'sector_id', 'power_plant_id', 'ppa_year', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Ppa::find();
        
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
            'ppa_year' => $this->ppa_year,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);
        
        return $dataProvider;
    }
    
    public function export($id) {
        $query = Ppa::find()->where(['id' => $id]);
        $model = $query->one();
    
        if (!$model->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $model;
        }
    
        // export to excel
        //main excel setup
        $objPHPExcel = new \PHPExcel();
        $filename = sprintf(AppConstants::REPORT_NAME_PPA, date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];
    
        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);
    
        //Creating sheet
        $this->setupPermitSheet($objPHPExcel->createSheet(0), $model);
        $this->reportBMSheet($objPHPExcel->createSheet(1), $model);
        $this->technicalProvisionSheet($objPHPExcel->createSheet(2), $model);
        $this->pollutionLoadDecreaseSheet($objPHPExcel->createSheet(3), $model);
        $this->pollutionLoadBMSheet($objPHPExcel->createSheet(4), $model);
        $this->pollutionLoadActualSheet($objPHPExcel->createSheet(5), $model);
    
        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);
    
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);
    
        $this->filename = $filename;
    
        return true;
    }
    
    private function pollutionLoadActualSheet(\PHPExcel_Worksheet $activeSheet, $model) {
        $activeSheet->setTitle(AppLabels::POLLUTION_LOAD_ACTUAL);
    
        $startDate = new \DateTime();
        $startDate->setDate($model->ppa_year - 1, 7, 1);
    
        // set cols width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(5);
        $activeSheet->getColumnDimension('C')->setWidth(30);
        $activeSheet->getColumnDimension('D')->setWidth(15);
        $activeSheet->getColumnDimension('E')->setWidth(15);
        $activeSheet->getColumnDimension('F')->setWidth(15);
        $activeSheet->getColumnDimension('G')->setWidth(15);
        $activeSheet->getColumnDimension('H')->setWidth(15);
        $activeSheet->getColumnDimension('I')->setWidth(15);
        $activeSheet->getColumnDimension('J')->setWidth(15);
        $activeSheet->getColumnDimension('K')->setWidth(15);
        $activeSheet->getColumnDimension('L')->setWidth(15);
        $activeSheet->getColumnDimension('M')->setWidth(15);
        $activeSheet->getColumnDimension('N')->setWidth(15);
        $activeSheet->getColumnDimension('O')->setWidth(15);
        $activeSheet->getColumnDimension('P')->setWidth(20);
        $activeSheet->getColumnDimension('Q')->setWidth(20);
        $activeSheet->getColumnDimension('R')->setWidth(25);
        $activeSheet->getColumnDimension('S')->setWidth(25);
        $activeSheet->getColumnDimension('T')->setWidth(25);
    
        // set rows height
        $activeSheet->getRowDimension(1)->setRowHeight(30);
    
        // header
        $activeSheet->mergeCells('A1:A2');
        $activeSheet->mergeCells('B1:B2');
        $activeSheet->mergeCells('C1:C2');
        $activeSheet->setCellValue('D1', AppLabels::POLLUTION_LOAD_ACTUAL_CALC_RESULT_TITLE_EXCEL);
        $activeSheet->mergeCells('D1:O1');
        $activeSheet->setCellValue('P1', AppLabels::DEBIT_UNIT);
        $activeSheet->mergeCells('P1:P2');
        $activeSheet->setCellValue('Q1', AppLabels::PRODUCTION_UNIT);
        $activeSheet->mergeCells('Q1:Q2');
        $activeSheet->setCellValue('R1', AppLabels::POLLUTION_LOAD_TOTAL_GRAM_EXCEL);
        $activeSheet->mergeCells('R1:R2');
        $activeSheet->setCellValue('S1', AppLabels::POLLUTION_LOAD_TOTAL_KG_EXCEL);
        $activeSheet->mergeCells('S1:S2');
        $activeSheet->setCellValue('T1', AppLabels::POLLUTION_LOAD_TOTAL_TON_EXCEL);
        $activeSheet->mergeCells('T1:T2');
    
        $colNumber = \PHPExcel_Cell::columnIndexFromString('D') - 1;
        for ($i=0; $i<12; $i++) {
            $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
            $activeSheet->setCellValue($colString . '2', $startDate->format('M Y'));
        
            $colNumber++;
            $startDate->add(new \DateInterval('P1M'));
        }
    
        // header style
        $styleArray = [
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFD9D9D9']
            ],
            'font' => [
                'bold' => true,
                'size' => 11,
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP,
                'wrap' => true
            ],
        ];
        $activeSheet->getStyle('A1:T2')->applyFromArray($styleArray);
    
        $index = 3;
        foreach ($model->getPollutionLoadActualDataSet() as $key => $data) {
            $activeSheet->setCellValue('A' . $index, $data[0]);
            $activeSheet->setCellValue('B' . $index, $data[1]);
            $activeSheet->setCellValue('C' . $index, $data[2]);
    
            $colNumber = \PHPExcel_Cell::columnIndexFromString('D') - 1;
            for ($i=3; $i<15; $i++) {
                $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
                $activeSheet->setCellValue($colString . $index, isset($data[$i]) ? $data[$i] : '');
        
                $colNumber++;
            }
    
            $activeSheet->setCellValue('P' . $index, $data[15]);
            $activeSheet->setCellValue('Q' . $index, $data[16]);
            $activeSheet->setCellValue('R' . $index, $data[17]);
            $activeSheet->setCellValue('S' . $index, $data[18]);
            $activeSheet->setCellValue('T' . $index, $data[19]);
    
            $index++;
        }
    
        // style rows
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
        $activeSheet->getStyle('A1:T' . ($index - 1))->applyFromArray($styleArray);
    }
    
    private function pollutionLoadBMSheet(\PHPExcel_Worksheet $activeSheet, $model) {
        $activeSheet->setTitle(AppLabels::POLLUTION_LOAD_BM);
    
        $startDate = new \DateTime();
        $startDate->setDate($model->ppa_year - 1, 7, 1);
    
        // set cols width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(5);
        $activeSheet->getColumnDimension('C')->setWidth(30);
        $activeSheet->getColumnDimension('D')->setWidth(15);
        $activeSheet->getColumnDimension('E')->setWidth(15);
        $activeSheet->getColumnDimension('F')->setWidth(15);
        $activeSheet->getColumnDimension('G')->setWidth(15);
        $activeSheet->getColumnDimension('H')->setWidth(15);
        $activeSheet->getColumnDimension('I')->setWidth(15);
        $activeSheet->getColumnDimension('J')->setWidth(15);
        $activeSheet->getColumnDimension('K')->setWidth(15);
        $activeSheet->getColumnDimension('L')->setWidth(15);
        $activeSheet->getColumnDimension('M')->setWidth(15);
        $activeSheet->getColumnDimension('N')->setWidth(15);
        $activeSheet->getColumnDimension('O')->setWidth(15);
        $activeSheet->getColumnDimension('P')->setWidth(25);
        $activeSheet->getColumnDimension('Q')->setWidth(25);
        $activeSheet->getColumnDimension('R')->setWidth(20);
    
        // set rows height
        $activeSheet->getRowDimension(1)->setRowHeight(30);
    
        // header
        $activeSheet->mergeCells('A1:A2');
        $activeSheet->mergeCells('B1:B2');
        $activeSheet->mergeCells('C1:C2');
        $activeSheet->setCellValue('D1', AppLabels::POLLUTION_LOAD_BM_CALC_RESULT_TITLE_EXCEL);
        $activeSheet->mergeCells('D1:O1');
        $activeSheet->setCellValue('P1', AppLabels::QS_MAX_POLLUTION_LOAD);
        $activeSheet->mergeCells('P1:P2');
        $activeSheet->setCellValue('Q1', AppLabels::QS_LOAD_UNIT_CODE);
        $activeSheet->mergeCells('Q1:Q2');
        $activeSheet->setCellValue('R1', AppLabels::DATA_COUNT);
        $activeSheet->mergeCells('R1:R2');
    
        $colNumber = \PHPExcel_Cell::columnIndexFromString('D') - 1;
        for ($i=0; $i<12; $i++) {
            $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
            $activeSheet->setCellValue($colString . '2', $startDate->format('M Y'));
        
            $colNumber++;
            $startDate->add(new \DateInterval('P1M'));
        }
    
        // header style
        $styleArray = [
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFD9D9D9']
            ],
            'font' => [
                'bold' => true,
                'size' => 11,
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP,
                'wrap' => true
            ],
        ];
        $activeSheet->getStyle('A1:R2')->applyFromArray($styleArray);
        
        $index = 3;
        foreach ($model->getPollutionLoadBMDataSet() as $key => $data) {
            $activeSheet->setCellValue('A' . $index, $data[0]);
            $activeSheet->setCellValue('B' . $index, $data[1]);
            $activeSheet->setCellValue('C' . $index, $data[2]);
    
            $colNumber = \PHPExcel_Cell::columnIndexFromString('D') - 1;
            for ($i=3; $i<15; $i++) {
                $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
                $activeSheet->setCellValue($colString . $index, isset($data[$i]) ? $data[$i] : '');
        
                $colNumber++;
            }
//            $activeSheet->getStyle(sprintf('D%s:O%s', $index, $index))->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
    
            $activeSheet->setCellValue('P' . $index, $data[15]);
            $activeSheet->setCellValue('Q' . $index, $data[16]);
            $activeSheet->setCellValue('R' . $index, $data[17]);
            
            $index++;
        }
    
        // style rows
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
        $activeSheet->getStyle('A1:R' . ($index - 1))->applyFromArray($styleArray);
    }
    
    private function pollutionLoadDecreaseSheet(\PHPExcel_Worksheet $activeSheet, $model) {
        $activeSheet->setTitle(AppLabels::POLLUTION_LOAD_DECREASE);
    
        $startDate = new \DateTime();
        $startDate->setDate($model->ppa_year - 3, 7, 1);
    
        // set cols width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(30);
        $activeSheet->getColumnDimension('C')->setWidth(15);
        $activeSheet->getColumnDimension('D')->setWidth(10);
        $activeSheet->getColumnDimension('E')->setWidth(10);
        $activeSheet->getColumnDimension('F')->setWidth(10);
        $activeSheet->getColumnDimension('G')->setWidth(10);
        $activeSheet->getColumnDimension('H')->setWidth(15);
        $activeSheet->getColumnDimension('I')->setWidth(40);
    
        // set rows height
        $activeSheet->getRowDimension(2)->setRowHeight(30);
    
        // header
        $activeSheet->setCellValue('A1', AppLabels::NUMBER_SHORT);
        $activeSheet->mergeCells('A1:A2');
        $activeSheet->setCellValue('B1', AppLabels::PPA_POLL_LOAD_ACTIVITY_TITLE);
        $activeSheet->mergeCells('B1:B2');
        $activeSheet->setCellValue('C1', AppLabels::PARAM);
        $activeSheet->mergeCells('C1:C2');
        $activeSheet->setCellValue('D1', AppLabels::YEAR);
        $activeSheet->mergeCells('D1:G1');
        $activeSheet->setCellValue('H1', AppLabels::UNIT);
        $activeSheet->mergeCells('H1:H2');
        $activeSheet->setCellValue('I1', AppLabels::PPA_POLL_LOAD_CALC_EVIDENCE_TITLE);
        $activeSheet->mergeCells('I1:I2');
    
        $colNumber = \PHPExcel_Cell::columnIndexFromString('D') - 1;
        for ($i=0; $i<4; $i++) {
            $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
            $activeSheet->setCellValue($colString . '2', $startDate->format('Y'));;
        
            $colNumber++;
            $startDate->add(new \DateInterval('P1M'));
        }
    
        // header style
        $styleArray = [
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFD9D9D9']
            ],
            'font' => [
                'bold' => true,
                'size' => 11,
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP,
                'wrap' => true
            ],
        ];
        $activeSheet->getStyle('A1:I2')->applyFromArray($styleArray);
    
        $index = 3;
        foreach ($model->pollutionLoadDecreases as $key => $pollutionLoadDecrease) {
            $activeSheet->setCellValue('A' . $index, $key + 1);
            $activeSheet->setCellValue('B' . $index, $pollutionLoadDecrease->ppapld_activity);
            $activeSheet->setCellValue('C' . $index, $pollutionLoadDecrease->ppapld_parameter);
    
            $colNumber = \PHPExcel_Cell::columnIndexFromString('D') - 1;
            foreach ($pollutionLoadDecrease->ppaPollutionLoadDecreaseYears as $keyYear => $pollutionLoadDecreaseYear) {
                $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
                $activeSheet->setCellValue($colString . $index, $pollutionLoadDecreaseYear->ppapldy_value);
                
                $colNumber++;
            }
    
            $activeSheet->setCellValue('H' . $index, $pollutionLoadDecrease->ppapld_unit);
    
            $attachmentOwner = Converter::attachmentsFullPath($pollutionLoadDecrease->attachmentOwner);
            if (!empty($attachmentOwner)) {
                foreach ($attachmentOwner as $attachment) {
                    $activeSheet->setCellValue('I' . $index, $attachment['label']);
                    $activeSheet->getCell('I' . $index)->getHyperlink()->setUrl($attachment['path']);
                    $activeSheet->getCell('I' . $index)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                    $activeSheet->getCell('I' . $index)->getStyle()->getAlignment()->setWrapText(true);
                }
            }
            
            $index++;
        }
    
        // style rows
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
        $activeSheet->getStyle('A1:I' . ($index - 1))->applyFromArray($styleArray);
    }
    
    private function technicalProvisionSheet(\PHPExcel_Worksheet $activeSheet, $model) {
        $activeSheet->setTitle(AppLabels::TECHNICAL_PROVISION);
    
        $startDate = new \DateTime();
        $startDate->setDate($model->ppa_year - 1, 7, 1);
    
        // set cols width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(40);
        $activeSheet->getColumnDimension('C')->setWidth(20);
        $activeSheet->getColumnDimension('D')->setWidth(20);
        $activeSheet->getColumnDimension('E')->setWidth(30);
        $activeSheet->getColumnDimension('F')->setWidth(10);
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
    
        // set rows height
        $activeSheet->getRowDimension(1)->setRowHeight(40);
        $activeSheet->getRowDimension(2)->setRowHeight(30);
        $activeSheet->getRowDimension(3)->setRowHeight(30);
    
        // laboratorium
        // header
        $activeSheet->setCellValue('A1', strtoupper(AppLabels::LABORATORIUM));
        $activeSheet->mergeCells('A1:Q1');
        
        // header style
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 12,
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP,
                'wrap' => true
            ],
        ];
        $activeSheet->getStyle('A1:Q1')->applyFromArray($styleArray);
        
        $activeSheet->setCellValue('A2', AppLabels::NUMBER_SHORT);
        $activeSheet->mergeCells('A2:A3');
        $activeSheet->setCellValue('B2', sprintf('%s %s', AppLabels::NAME, AppLabels::LABOR_TESTER));
        $activeSheet->mergeCells('B2:B3');
        $activeSheet->setCellValue('C2', AppLabels::LABOR_ACCREDITATION_NUMBER_TITLE);
        $activeSheet->mergeCells('C2:C3');
        $activeSheet->setCellValue('D2', AppLabels::LABOR_ACCREDITATION_END_DATE_TITLE);
        $activeSheet->mergeCells('D2:D3');
        $activeSheet->setCellValue('E2', AppLabels::DESCRIPTION);
        $activeSheet->mergeCells('E2:E3');
        $activeSheet->setCellValue('F2', AppLabels::LABOR_TEST_MONTH);
        $activeSheet->mergeCells('F2:Q2');
    
        $colNumber = \PHPExcel_Cell::columnIndexFromString('F') - 1;
        for ($i=0; $i<12; $i++) {
            $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
            $activeSheet->setCellValue($colString . '3', $startDate->format('M Y'));;
        
            $colNumber++;
            $startDate->add(new \DateInterval('P1M'));
        }
    
        // header style
        $styleArray = [
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFD9D9D9']
            ],
            'font' => [
                'bold' => true,
                'size' => 11,
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP,
                'wrap' => true
            ],
        ];
        $activeSheet->getStyle('A2:Q3')->applyFromArray($styleArray);
        
        $index = 4;
        $styleArray = [
            'alignment' => [
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP,
                'wrap' => true
            ],
        ];
        foreach ($model->technicalProvision->ppaLaboratoriums as $keyLabor => $ppaLaboratorium) {
            $startIndex = $index;
            
            $activeSheet->setCellValue('A' . $index, $keyLabor + 1);
            $activeSheet->setCellValue('B' . $index, $ppaLaboratorium->labor_name);
    
            foreach ($ppaLaboratorium->ppaLaboratoriumAccreditations as $keyAccr => $ppaLaboratoriumAccreditation) {
                $activeSheet->setCellValue('C' . $index, $ppaLaboratoriumAccreditation->lacc_number);
                $activeSheet->setCellValue('D' . $index, $ppaLaboratoriumAccreditation->lacc_end_date);
                $activeSheet->setCellValue('E' . $index, $ppaLaboratoriumAccreditation->lacc_remark);
                
                $index++;
            }
    
            $colNumber = \PHPExcel_Cell::columnIndexFromString('F') - 1;
            foreach ($ppaLaboratorium->ppaLaboratoriumTests as $keyTest => $laboratoriumTest) {
                $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
                $activeSheet->setCellValue($colString . $startIndex, ($laboratoriumTest->test_value == 1) ? 'X' : '');
                $activeSheet->mergeCells(sprintf('%s%s:%s%s', $colString, $startIndex, $colString, $index - 1));
        
                $colNumber++;
            }
            $activeSheet->getStyle(sprintf('F%s:Q%s', $startIndex, $index))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            
            $activeSheet->mergeCells(sprintf('A%s:A%s', $startIndex, $index - 1));
            $activeSheet->mergeCells(sprintf('B%s:B%s', $startIndex, $index - 1));
    
            $activeSheet->getStyle(sprintf('A%s:Q%s', $startIndex, $index))->applyFromArray($styleArray);
        }
    
        // style rows
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
        $activeSheet->getStyle('A1:Q' . ($index - 1))->applyFromArray($styleArray);
        // end laboratorium
    
        $index++;
        $no = count($model->technicalProvision->ppaLaboratoriums) + 1;
        $detailIndex = 0;
        $wizard = new \PHPExcel_Helper_HTML();
        $questionGroups = Codeset::getCodesetAll(AppConstants::CODESET_PPA_QUESTION_TYPE_CODE);
        foreach ($questionGroups as $qKey => $qGroup) {
            $startIndex = $index;
            
            // header
            $activeSheet->setCellValue('A' . $index, strtoupper($qGroup->cset_value));
            $activeSheet->mergeCells(sprintf('A%s:E%s', $index, $index));
    
            // header style
            $styleArray = [
                'fill' => [
                    'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                    'startcolor' => ['argb' => 'FFD9D9D9']
                ],
                'font' => [
                    'bold' => true,
                    'size' => 12,
                ],
                'alignment' => [
                    'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP,
                    'wrap' => true
                ],
            ];
            $activeSheet->getStyle(sprintf('A%s:E%s', $index, $index))->applyFromArray($styleArray);
            $index++;
    
            
            foreach (PpaQuestion::map(new PpaQuestion(), 'ppaq_question', null, true, [
                'where' => [
                    ['ppaq_question_type_code' => $qGroup->cset_code]
                ],
                'empty' => false
            ]) as $ppaqId => $question) {
                $activeSheet->setCellValue('A' . $index, $no++);
                
                $richText = $wizard->toRichTextObject($question);
                $activeSheet->setCellValue('B' . $index, $richText);
                $activeSheet->mergeCells(sprintf('B%s:C%s', $index, $index));
    
                $attachmentOwners = $model->technicalProvision->ppaTechnicalProvisionDetails[$detailIndex]->attachmentOwners;
                if (!empty($attachmentOwners)) {
                    foreach (Converter::attachmentsFullPath($attachmentOwners) as $key2 => $attachment) {
                        $activeSheet->setCellValue('D' . $index, $attachment['label']);
                        $activeSheet->getCell('D' . $index)->getHyperlink()->setUrl($attachment['path']);
                        $activeSheet->getCell('D' . $index)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                        $activeSheet->getCell('D' . $index)->getStyle()->getAlignment()->setWrapText(true);
                        $activeSheet->mergeCells(sprintf('D%s:E%s', $index, $index));
                        
                        $index++;
                    }
                    
                    $index--;
                }
                
                $index++;
                $detailIndex++;
            }
    
            // style rows
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
            $activeSheet->getStyle(sprintf('A%s:E%s', $startIndex, $index - 1))->applyFromArray($styleArray);
            
            $index++;
        }
    }
    
    private function reportBMSheet(\PHPExcel_Worksheet $activeSheet, $model) {
        $activeSheet->setTitle(AppLabels::BM_REPORT_PARAMETER);
    
        $startDate = new \DateTime();
        $startDate->setDate($model->ppa_year - 1, 7, 1);
    
        // set cols width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(20);
        $activeSheet->getColumnDimension('C')->setWidth(10);
        $activeSheet->getColumnDimension('D')->setWidth(10);
        $activeSheet->getColumnDimension('E')->setWidth(15);
        $activeSheet->getColumnDimension('F')->setWidth(15);
        $activeSheet->getColumnDimension('G')->setWidth(15);
        $activeSheet->getColumnDimension('H')->setWidth(15);
        $activeSheet->getColumnDimension('I')->setWidth(15);
        $activeSheet->getColumnDimension('J')->setWidth(15);
        $activeSheet->getColumnDimension('K')->setWidth(15);
        $activeSheet->getColumnDimension('L')->setWidth(15);
        $activeSheet->getColumnDimension('M')->setWidth(15);
        $activeSheet->getColumnDimension('N')->setWidth(15);
        $activeSheet->getColumnDimension('O')->setWidth(15);
        $activeSheet->getColumnDimension('P')->setWidth(15);
        $activeSheet->getColumnDimension('Q')->setWidth(15);
        $activeSheet->getColumnDimension('R')->setWidth(15);
        $activeSheet->getColumnDimension('S')->setWidth(15);
        $activeSheet->getColumnDimension('T')->setWidth(15);
        $activeSheet->getColumnDimension('U')->setWidth(15);
        $activeSheet->getColumnDimension('V')->setWidth(15);
        $activeSheet->getColumnDimension('W')->setWidth(15);
        $activeSheet->getColumnDimension('X')->setWidth(15);
        $activeSheet->getColumnDimension('Y')->setWidth(15);
        $activeSheet->getColumnDimension('Z')->setWidth(15);
        $activeSheet->getColumnDimension('AA')->setWidth(15);
        $activeSheet->getColumnDimension('AB')->setWidth(15);
        $activeSheet->getColumnDimension('AC')->setWidth(7);
        $activeSheet->getColumnDimension('AD')->setWidth(7);
        $activeSheet->getColumnDimension('AE')->setWidth(10);
        $activeSheet->getColumnDimension('AF')->setWidth(20);
        $activeSheet->getColumnDimension('AG')->setWidth(15);
        $activeSheet->getColumnDimension('AH')->setWidth(20);
        $activeSheet->getColumnDimension('AI')->setWidth(20);
        
        // set rows height
        $activeSheet->getRowDimension(1)->setRowHeight(35);
        $activeSheet->getRowDimension(2)->setRowHeight(30);
    
        //header
        $activeSheet->setCellValue('A1', AppLabels::NUMBER_SHORT);
        $activeSheet->mergeCells('A1:A2');
        $activeSheet->setCellValue('B1', AppLabels::SETUP_POINT_PERMIT);
        $activeSheet->mergeCells('B1:B2');
        $activeSheet->setCellValue('C1', AppLabels::BM_REPORT_PARAMETER);
        $activeSheet->mergeCells('C1:D2');
        $activeSheet->setCellValue('E1', AppLabels::INLET_CONCENTRATE_TITLE_EXCEL);
        $activeSheet->mergeCells('E1:P1');
        $activeSheet->setCellValue('Q1', AppLabels::OUTLET_CONCENTRATE_TITLE);
        $activeSheet->mergeCells('Q1:AB1');
        $activeSheet->setCellValue('AC1', AppLabels::QS_CONCENTRATE);
        $activeSheet->mergeCells('AC1:AD2');
        $activeSheet->setCellValue('AE1', AppLabels::QS_UNIT);
        $activeSheet->mergeCells('AE1:AE2');
        $activeSheet->setCellValue('AF1', AppLabels::QS_REFERRED_RULE);
        $activeSheet->mergeCells('AF1:AF2');
        $activeSheet->setCellValue('AG1', AppLabels::QS_MAX_POLLUTION_LOAD);
        $activeSheet->mergeCells('AG1:AG2');
        $activeSheet->setCellValue('AH1', AppLabels::QS_LOAD_UNIT_CODE);
        $activeSheet->mergeCells('AH1:AH2');
        $activeSheet->setCellValue('AI1', AppLabels::QS_REFERRED_MAX_POLLUTION_LOAD_RULE);
        $activeSheet->mergeCells('AI1:AI2');
    
        $colNumber = \PHPExcel_Cell::columnIndexFromString('E') - 1;
        for ($i=0; $i<12; $i++) {
            $colStringInlet = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
            $colStringOutlet = \PHPExcel_Cell::stringFromColumnIndex($colNumber + 12);
            $activeSheet->setCellValue($colStringInlet . '2', $startDate->format('M Y'));
            $activeSheet->setCellValue($colStringOutlet . '2', $startDate->format('M Y'));
        
            $colNumber++;
            $startDate->add(new \DateInterval('P1M'));
        }
    
        // header style
        $styleArray = [
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFD9D9D9']
            ],
            'font' => [
                'bold' => true,
                'size' => 11,
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP,
                'wrap' => true
            ],
        ];
        $activeSheet->getStyle('A1:AI2')->applyFromArray($styleArray);
        
        $index = 3;
        foreach ($model->setupPermits as $key => $setupPermit) {
            foreach ($setupPermit->ppaReportBmsNoFooterParams as $keyBM => $ppaReportBm) {
                if ($keyBM == 0) {
                    $activeSheet->setCellValue('A' . $index, $key + 1);
                    $activeSheet->setCellValue('B' . $index, $setupPermit->ppasp_setup_point_name);
    
                    $count = (count($setupPermit->ppaReportBms) + $index) - 1;
                    $activeSheet->mergeCells(sprintf('A%s:A%s', $index, $count));
                    $activeSheet->mergeCells(sprintf('B%s:B%s', $index, $count));
                }
    
                $activeSheet->setCellValue('C' . $index, $ppaReportBm->ppar_param_code_desc);
                $activeSheet->mergeCells(sprintf('C%s:D%s', $index, $index));
    
                $colNumber = \PHPExcel_Cell::columnIndexFromString('E') - 1;
                foreach ($ppaReportBm->ppaInletOutlets as $keyInlet => $inlet) {
                    $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
                    $activeSheet->setCellValue($colString . $index, $inlet->ppaio_inlet_value);
                    $colNumber++;
                }

                $colNumber = \PHPExcel_Cell::columnIndexFromString('Q') - 1;
                foreach ($ppaReportBm->ppaInletOutlets as $keyOutlet=> $outlet) {
                    $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
                    $activeSheet->setCellValue($colString . $index, $outlet->ppaio_outlet_value);
                    $colNumber++;
                }

                if ($ppaReportBm->ppar_param_code == AppConstants::PPA_RBM_PARAM_PH) {
                    $activeSheet->setCellValue('AC' . $index, $ppaReportBm->ppar_qs_1);
                    $activeSheet->setCellValue('AD' . $index, $ppaReportBm->ppar_qs_2);
                } else {
                    $activeSheet->setCellValue('AC' . $index, $ppaReportBm->ppar_qs_1);
                    $activeSheet->mergeCells(sprintf('AC%s:AD%s', $index, $index));
                }

                $activeSheet->setCellValue('AE' . $index, $ppaReportBm->ppar_qs_unit_code_desc);
                $activeSheet->setCellValue('AF' . $index, $ppaReportBm->ppar_qs_ref);
                $activeSheet->setCellValue('AG' . $index, $ppaReportBm->ppar_qs_max_pollution_load);
                $activeSheet->setCellValue('AH' . $index, $ppaReportBm->ppar_qs_load_unit_code_desc);
                $activeSheet->setCellValue('AI' . $index, $ppaReportBm->ppar_qs_max_pollution_load_ref);
    
                $activeSheet->getStyle(sprintf('E%s:AD%s', $index, $index))->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                
                $index++;
            }
    
            if (!is_null($setupPermit->ppaReportBmDebit)) {
                $activeSheet->setCellValue('C' . $index, $setupPermit->ppaReportBmDebit->ppar_param_code_desc);
                $activeSheet->setCellValue('D' . $index, $setupPermit->ppaReportBmDebit->ppar_param_unit_code_desc);
    
                $colNumber = \PHPExcel_Cell::columnIndexFromString('E') - 1;
                foreach ($setupPermit->ppaReportBmDebit->ppaInletOutlets as $keyInlet => $inlet) {
                    $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
                    $activeSheet->setCellValue($colString . $index, $inlet->ppaio_inlet_value);
                    $colNumber++;
                }
    
                $colNumber = \PHPExcel_Cell::columnIndexFromString('Q') - 1;
                foreach ($setupPermit->ppaReportBmDebit->ppaInletOutlets as $keyOutlet=> $outlet) {
                    $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
                    $activeSheet->setCellValue($colString . $index, $outlet->ppaio_outlet_value);
                    $colNumber++;
                }
    
                $activeSheet->setCellValue('AC' . $index, $setupPermit->ppaReportBmDebit->ppar_qs_1);
                $activeSheet->mergeCells(sprintf('AC%s:AD%s', $index, $index));
    
                $activeSheet->setCellValue('AE' . $index, $setupPermit->ppaReportBmDebit->ppar_qs_unit_code_desc);
                $activeSheet->setCellValue('AF' . $index, $setupPermit->ppaReportBmDebit->ppar_qs_ref);
                $activeSheet->setCellValue('AG' . $index, $setupPermit->ppaReportBmDebit->ppar_qs_max_pollution_load);
                $activeSheet->setCellValue('AH' . $index, $setupPermit->ppaReportBmDebit->ppar_qs_load_unit_code_desc);
                $activeSheet->setCellValue('AI' . $index, $setupPermit->ppaReportBmDebit->ppar_qs_max_pollution_load_ref);
    
                $activeSheet->getStyle(sprintf('E%s:AD%s', $index, $index))->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                
                $index++;
            }
    
            if (!is_null($setupPermit->ppaReportBmProduction)) {
                $activeSheet->setCellValue('C' . $index, $setupPermit->ppaReportBmProduction->ppar_param_code_desc);
                $activeSheet->setCellValue('D' . $index, $setupPermit->ppaReportBmProduction->ppar_param_unit_code_desc);
    
                $colNumber = \PHPExcel_Cell::columnIndexFromString('E') - 1;
                foreach ($setupPermit->ppaReportBmProduction->ppaInletOutlets as $keyInlet => $inlet) {
                    $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
                    $activeSheet->setCellValue($colString . $index, $inlet->ppaio_inlet_value);
                    $colNumber++;
                }
    
                $colNumber = \PHPExcel_Cell::columnIndexFromString('Q') - 1;
                foreach ($setupPermit->ppaReportBmProduction->ppaInletOutlets as $keyOutlet=> $outlet) {
                    $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
                    $activeSheet->setCellValue($colString . $index, $outlet->ppaio_outlet_value);
                    $colNumber++;
                }
    
                $activeSheet->setCellValue('AC' . $index, $setupPermit->ppaReportBmProduction->ppar_qs_1);
                $activeSheet->mergeCells(sprintf('AC%s:AD%s', $index, $index));
    
                $activeSheet->setCellValue('AE' . $index, $setupPermit->ppaReportBmProduction->ppar_qs_unit_code_desc);
                $activeSheet->setCellValue('AF' . $index, $setupPermit->ppaReportBmProduction->ppar_qs_ref);
                $activeSheet->setCellValue('AG' . $index, $setupPermit->ppaReportBmProduction->ppar_qs_max_pollution_load);
                $activeSheet->setCellValue('AH' . $index, $setupPermit->ppaReportBmProduction->ppar_qs_load_unit_code_desc);
                $activeSheet->setCellValue('AI' . $index, $setupPermit->ppaReportBmProduction->ppar_qs_max_pollution_load_ref);
    
                $activeSheet->getStyle(sprintf('E%s:AD%s', $index, $index))->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
    
                $index++;
            }
        }
                
    
        // style rows
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
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP,
                'wrap' => true
            ],
        ];
        $activeSheet->getStyle('A1:AI' . ($index - 1))->applyFromArray($styleArray);
    }
    
    private function setupPermitSheet(\PHPExcel_Worksheet $activeSheet, $model) {
        $activeSheet->setTitle(AppLabels::SETUP_POINT_PERMIT);
    
        $startDate = new \DateTime();
        $startDate->setDate($model->ppa_year - 1, 7, 1);
    
        // set cols width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(20);
        $activeSheet->getColumnDimension('C')->setWidth(20);
        $activeSheet->getColumnDimension('D')->setWidth(20);
        $activeSheet->getColumnDimension('E')->setWidth(20);
        $activeSheet->getColumnDimension('F')->setWidth(30);
        $activeSheet->getColumnDimension('G')->setWidth(20);
        $activeSheet->getColumnDimension('H')->setWidth(30);
        $activeSheet->getColumnDimension('I')->setWidth(20);
        $activeSheet->getColumnDimension('J')->setWidth(20);
        $activeSheet->getColumnDimension('K')->setWidth(10);
        $activeSheet->getColumnDimension('L')->setWidth(10);
        $activeSheet->getColumnDimension('M')->setWidth(10);
        $activeSheet->getColumnDimension('N')->setWidth(10);
        $activeSheet->getColumnDimension('O')->setWidth(10);
        $activeSheet->getColumnDimension('P')->setWidth(10);
        $activeSheet->getColumnDimension('Q')->setWidth(10);
        $activeSheet->getColumnDimension('R')->setWidth(10);
        $activeSheet->getColumnDimension('S')->setWidth(10);
        $activeSheet->getColumnDimension('T')->setWidth(10);
        $activeSheet->getColumnDimension('U')->setWidth(10);
        $activeSheet->getColumnDimension('V')->setWidth(10);
    
        //header
        $activeSheet->setCellValue('A1', AppLabels::NUMBER_SHORT);
        $activeSheet->mergeCells('A1:A2');
        $activeSheet->setCellValue('B1', AppLabels::WASTE_WATER_SOURCE);
        $activeSheet->mergeCells('B1:B2');
        $activeSheet->setCellValue('C1', AppLabels::SETUP_POINT_NAME);
        $activeSheet->mergeCells('C1:C2');
        $activeSheet->setCellValue('D1', AppLabels::COORDINATE);
        $activeSheet->mergeCells('D1:E1');
        $activeSheet->setCellValue('F1', AppLabels::WASTE_WATER_TECHNOLOGY);
        $activeSheet->mergeCells('F1:F2');
        $activeSheet->setCellValue('G1', AppLabels::PERMIT_STATUS);
        $activeSheet->mergeCells('G1:J1');
        $activeSheet->setCellValue('K1', AppLabels::CERTIFIED_NUMBER_TEST_RESULT);
        $activeSheet->mergeCells('K1:V1');
    
        $activeSheet->setCellValue('D2', AppLabels::LS);
        $activeSheet->setCellValue('E2', AppLabels::BT);
        $activeSheet->setCellValue('G2', AppLabels::PERMIT_NUMBER);
        $activeSheet->setCellValue('H2', AppLabels::PERMIT_PUBLISHER);
        $activeSheet->setCellValue('I2', AppLabels::PERMIT_PUBLISH_DATE);
        $activeSheet->setCellValue('J2', AppLabels::PERMIT_END_DATE);
    
        $colNumber = \PHPExcel_Cell::columnIndexFromString('K') - 1;
        for ($i=0; $i<12; $i++) {
            $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
            $activeSheet->setCellValue($colString . '2', $startDate->format('M Y'));
        
            $colNumber++;
            $startDate->add(new \DateInterval('P1M'));
        }
    
        // header style
        $styleArray = [
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFD9D9D9']
            ],
            'font' => [
                'bold' => true,
                'size' => 11,
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP,
                'wrap' => true
            ],
        ];
        $activeSheet->getStyle('A1:V2')->applyFromArray($styleArray);
    
        $index = 3;
        foreach ($model->setupPermits as $key => $setupPermit) {
            $activeSheet->setCellValue('A' . $index, $key + 1);
            $activeSheet->setCellValue('B' . $index, $setupPermit->ppasp_wastewater_source);
            $activeSheet->setCellValue('C' . $index, $setupPermit->ppasp_setup_point_name);
        
            $activeSheet->setCellValue('D' . $index, $setupPermit->ppasp_coord_ls);
            $activeSheet->setCellValue('E' . $index, $setupPermit->ppasp_coord_bt);
            $activeSheet->getCell('D' . $index)->getStyle()->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $activeSheet->getCell('E' . $index)->getStyle()->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
            $activeSheet->setCellValue('F' . $index, $setupPermit->ppasp_wastewater_tech_code_desc);
        
            $activeSheet->setCellValue('G' . $index, $setupPermit->ppasp_permit_number);
            $activeSheet->setCellValue('H' . $index, $setupPermit->ppasp_permit_publisher);
            $activeSheet->setCellValue('I' . $index, $setupPermit->ppasp_permit_publish_date);
            $activeSheet->setCellValue('J' . $index, $setupPermit->ppasp_permit_end_date);
            $activeSheet->getCell('G' . $index)->getStyle()->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $activeSheet->getCell('H' . $index)->getStyle()->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $activeSheet->getCell('I' . $index)->getStyle()->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $activeSheet->getCell('J' . $index)->getStyle()->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
            $colNumber = \PHPExcel_Cell::columnIndexFromString('K')-1;
            foreach ($setupPermit->ppaMonths as $keyMonth => $ppaMonth) {
                $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
                $activeSheet->setCellValue($colString . $index, $ppaMonth->ppam_cert_number);
            
                $attachmentOwner = Converter::attachmentsFullPath($ppaMonth->attachmentOwner);
                if (!empty($attachmentOwner)) {
                    foreach ($attachmentOwner as $attachment) {
                        $activeSheet->getCell($colString . $index)->getHyperlink()->setUrl($attachment['path']);
                        $activeSheet->getCell($colString . $index)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                        $activeSheet->getCell($colString . $index)->getStyle()->getAlignment()->setWrapText(true);
                    }
                }
            
                $colNumber++;
            }
            $index++;
        }
    
        // style table rows
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
        $activeSheet->getStyle('A1:V' . ($index - 1))->applyFromArray($styleArray);
    }
}
