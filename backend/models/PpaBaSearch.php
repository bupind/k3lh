<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;

/**
 * PpaBaSearch represents the model behind the search form about `backend\models\PpaBa`.
 */
class PpaBaSearch extends PpaBa {
    
    public $filename;
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'sector_id', 'power_plant_id', 'ppaba_year'], 'integer'],
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
        $query = PpaBa::find();
        
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
            'ppaba_year' => $this->ppaba_year,
        ]);
        
        return $dataProvider;
    }
    
    public function export($id) {
        $query = PpaBa::find()->where(['id' => $id]);
        $model = $query->one();
    
        if (!$model->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $model;
        }
    
        // export to excel
        //main excel setup
        $objPHPExcel = new \PHPExcel();
        $filename = sprintf(AppConstants::REPORT_NAME_PPA_BA, date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];
    
        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);
    
        //Creating sheet
        $this->monitoringPointSheet($objPHPExcel->createSheet(0), $model);
        $this->reportBMSheet($objPHPExcel->createSheet(1), $model);
    
        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);
    
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);
        
        $this->filename = $filename;
    
        return true;
    }
    
    private function reportBMSheet (\PHPExcel_Worksheet $activeSheet, $model) {
        $activeSheet->setTitle(AppLabels::BM_REPORT_PARAMETER);
    
        $startDate = new \DateTime();
        $startDate->setDate($model->ppaba_year - 1, 7, 1);
    
        // set cols width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(30);
        $activeSheet->getColumnDimension('C')->setWidth(15);
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
        $activeSheet->getColumnDimension('P')->setWidth(15);
        $activeSheet->getColumnDimension('Q')->setWidth(10);
        $activeSheet->getColumnDimension('R')->setWidth(10);
        $activeSheet->getColumnDimension('S')->setWidth(20);
        $activeSheet->getColumnDimension('T')->setWidth(20);
    
        // set rows height
        $activeSheet->getRowDimension(1)->setRowHeight(30);
        $activeSheet->getRowDimension(2)->setRowHeight(30);
    
        // header
        $activeSheet->setCellValue('A1', AppLabels::NUMBER_SHORT);
        $activeSheet->mergeCells('A1:A2');
        $activeSheet->setCellValue('B1', AppLabels::MONITORING_POINT_NAME);
        $activeSheet->mergeCells('B1:B2');
        $activeSheet->setCellValue('C1', AppLabels::BM_REPORT_PARAMETER);
        $activeSheet->mergeCells('C1:D2');
        $activeSheet->setCellValue('E1', AppLabels::PPA_BA_CONCENTRATION_TITLE_EXCEL);
        $activeSheet->mergeCells('E1:P1');
        $activeSheet->setCellValue('Q1', AppLabels::QS_CONCENTRATE);
        $activeSheet->mergeCells('Q1:R2');
        $activeSheet->setCellValue('S1', AppLabels::QS_UNIT);
        $activeSheet->mergeCells('S1:S2');
        $activeSheet->setCellValue('T1', AppLabels::QS_REFERRED_RULE);
        $activeSheet->mergeCells('T1:T2');
    
        $colNumber = \PHPExcel_Cell::columnIndexFromString('E') - 1;
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
        foreach ($model->ppaBaMonitoringPoints as $key => $monitoringPoint) {
            foreach ($monitoringPoint->ppaBaReportBmsNoFooterParams as $keyBM => $ppaBaReportBm) {
                if ($keyBM == 0) {
                    $activeSheet->setCellValue('A' . $index, $key + 1);
                    $activeSheet->setCellValue('B' . $index, $monitoringPoint->ppabamp_monitoring_point_name);
        
                    $count = (count($monitoringPoint->ppaBaReportBms) + $index) - 1;
                    $activeSheet->mergeCells(sprintf('A%s:A%s', $index, $count));
                    $activeSheet->mergeCells(sprintf('B%s:B%s', $index, $count));
                }
                
                $activeSheet->setCellValue('C' . $index, $ppaBaReportBm->ppabar_param_code_desc);
                $activeSheet->mergeCells(sprintf('C%s:D%s', $index, $index));
    
                $colNumber = \PHPExcel_Cell::columnIndexFromString('E') - 1;
                foreach ($ppaBaReportBm->ppaBaConcentrations as $keyCon => $concentration) {
                    $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
                    $activeSheet->setCellValue($colString . $index, $concentration->ppabac_value);
                    $colNumber++;
                }
    
                if ($ppaBaReportBm->ppabar_param_code == AppConstants::PPA_RBM_PARAM_PH) {
                    $activeSheet->setCellValue('Q' . $index, $ppaBaReportBm->ppabar_qs_1);
                    $activeSheet->setCellValue('R' . $index, $ppaBaReportBm->ppabar_qs_2);
                } else {
                    $activeSheet->setCellValue('Q' . $index, $ppaBaReportBm->ppabar_qs_1);
                    $activeSheet->mergeCells(sprintf('Q%s:R%s', $index, $index));
                }
    
                $activeSheet->setCellValue('S' . $index, $ppaBaReportBm->ppabar_qs_unit_code_desc);
                $activeSheet->setCellValue('T' . $index, $ppaBaReportBm->ppabar_qs_ref);
    
                $activeSheet->getStyle(sprintf('E%s:P%s', $index, $index))->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                
                $index++;
            }
    
            if (!is_null($monitoringPoint->ppaBaReportBmDebit)) {
                $activeSheet->setCellValue('C' . $index, $monitoringPoint->ppaBaReportBmDebit->ppabar_param_code_desc);
                $activeSheet->setCellValue('D' . $index, $monitoringPoint->ppaBaReportBmDebit->ppabar_param_unit_code_desc);
    
                $colNumber = \PHPExcel_Cell::columnIndexFromString('E') - 1;
                foreach ($monitoringPoint->ppaBaReportBmDebit->ppaBaConcentrations as $keyCon => $concentration) {
                    $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
                    $activeSheet->setCellValue($colString . $index, $concentration->ppabac_value);
                    $colNumber++;
                }
    
                if ($monitoringPoint->ppaBaReportBmDebit->ppabar_param_code == AppConstants::PPA_RBM_PARAM_PH) {
                    $activeSheet->setCellValue('Q' . $index, $monitoringPoint->ppaBaReportBmDebit->ppabar_qs_1);
                    $activeSheet->setCellValue('R' . $index, $monitoringPoint->ppaBaReportBmDebit->ppabar_qs_2);
                } else {
                    $activeSheet->setCellValue('Q' . $index, $monitoringPoint->ppaBaReportBmDebit->ppabar_qs_1);
                    $activeSheet->mergeCells(sprintf('Q%s:R%s', $index, $index));
                }
    
                $activeSheet->setCellValue('S' . $index, $monitoringPoint->ppaBaReportBmDebit->ppabar_qs_unit_code_desc);
                $activeSheet->setCellValue('T' . $index, $monitoringPoint->ppaBaReportBmDebit->ppabar_qs_ref);
    
                $activeSheet->getStyle(sprintf('E%s:P%s', $index, $index))->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
    
                $index++;
            }
    
            if (!is_null($monitoringPoint->ppaBaReportBmProduction)) {
                $activeSheet->setCellValue('C' . $index, $monitoringPoint->ppaBaReportBmProduction->ppabar_param_code_desc);
                $activeSheet->setCellValue('D' . $index, $monitoringPoint->ppaBaReportBmProduction->ppabar_param_unit_code_desc);
    
                $colNumber = \PHPExcel_Cell::columnIndexFromString('E') - 1;
                foreach ($monitoringPoint->ppaBaReportBmProduction->ppaBaConcentrations as $keyCon => $concentration) {
                    $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
                    $activeSheet->setCellValue($colString . $index, $concentration->ppabac_value);
                    $colNumber++;
                }
    
                if ($monitoringPoint->ppaBaReportBmProduction->ppabar_param_code == AppConstants::PPA_RBM_PARAM_PH) {
                    $activeSheet->setCellValue('Q' . $index, $monitoringPoint->ppaBaReportBmProduction->ppabar_qs_1);
                    $activeSheet->setCellValue('R' . $index, $monitoringPoint->ppaBaReportBmProduction->ppabar_qs_2);
                } else {
                    $activeSheet->setCellValue('Q' . $index, $monitoringPoint->ppaBaReportBmProduction->ppabar_qs_1);
                    $activeSheet->mergeCells(sprintf('Q%s:R%s', $index, $index));
                }
    
                $activeSheet->setCellValue('S' . $index, $monitoringPoint->ppaBaReportBmProduction->ppabar_qs_unit_code_desc);
                $activeSheet->setCellValue('T' . $index, $monitoringPoint->ppaBaReportBmProduction->ppabar_qs_ref);
    
                $activeSheet->getStyle(sprintf('E%s:P%s', $index, $index))->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
    
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
        $activeSheet->getStyle('A1:T' . ($index - 1))->applyFromArray($styleArray);
    }
    
    private function monitoringPointSheet (\PHPExcel_Worksheet $activeSheet, $model) {
        $activeSheet->setTitle(AppLabels::MONITORING_POINT);
    
        $startDate = new \DateTime();
        $startDate->setDate($model->ppaba_year - 1, 7, 1);

        // set cols width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(20);
        $activeSheet->getColumnDimension('C')->setWidth(20);
        $activeSheet->getColumnDimension('D')->setWidth(15);
        $activeSheet->getColumnDimension('E')->setWidth(15);
        $activeSheet->getColumnDimension('F')->setWidth(30);
        $activeSheet->getColumnDimension('G')->setWidth(40);
        $activeSheet->getColumnDimension('H')->setWidth(20);
        $activeSheet->getColumnDimension('I')->setWidth(20);
        $activeSheet->getColumnDimension('J')->setWidth(20);
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

        // set rows height
        $activeSheet->getRowDimension(1)->setRowHeight(30);

        // header
        $activeSheet->setCellValue('A1', AppLabels::PPA_BA_MONITORING_POINT_TITLE_EXCEL);
        $activeSheet->mergeCells('A1:V1');
        // header style
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 12,
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap' => true
            ],
        ];
        $activeSheet->getStyle('A1:V1')->applyFromArray($styleArray);

        $activeSheet->setCellValue('A3', AppLabels::NUMBER_SHORT);
        $activeSheet->mergeCells('A3:A4');
        $activeSheet->setCellValue('B3', AppLabels::WASTE_WATER_SOURCE);
        $activeSheet->mergeCells('B3:B4');
        $activeSheet->setCellValue('C3', AppLabels::MONITORING_POINT_NAME);
        $activeSheet->mergeCells('C3:C4');
        $activeSheet->setCellValue('D3', AppLabels::COORDINATE);
        $activeSheet->mergeCells('D3:E3');
        $activeSheet->setCellValue('F3', AppLabels::PPA_ENVIRONMENT_DOCUMENT_TITLE);
        $activeSheet->mergeCells('F3:H3');
        $activeSheet->setCellValue('I3', AppLabels::MONITORING_FREQUENCY);
        $activeSheet->mergeCells('I3:I4');
        $activeSheet->setCellValue('J3', AppLabels::MONITORING_STATUS_PERIOD);
        $activeSheet->mergeCells('J3:J4');
        $activeSheet->setCellValue('K3', AppLabels::CERTIFIED_NUMBER_TEST_RESULT);
        $activeSheet->mergeCells('K3:V3');

        $activeSheet->setCellValue('D4', AppLabels::LATITUDE);
        $activeSheet->setCellValue('E4', AppLabels::LONGITUDE);
        $activeSheet->setCellValue('F4', AppLabels::ENVIRONMENT_DOCUMENT_NAME);
        $activeSheet->setCellValue('G4', AppLabels::ENVIRONMENT_DOCUMENT_VALIDATOR);
        $activeSheet->setCellValue('H4', AppLabels::VALIDATE_DATE);

        $colNumber = \PHPExcel_Cell::columnIndexFromString('K') - 1;
        for ($i=0; $i<12; $i++) {
            $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
            $activeSheet->setCellValue($colString . '4', $startDate->format('M Y'));

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
        $activeSheet->getStyle('A3:V4')->applyFromArray($styleArray);
    
        $index = 5;
        foreach ($model->ppaBaMonitoringPoints as $key => $monitoringPoint) {
            $activeSheet->setCellValue('A' . $index, $key + 1);
            $activeSheet->setCellValue('B' . $index, $monitoringPoint->ppabamp_wastewater_source);
            $activeSheet->setCellValue('C' . $index, $monitoringPoint->ppabamp_monitoring_point_name);
            $activeSheet->setCellValue('D' . $index, $monitoringPoint->ppabamp_coord_lat);
            $activeSheet->setCellValue('E' . $index, $monitoringPoint->ppabamp_coord_long);
            $activeSheet->setCellValue('F' . $index, $monitoringPoint->ppabamp_document_name);
            $activeSheet->setCellValue('G' . $index, $monitoringPoint->ppabamp_permit_publisher);
            $activeSheet->setCellValue('H' . $index, $monitoringPoint->ppabamp_validation_date);
            $activeSheet->setCellValue('I' . $index, $monitoringPoint->ppabamp_monitoring_frequency_code_desc);
            $activeSheet->setCellValue('J' . $index, $monitoringPoint->ppabamp_monitoring_status_code_desc);
    
            $colNumber = \PHPExcel_Cell::columnIndexFromString('K') - 1;
            foreach ($monitoringPoint->ppaBaMonths as $keyMonth => $ppaBaMonth) {
                $colString = \PHPExcel_Cell::stringFromColumnIndex($colNumber);
                $activeSheet->setCellValue($colString . $index, $ppaBaMonth->ppabam_cert_number);
    
                $attachmentOwner = Converter::attachmentsFullPath($ppaBaMonth->attachmentOwner);
                if (!empty($attachmentOwner)) {
                    $activeSheet->getCell($colString . $index)->getHyperlink()->setUrl($attachmentOwner['path']);
                    $activeSheet->getCell($colString . $index)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                    $activeSheet->getCell($colString . $index)->getStyle()->getAlignment()->setWrapText(true);
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
        $activeSheet->getStyle('A3:V' . ($index - 1))->applyFromArray($styleArray);
    }
}
