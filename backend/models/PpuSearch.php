<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;

/**
 * PpuSearch represents the model behind the search form about `backend\models\Ppu`.
 */
class PpuSearch extends Ppu
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'ppu_year'], 'integer'],
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
        $query = Ppu::find();

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
            'ppu_year' => $this->ppu_year,
        ]);

        return $dataProvider;
    }

    public function exportPpuEmissionSource(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(AppLabels::EMISSION_SOURCE_INVENTORY);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(30);
        $activeSheet->getColumnDimension('C')->setWidth(30);
        $activeSheet->getColumnDimension('D')->setWidth(30);
        $activeSheet->getColumnDimension('E')->setWidth(30);
        $activeSheet->getColumnDimension('F')->setWidth(30);
        $activeSheet->getColumnDimension('G')->setWidth(30);
        $activeSheet->getColumnDimension('H')->setWidth(30);
        $activeSheet->getColumnDimension('I')->setWidth(30);
        $activeSheet->getColumnDimension('J')->setWidth(30);
        $activeSheet->getColumnDimension('K')->setWidth(30);
        $activeSheet->getColumnDimension('L')->setWidth(30);
        $activeSheet->getColumnDimension('M')->setWidth(40);
        $activeSheet->getColumnDimension('N')->setWidth(30);
        $activeSheet->getColumnDimension('O')->setWidth(30);
        $activeSheet->getColumnDimension('P')->setWidth(40);
        $activeSheet->getColumnDimension('Q')->setWidth(40);
        $activeSheet->getColumnDimension('R')->setWidth(40);
        $activeSheet->getColumnDimension('S')->setWidth(50);
        $activeSheet->getColumnDimension('T')->setWidth(40);

        //header
        $activeSheet->mergeCells('A1:G1');
        $activeSheet->setCellValue('A1', "Inventarisasi Sumber Emisi (Pengukuran Secara Manual)");

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
        $activeSheet->getStyle('A1:G1')->applyFromArray($styleArray);

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

        $activeSheet->setCellValue('A2', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('B2', sprintf("%s %s", AppLabels::NAME, AppLabels::EMISSION_SOURCE));
        $activeSheet->setCellValue('C2', sprintf("%s %s", AppLabels::CODE, AppLabels::CHIMNEY));
        $activeSheet->setCellValue('D2', sprintf("%s %s (%s)", AppLabels::CAPACITY, AppLabels::EMISSION_SOURCE, AppLabels::MW));
        $activeSheet->setCellValue('E2', AppLabels::EMISSION_CONTROL_TOOL);
        $activeSheet->setCellValue('F2', AppLabels::FUEL_NAME);
        $activeSheet->setCellValue('G2', sprintf("%s /%s", AppLabels::TOTAL_FUEL, AppLabels::YEAR));
        $activeSheet->setCellValue('H2', AppLabels::FUEL_UNIT);
        $activeSheet->setCellValue('I2', sprintf("%s (%s/%s)", AppLabels::OPERATION_TIME, AppLabels::HOUR, AppLabels::YEAR));
        $activeSheet->setCellValue('J2', AppLabels::LOCATION);
        $activeSheet->setCellValue('K2', AppLabels::COORDINAT);
        $activeSheet->setCellValue('K3', AppLabels::LS);
        $activeSheet->setCellValue('L3', AppLabels::BT);
        $activeSheet->setCellValue('M2', sprintf("%s %s", AppLabels::SHAPE, AppLabels::CHIMNEY));
        $activeSheet->setCellValue('N2', sprintf("%s/%s %s (%s)", AppLabels::HEIGHT, AppLabels::LENGTH, AppLabels::CHIMNEY, AppLabels::M));
        $activeSheet->setCellValue('O2', sprintf("%s %s (%s)", AppLabels::DIAMETER, AppLabels::CHIMNEY, AppLabels::M));
        $activeSheet->setCellValue('P2', sprintf("%s (%s/%s) %s", AppLabels::POSITION, AppLabels::HEIGHT, AppLabels::LENGTH, AppLabels::SAMPLING_HOLE));
        $activeSheet->setCellValue('Q2', sprintf("%s", AppLabels::PPUES_STATUS_PROPER));
        $activeSheet->setCellValue('R2', AppLabels::PPUES_MONITORING_OBLIGATION);
        $activeSheet->setCellValue('S2', AppLabels::DESCRIPTION);
        $activeSheet->setCellValue('T2', AppLabels::UNMONITORED_EVIDENCE);



        $no1 = 2;
        $no2 = 3;
        for ($i = 0; $i < 10; $i++) {
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }
        $activeSheet->mergeCells('K2:L2');
        $activeSheet->getStyle('K2:L2')->applyFromArray($styleArray);
        $activeSheet->getStyle('K3')->applyFromArray($styleArray);
        $activeSheet->getStyle('L3')->applyFromArray($styleArray);

        for ($i = 12; $i < 20; $i++) {
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }

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
            $activeSheet->setCellValue('B' . $rowIndex, $detail->ppues_name);
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $rowIndex, $detail->ppues_chimney_name);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $rowIndex, $detail->ppues_capacity);
            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('E' . $rowIndex, $detail->ppues_control_device);
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('F' . $rowIndex, $detail->ppues_fuel_name_code_desc);
            $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('G' . $rowIndex, $detail->ppues_total_fuel);
            $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('H' . $rowIndex, $detail->ppues_fuel_unit_code_desc);
            $activeSheet->getStyle('H' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('I' . $rowIndex, $detail->ppues_operation_time);
            $activeSheet->getStyle('I' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('J' . $rowIndex, $detail->ppues_location);
            $activeSheet->getStyle('J' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('K' . $rowIndex, $detail->ppues_coord_ls);
            $activeSheet->getStyle('K' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('L' . $rowIndex, $detail->ppues_coord_bt);
            $activeSheet->getStyle('L' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('M' . $rowIndex, $detail->ppues_chimney_shape_code_desc);
            $activeSheet->getStyle('M' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('N' . $rowIndex, $detail->ppues_chimney_height);
            $activeSheet->getStyle('N' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('O' . $rowIndex, $detail->ppues_chimney_diameter);
            $activeSheet->getStyle('O' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('P' . $rowIndex, $detail->ppues_hole_position);
            $activeSheet->getStyle('P' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('Q' . $rowIndex, $detail->ppues_monitoring_data_status_code_desc);
            $activeSheet->getStyle('Q' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('R' . $rowIndex, $detail->ppues_freq_monitoring_obligation_code_desc);
            $activeSheet->getStyle('R' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('S' . $rowIndex, $detail->ppues_ref);
            $activeSheet->getStyle('S' . $rowIndex)->applyFromArray($styleArray);

            if (!empty($detail->attachmentOwner)) {
                $attachment = Converter::attachmentsFullPath($detail->attachmentOwner);
                $activeSheet->setCellValue('T' . $rowIndex, $attachment['label']);
                $activeSheet->getCell('T' . $rowIndex)->getHyperlink()->setUrl($attachment['path']);
                $activeSheet->getCell('T' . $rowIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                $activeSheet->getCell('T' . $rowIndex)->getStyle()->getAlignment()->setWrapText(true);
            }
            $activeSheet->getStyle('T' . $rowIndex)->applyFromArray($styleArray);

            $rowIndex++;
        }

        //==========================================================================

        //footer

        //==========================================================================

        //extra footer
    }

    public function exportAdherencePoint(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(AppLabels::ADHERENCE_POINT);

        //setting startdate
        $startDate = new \DateTime();
        $startDate->setDate($model->ppu_year - 1, 7, 1);


        //getting model
        $ppuEmissionSourceModel = $model->ppuEmissionSources;

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(30);
        $activeSheet->getColumnDimension('C')->setWidth(30);
        $activeSheet->getColumnDimension('D')->setWidth(30);
        $activeSheet->getColumnDimension('E')->setWidth(30);
        $activeSheet->getColumnDimension('F')->setWidth(30);
        $activeSheet->getColumnDimension('G')->setWidth(30);
        $activeSheet->getColumnDimension('H')->setWidth(30);
        $activeSheet->getColumnDimension('I')->setWidth(30);
        $activeSheet->getColumnDimension('J')->setWidth(30);
        $activeSheet->getColumnDimension('K')->setWidth(30);
        $activeSheet->getColumnDimension('L')->setWidth(30);
        $activeSheet->getColumnDimension('M')->setWidth(30);
        $activeSheet->getColumnDimension('N')->setWidth(30);
        $activeSheet->getColumnDimension('O')->setWidth(30);
        $activeSheet->getColumnDimension('P')->setWidth(30);
        $activeSheet->getColumnDimension('Q')->setWidth(30);
        $activeSheet->getColumnDimension('R')->setWidth(30);
        $activeSheet->getColumnDimension('S')->setWidth(30);
        $activeSheet->getColumnDimension('T')->setWidth(30);

        //header
        $activeSheet->mergeCells('A1:F1');
        $activeSheet->setCellValue('A1', "Sumber Emisi Wajib Pantau (Pengukuran Secara Manual)");

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
        $activeSheet->getStyle('A1:F1')->applyFromArray($styleArray);

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
        $activeSheet->setCellValue('B3', sprintf("%s %s", AppLabels::NAME, AppLabels::EMISSION_SOURCE));
        $activeSheet->setCellValue('C3', sprintf("%s %s", AppLabels::CODE, AppLabels::CHIMNEY));
        $activeSheet->setCellValue('D3', sprintf("%s (%s/%s)", AppLabels::OPERATION_TIME, AppLabels::HOUR, AppLabels::YEAR));
        $activeSheet->setCellValue('E3', AppLabels::PPUES_MONITORING_OBLIGATION);

        $activeSheet->getStyle('A3')->applyFromArray($styleArray);
        $activeSheet->getStyle('B3')->applyFromArray($styleArray);
        $activeSheet->getStyle('C3')->applyFromArray($styleArray);
        $activeSheet->getStyle('D3')->applyFromArray($styleArray);
        $activeSheet->getStyle('E3')->applyFromArray($styleArray);

        $activeSheet->setCellValue('G3', AppLabels::OPERATIONAL_TIME);
        $activeSheet->mergeCells('G3:G5');
        $activeSheet->getStyle('G3:G5')->applyFromArray($styleArray);

        $no = 3;
        for ($i = 7; $i < 19; $i++) {
            $alphabet = $this->toAlphabet($i);
            $activeSheet->getStyle("$alphabet$no")->applyFromArray($styleArray);
            $activeSheet->setCellValue("$alphabet$no", $startDate->format('M-Y'));
            $startDate->add(new \DateInterval('P1M'));
        }

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
        foreach($ppuEmissionSourceModel as $key => $detail){
            $activeSheet->setCellValue('A' . $rowIndex, ($key+1));
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('B' . $rowIndex, $detail->ppues_name);
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $rowIndex, $detail->ppues_chimney_name);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $rowIndex, $detail->ppues_operation_time);
            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('E' . $rowIndex, $detail->ppues_freq_monitoring_obligation_code_desc);
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);

            $ppuesMonthModel = $detail->ppuesMonths;
            $i = 7;

            $startDate->setDate($model->ppu_year - 1, 7, 1);
            foreach ($ppuesMonthModel as $keyM => $month) {
                $alphabet = $this->toAlphabet($i);
                $activeSheet->setCellValue("$alphabet$rowIndex", $month->ppuesm_operation_time);
                $i++;
            }

            $rowIndex++;

        }

        //==========================================================================

        //footer

        //==========================================================================

        //extra footer
    }

    public function exportParameterObligation(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(sprintf("%s %s", AppLabels::ADHERENCE, AppLabels::BM_REPORT_PARAMETER));

        //setting startdate
        $startDate = new \DateTime();
        $startDate->setDate($model->ppu_year - 1, 7, 1);


        //getting model
        $ppuEmissionSourceModel = $model->ppuEmissionSources;

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
        $activeSheet->setCellValue('F3', sprintf("%s %s", "Semester II", $model->ppu_year-1));
        $activeSheet->mergeCells('L3:Q3');
        $activeSheet->setCellValue('L3', sprintf("%s %s", "Semester I", $model->ppu_year));
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
        foreach($ppuEmissionSourceModel as $key => $detail){
            $ppuParameterObligation = $detail->ppuParameterObligations;
            $parameterCount = count($ppuParameterObligation);

            if($parameterCount != 0 ){
                $mergeRange = $rowIndex + $parameterCount - 1;
                $activeSheet->mergeCells('A' . $rowIndex . ':' . 'A' . $mergeRange);
                $activeSheet->mergeCells('B' . $rowIndex . ':' . 'B' . $mergeRange);
                $activeSheet->mergeCells('C' . $rowIndex . ':' . 'C' . $mergeRange);
                $activeSheet->setCellValue('A' . $rowIndex, ($key+1));
                $activeSheet->setCellValue('B' . $rowIndex, $detail->ppues_name);
                $activeSheet->setCellValue('C' . $rowIndex, $detail->ppues_chimney_name);
                $activeSheet->getStyle('A' . $rowIndex . ':' . 'A' . $mergeRange)->applyFromArray($styleArray);
                $activeSheet->getStyle('B' . $rowIndex . ':' . 'B' . $mergeRange)->applyFromArray($styleArray);
                $activeSheet->getStyle('C' . $rowIndex . ':' . 'C' . $mergeRange)->applyFromArray($styleArray);

                foreach($ppuParameterObligation as $keyP => $parameterObligation) {
                    if($parameterObligation->ppupo_parameter_unit_code == '') {
                        $activeSheet->mergeCells('D' . $rowIndex . ':' . 'E' . $rowIndex);
                        $activeSheet->setCellValue('D' . $rowIndex, $parameterObligation->ppupo_parameter_code_desc);
                        $activeSheet->getStyle('D' . $rowIndex . ':' . 'E' . $rowIndex)->applyFromArray($styleArray);
                    }else{
                        $activeSheet->setCellValue('D' . $rowIndex, $parameterObligation->ppupo_parameter_code_desc);
                        $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);
                        $activeSheet->setCellValue('E' . $rowIndex, $parameterObligation->ppupo_parameter_unit_code_desc);
                        $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);
                    }


                    $ppupoMonths = $parameterObligation->ppupoMonths;
                    $alphabetNumber = 5;
                    foreach($ppupoMonths as $keyM => $month){
                        $alphabet = $this->toAlphabet($alphabetNumber);
                        $activeSheet->setCellValue($alphabet . $rowIndex, number_format($month->ppupom_value,2));
                        $activeSheet->getStyle($alphabet . $rowIndex)->applyFromArray($styleArray);
                        $alphabetNumber++;
                    }

                    $activeSheet->mergeCells('R' . $rowIndex . ':' . 'S' . $rowIndex);
                    $activeSheet->setCellValue('R' . $rowIndex, $parameterObligation->ppupo_qs);
                    $activeSheet->getStyle('R' . $rowIndex . ':' . 'S' . $rowIndex)->applyFromArray($styleArray);
                    $activeSheet->setCellValue('T' . $rowIndex, $parameterObligation->ppupo_qs_unit_code_desc);
                    $activeSheet->getStyle('T' . $rowIndex)->applyFromArray($styleArray);
                    $activeSheet->setCellValue('U' . $rowIndex, $parameterObligation->ppupo_qs_ref);
                    $activeSheet->getStyle('U' . $rowIndex)->applyFromArray($styleArray);
                    $activeSheet->setCellValue('V' . $rowIndex, $parameterObligation->ppupo_qs_max_pollution_load);
                    $activeSheet->getStyle('V' . $rowIndex)->applyFromArray($styleArray);
                    $activeSheet->setCellValue('W' . $rowIndex, $parameterObligation->ppupo_qs_load_unit_code_desc);
                    $activeSheet->getStyle('W' . $rowIndex)->applyFromArray($styleArray);
                    $activeSheet->setCellValue('X' . $rowIndex, $parameterObligation->ppupo_qs_max_pollution_load_ref);
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

    public function exportEmissionLoadGrk(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(sprintf("%s %s", AppLabels::EMISSION_LOAD_CALCULATION, AppLabels::GRK));

        //setting startdate
        $startDate = new \DateTime();
        $startDate->setDate($model->ppu_year - 1, 7, 1);


        //getting model
        $ppuEmissionSourceModel = $model->ppuEmissionSources;

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(30);
        $activeSheet->getColumnDimension('C')->setWidth(30);
        $activeSheet->getColumnDimension('D')->setWidth(30);
        $activeSheet->getColumnDimension('E')->setWidth(30);
        $activeSheet->getColumnDimension('F')->setWidth(30);
        $activeSheet->getColumnDimension('G')->setWidth(30);
        $activeSheet->getColumnDimension('H')->setWidth(30);
        $activeSheet->getColumnDimension('I')->setWidth(30);


        //header
        $activeSheet->mergeCells('A1:D1');
        $activeSheet->setCellValue('A1', "Rangkuman Hasil Perhitungan Beban Emisi");

        $activeSheet->mergeCells('A3:D3');
        $activeSheet->setCellValue('A3', sprintf("Periode: Januari - Desember %s; Januari - Desember %s", $startDate->format('Y'), intval($startDate->format('Y'))+1 ));

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
        $activeSheet->getStyle('A1:D1')->applyFromArray($styleArray);
        $activeSheet->getStyle('A3:D3')->applyFromArray($styleArray);

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

        $activeSheet->mergeCells('A5:A6');
        $activeSheet->mergeCells('B5:B6');
        $activeSheet->mergeCells('C5:C6');
        $activeSheet->setCellValue('A5', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('B5', sprintf("%s %s", AppLabels::NAME, AppLabels::EMISSION_SOURCE));
        $activeSheet->setCellValue('C5', AppLabels::PARAMETER);

        $activeSheet->mergeCells('D5:E5');
        $activeSheet->mergeCells('D6:E6');
        $activeSheet->setCellValue('D5', sprintf("%s %s %s", AppLabels::EMISSION_LOAD, AppLabels::YEAR, $startDate->format('Y')));
        $activeSheet->setCellValue('D6', sprintf("%s (%s)", AppLabels::EMISSION_LOAD, AppLabels::TON));

        $activeSheet->mergeCells('F5:F6');
        $activeSheet->setCellValue('F5', AppLabels::ATTACHMENT_SUPPORTING_EVIDENCE);

        $activeSheet->mergeCells('G5:H5');
        $activeSheet->mergeCells('G6:H6');
        $activeSheet->setCellValue('G5', sprintf("%s %s %s", AppLabels::EMISSION_LOAD, AppLabels::YEAR, intval($startDate->format('Y'))+1));
        $activeSheet->setCellValue('G6', sprintf("%s (%s)", AppLabels::EMISSION_LOAD, AppLabels::TON));

        $activeSheet->mergeCells('I5:I6');
        $activeSheet->setCellValue('I5', AppLabels::ATTACHMENT_SUPPORTING_EVIDENCE);

        $activeSheet->getStyle('A5:A6')->applyFromArray($styleArray);
        $activeSheet->getStyle('B5:B6')->applyFromArray($styleArray);
        $activeSheet->getStyle('C5:C6')->applyFromArray($styleArray);
        $activeSheet->getStyle('D5:E5')->applyFromArray($styleArray);
        $activeSheet->getStyle('D6:E6')->applyFromArray($styleArray);
        $activeSheet->getStyle('F5:F6')->applyFromArray($styleArray);
        $activeSheet->getStyle('G5:H5')->applyFromArray($styleArray);
        $activeSheet->getStyle('G6:H6')->applyFromArray($styleArray);
        $activeSheet->getStyle('I5:I6')->applyFromArray($styleArray);


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


        //=======================================================================================================

        $rowIndex = 7;
        $emissionLoadIndex = $rowIndex;
        foreach($ppuEmissionSourceModel as $key => $detail){
            foreach($detail->ppuEmissionLoadGrks as $keyG => $emissionLoad) {
                $activeSheet->setCellValue('A' . $rowIndex, ($key + 1));
                $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);
                $activeSheet->setCellValue('B' . $rowIndex, $emissionLoad->ppuEmissionSource->ppues_name);
                $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
                $activeSheet->setCellValue('C' . $rowIndex, $emissionLoad->ppuelg_parameter);
                $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);

                $activeSheet->mergeCells('D' . $rowIndex . ':E' . $rowIndex);
                $activeSheet->getStyle('D' . $rowIndex . ':E' . $rowIndex)->applyFromArray($styleArray);
                $activeSheet->mergeCells('G' . $rowIndex . ':H' . $rowIndex);
                $activeSheet->getStyle('G' . $rowIndex . ':H' . $rowIndex)->applyFromArray($styleArray);

                if($keyG == 0 && $key == 0){
                    $emissionLoadIndex = $rowIndex;

                }

                $rowIndex++;
            }
        }

        $footerIndex = $rowIndex + 2;
        //footer

        $activeSheet->setCellValue('B' . ($footerIndex+1), AppLabels::DESCRIPTION);
        $activeSheet->getStyle('B' . ($footerIndex+1))->applyFromArray($styleArray);
        $activeSheet->setCellValue('B' . ($footerIndex+2), AppLabels::COAL_USAGE);
        $activeSheet->getStyle('B' . ($footerIndex+2))->applyFromArray($styleArray);
        $activeSheet->setCellValue('B' . ($footerIndex+3), AppLabels::CARBON_CONTENT);
        $activeSheet->getStyle('B' . ($footerIndex+3))->applyFromArray($styleArray);
        $activeSheet->setCellValue('B' . ($footerIndex+4), AppLabels::ACTUAL_CARBON_CONTENT);
        $activeSheet->getStyle('B' . ($footerIndex+4))->applyFromArray($styleArray);
        $activeSheet->setCellValue('B' . ($footerIndex+5), sprintf("%s %s", AppLabels::MW, AppLabels::CO2));
        $activeSheet->getStyle('B' . ($footerIndex+5))->applyFromArray($styleArray);
        $activeSheet->setCellValue('B' . ($footerIndex+6), AppLabels::ANC);
        $activeSheet->getStyle('B' . ($footerIndex+6))->applyFromArray($styleArray);
        $activeSheet->setCellValue('B' . ($footerIndex+7), AppLabels::OXIDATION_FACTOR);
        $activeSheet->getStyle('B' . ($footerIndex+7))->applyFromArray($styleArray);

        $activeSheet->setCellValue('C' . ($footerIndex+2), "KTon");
        $activeSheet->getStyle('C' . ($footerIndex+2))->applyFromArray($styleArray);
        $activeSheet->setCellValue('C' . ($footerIndex+3), "% ave");
        $activeSheet->getStyle('C' . ($footerIndex+3))->applyFromArray($styleArray);
        $activeSheet->setCellValue('C' . ($footerIndex+4), "Ton C/ Kton");
        $activeSheet->getStyle('C' . ($footerIndex+4))->applyFromArray($styleArray);
        $activeSheet->setCellValue('C' . ($footerIndex+5), "44");
        $activeSheet->getStyle('C' . ($footerIndex+5))->applyFromArray($styleArray);
        $activeSheet->setCellValue('C' . ($footerIndex+6), "12");
        $activeSheet->getStyle('C' . ($footerIndex+6))->applyFromArray($styleArray);
        $activeSheet->setCellValue('C' . ($footerIndex+7), "0.98");
        $activeSheet->getStyle('C' . ($footerIndex+7))->applyFromArray($styleArray);

        $columnIndexNumber = \PHPExcel_Cell::columnIndexFromString('D');

        $tempFooterIndex = $footerIndex;

        foreach($ppuEmissionSourceModel as $key => $detail){
            foreach($detail->ppuEmissionLoadGrks as $keyG => $emissionLoad) {
                $column = \PHPExcel_Cell::stringFromColumnIndex($columnIndexNumber-1);
                $nextColumn = \PHPExcel_Cell::stringFromColumnIndex($columnIndexNumber);
                $activeSheet->mergeCells($column . $footerIndex . ":" . $nextColumn . $footerIndex);
                $activeSheet->setCellValue($column . $footerIndex, $emissionLoad->ppuEmissionSource->ppues_name);
                $activeSheet->getStyle($column . $footerIndex . ":" . $nextColumn . $footerIndex)->applyFromArray($styleArray);

                $emissionLoadCalc = $emissionLoad->ppuEmissionLoadGrkCalcs;
                $footerIndex++;

                $activeSheet->setCellValue($column . $footerIndex, $emissionLoadCalc[0]->ppueglc_year);
                $activeSheet->getStyle($column . $footerIndex )->applyFromArray($styleArray);

                $activeSheet->setCellValue($nextColumn . $footerIndex, $emissionLoadCalc[1]->ppueglc_year);
                $activeSheet->getStyle($nextColumn . $footerIndex )->applyFromArray($styleArray);

                $footerIndex++;

                $activeSheet->setCellValue($column . $footerIndex, $emissionLoadCalc[0]->ppueglc_coal_usage);
                $activeSheet->getStyle($column . $footerIndex)->applyFromArray($styleArray);

                $activeSheet->setCellValue($nextColumn . $footerIndex, $emissionLoadCalc[1]->ppueglc_coal_usage);
                $activeSheet->getStyle($nextColumn . $footerIndex)->applyFromArray($styleArray);

                $footerIndex++;

                $activeSheet->setCellValue($column . $footerIndex, $emissionLoadCalc[0]->ppueglc_carbon_content);
                $activeSheet->getStyle($column . $footerIndex)->applyFromArray($styleArray);

                $activeSheet->setCellValue($nextColumn . $footerIndex, $emissionLoadCalc[1]->ppueglc_carbon_content);
                $activeSheet->getStyle($nextColumn . $footerIndex)->applyFromArray($styleArray);

                $footerIndex++;

                $activeSheet->setCellValue($column . $footerIndex, $emissionLoadCalc[0]->ppueglc_carbon_actual_content);
                $activeSheet->getStyle($column . $footerIndex)->applyFromArray($styleArray);

                $activeSheet->setCellValue($nextColumn . $footerIndex, $emissionLoadCalc[1]->ppueglc_carbon_actual_content);
                $activeSheet->getStyle($nextColumn . $footerIndex)->applyFromArray($styleArray);

                $footerIndex++;

                $activeSheet->setCellValue($column . $footerIndex, $emissionLoadCalc[0]->ppueglc_mw_carbondioxyde);
                $activeSheet->getStyle($column . $footerIndex)->applyFromArray($styleArray);

                $activeSheet->setCellValue($nextColumn . $footerIndex, $emissionLoadCalc[1]->ppueglc_mw_carbondioxyde);
                $activeSheet->getStyle($nextColumn . $footerIndex)->applyFromArray($styleArray);

                $footerIndex++;

                $activeSheet->setCellValue($column . $footerIndex, $emissionLoadCalc[0]->ppueglc_anc);
                $activeSheet->getStyle($column . $footerIndex)->applyFromArray($styleArray);

                $activeSheet->setCellValue($nextColumn . $footerIndex, $emissionLoadCalc[1]->ppueglc_anc);
                $activeSheet->getStyle($nextColumn . $footerIndex)->applyFromArray($styleArray);

                $footerIndex++;

                $activeSheet->setCellValue($column . $footerIndex, $emissionLoadCalc[0]->ppueglc_oxidation_factor);
                $activeSheet->getStyle($column . $footerIndex)->applyFromArray($styleArray);

                $activeSheet->setCellValue($nextColumn . $footerIndex, $emissionLoadCalc[1]->ppueglc_oxidation_factor);
                $activeSheet->getStyle($nextColumn . $footerIndex)->applyFromArray($styleArray);

                $emissionLoad1 = $emissionLoadCalc[0]->ppueglc_coal_usage * $emissionLoadCalc[0]->ppueglc_carbon_actual_content
                * $emissionLoadCalc[0]->ppueglc_oxidation_factor * $emissionLoadCalc[0]->ppueglc_mw_carbondioxyde / $emissionLoadCalc[0]->ppueglc_anc;
                $emissionLoad2 = $emissionLoadCalc[1]->ppueglc_coal_usage * $emissionLoadCalc[1]->ppueglc_carbon_actual_content
                    * $emissionLoadCalc[1]->ppueglc_oxidation_factor * $emissionLoadCalc[1]->ppueglc_mw_carbondioxyde / $emissionLoadCalc[1]->ppueglc_anc;
                $activeSheet->setCellValue('D' . $emissionLoadIndex, $emissionLoad1);
                if (!empty($emissionLoadCalc[0]->attachmentOwner)) {
                    $attachment = Converter::attachmentsFullPath($emissionLoadCalc[0]->attachmentOwner);
                    $activeSheet->setCellValue('F' . $emissionLoadIndex, $attachment['label']);
                    $activeSheet->getCell('F' . $emissionLoadIndex)->getHyperlink()->setUrl($attachment['path']);
                    $activeSheet->getCell('F' . $emissionLoadIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                    $activeSheet->getCell('F' . $emissionLoadIndex)->getStyle()->getAlignment()->setWrapText(true);
                    $activeSheet->getStyle('F' . $emissionLoadIndex)->applyFromArray($styleArray);
                }
                $activeSheet->setCellValue('G' . $emissionLoadIndex, $emissionLoad2);

                if (!empty($emissionLoadCalc[1]->attachmentOwner)) {
                    $attachment = Converter::attachmentsFullPath($emissionLoadCalc[1]->attachmentOwner);
                    $activeSheet->setCellValue('I' . $emissionLoadIndex, $attachment['label']);
                    $activeSheet->getCell('I' . $emissionLoadIndex)->getHyperlink()->setUrl($attachment['path']);
                    $activeSheet->getCell('I' . $emissionLoadIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                    $activeSheet->getCell('I' . $emissionLoadIndex)->getStyle()->getAlignment()->setWrapText(true);
                    $activeSheet->getStyle('I' . $emissionLoadIndex)->applyFromArray($styleArray);
                }

                $emissionLoadIndex++;
                $columnIndexNumber += 2;
                $footerIndex = $tempFooterIndex;
            }
        }




        //==========================================================================

        //extra footer

    }

    public function exportTechnicalProvision(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(AppLabels::TECHNICAL_PROVISION);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(50);
        $activeSheet->getColumnDimension('C')->setWidth(30);

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
        $activeSheet->mergeCells('A1:B1');
        $activeSheet->setCellValue('A1', "Ketaatan Terhadap Ketentuan Teknis");
        $activeSheet->getStyle('A1:B1')->applyFromArray($styleArray);

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
        $activeSheet->setCellValue('B3', AppLabels::TECHNICAL_PROVISION);
        $activeSheet->setCellValue('C3', AppLabels::DOCUMENTATION);

        $activeSheet->getStyle('A3')->applyFromArray($styleArray);
        $activeSheet->getStyle('B3')->applyFromArray($styleArray);
        $activeSheet->getStyle('C3')->applyFromArray($styleArray);


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

        $rowIndex = 4;
        $ppuTechnicalProvision = $model[0];
        foreach($ppuTechnicalProvision->ppuTechnicalProvisionDetails as $key => $detail){
            $activeSheet->setCellValue('A' . $rowIndex, ($key+1));
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);
            $question = PpuQuestion::find()->where(['id' => $detail->ppu_question_id])->one()->ppuq_question;
            $wizard = new \PHPExcel_Helper_HTML();
            $richText = $wizard->toRichTextObject($question);
            $activeSheet->setCellValue('B' . $rowIndex, $richText);
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
            if (!empty($detail->attachmentOwner)) {
                $attachment = Converter::attachmentsFullPath($detail->attachmentOwner);
                $activeSheet->setCellValue('C' . $rowIndex, $attachment['label']);
                $activeSheet->getCell('C' . $rowIndex)->getHyperlink()->setUrl($attachment['path']);
                $activeSheet->getCell('C' . $rowIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                $activeSheet->getCell('C' . $rowIndex)->getStyle()->getAlignment()->setWrapText(true);
                $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
            }else{
                $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
                $activeSheet->setCellValue('C' . $rowIndex, "Data Tidak Ditemukan");
            }
            $rowIndex++;
        }

        //==========================================================================

        //footer

        //==========================================================================

        //extra footer
    }

    public function exportPollutionLoad(\PHPExcel &$objPHPExcel, $sheetIndex, $model)
    {
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(AppLabels::POLLUTION_LOAD);

        //setting startdate
        $startDate = new \DateTime();
        $startDate->setDate($model->ppu_year - 1, 7, 1);

        //getting model
        $ppuEmissionSourceModel = $model->ppuEmissionSources;

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(5);
        $activeSheet->getColumnDimension('C')->setWidth(5);
        $activeSheet->getColumnDimension('D')->setWidth(20);
        $activeSheet->getColumnDimension('E')->setWidth(13);
        $activeSheet->getColumnDimension('F')->setWidth(13);
        $activeSheet->getColumnDimension('G')->setWidth(13);
        $activeSheet->getColumnDimension('H')->setWidth(13);
        $activeSheet->getColumnDimension('I')->setWidth(13);
        $activeSheet->getColumnDimension('J')->setWidth(13);
        $activeSheet->getColumnDimension('K')->setWidth(13);
        $activeSheet->getColumnDimension('L')->setWidth(13);
        $activeSheet->getColumnDimension('M')->setWidth(13);
        $activeSheet->getColumnDimension('N')->setWidth(13);
        $activeSheet->getColumnDimension('O')->setWidth(13);
        $activeSheet->getColumnDimension('P')->setWidth(13);
        $activeSheet->getColumnDimension('Q')->setWidth(20);
        $activeSheet->getColumnDimension('R')->setWidth(10);
        $activeSheet->getColumnDimension('S')->setWidth(15);
        $activeSheet->getColumnDimension('T')->setWidth(15);

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
        $activeSheet->mergeCells('A1:D1');
        $activeSheet->setCellValue('A1', AppLabels::POLLUTION_LOAD);
        $activeSheet->getStyle('A1:D1')->applyFromArray($styleArray);

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

        $activeSheet->mergeCells('E4:P4');
        $activeSheet->setCellValue('E4', "Hasil Perhitungan Beban Pencemaran Aktual");
        $activeSheet->mergeCells('Q4:Q5');
        $activeSheet->setCellValue('Q4', AppLabels::OPERATION_TIME);
        $activeSheet->mergeCells('R4:R5');
        $activeSheet->setCellValue('R4', sprintf("%s %s", AppLabels::AMOUNT, AppLabels::DATA));
        $activeSheet->mergeCells('S4:S5');
        $activeSheet->setCellValue('S4', sprintf("%s %s/%s", AppLabels::TOTAL, AppLabels::KG, AppLabels::YEAR));
        $activeSheet->mergeCells('T4:T5');
        $activeSheet->setCellValue('T4', sprintf("%s %s/%s", AppLabels::TOTAL, AppLabels::TON, AppLabels::YEAR));

        $no = 5;
        for ($i = 4; $i < 16; $i++) {
            $alphabet = $this->toAlphabet($i);
            $activeSheet->getStyle("$alphabet$no")->applyFromArray($styleArray);
            $activeSheet->setCellValue("$alphabet$no", $startDate->format('M-Y'));
            $startDate->add(new \DateInterval('P1M'));
        }

        $activeSheet->getStyle('E4:P4')->applyFromArray($styleArray);
        $activeSheet->getStyle('Q4:Q5')->applyFromArray($styleArray);
        $activeSheet->getStyle('R4:R5')->applyFromArray($styleArray);
        $activeSheet->getStyle('S4:S5')->applyFromArray($styleArray);
        $activeSheet->getStyle('T4:T5')->applyFromArray($styleArray);


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

        $rowIndex = 6;
        foreach ($ppuEmissionSourceModel as $key => $detail) {
            $ppuParameterObligation = $detail->ppuParameterObligations;

            $activeSheet->setCellValue('B' . $rowIndex, ($key + 1));
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $rowIndex, "0");
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $rowIndex, $detail->ppues_name);
            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);
            $rowIndex++;

            $lajuAlir = PpuParameterObligation::find()->where(['ppupo_parameter_code' => AppConstants::PPU_RBM_PARAM_CODE_LAJUALIR, 'ppu_emission_source_id' => $detail->id])->one();

            if(!is_null($lajuAlir)) {
                $lajuAlirData = $lajuAlir->ppupoMonths;


                foreach ($ppuParameterObligation as $keyP => $parameterObligation) {
                    $dataCount = 0;
                    $dataTotal = 0;
                    if ($parameterObligation->ppupo_parameter_code != AppConstants::PPU_RBM_PARAM_CODE_LAJUALIR) {
                        $activeSheet->setCellValue('C' . $rowIndex, ($keyP + 1));
                        $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
                        $activeSheet->setCellValue('D' . $rowIndex, $parameterObligation->ppupo_parameter_code_desc);
                        $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);

                        $ppupoMonths = $parameterObligation->ppupoMonths;
                        $alphabetNumber = 4;
                        foreach ($ppupoMonths as $keyM => $month) {
                            $result = $month->ppupom_value * $lajuAlirData[$keyM]->ppupom_value * $detail->ppues_operation_time * 0.0036;
                            $alphabet = $this->toAlphabet($alphabetNumber);
                            if ($result != 0) {
                                $activeSheet->setCellValue($alphabet . $rowIndex, $result);
                                $dataCount++;
                                $dataTotal += $result;
                            }
                            $activeSheet->getStyle($alphabet . $rowIndex)->applyFromArray($styleArray);
                            $alphabetNumber++;
                        }
                        $activeSheet->setCellValue('Q' . $rowIndex, $detail->ppues_operation_time);
                        $activeSheet->getStyle('Q' . $rowIndex)->applyFromArray($styleArray);
                        $activeSheet->setCellValue('R' . $rowIndex, $dataCount);
                        $activeSheet->getStyle('R' . $rowIndex)->applyFromArray($styleArray);
                        $activeSheet->setCellValue('S' . $rowIndex, $dataTotal / $dataCount);
                        $activeSheet->getStyle('S' . $rowIndex)->applyFromArray($styleArray);
                        $activeSheet->setCellValue('T' . $rowIndex, $dataTotal / $dataCount / 1000);
                        $activeSheet->getStyle('T' . $rowIndex)->applyFromArray($styleArray);
                        $rowIndex++;
                    }
                }


            }
            $rowIndex++;
        }
    }

    public function export($id) {

        $query = Ppu::find()->where(['id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $model = $dataProvider->getModels()[0];

        $ppuEmissionSourceModel = $model->ppuEmissionSources;
        $ppuTechnicalProvision = $model->ppuTechnicalProvisions;

        // export to excel

        //main excel setup
        $objPHPExcel = new \PHPExcel();
        $filename = sprintf(AppConstants::REPORT_NAME_PPU, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);

        $sheetIndex = 0;
        //Creating sheet
        $this->exportPpuEmissionSource($objPHPExcel, $sheetIndex++, $ppuEmissionSourceModel);
        $this->exportAdherencePoint($objPHPExcel, $sheetIndex++, $model);
        $this->exportParameterObligation($objPHPExcel, $sheetIndex++, $model);
        $this->exportEmissionLoadGrk($objPHPExcel, $sheetIndex++, $model);
        $this->exportTechnicalProvision($objPHPExcel, $sheetIndex++, $ppuTechnicalProvision);
        $this->exportPollutionLoad($objPHPExcel, $sheetIndex++, $model);

        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }

    public function exportPpucemsReportBm(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(sprintf("%s %s", AppLabels::BM_REPORT_PARAMETER, AppLabels::CEMS));

        //getting model
        $ppuEmissionSourceModel = $model->ppuEmissionSources;

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(60);
        $activeSheet->getColumnDimension('B')->setWidth(30);
        $activeSheet->getColumnDimension('C')->setWidth(30);
        $activeSheet->getColumnDimension('D')->setWidth(30);
        $activeSheet->getColumnDimension('E')->setWidth(30);
        $activeSheet->getColumnDimension('F')->setWidth(60);
        $activeSheet->getColumnDimension('G')->setWidth(30);
        $activeSheet->getColumnDimension('H')->setWidth(30);
        $activeSheet->getColumnDimension('I')->setWidth(30);
        $activeSheet->getColumnDimension('J')->setWidth(30);
        $activeSheet->getColumnDimension('K')->setWidth(35);

        //==========================================================================

        // body header

        $styleArrayTitle = [
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

        $activeSheet->setCellValue('A2', sprintf("%s %s %s", AppLabels::ADHERENCE, AppLabels::MONITORING, AppLabels::CEMS));
        $activeSheet->setCellValue('B2', sprintf("%s %s-%s", AppLabels::QUARTER, "III", $model->ppu_year-1));
        $activeSheet->setCellValue('C2', sprintf("%s %s-%s", AppLabels::QUARTER, "IV", $model->ppu_year-1));
        $activeSheet->setCellValue('D2', sprintf("%s %s-%s", AppLabels::QUARTER, "I", $model->ppu_year));
        $activeSheet->setCellValue('E2', sprintf("%s %s-%s", AppLabels::QUARTER, "II", $model->ppu_year));
        $activeSheet->setCellValue('F2', AppLabels::DESCRIPTION);
        $activeSheet->setCellValue('G2', sprintf("%s %s-%s", AppLabels::QUARTER, "III", $model->ppu_year-1));
        $activeSheet->setCellValue('H2', sprintf("%s %s-%s", AppLabels::QUARTER, "IV", $model->ppu_year-1));
        $activeSheet->setCellValue('I2', sprintf("%s %s-%s", AppLabels::QUARTER, "I", $model->ppu_year));
        $activeSheet->setCellValue('J2', sprintf("%s %s-%s", AppLabels::QUARTER, "II", $model->ppu_year));
        $activeSheet->setCellValue('K2', AppLabels::DESCRIPTION);
        $activeSheet->setCellValue('A3', "Jumlah data parameter pemantauan harian CEMS selama 3 bulanan");

        $activeSheet->getStyle('A2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('B2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('C2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('D2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('E2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('F2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('G2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('H2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('I2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('J2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('K2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('A3')->applyFromArray($styleArrayTitle);

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

        $cemsConstant = [
            0 => 92,
            1 => 92,
            2 => 90,
            3 => 91,
        ];

        $rowIndex = 4;
        foreach ($ppuEmissionSourceModel as $key => $detail) {
            $ppucemsReportBm = $detail->ppucemsReportBms;

            $activeSheet->setCellValue('A' . $rowIndex, $detail->ppues_name);
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);
            $rowIndex++;

            foreach($ppucemsReportBm as $keyB => $reportBM){
                $activeSheet->setCellValue('A' . $rowIndex, $reportBM->ppucemsrb_parameter_code_desc);
                $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);

                $columnIndexNumber = \PHPExcel_Cell::columnIndexFromString('B');
                foreach($reportBM->ppucemsrbQuarters as $keyQ => $quarter){
                    $column = \PHPExcel_Cell::stringFromColumnIndex($columnIndexNumber-1);
                    $column2 = \PHPExcel_Cell::stringFromColumnIndex($columnIndexNumber+4);
                    $activeSheet->setCellValue($column . $rowIndex, $quarter->ppucemsrbq_value);
                    $activeSheet->getStyle($column . $rowIndex)->applyFromArray($styleArray);
                    $activeSheet->setCellValue($column2 . $rowIndex, sprintf("%s %%",number_format($quarter->ppucemsrbq_value/$cemsConstant[$keyQ]*100,2)));
                    $activeSheet->getStyle($column2 . $rowIndex)->applyFromArray($styleArray);
                    $columnIndexNumber++;
                }
                $activeSheet->setCellValue('F' . $rowIndex, $reportBM->ppucemsrb_ref);
                $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArray);
                if (!empty($reportBM->attachmentOwner)) {
                    $attachment = Converter::attachmentsFullPath($reportBM->attachmentOwner);
                    $activeSheet->setCellValue('K' . $rowIndex, $attachment['label']);
                    $activeSheet->getCell('K' . $rowIndex)->getHyperlink()->setUrl($attachment['path']);
                    $activeSheet->getCell('K' . $rowIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                    $activeSheet->getCell('K' . $rowIndex)->getStyle()->getAlignment()->setWrapText(true);
                    $activeSheet->getStyle('K' . $rowIndex)->applyFromArray($styleArray);
                }
                $rowIndex++;
            }
        }

        $rowIndex+=2;
        $activeSheet->setCellValue('A' . $rowIndex, "Jumlah data pemantauan yang memenuhi Baku Mutu CEMS");
        $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArrayTitle);
        $rowIndex++;

        foreach ($ppuEmissionSourceModel as $key => $detail) {
            $ppucemsReportBm = $detail->ppucemsReportBms;

            $activeSheet->setCellValue('A' . $rowIndex, $detail->ppues_name);
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);
            $rowIndex++;

            foreach($ppucemsReportBm as $keyB => $reportBM){
                $activeSheet->setCellValue('A' . $rowIndex, $reportBM->ppucemsrb_parameter_code_desc);
                $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);

                $columnIndexNumber = \PHPExcel_Cell::columnIndexFromString('B');
                foreach($reportBM->ppucemsrbQuarters as $keyQ => $quarter){
                    $column = \PHPExcel_Cell::stringFromColumnIndex($columnIndexNumber-1);
                    $column2 = \PHPExcel_Cell::stringFromColumnIndex($columnIndexNumber+4);
                    $activeSheet->setCellValue($column . $rowIndex, $quarter->ppucemsrbq_qs_value);
                    $activeSheet->getStyle($column . $rowIndex)->applyFromArray($styleArray);
                    $activeSheet->setCellValue($column2 . $rowIndex, sprintf("%s %%",number_format($quarter->ppucemsrbq_qs_value/$quarter->ppucemsrbq_value*100,2)));
                    $activeSheet->getStyle($column2 . $rowIndex)->applyFromArray($styleArray);
                    $columnIndexNumber++;
                }
                $activeSheet->setCellValue('F' . $rowIndex, $reportBM->ppucemsrb_sec_ref);
                $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArray);
                if (!empty($reportBM->attachmentOwner)) {
                    $attachment = Converter::attachmentsFullPath($reportBM->attachmentOwner);
                    $activeSheet->setCellValue('K' . $rowIndex, $attachment['label']);
                    $activeSheet->getCell('K' . $rowIndex)->getHyperlink()->setUrl($attachment['path']);
                    $activeSheet->getCell('K' . $rowIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                    $activeSheet->getCell('K' . $rowIndex)->getStyle()->getAlignment()->setWrapText(true);
                    $activeSheet->getStyle('K' . $rowIndex)->applyFromArray($styleArray);
                }
                $rowIndex++;
            }
        }

    }

    public function exportPpucemsrbParameterReport(\PHPExcel &$objPHPExcel, $sheetIndex, $model, $parameter){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(sprintf("%s %s %s", AppLabels::REPORT, AppLabels::CEMS, $parameter->cset_value));


        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(30);
        $activeSheet->getColumnDimension('C')->setWidth(50);
        $activeSheet->getColumnDimension('D')->setWidth(30);
        $activeSheet->getColumnDimension('E')->setWidth(30);
        $activeSheet->getColumnDimension('F')->setWidth(60);
        $activeSheet->getColumnDimension('G')->setWidth(30);
        $activeSheet->getColumnDimension('H')->setWidth(30);
        $activeSheet->getColumnDimension('I')->setWidth(30);

        //==========================================================================

        // body header

        $styleArrayTitle = [
            'font' => [
                'bold' => false,
                'size' => 13,
                'color' => [
                    'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                ]
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap' => true
            ],
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFD9D9D9']
            ],
        ];

        $styleArrayContent = [
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
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFF2F2F2']
            ],
        ];

        $styleArrayBody = [
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

        $activeSheet->mergeCells('A1:C1');
        $activeSheet->setCellValue('A1', sprintf("%s %s", "Konsentrasi Hasil Pengukuran : ", $parameter->cset_value));

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

        //Getting the model
        $ppucemsReportBmModel = PpucemsReportBm::find()
            ->joinWith(['ppuEmissionSource es'], true, 'INNER JOIN')
            ->where(['ppucemsrb_parameter_code' => $parameter->cset_code, 'ppu_id' => $model->id])->all();

        $rowIndex = 3;

        foreach($ppucemsReportBmModel as $key => $detail){
            $ppuEmissionSourceModel = $detail->ppuEmissionSource;
            $activeSheet->mergeCells('A' . $rowIndex . ':B' . $rowIndex);
            $activeSheet->setCellValue('A' . $rowIndex, sprintf("%s %s", AppLabels::EMISSION_SOURCE, ($key+1)));
            $activeSheet->getStyle('A' . $rowIndex . ':B' . $rowIndex)->applyFromArray($styleArray);
            $rowIndex+=2;

            $activeSheet->mergeCells('A' . $rowIndex . ':B' . $rowIndex);
            $activeSheet->setCellValue('A' . $rowIndex, sprintf("%s %s : ", AppLabels::NAME, AppLabels::EMISSION_SOURCE));
            $activeSheet->getStyle('A' . $rowIndex . ':B' . $rowIndex)->applyFromArray($styleArrayTitle);

            $activeSheet->setCellValue('C' . $rowIndex, $ppuEmissionSourceModel->ppues_name);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArrayContent);

            $activeSheet->setCellValue('F' . $rowIndex, AppLabels::FUEL);
            $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArrayTitle);

            $activeSheet->setCellValue('G' . $rowIndex, $ppuEmissionSourceModel->ppues_fuel_name_code_desc);
            $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArrayContent);
            $rowIndex++;

            $activeSheet->mergeCells('A' . $rowIndex . ':B' . $rowIndex);
            $activeSheet->setCellValue('A' . $rowIndex, sprintf("Jenis %s : ", AppLabels::EMISSION_SOURCE));
            $activeSheet->getStyle('A' . $rowIndex . ':B' . $rowIndex)->applyFromArray($styleArrayTitle);

            $activeSheet->setCellValue('C' . $rowIndex, $parameter->cset_value);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArrayContent);

            $activeSheet->setCellValue('F' . $rowIndex, AppLabels::CAPACITY);
            $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArrayTitle);

            $activeSheet->setCellValue('G' . $rowIndex, $ppuEmissionSourceModel->ppues_capacity);
            $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArrayContent);
            $rowIndex++;

            $activeSheet->mergeCells('A' . $rowIndex . ':B' . $rowIndex);
            $activeSheet->setCellValue('A' . $rowIndex, sprintf("%s/%s %s : ", AppLabels::NAME, AppLabels::CODE, AppLabels::CHIMNEY));
            $activeSheet->getStyle('A' . $rowIndex . ':B' . $rowIndex)->applyFromArray($styleArrayTitle);

            $activeSheet->setCellValue('C' . $rowIndex, $ppuEmissionSourceModel->ppues_chimney_name);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArrayContent);

            $activeSheet->setCellValue('F' . $rowIndex, AppLabels::OPERATIONAL_TIME);
            $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArrayTitle);

            $activeSheet->setCellValue('G' . $rowIndex, $ppuEmissionSourceModel->ppues_operation_time);
            $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArrayContent);
            $rowIndex++;

            $activeSheet->mergeCells('A' . $rowIndex . ':B' . $rowIndex);
            $activeSheet->setCellValue('A' . $rowIndex, sprintf("%s %s (%s): ", AppLabels::DIMENSION, AppLabels::CHIMNEY, AppLabels::DIAMETER));
            $activeSheet->getStyle('A' . $rowIndex . ':B' . $rowIndex)->applyFromArray($styleArrayTitle);

            $activeSheet->setCellValue('C' . $rowIndex, $ppuEmissionSourceModel->ppues_chimney_diameter);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArrayContent);
            $rowIndex++;

            $activeSheet->mergeCells('A' . $rowIndex . ':B' . $rowIndex);
            $activeSheet->setCellValue('A' . $rowIndex, sprintf("%s %s (%s) : ", AppLabels::DIMENSION, AppLabels::CHIMNEY, AppLabels::LENGTH));
            $activeSheet->getStyle('A' . $rowIndex . ':B' . $rowIndex)->applyFromArray($styleArrayTitle);

            $activeSheet->setCellValue('C' . $rowIndex, $ppuEmissionSourceModel->ppues_hole_position);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArrayContent);
            $rowIndex++;

            $activeSheet->mergeCells('A' . $rowIndex . ':B' . $rowIndex);
            $activeSheet->setCellValue('A' . $rowIndex, sprintf("%s %s (%s) : ", AppLabels::DIMENSION, AppLabels::CHIMNEY, AppLabels::HEIGHT));
            $activeSheet->getStyle('A' . $rowIndex . ':B' . $rowIndex)->applyFromArray($styleArrayTitle);

            $activeSheet->setCellValue('C' . $rowIndex, $ppuEmissionSourceModel->ppues_chimney_height);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArrayContent);
            $rowIndex+=2;

            $activeSheet->setCellValue('A' . $rowIndex, AppLabels::NUMBER_SHORT);
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArrayBody);

            $activeSheet->setCellValue('B' . $rowIndex, AppLabels::QUARTER);
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArrayBody);

            $activeSheet->setCellValue('C' . $rowIndex, AppLabels::MEASUREMENT_TIME);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArrayBody);

            $activeSheet->setCellValue('D' . $rowIndex, sprintf("%s (%s)", AppLabels::AVERAGE_CONCENTRATION, AppLabels::MGNM3_UNIT));
            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArrayBody);

            $activeSheet->setCellValue('E' . $rowIndex, sprintf("%s (%s)", AppLabels::BARISTAND_CALC_RESULT, AppLabels::MGNM3_UNIT));
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArrayBody);

            $activeSheet->setCellValue('F' . $rowIndex, sprintf("%s %s (%s))", AppLabels::OPERATION_TIME, AppLabels::CEMS, AppLabels::HOUR));
            $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArrayBody);

            $activeSheet->setCellValue('G' . $rowIndex, AppLabels::QUALITY_STANDARD);
            $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArrayBody);

            $activeSheet->setCellValue('H' . $rowIndex, AppLabels::QS_LOAD_UNIT);
            $activeSheet->getStyle('H' . $rowIndex)->applyFromArray($styleArrayBody);

            $activeSheet->setCellValue('I' . $rowIndex, AppLabels::QUALITY_STANDARD_REF);
            $activeSheet->getStyle('I' . $rowIndex)->applyFromArray($styleArrayBody);

            $rowIndex++;
            $parameterReportModel = $detail->ppucemsrbParameterReports;
            foreach($parameterReportModel as $keyM => $report){
                $activeSheet->setCellValue('A' . $rowIndex, ($keyM+1));
                $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);
                $activeSheet->setCellValue('B' . $rowIndex, $report->ppucemsrbpr_quarter);
                $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
                $activeSheet->setCellValue('C' . $rowIndex, $report->ppucemsrbpr_calc_date);
                $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
                $activeSheet->setCellValue('D' . $rowIndex, $report->ppucemsrbpr_avg_concentration);
                $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);
                $activeSheet->setCellValue('E' . $rowIndex, $report->ppucemsrbpr_calc_result);
                $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);
                $activeSheet->setCellValue('F' . $rowIndex, $report->ppucemsrbpr_operation_time);
                $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArray);
                $activeSheet->setCellValue('G' . $rowIndex, $report->ppucemsrbpr_qs);
                $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArray);
                $activeSheet->setCellValue('H' . $rowIndex, $report->ppucemsrbpr_qs_unit_code_desc);
                $activeSheet->getStyle('H' . $rowIndex)->applyFromArray($styleArray);
                $activeSheet->setCellValue('I' . $rowIndex, $report->ppucemsrbpr_ref);
                $activeSheet->getStyle('I' . $rowIndex)->applyFromArray($styleArray);

                $rowIndex++;
            }
            $rowIndex++;
            $rowIndex++;
        }
    }

    public function exportEmissionLoadCalc(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(sprintf("%s %s", AppLabels::EMISSION_LOAD_CALCULATION, AppLabels::CEMS));

        //getting model
        $ppuEmissionSourceModel = $model->ppuEmissionSources;

        //setting startdate
        $startDate = new \DateTime();
        $startDate->setDate($model->ppu_year - 1, 7, 1);

        // set dimension

        // set row width
        $activeSheet->getRowDimension('3')->setRowHeight(15);

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(40);
        $activeSheet->getColumnDimension('C')->setWidth(40);
        $activeSheet->getColumnDimension('D')->setWidth(40);
        $activeSheet->getColumnDimension('E')->setWidth(40);
        $activeSheet->getColumnDimension('R')->setWidth(30);

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
        $activeSheet->mergeCells('A1:B1');
        $activeSheet->setCellValue('A1', sprintf("%s %s", AppLabels::CALCULATION,AppLabels::EMISSION_LOAD));
        $activeSheet->getStyle('A1:B1')->applyFromArray($styleArray);

        //==========================================================================

        // body header

        $styleArrayTitle = [
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


        $no1 = 3;
        $no2 = 5;
        for ($i = 0; $i < 5; $i++) {
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArrayTitle);
        }

        $activeSheet->mergeCells('F3:Q3');
        $activeSheet->mergeCells('F4:H4');
        $activeSheet->mergeCells('I4:K4');
        $activeSheet->mergeCells('L4:N4');
        $activeSheet->mergeCells('O4:Q4');

        $activeSheet->mergeCells('R3:R5');

        $activeSheet->setCellValue('A3', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('B3', sprintf("%s %s", AppLabels::NAME, AppLabels::EMISSION_SOURCE));
        $activeSheet->setCellValue('C3', sprintf("%s %s", AppLabels::CODE, AppLabels::CHIMNEY));
        $activeSheet->setCellValue('D3', sprintf("%s (m2)",AppLabels::SECTION_AREA));
        $activeSheet->setCellValue('E3', AppLabels::WATCHED_PARAMETER);
        $activeSheet->setCellValue('F3', 'Hasil Perhitungan Beban Emisi (Satuan: Ton/Tahun) (lampirkan bukti perhitungan dan acuan peraturan perhitungan)');
        $activeSheet->setCellValue('F4', sprintf("%s %s %s", AppLabels::QUARTER ,"3" ,$startDate->format('Y')-1));
        $activeSheet->setCellValue('I4', sprintf("%s %s %s", AppLabels::QUARTER ,"4" ,$startDate->format('Y')-1));
        $activeSheet->setCellValue('L4', sprintf("%s %s %s", AppLabels::QUARTER ,"1" ,$startDate->format('Y')));
        $activeSheet->setCellValue('O4', sprintf("%s %s %s", AppLabels::QUARTER ,"2" ,$startDate->format('Y')));

        $no = 5;
        for ($i = 5; $i < 17; $i++) {
            $alphabet = $this->toAlphabet($i);
            $activeSheet->setCellValue("$alphabet$no", $startDate->format('M-Y'));
            $activeSheet->getStyle("$alphabet$no")->applyFromArray($styleArrayTitle);
            $startDate->add(new \DateInterval('P1M'));
        }

        $activeSheet->setCellValue('R3', sprintf("%s %s (Ton/Tahun)", AppLabels::AMOUNT, AppLabels::EMISSION_LOAD));

        $activeSheet->getStyle('F3:Q3')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('F4:H4')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('I4:K4')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('L4:N4')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('O4:Q4')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('R3:R5')->applyFromArray($styleArrayTitle);

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

        $rowIndex = 6;
        foreach ($ppuEmissionSourceModel as $key => $detail) {
            $ppucemsReportBm = $detail->ppucemsReportBms;

            $ppuParameterObligation = PpuParameterObligation::find()->where([
                'ppu_emission_source_id' => $detail->id,
                'ppupo_parameter_code' => AppConstants::PPU_RBM_PARAM_CODE_LAJUALIR,
            ])->one();
            if(!is_null($ppuParameterObligation)) {
                $ppupoMonths = $ppuParameterObligation->ppupoMonths;
            }else{
                $ppupoMonths = null;
            }
            $ppuesMonths = $detail->ppuesMonths;

            $activeSheet->setCellValue('A' . $rowIndex, ($key+1));
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);

            $activeSheet->setCellValue('B' . $rowIndex, $detail->ppues_name);
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);

            $activeSheet->setCellValue('C' . $rowIndex, $detail->ppues_chimney_name);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);

            $sectionArea = $detail->ppues_chimney_diameter/2;
            $sectionArea = $sectionArea*$sectionArea*pi();
            $activeSheet->setCellValue('D' . $rowIndex, number_format($sectionArea,2));
            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);

            foreach($ppucemsReportBm as $keyB => $reportBM){
                $activeSheet->setCellValue('E' . $rowIndex, $reportBM->ppucemsrb_parameter_code_desc);
                $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);

                $startDate->setDate($model->ppu_year - 1, 7, 1);
                $columnIndexNumber = \PHPExcel_Cell::columnIndexFromString('F');

                $resultTotal = 0;
                for($keyQ = 0; $keyQ<12; $keyQ++){
                    $column = \PHPExcel_Cell::stringFromColumnIndex($columnIndexNumber-1);

                    $month = $startDate->format('m');
                    $year = $startDate->format('Y');
                    $average = PpucemsrbParameterReport::find()->where([
                        'ppu_emission_source_id' => $detail->id,
                        'ppucems_report_bm_id' => $reportBM->id,
                        'ppucemsrbpr_year' => $year,
                        'ppucemsrbpr_month' => $month,
                    ])->average('ppucemsrbpr_avg_concentration');


                    $result = $average*$sectionArea*$ppupoMonths[$keyQ]->ppupom_value*$ppuesMonths[$keyQ]->ppuesm_operation_time*pow(10, -7)*3.6;
                    $resultTotal+=$result;
                    $result = number_format($result,3);

                    $activeSheet->setCellValue($column . $rowIndex, $result);
                    $activeSheet->getStyle($column . $rowIndex)->applyFromArray($styleArray);

                    $columnIndexNumber++;
                    $startDate->add(new \DateInterval('P1M'));
                }
                $activeSheet->setCellValue('R' . $rowIndex, number_format($resultTotal,2));
                $activeSheet->getStyle('R' . $rowIndex)->applyFromArray($styleArray);

                $rowIndex++;
            }
            $rowIndex++;

            if(!is_null($ppupoMonths)) {
                $activeSheet->setCellValue('E' . $rowIndex, 'Laju Alir');
                $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);

                $columnIndexNumber = \PHPExcel_Cell::columnIndexFromString('F');
                for ($keyQ = 0; $keyQ < 12; $keyQ++) {
                    $column = \PHPExcel_Cell::stringFromColumnIndex($columnIndexNumber - 1);

                    $activeSheet->setCellValue($column . $rowIndex, $ppupoMonths[$keyQ]->ppupom_value);
                    $activeSheet->getStyle($column . $rowIndex)->applyFromArray($styleArray);

                    $columnIndexNumber++;
                }

                $rowIndex++;
            }
            $rowIndex++;
        }
    }

    public function exportCems($id) {

        $query = Ppu::find()->where(['id' => $id]);

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
        $filename = sprintf(AppConstants::REPORT_NAME_PPU_CEMS, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);

        $sheetIndex = 0;
        //Creating sheet
        $this->exportPpucemsReportBm($objPHPExcel, $sheetIndex++, $model);
        $parameterList = Codeset::find()->where(['cset_name' => AppConstants::CODESET_PPUCEMS_RBM_PARAM_CODE])->all();
        foreach($parameterList as $keyP => $parameter){
            $this->exportPpucemsrbParameterReport($objPHPExcel, $sheetIndex++, $model, $parameter);
        }
        $this->exportEmissionLoadCalc($objPHPExcel, $sheetIndex++, $model);

        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }
}
