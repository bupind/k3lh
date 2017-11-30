<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;


/**
 * HydrantTestingSearch represents the model behind the search form about `backend\models\HydrantTesting`.
 */
class HydrantTestingSearch extends HydrantTesting
{
    public $filename;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'ht_year'], 'integer'],
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
        $query = HydrantTesting::find();

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
            'ht_year' => $this->ht_year,
        ]);

        return $dataProvider;
    }

    public function export($id)
    {

        $query = \backend\models\HydrantTesting::find()->where(['id' => $id]);

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
        $model = $dataProvider->getModels()[0];

        //main excel setup
        $objPHPExcel = new \PHPExcel();
        $filename = sprintf(AppConstants::REPORT_NAME_HYDRANT_TESTING, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::FORM_HYDRANT_TESTING);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(20);
        $activeSheet->getColumnDimension('C')->setWidth(20);
        $activeSheet->getColumnDimension('D')->setWidth(20);
        $activeSheet->getColumnDimension('E')->setWidth(20);
        $activeSheet->getColumnDimension('F')->setWidth(20);
        $activeSheet->getColumnDimension('G')->setWidth(20);
        $activeSheet->getColumnDimension('H')->setWidth(20);
        $activeSheet->getColumnDimension('I')->setWidth(20);
        $activeSheet->getColumnDimension('J')->setWidth(20);
        $activeSheet->getColumnDimension('K')->setWidth(20);
        $activeSheet->getColumnDimension('L')->setWidth(20);
        $activeSheet->getColumnDimension('M')->setWidth(20);
        $activeSheet->getColumnDimension('N')->setWidth(20);
        $activeSheet->getColumnDimension('O')->setWidth(20);
        $activeSheet->getColumnDimension('P')->setWidth(20);
        $activeSheet->getColumnDimension('Q')->setWidth(20);
        $activeSheet->getColumnDimension('R')->setWidth(20);
        $activeSheet->getColumnDimension('S')->setWidth(20);
        $activeSheet->getColumnDimension('T')->setWidth(20);
        $activeSheet->getColumnDimension('U')->setWidth(20);
        $activeSheet->getColumnDimension('V')->setWidth(20);
        $activeSheet->getColumnDimension('W')->setWidth(20);
        $activeSheet->getColumnDimension('X')->setWidth(20);
        $activeSheet->getColumnDimension('Y')->setWidth(20);
        $activeSheet->getColumnDimension('Z')->setWidth(20);
        $activeSheet->getColumnDimension('AA')->setWidth(20);
        $activeSheet->getColumnDimension('AB')->setWidth(20);
        $activeSheet->getColumnDimension('AC')->setWidth(20);
        $activeSheet->getColumnDimension('AD')->setWidth(20);
        $activeSheet->getColumnDimension('AE')->setWidth(20);
        $activeSheet->getColumnDimension('AF')->setWidth(20);
        $activeSheet->getColumnDimension('AG')->setWidth(20);
        $activeSheet->getColumnDimension('AH')->setWidth(20);
        $activeSheet->getColumnDimension('AI')->setWidth(20);
        $activeSheet->getColumnDimension('AJ')->setWidth(20);
        $activeSheet->getColumnDimension('AK')->setWidth(20);
        $activeSheet->getColumnDimension('AL')->setWidth(20);
        $activeSheet->getColumnDimension('AM')->setWidth(20);
        $activeSheet->getColumnDimension('AN')->setWidth(20);
        $activeSheet->getColumnDimension('AO')->setWidth(20);
        $activeSheet->getColumnDimension('AP')->setWidth(20);
        $activeSheet->getColumnDimension('AQ')->setWidth(20);
        $activeSheet->getColumnDimension('AR')->setWidth(20);
        $activeSheet->getColumnDimension('AS')->setWidth(20);
        $activeSheet->getColumnDimension('AT')->setWidth(20);
        $activeSheet->getColumnDimension('AU')->setWidth(20);
        $activeSheet->getColumnDimension('AV')->setWidth(20);
        $activeSheet->getColumnDimension('AW')->setWidth(20);
        $activeSheet->getColumnDimension('AX')->setWidth(20);
        $activeSheet->getColumnDimension('AY')->setWidth(20);
        $activeSheet->getColumnDimension('AZ')->setWidth(20);
        $activeSheet->getColumnDimension('BA')->setWidth(20);
        $activeSheet->getColumnDimension('BB')->setWidth(20);
        $activeSheet->getColumnDimension('BC')->setWidth(20);
        $activeSheet->getColumnDimension('BD')->setWidth(20);
        $activeSheet->getColumnDimension('BE')->setWidth(20);
        $activeSheet->getColumnDimension('BF')->setWidth(20);
        $activeSheet->getColumnDimension('BG')->setWidth(20);
        $activeSheet->getColumnDimension('BH')->setWidth(20);
        $activeSheet->getColumnDimension('BI')->setWidth(20);
        $activeSheet->getColumnDimension('BJ')->setWidth(20);
        $activeSheet->getColumnDimension('BK')->setWidth(20);
        $activeSheet->getColumnDimension('BL')->setWidth(20);

        //header
        $activeSheet->mergeCells('A1:B1');
        $activeSheet->setCellValue('A1', "Pengujian Hydrant");
        $activeSheet->mergeCells('A2:B2');
        $activeSheet->setCellValue('A2', sprintf("%s %s", "Tahun ", $model->ht_year));

        //header style
        $styleArray = [
            'font' => [
                'bold' => true,
                'color' => [
                    'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                ]
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
        $activeSheet->getStyle('A1:B1')->applyFromArray($styleArray);
        $activeSheet->getStyle('A2:B2')->applyFromArray($styleArray);

        //==========================================================================

        // body header

        $styleArray = [
            'font' => [
                'bold' => true,
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

        //body header merge and style
        $activeSheet->mergeCells('A3:A4');
        $activeSheet->mergeCells('B3:B4');
        $activeSheet->mergeCells('C3:C4');
        $activeSheet->mergeCells('D3:D4');
        $activeSheet->mergeCells('E3:I3');
        $activeSheet->mergeCells('J3:N3');
        $activeSheet->mergeCells('O3:S3');
        $activeSheet->mergeCells('J3:N3');
        $activeSheet->mergeCells('T3:X3');
        $activeSheet->mergeCells('Y3:AC3');
        $activeSheet->mergeCells('AD3:AH3');
        $activeSheet->mergeCells('AI3:AM3');
        $activeSheet->mergeCells('AN3:AR3');
        $activeSheet->mergeCells('AS3:AW3');
        $activeSheet->mergeCells('AX3:BB3');
        $activeSheet->mergeCells('BC3:BG3');
        $activeSheet->mergeCells('BH3:BL3');

        $activeSheet->getStyle('A3:A4')->applyFromArray($styleArray);
        $activeSheet->getStyle('B3:B4')->applyFromArray($styleArray);
        $activeSheet->getStyle('C3:C4')->applyFromArray($styleArray);
        $activeSheet->getStyle('D3:D4')->applyFromArray($styleArray);
        $activeSheet->getStyle('E3:I3')->applyFromArray($styleArray);
        $activeSheet->getStyle('J3:N3')->applyFromArray($styleArray);
        $activeSheet->getStyle('O3:S3')->applyFromArray($styleArray);
        $activeSheet->getStyle('T3:X3')->applyFromArray($styleArray);
        $activeSheet->getStyle('Y3:AC3')->applyFromArray($styleArray);
        $activeSheet->getStyle('AD3:AH3')->applyFromArray($styleArray);
        $activeSheet->getStyle('AI3:AM3')->applyFromArray($styleArray);
        $activeSheet->getStyle('AN3:AR3')->applyFromArray($styleArray);
        $activeSheet->getStyle('AS3:AW3')->applyFromArray($styleArray);
        $activeSheet->getStyle('AX3:BB3')->applyFromArray($styleArray);
        $activeSheet->getStyle('BC3:BG3')->applyFromArray($styleArray);
        $activeSheet->getStyle('BH3:BL3')->applyFromArray($styleArray);

        $activeSheet->getStyle('E4')->applyFromArray($styleArray);
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
        $activeSheet->getStyle('R4')->applyFromArray($styleArray);
        $activeSheet->getStyle('S4')->applyFromArray($styleArray);
        $activeSheet->getStyle('T4')->applyFromArray($styleArray);
        $activeSheet->getStyle('U4')->applyFromArray($styleArray);
        $activeSheet->getStyle('V4')->applyFromArray($styleArray);
        $activeSheet->getStyle('W4')->applyFromArray($styleArray);
        $activeSheet->getStyle('X4')->applyFromArray($styleArray);
        $activeSheet->getStyle('Y4')->applyFromArray($styleArray);
        $activeSheet->getStyle('Z4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AA4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AB4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AC4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AD4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AE4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AF4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AG4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AH4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AI4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AJ4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AK4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AL4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AM4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AN4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AO4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AP4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AQ4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AR4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AS4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AT4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AU4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AV4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AW4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AX4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AY4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AZ4')->applyFromArray($styleArray);
        $activeSheet->getStyle('BA4')->applyFromArray($styleArray);
        $activeSheet->getStyle('BB4')->applyFromArray($styleArray);
        $activeSheet->getStyle('BC4')->applyFromArray($styleArray);
        $activeSheet->getStyle('BD4')->applyFromArray($styleArray);
        $activeSheet->getStyle('BE4')->applyFromArray($styleArray);
        $activeSheet->getStyle('BF4')->applyFromArray($styleArray);
        $activeSheet->getStyle('BG4')->applyFromArray($styleArray);
        $activeSheet->getStyle('BH4')->applyFromArray($styleArray);
        $activeSheet->getStyle('BI4')->applyFromArray($styleArray);
        $activeSheet->getStyle('BJ4')->applyFromArray($styleArray);
        $activeSheet->getStyle('BK4')->applyFromArray($styleArray);
        $activeSheet->getStyle('BL4')->applyFromArray($styleArray);

        //body header data
        $activeSheet->setCellValue('A3', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('B3', "Nomor Hydrant");
        $activeSheet->setCellValue('C3', AppLabels::LOCATION);
        $activeSheet->setCellValue('D3', "Pompa");

        $activeSheet->setCellValue('E3', AppLabels::JANUARY);
        $activeSheet->setCellValue('J3', AppLabels::FEBRUARY);
        $activeSheet->setCellValue('O3', AppLabels::MARCH);
        $activeSheet->setCellValue('T3', AppLabels::APRIL);
        $activeSheet->setCellValue('Y3', AppLabels::MAY);
        $activeSheet->setCellValue('AD3', AppLabels::JUNE);
        $activeSheet->setCellValue('AI3', AppLabels::JULY);
        $activeSheet->setCellValue('AN3', AppLabels::AUGUST);
        $activeSheet->setCellValue('AS3', AppLabels::SEPTEMBER);
        $activeSheet->setCellValue('AX3', AppLabels::OCTOBER);
        $activeSheet->setCellValue('BC3', AppLabels::NOVEMBER);
        $activeSheet->setCellValue('BH3', AppLabels::DECEMBER);


        $activeSheet->setCellValue('E4', AppLabels::DATE);
        $activeSheet->setCellValue('F4', "Pressure (bar)");
        $activeSheet->setCellValue('G4', "Flow Rate");
        $activeSheet->setCellValue('H4', "J. Vertikal (m)");
        $activeSheet->setCellValue('I4', "J. Horizontal (m)");

        $activeSheet->setCellValue('J4', AppLabels::DATE);
        $activeSheet->setCellValue('K4', "Pressure (bar)");
        $activeSheet->setCellValue('L4', "Flow Rate");
        $activeSheet->setCellValue('M4', "J. Vertikal (m)");
        $activeSheet->setCellValue('N4', "J. Horizontal (m)");

        $activeSheet->setCellValue('O4', AppLabels::DATE);
        $activeSheet->setCellValue('P4', "Pressure (bar)");
        $activeSheet->setCellValue('Q4', "Flow Rate");
        $activeSheet->setCellValue('R4', "J. Vertikal (m)");
        $activeSheet->setCellValue('S4', "J. Horizontal (m)");

        $activeSheet->setCellValue('T4', AppLabels::DATE);
        $activeSheet->setCellValue('U4', "Pressure (bar)");
        $activeSheet->setCellValue('V4', "Flow Rate");
        $activeSheet->setCellValue('W4', "J. Vertikal (m)");
        $activeSheet->setCellValue('X4', "J. Horizontal (m)");

        $activeSheet->setCellValue('Y4', AppLabels::DATE);
        $activeSheet->setCellValue('Z4', "Pressure (bar)");
        $activeSheet->setCellValue('AA4', "Flow Rate");
        $activeSheet->setCellValue('AB4', "J. Vertikal (m)");
        $activeSheet->setCellValue('AC4', "J. Horizontal (m)");

        $activeSheet->setCellValue('AD4', AppLabels::DATE);
        $activeSheet->setCellValue('AE4', "Pressure (bar)");
        $activeSheet->setCellValue('AF4', "Flow Rate");
        $activeSheet->setCellValue('AG4', "J. Vertikal (m)");
        $activeSheet->setCellValue('AH4', "J. Horizontal (m)");

        $activeSheet->setCellValue('AI4', AppLabels::DATE);
        $activeSheet->setCellValue('AJ4', "Pressure (bar)");
        $activeSheet->setCellValue('AK4', "Flow Rate");
        $activeSheet->setCellValue('AL4', "J. Vertikal (m)");
        $activeSheet->setCellValue('AM4', "J. Horizontal (m)");

        $activeSheet->setCellValue('AN4', AppLabels::DATE);
        $activeSheet->setCellValue('AO4', "Pressure (bar)");
        $activeSheet->setCellValue('AP4', "Flow Rate");
        $activeSheet->setCellValue('AQ4', "J. Vertikal (m)");
        $activeSheet->setCellValue('AR4', "J. Horizontal (m)");

        $activeSheet->setCellValue('AS4', AppLabels::DATE);
        $activeSheet->setCellValue('AT4', "Pressure (bar)");
        $activeSheet->setCellValue('AU4', "Flow Rate");
        $activeSheet->setCellValue('AV4', "J. Vertikal (m)");
        $activeSheet->setCellValue('AW4', "J. Horizontal (m)");

        $activeSheet->setCellValue('AX4', AppLabels::DATE);
        $activeSheet->setCellValue('AY4', "Pressure (bar)");
        $activeSheet->setCellValue('AZ4', "Flow Rate");
        $activeSheet->setCellValue('BA4', "J. Vertikal (m)");
        $activeSheet->setCellValue('BB4', "J. Horizontal (m)");

        $activeSheet->setCellValue('BC4', AppLabels::DATE);
        $activeSheet->setCellValue('BD4', "Pressure (bar)");
        $activeSheet->setCellValue('BE4', "Flow Rate");
        $activeSheet->setCellValue('BF4', "J. Vertikal (m)");
        $activeSheet->setCellValue('BG4', "J. Horizontal (m)");

        $activeSheet->setCellValue('BH4', AppLabels::DATE);
        $activeSheet->setCellValue('BI4', "Pressure (bar)");
        $activeSheet->setCellValue('BJ4', "Flow Rate");
        $activeSheet->setCellValue('BK4', "J. Vertikal (m)");
        $activeSheet->setCellValue('BL4', "J. Horizontal (m)");

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

        $rowIndex = 5;
        foreach ($model->hydrantTestingDetails as $key => $value) {
            $activeSheet->setCellValue('A' . $rowIndex, ($key + 1));
            $activeSheet->setCellValue('B' . $rowIndex, $value->htd_number);
            $activeSheet->setCellValue('C' . $rowIndex, $value->htd_location);
            $activeSheet->setCellValue('D' . $rowIndex, $value->htd_pump_type_desc);

            $activeSheet->setCellValue('E' . $rowIndex, $value->htdMonths[0]->htdm_date);
            $activeSheet->setCellValue('F' . $rowIndex, !empty($value->htdMonths[0]->htdm_pressure) ? number_format($value->htdMonths[0]->htdm_pressure) : "");
            $activeSheet->setCellValue('G' . $rowIndex, !empty($value->htdMonths[0]->htdm_flow_rate) ? number_format($value->htdMonths[0]->htdm_flow_rate) : "");
            $activeSheet->setCellValue('H' . $rowIndex, !empty($value->htdMonths[0]->htdm_vertical) ? number_format($value->htdMonths[0]->htdm_vertical) : "");
            $activeSheet->setCellValue('I' . $rowIndex, !empty($value->htdMonths[0]->htdm_horizontal) ? number_format($value->htdMonths[0]->htdm_horizontal) : "");

            $activeSheet->setCellValue('J' . $rowIndex, $value->htdMonths[1]->htdm_date);
            $activeSheet->setCellValue('K' . $rowIndex, !empty($value->htdMonths[1]->htdm_pressure) ? number_format($value->htdMonths[0]->htdm_pressure) : "");
            $activeSheet->setCellValue('L' . $rowIndex, !empty($value->htdMonths[1]->htdm_flow_rate) ? number_format($value->htdMonths[0]->htdm_flow_rate) : "");
            $activeSheet->setCellValue('M' . $rowIndex, !empty($value->htdMonths[1]->htdm_vertical) ? number_format($value->htdMonths[0]->htdm_vertical) : "");
            $activeSheet->setCellValue('N' . $rowIndex, !empty($value->htdMonths[1]->htdm_horizontal) ? number_format($value->htdMonths[0]->htdm_horizontal) : "");

            $activeSheet->setCellValue('O' . $rowIndex, $value->htdMonths[2]->htdm_date);
            $activeSheet->setCellValue('P' . $rowIndex, !empty($value->htdMonths[2]->htdm_pressure) ? number_format($value->htdMonths[0]->htdm_pressure) : "");
            $activeSheet->setCellValue('Q' . $rowIndex, !empty($value->htdMonths[2]->htdm_flow_rate) ? number_format($value->htdMonths[0]->htdm_flow_rate) : "");
            $activeSheet->setCellValue('R' . $rowIndex, !empty($value->htdMonths[2]->htdm_vertical) ? number_format($value->htdMonths[0]->htdm_vertical) : "");
            $activeSheet->setCellValue('S' . $rowIndex, !empty($value->htdMonths[2]->htdm_horizontal) ? number_format($value->htdMonths[0]->htdm_horizontal) : "");

            $activeSheet->setCellValue('T' . $rowIndex, $value->htdMonths[3]->htdm_date);
            $activeSheet->setCellValue('U' . $rowIndex, !empty($value->htdMonths[3]->htdm_pressure) ? number_format($value->htdMonths[0]->htdm_pressure) : "");
            $activeSheet->setCellValue('V' . $rowIndex, !empty($value->htdMonths[3]->htdm_flow_rate) ? number_format($value->htdMonths[0]->htdm_flow_rate) : "");
            $activeSheet->setCellValue('W' . $rowIndex, !empty($value->htdMonths[3]->htdm_vertical) ? number_format($value->htdMonths[0]->htdm_vertical) : "");
            $activeSheet->setCellValue('X' . $rowIndex, !empty($value->htdMonths[3]->htdm_horizontal) ? number_format($value->htdMonths[0]->htdm_horizontal) : "");

            $activeSheet->setCellValue('Y' . $rowIndex, $value->htdMonths[4]->htdm_date);
            $activeSheet->setCellValue('Z' . $rowIndex, !empty($value->htdMonths[4]->htdm_pressure) ? number_format($value->htdMonths[0]->htdm_pressure) : "");
            $activeSheet->setCellValue('AA' . $rowIndex, !empty($value->htdMonths[4]->htdm_flow_rate) ? number_format($value->htdMonths[0]->htdm_flow_rate) : "");
            $activeSheet->setCellValue('AB' . $rowIndex, !empty($value->htdMonths[4]->htdm_vertical) ? number_format($value->htdMonths[0]->htdm_vertical) : "");
            $activeSheet->setCellValue('AC' . $rowIndex, !empty($value->htdMonths[4]->htdm_horizontal) ? number_format($value->htdMonths[0]->htdm_horizontal) : "");

            $activeSheet->setCellValue('AD' . $rowIndex, $value->htdMonths[5]->htdm_date);
            $activeSheet->setCellValue('AE' . $rowIndex, !empty($value->htdMonths[5]->htdm_pressure) ? number_format($value->htdMonths[0]->htdm_pressure) : "");
            $activeSheet->setCellValue('AF' . $rowIndex, !empty($value->htdMonths[5]->htdm_flow_rate) ? number_format($value->htdMonths[0]->htdm_flow_rate) : "");
            $activeSheet->setCellValue('AG' . $rowIndex, !empty($value->htdMonths[5]->htdm_vertical) ? number_format($value->htdMonths[0]->htdm_vertical) : "");
            $activeSheet->setCellValue('AH' . $rowIndex, !empty($value->htdMonths[5]->htdm_horizontal) ? number_format($value->htdMonths[0]->htdm_horizontal) : "");

            $activeSheet->setCellValue('AI' . $rowIndex, $value->htdMonths[6]->htdm_date);
            $activeSheet->setCellValue('AJ' . $rowIndex, !empty($value->htdMonths[6]->htdm_pressure) ? number_format($value->htdMonths[0]->htdm_pressure) : "");
            $activeSheet->setCellValue('AK' . $rowIndex, !empty($value->htdMonths[6]->htdm_flow_rate) ? number_format($value->htdMonths[0]->htdm_flow_rate) : "");
            $activeSheet->setCellValue('AL' . $rowIndex, !empty($value->htdMonths[6]->htdm_vertical) ? number_format($value->htdMonths[0]->htdm_vertical) : "");
            $activeSheet->setCellValue('AM' . $rowIndex, !empty($value->htdMonths[6]->htdm_horizontal) ? number_format($value->htdMonths[0]->htdm_horizontal) : "");

            $activeSheet->setCellValue('AN' . $rowIndex, $value->htdMonths[7]->htdm_date);
            $activeSheet->setCellValue('AO' . $rowIndex, !empty($value->htdMonths[7]->htdm_pressure) ? number_format($value->htdMonths[0]->htdm_pressure) : "");
            $activeSheet->setCellValue('AP' . $rowIndex, !empty($value->htdMonths[7]->htdm_flow_rate) ? number_format($value->htdMonths[0]->htdm_flow_rate) : "");
            $activeSheet->setCellValue('AQ' . $rowIndex, !empty($value->htdMonths[7]->htdm_vertical) ? number_format($value->htdMonths[0]->htdm_vertical) : "");
            $activeSheet->setCellValue('AR' . $rowIndex, !empty($value->htdMonths[7]->htdm_horizontal) ? number_format($value->htdMonths[0]->htdm_horizontal) : "");

            $activeSheet->setCellValue('AS' . $rowIndex, $value->htdMonths[8]->htdm_date);
            $activeSheet->setCellValue('AT' . $rowIndex, !empty($value->htdMonths[8]->htdm_pressure) ? number_format($value->htdMonths[0]->htdm_pressure) : "");
            $activeSheet->setCellValue('AU' . $rowIndex, !empty($value->htdMonths[8]->htdm_flow_rate) ? number_format($value->htdMonths[0]->htdm_flow_rate) : "");
            $activeSheet->setCellValue('AV' . $rowIndex, !empty($value->htdMonths[8]->htdm_vertical) ? number_format($value->htdMonths[0]->htdm_vertical) : "");
            $activeSheet->setCellValue('AW' . $rowIndex, !empty($value->htdMonths[8]->htdm_horizontal) ? number_format($value->htdMonths[0]->htdm_horizontal) : "");

            $activeSheet->setCellValue('AX' . $rowIndex, $value->htdMonths[9]->htdm_date);
            $activeSheet->setCellValue('AY' . $rowIndex, !empty($value->htdMonths[9]->htdm_pressure) ? number_format($value->htdMonths[0]->htdm_pressure) : "");
            $activeSheet->setCellValue('AZ' . $rowIndex, !empty($value->htdMonths[9]->htdm_flow_rate) ? number_format($value->htdMonths[0]->htdm_flow_rate) : "");
            $activeSheet->setCellValue('BA' . $rowIndex, !empty($value->htdMonths[9]->htdm_vertical) ? number_format($value->htdMonths[0]->htdm_vertical) : "");
            $activeSheet->setCellValue('BB' . $rowIndex, !empty($value->htdMonths[9]->htdm_horizontal) ? number_format($value->htdMonths[0]->htdm_horizontal) : "");

            $activeSheet->setCellValue('BC' . $rowIndex, $value->htdMonths[10]->htdm_date);
            $activeSheet->setCellValue('BD' . $rowIndex, !empty($value->htdMonths[10]->htdm_pressure) ? number_format($value->htdMonths[0]->htdm_pressure) : "");
            $activeSheet->setCellValue('BE' . $rowIndex, !empty($value->htdMonths[10]->htdm_flow_rate) ? number_format($value->htdMonths[0]->htdm_flow_rate) : "");
            $activeSheet->setCellValue('BF' . $rowIndex, !empty($value->htdMonths[10]->htdm_vertical) ? number_format($value->htdMonths[0]->htdm_vertical) : "");
            $activeSheet->setCellValue('BG' . $rowIndex, !empty($value->htdMonths[10]->htdm_horizontal) ? number_format($value->htdMonths[0]->htdm_horizontal) : "");

            $activeSheet->setCellValue('BH' . $rowIndex, $value->htdMonths[11]->htdm_date);
            $activeSheet->setCellValue('BI' . $rowIndex, !empty($value->htdMonths[11]->htdm_pressure) ? number_format($value->htdMonths[0]->htdm_pressure) : "");
            $activeSheet->setCellValue('BJ' . $rowIndex, !empty($value->htdMonths[11]->htdm_flow_rate) ? number_format($value->htdMonths[0]->htdm_flow_rate) : "");
            $activeSheet->setCellValue('BK' . $rowIndex, !empty($value->htdMonths[11]->htdm_vertical) ? number_format($value->htdMonths[0]->htdm_vertical) : "");
            $activeSheet->setCellValue('BL' . $rowIndex, !empty($value->htdMonths[11]->htdm_horizontal) ? number_format($value->htdMonths[0]->htdm_horizontal) : "");



            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('H' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('I' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('J' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('K' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('L' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('M' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('N' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('O' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('P' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('Q' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('R' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('S' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('T' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('U' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('V' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('W' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('X' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('Y' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('Z' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AA' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AB' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AC' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AD' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AE' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AF' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AG' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AH' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AI' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AJ' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AK' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AL' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AM' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AN' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AO' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AP' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AQ' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AR' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AS' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AT' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AU' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AV' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AW' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AX' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AY' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('AZ' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('BA' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('BB' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('BC' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('BD' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('BE' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('BF' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('BG' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('BH' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('BI' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('BJ' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('BK' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('BL' . $rowIndex)->applyFromArray($styleArray);
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
