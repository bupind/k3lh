<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * PpuAmbientSearch represents the model behind the search form about `backend\models\PpuAmbient`.
 */
class PpuAmbientSearch extends PpuAmbient
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'ppua_year'], 'integer'],
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
        $query = PpuAmbient::find();

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
            'ppua_year' => $this->ppua_year,
        ]);

        return $dataProvider;
    }

    public function exportPpuaMonitoringPoint(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(AppLabels::MONITORING_POINT);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(30);
        $activeSheet->getColumnDimension('C')->setWidth(30);
        $activeSheet->getColumnDimension('D')->setWidth(20);
        $activeSheet->getColumnDimension('E')->setWidth(20);
        $activeSheet->getColumnDimension('F')->setWidth(40);
        $activeSheet->getColumnDimension('G')->setWidth(40);
        $activeSheet->getColumnDimension('H')->setWidth(30);
        $activeSheet->getColumnDimension('I')->setWidth(40);
        $activeSheet->getColumnDimension('J')->setWidth(40);
        $activeSheet->getColumnDimension('K')->setWidth(40);

        //header
        $activeSheet->mergeCells('A1:H1');
        $activeSheet->setCellValue('A1', "Khusus Titik Pemantauan Kualitas Udara Ambien (Sesuai Ketentuan Dalam Dokumen/ Izin Lingkungan)");

        //header style
        $styleArray = [
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
        $activeSheet->getStyle('A1:H1')->applyFromArray($styleArray);

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
            ],
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFF2F2F2']
            ],
        ];

        $activeSheet->setCellValue('A3', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('B3', sprintf("%s %s", AppLabels::LOCATION, AppLabels::MONITORING));
        $activeSheet->setCellValue('C3', sprintf("%s %s", AppLabels::CODE, AppLabels::LOCATION));
        $activeSheet->mergeCells('D2:E2');
        $activeSheet->setCellValue('D2', AppLabels::COORDINAT);
        $activeSheet->mergeCells('F2:H2');
        $activeSheet->setCellValue('F2', sprintf("%s %s/ %s %s", AppLabels::DOCUMENTS, AppLabels::ENVIRONMENT, AppLabels::PERMIT, AppLabels::ENVIRONMENT));
        $activeSheet->setCellValue('D3', AppLabels::LATITUDE);
        $activeSheet->setCellValue('E3', AppLabels::LONGITUDE);
        $activeSheet->setCellValue('F3', sprintf("%s %s %s", AppLabels::NAME, AppLabels::DOCUMENTS, AppLabels::ENVIRONMENT));
        $activeSheet->setCellValue('G3', AppLabels::INSTITUTION);
        $activeSheet->setCellValue('H3', sprintf("%s %s %s", AppLabels::CONFIRM_DATE, AppLabels::DOCUMENTS, AppLabels::ENVIRONMENT));
        $activeSheet->setCellValue('I3', AppLabels::PPUA_MONITORING_OBLIGATION);
        $activeSheet->setCellValue('J3', AppLabels::PPUA_STATUS_PROPER);
        $activeSheet->setCellValue('K3', AppLabels::DESCRIPTION);

        $activeSheet->getStyle('A3')->applyFromArray($styleArray);
        $activeSheet->getStyle('B3')->applyFromArray($styleArray);
        $activeSheet->getStyle('C3')->applyFromArray($styleArray);
        $activeSheet->getStyle('D2:E2')->applyFromArray($styleArray);
        $activeSheet->getStyle('F2:H2')->applyFromArray($styleArray);
        $activeSheet->getStyle('D3')->applyFromArray($styleArray);
        $activeSheet->getStyle('E3')->applyFromArray($styleArray);
        $activeSheet->getStyle('F3')->applyFromArray($styleArray);
        $activeSheet->getStyle('G3')->applyFromArray($styleArray);
        $activeSheet->getStyle('H3')->applyFromArray($styleArray);
        $activeSheet->getStyle('I3')->applyFromArray($styleArray);
        $activeSheet->getStyle('J3')->applyFromArray($styleArray);
        $activeSheet->getStyle('K3')->applyFromArray($styleArray);

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

        $rowIndex = 4;
        foreach($model as $key => $detail){
            $activeSheet->setCellValue('A' . $rowIndex, ($key+1));
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('B' . $rowIndex, $detail->ppua_monitoring_location);
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $rowIndex, $detail->ppua_code_location);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $rowIndex, $detail->ppua_coord_latitude);
            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('E' . $rowIndex, $detail->ppua_coord_longitude);
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('F' . $rowIndex, $detail->ppua_env_doc_name);
            $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('G' . $rowIndex, $detail->ppua_institution);
            $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('H' . $rowIndex, $detail->ppua_confirm_date);
            $activeSheet->getStyle('H' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('I' . $rowIndex, $detail->ppua_freq_monitoring_obligation_code_desc);
            $activeSheet->getStyle('I' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('J' . $rowIndex, $detail->ppua_monitoring_data_status_code_desc);
            $activeSheet->getStyle('J' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('K' . $rowIndex, $detail->ppua_ref);
            $activeSheet->getStyle('K' . $rowIndex)->applyFromArray($styleArray);


            $rowIndex++;

        }

        //==========================================================================

        //footer

        //==========================================================================

        //extra footer
    }


    public function exportPpuaParameterObligation(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(sprintf("%s %s", AppLabels::ADHERENCE, AppLabels::BM_REPORT_PARAMETER));

        //setting startdate
        $startDate = new \DateTime();
        $startDate->setDate($model->ppua_year - 1, 7, 1);

        //Getting model
        $ppuaMonitoringPointModel = $model->ppuaMonitoringPoints;

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(30);
        $activeSheet->getColumnDimension('C')->setWidth(30);
        $activeSheet->getColumnDimension('D')->setWidth(10);
        $activeSheet->getColumnDimension('E')->setWidth(10);
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
        $activeSheet->getColumnDimension('R')->setWidth(10);
        $activeSheet->getColumnDimension('S')->setWidth(10);
        $activeSheet->getColumnDimension('T')->setWidth(15);
        $activeSheet->getColumnDimension('U')->setWidth(30);
        $activeSheet->getColumnDimension('V')->setWidth(20);
        $activeSheet->getColumnDimension('W')->setWidth(15);
        $activeSheet->getColumnDimension('X')->setWidth(25);

        //header

        //header style

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
            ],
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFF2F2F2']
            ],
        ];

        $activeSheet->mergeCells('A2:A4');
        $activeSheet->setCellValue('A2', AppLabels::NUMBER_SHORT);
        $activeSheet->mergeCells('B2:B4');
        $activeSheet->setCellValue('B2', sprintf("%s %s", AppLabels::NAME, AppLabels::EMISSION_SOURCE));
        $activeSheet->mergeCells('C2:C4');
        $activeSheet->setCellValue('C2', sprintf("%s %s", AppLabels::CODE, AppLabels::CHIMNEY));
        $activeSheet->mergeCells('D2:E4');
        $activeSheet->setCellValue('D2', AppLabels::WATCHED_PARAMETER);
        $activeSheet->mergeCells('F2:Q2');
        $activeSheet->setCellValue('F2', AppLabels::CONCENTRATE_TEST_RESULT);
        $activeSheet->mergeCells('F3:K3');
        $activeSheet->setCellValue('F3', sprintf("%s %s", "Semester II", $model->ppua_year-1));
        $activeSheet->mergeCells('L3:Q3');
        $activeSheet->setCellValue('L3', sprintf("%s %s", "Semester I", $model->ppua_year));
        $activeSheet->mergeCells('R2:S4');
        $activeSheet->setCellValue('R2', AppLabels::QUALITY_STANDARD);
        $activeSheet->mergeCells('T2:T4');
        $activeSheet->setCellValue('T2', AppLabels::QUALITY_STANDARD_UNIT);
        $activeSheet->mergeCells('U2:U4');
        $activeSheet->setCellValue('U2', AppLabels::QUALITY_STANDARD_REF);
        $activeSheet->mergeCells('V2:V4');
        $activeSheet->setCellValue('V2', AppLabels::MAXIMUM_QS_POLLUTION_LOAD);
        $activeSheet->mergeCells('W2:W4');
        $activeSheet->setCellValue('W2', AppLabels::QS_LOAD_UNIT);
        $activeSheet->mergeCells('X2:X4');
        $activeSheet->setCellValue('X2', AppLabels::MAXIMUM_QS_POLLUTION_LOAD_REF);

        $no = 4;
        for ($i = 5; $i < 17; $i++) {
            $alphabet = $this->toAlphabet($i);
            $activeSheet->getStyle("$alphabet$no")->applyFromArray($styleArray);
            $activeSheet->setCellValue("$alphabet$no", $startDate->format('M-Y'));
            $startDate->add(new \DateInterval('P1M'));
        }

        $activeSheet->getStyle('A2:A4')->applyFromArray($styleArray);
        $activeSheet->getStyle('B2:B4')->applyFromArray($styleArray);
        $activeSheet->getStyle('C2:C4')->applyFromArray($styleArray);
        $activeSheet->getStyle('D2:E4')->applyFromArray($styleArray);
        $activeSheet->getStyle('F2:Q2')->applyFromArray($styleArray);
        $activeSheet->getStyle('F3:K3')->applyFromArray($styleArray);
        $activeSheet->getStyle('L3:Q3')->applyFromArray($styleArray);
        $activeSheet->getStyle('R2:S4')->applyFromArray($styleArray);
        $activeSheet->getStyle('R2:S4')->applyFromArray($styleArray);
        $activeSheet->getStyle('T2:T4')->applyFromArray($styleArray);
        $activeSheet->getStyle('U2:U4')->applyFromArray($styleArray);
        $activeSheet->getStyle('V2:V4')->applyFromArray($styleArray);
        $activeSheet->getStyle('W2:W4')->applyFromArray($styleArray);
        $activeSheet->getStyle('X2:X4')->applyFromArray($styleArray);
        $activeSheet->getStyle('F4')->applyFromArray($styleArray);
        $activeSheet->getStyle('G4')->applyFromArray($styleArray);
        $activeSheet->getStyle('H4')->applyFromArray($styleArray);
        $activeSheet->getStyle('I4')->applyFromArray($styleArray);
        $activeSheet->getStyle('J4')->applyFromArray($styleArray);
        $activeSheet->getStyle('K4')->applyFromArray($styleArray);
        $activeSheet->getStyle('L4')->applyFromArray($styleArray);
        $activeSheet->getStyle('M4')->applyFromArray($styleArray);
        $activeSheet->getStyle('N4')->applyFromArray($styleArray);
        $activeSheet->getStyle('O4')->applyFromArray($styleArray);
        $activeSheet->getStyle('P4')->applyFromArray($styleArray);
        $activeSheet->getStyle('Q4')->applyFromArray($styleArray);


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

        //Get the number of parameter code

        $rowIndex = 5;
        foreach($ppuaMonitoringPointModel as $key => $detail){
            $ppuaParameterObligation = $detail->ppuaParameterObligations;
            $parameterCount = count($ppuaParameterObligation);

            if($parameterCount != 0 ){
                $mergeRange = $rowIndex + $parameterCount - 1;
                $activeSheet->mergeCells('A' . $rowIndex . ':' . 'A' . $mergeRange);
                $activeSheet->mergeCells('B' . $rowIndex . ':' . 'B' . $mergeRange);
                $activeSheet->mergeCells('C' . $rowIndex . ':' . 'C' . $mergeRange);
                $activeSheet->setCellValue('A' . $rowIndex, ($key+1));
                $activeSheet->setCellValue('B' . $rowIndex, $detail->ppua_monitoring_location);
                $activeSheet->setCellValue('C' . $rowIndex, $detail->ppua_code_location);
                $activeSheet->getStyle('A' . $rowIndex . ':' . 'A' . $mergeRange)->applyFromArray($styleArray);
                $activeSheet->getStyle('B' . $rowIndex . ':' . 'B' . $mergeRange)->applyFromArray($styleArray);
                $activeSheet->getStyle('C' . $rowIndex . ':' . 'C' . $mergeRange)->applyFromArray($styleArray);

                foreach($ppuaParameterObligation as $keyP => $parameterObligation) {
                        $activeSheet->mergeCells('D' . $rowIndex . ':' . 'E' . $rowIndex);
                        $activeSheet->setCellValue('D' . $rowIndex, $parameterObligation->ppuapo_parameter_code_desc);
                        $activeSheet->getStyle('D' . $rowIndex . ':' . 'E' . $rowIndex)->applyFromArray($styleArray);


                    $ppuapoMonths = $parameterObligation->ppuapoMonths;
                    $alphabetNumber = 5;
                    foreach($ppuapoMonths as $keyM => $month){
                        $alphabet = $this->toAlphabet($alphabetNumber);
                        $activeSheet->setCellValue($alphabet . $rowIndex, number_format($month->ppuapom_value,2));
                        $activeSheet->getStyle($alphabet . $rowIndex)->applyFromArray($styleArray);
                        $alphabetNumber++;
                    }

                    $activeSheet->mergeCells('R' . $rowIndex . ':' . 'S' . $rowIndex);
                    $activeSheet->setCellValue('R' . $rowIndex, $parameterObligation->ppuapo_qs);
                    $activeSheet->getStyle('R' . $rowIndex . ':' . 'S' . $rowIndex)->applyFromArray($styleArray);
                    $activeSheet->setCellValue('T' . $rowIndex, $parameterObligation->ppuapo_qs_unit_code_desc);
                    $activeSheet->getStyle('T' . $rowIndex)->applyFromArray($styleArray);
                    $activeSheet->setCellValue('U' . $rowIndex, $parameterObligation->ppuapo_qs_ref);
                    $activeSheet->getStyle('U' . $rowIndex)->applyFromArray($styleArray);
                    $activeSheet->setCellValue('V' . $rowIndex, $parameterObligation->ppuapo_qs_max_pollution_load);
                    $activeSheet->getStyle('V' . $rowIndex)->applyFromArray($styleArray);
                    $activeSheet->setCellValue('W' . $rowIndex, $parameterObligation->ppuapo_qs_load_unit_code_desc);
                    $activeSheet->getStyle('W' . $rowIndex)->applyFromArray($styleArray);
                    $activeSheet->setCellValue('X' . $rowIndex, $parameterObligation->ppuapo_qs_max_pollution_load_ref);
                    $activeSheet->getStyle('X' . $rowIndex)->applyFromArray($styleArray);

                    $rowIndex++;
                }
            }
        }

        //==========================================================================

        //footer

        //==========================================================================

        //extra footer
    }


    public function export($id) {

        $query = PpuAmbient::find()->where(['id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $model = $dataProvider->getModels()[0];

        $ppuaMonitoringPointModel = $model->ppuaMonitoringPoints;

        // export to excel

        //main excel setup
        $objPHPExcel = new \PHPExcel();
        $filename = sprintf(AppConstants::REPORT_NAME_PPU_AMBIENT, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);

        $sheetIndex = 0;
        //Creating sheet
        $this->exportPpuaMonitoringPoint($objPHPExcel, $sheetIndex++, $ppuaMonitoringPointModel);
        $this->exportPpuaParameterObligation($objPHPExcel, $sheetIndex++, $model);

        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }
}
