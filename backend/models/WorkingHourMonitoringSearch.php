<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppLabels;
use common\vendor\AppConstants;

/**
 * WorkingHourMonitoringSearch represents the model behind the search form about `backend\models\WorkingHourMonitoring`.
 */
class WorkingHourMonitoringSearch extends WorkingHourMonitoring
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id'], 'integer'],
            [['worker_type'], 'safe'],
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
        $query = WorkingHourMonitoring::find();

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

        $query->andFilterWhere(['like', 'worker_type', $this->worker_type]);

        return $dataProvider;
    }

    public function export() {

        $query = WorkingHourMonitoring::find()->where([
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
        $filename = sprintf(AppConstants::REPORT_NAME_WORK_HOUR_MONITORING, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::FORM_WORK_HOUR_MONITORING);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(35);
        $activeSheet->getColumnDimension('B')->setWidth(15);
        $activeSheet->getColumnDimension('C')->setWidth(15);
        $activeSheet->getColumnDimension('D')->setWidth(20);
        $activeSheet->getColumnDimension('E')->setWidth(15);
        $activeSheet->getColumnDimension('F')->setWidth(15);
        $activeSheet->getColumnDimension('G')->setWidth(20);
        $activeSheet->getColumnDimension('H')->setWidth(15);
        $activeSheet->getColumnDimension('I')->setWidth(15);
        $activeSheet->getColumnDimension('J')->setWidth(20);
        $activeSheet->getColumnDimension('K')->setWidth(15);
        $activeSheet->getColumnDimension('L')->setWidth(15);
        $activeSheet->getColumnDimension('M')->setWidth(20);
        $activeSheet->getColumnDimension('N')->setWidth(15);
        $activeSheet->getColumnDimension('O')->setWidth(15);
        $activeSheet->getColumnDimension('P')->setWidth(20);
        $activeSheet->getColumnDimension('Q')->setWidth(15);
        $activeSheet->getColumnDimension('R')->setWidth(15);
        $activeSheet->getColumnDimension('S')->setWidth(20);
        $activeSheet->getColumnDimension('T')->setWidth(15);
        $activeSheet->getColumnDimension('U')->setWidth(15);
        $activeSheet->getColumnDimension('V')->setWidth(20);
        $activeSheet->getColumnDimension('W')->setWidth(15);
        $activeSheet->getColumnDimension('X')->setWidth(15);
        $activeSheet->getColumnDimension('Y')->setWidth(20);
        $activeSheet->getColumnDimension('Z')->setWidth(15);
        $activeSheet->getColumnDimension('AA')->setWidth(15);
        $activeSheet->getColumnDimension('AB')->setWidth(20);
        $activeSheet->getColumnDimension('AC')->setWidth(15);
        $activeSheet->getColumnDimension('AD')->setWidth(15);
        $activeSheet->getColumnDimension('AE')->setWidth(20);
        $activeSheet->getColumnDimension('AF')->setWidth(15);
        $activeSheet->getColumnDimension('AG')->setWidth(15);
        $activeSheet->getColumnDimension('AH')->setWidth(20);
        $activeSheet->getColumnDimension('AI')->setWidth(15);
        $activeSheet->getColumnDimension('AJ')->setWidth(15);
        $activeSheet->getColumnDimension('AK')->setWidth(20);

        //header
        $activeSheet->setCellValue('A1', "MONITORING JAM KERJA");

        //header style
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 16,
                'color' => [
                    'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                ]
            ],
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FF808080']
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
        $activeSheet->getStyle('A1')->applyFromArray($styleArray);

        //==========================================================================

        // body header

        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 14,
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
        $activeSheet->mergeCells('A3:A5');
        $activeSheet->mergeCells('B3:AK3');
        $activeSheet->mergeCells('B4:D4');
        $activeSheet->mergeCells('E4:G4');
        $activeSheet->mergeCells('H4:J4');
        $activeSheet->mergeCells('K4:M4');
        $activeSheet->mergeCells('N4:P4');
        $activeSheet->mergeCells('Q4:S4');
        $activeSheet->mergeCells('T4:V4');
        $activeSheet->mergeCells('W4:Y4');
        $activeSheet->mergeCells('Z4:AB4');
        $activeSheet->mergeCells('AC4:AE4');
        $activeSheet->mergeCells('AF4:AH4');
        $activeSheet->mergeCells('AI4:AK4');

        $activeSheet->getStyle('A3:A5')->applyFromArray($styleArray);
        $activeSheet->getStyle('B3:AK3')->applyFromArray($styleArray);
        $activeSheet->getStyle('B4:D4')->applyFromArray($styleArray);
        $activeSheet->getStyle('E4:G4')->applyFromArray($styleArray);
        $activeSheet->getStyle('H4:J4')->applyFromArray($styleArray);
        $activeSheet->getStyle('K4:M4')->applyFromArray($styleArray);
        $activeSheet->getStyle('N4:P4')->applyFromArray($styleArray);
        $activeSheet->getStyle('Q4:S4')->applyFromArray($styleArray);
        $activeSheet->getStyle('T4:V4')->applyFromArray($styleArray);
        $activeSheet->getStyle('W4:Y4')->applyFromArray($styleArray);
        $activeSheet->getStyle('Z4:AB4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AC4:AE4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AF4:AH4')->applyFromArray($styleArray);
        $activeSheet->getStyle('AI4:AK4')->applyFromArray($styleArray);

        //body header data
        $activeSheet->setCellValue('A3', "Pekerja");
        $activeSheet->setCellValue('B3', "Jam Kerja / Manhours (jam)");
        $activeSheet->setCellValue('B4', AppLabels::JANUARY);
        $activeSheet->setCellValue('E4', AppLabels::FEBRUARY);
        $activeSheet->setCellValue('H4', AppLabels::MARCH);
        $activeSheet->setCellValue('K4', AppLabels::APRIL);
        $activeSheet->setCellValue('N4', AppLabels::MAY);
        $activeSheet->setCellValue('Q4', AppLabels::JUNE);
        $activeSheet->setCellValue('T4', AppLabels::JULY);
        $activeSheet->setCellValue('W4', AppLabels::AUGUST);
        $activeSheet->setCellValue('Z4', AppLabels::SEPTEMBER);
        $activeSheet->setCellValue('AC4', AppLabels::OCTOBER);
        $activeSheet->setCellValue('AF4', AppLabels::NOVEMBER);
        $activeSheet->setCellValue('AI4', AppLabels::DECEMBER);

        $activeSheet->setCellValue('B5', AppLabels::WORKER_QUANTITY);
        $activeSheet->setCellValue('C5', AppLabels::MANHOURS);
        $activeSheet->setCellValue('D5', AppLabels::ACCU_MANHOURS);
        $activeSheet->setCellValue('E5', AppLabels::WORKER_QUANTITY);
        $activeSheet->setCellValue('F5', AppLabels::MANHOURS);
        $activeSheet->setCellValue('G5', AppLabels::ACCU_MANHOURS);
        $activeSheet->setCellValue('H5', AppLabels::WORKER_QUANTITY);
        $activeSheet->setCellValue('I5', AppLabels::MANHOURS);
        $activeSheet->setCellValue('J5', AppLabels::ACCU_MANHOURS);
        $activeSheet->setCellValue('K5', AppLabels::WORKER_QUANTITY);
        $activeSheet->setCellValue('L5', AppLabels::MANHOURS);
        $activeSheet->setCellValue('M5', AppLabels::ACCU_MANHOURS);
        $activeSheet->setCellValue('N5', AppLabels::WORKER_QUANTITY);
        $activeSheet->setCellValue('O5', AppLabels::MANHOURS);
        $activeSheet->setCellValue('P5', AppLabels::ACCU_MANHOURS);
        $activeSheet->setCellValue('Q5', AppLabels::WORKER_QUANTITY);
        $activeSheet->setCellValue('R5', AppLabels::MANHOURS);
        $activeSheet->setCellValue('S5', AppLabels::ACCU_MANHOURS);
        $activeSheet->setCellValue('T5', AppLabels::WORKER_QUANTITY);
        $activeSheet->setCellValue('U5', AppLabels::MANHOURS);
        $activeSheet->setCellValue('V5', AppLabels::ACCU_MANHOURS);
        $activeSheet->setCellValue('W5', AppLabels::WORKER_QUANTITY);
        $activeSheet->setCellValue('X5', AppLabels::MANHOURS);
        $activeSheet->setCellValue('Y5', AppLabels::ACCU_MANHOURS);
        $activeSheet->setCellValue('Z5', AppLabels::WORKER_QUANTITY);
        $activeSheet->setCellValue('AA5', AppLabels::MANHOURS);
        $activeSheet->setCellValue('AB5', AppLabels::ACCU_MANHOURS);
        $activeSheet->setCellValue('AC5', AppLabels::WORKER_QUANTITY);
        $activeSheet->setCellValue('AD5', AppLabels::MANHOURS);
        $activeSheet->setCellValue('AE5', AppLabels::ACCU_MANHOURS);
        $activeSheet->setCellValue('AF5', AppLabels::WORKER_QUANTITY);
        $activeSheet->setCellValue('AG5', AppLabels::MANHOURS);
        $activeSheet->setCellValue('AH5', AppLabels::ACCU_MANHOURS);
        $activeSheet->setCellValue('AI5', AppLabels::WORKER_QUANTITY);
        $activeSheet->setCellValue('AJ5', AppLabels::MANHOURS);
        $activeSheet->setCellValue('AK5', AppLabels::ACCU_MANHOURS);

        $activeSheet->getStyle('B5')->applyFromArray($styleArray);
        $activeSheet->getStyle('C5')->applyFromArray($styleArray);
        $activeSheet->getStyle('D5')->applyFromArray($styleArray);
        $activeSheet->getStyle('E5')->applyFromArray($styleArray);
        $activeSheet->getStyle('F5')->applyFromArray($styleArray);
        $activeSheet->getStyle('G5')->applyFromArray($styleArray);
        $activeSheet->getStyle('H5')->applyFromArray($styleArray);
        $activeSheet->getStyle('I5')->applyFromArray($styleArray);
        $activeSheet->getStyle('J5')->applyFromArray($styleArray);
        $activeSheet->getStyle('K5')->applyFromArray($styleArray);
        $activeSheet->getStyle('L5')->applyFromArray($styleArray);
        $activeSheet->getStyle('M5')->applyFromArray($styleArray);
        $activeSheet->getStyle('N5')->applyFromArray($styleArray);
        $activeSheet->getStyle('O5')->applyFromArray($styleArray);
        $activeSheet->getStyle('P5')->applyFromArray($styleArray);
        $activeSheet->getStyle('Q5')->applyFromArray($styleArray);
        $activeSheet->getStyle('R5')->applyFromArray($styleArray);
        $activeSheet->getStyle('S5')->applyFromArray($styleArray);
        $activeSheet->getStyle('T5')->applyFromArray($styleArray);
        $activeSheet->getStyle('U5')->applyFromArray($styleArray);
        $activeSheet->getStyle('V5')->applyFromArray($styleArray);
        $activeSheet->getStyle('W5')->applyFromArray($styleArray);
        $activeSheet->getStyle('X5')->applyFromArray($styleArray);
        $activeSheet->getStyle('Y5')->applyFromArray($styleArray);
        $activeSheet->getStyle('Z5')->applyFromArray($styleArray);
        $activeSheet->getStyle('AA5')->applyFromArray($styleArray);
        $activeSheet->getStyle('AB5')->applyFromArray($styleArray);
        $activeSheet->getStyle('AC5')->applyFromArray($styleArray);
        $activeSheet->getStyle('AD5')->applyFromArray($styleArray);
        $activeSheet->getStyle('AE5')->applyFromArray($styleArray);
        $activeSheet->getStyle('AF5')->applyFromArray($styleArray);
        $activeSheet->getStyle('AG5')->applyFromArray($styleArray);
        $activeSheet->getStyle('AH5')->applyFromArray($styleArray);
        $activeSheet->getStyle('AI5')->applyFromArray($styleArray);
        $activeSheet->getStyle('AJ5')->applyFromArray($styleArray);
        $activeSheet->getStyle('AK5')->applyFromArray($styleArray);


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
            'numberformat' => [
                'code' => '#,##',
            ],
        ];

        $initialIndex = 6;
        $rowIndex = 6;
        $model = $dataProvider->getModels();
        foreach($model as $key => $value){
            $activeSheet->setCellValue('A'. $rowIndex, $value->worker_type_desc);
            $activeSheet->setCellValue('B'. $rowIndex, $value->whmMonths[0]->whmm_quantity);
            $activeSheet->setCellValue('C'. $rowIndex, "=B$rowIndex*8");
            $activeSheet->setCellValue('D'. $rowIndex, "=C$rowIndex");
            $activeSheet->setCellValue('E'. $rowIndex, $value->whmMonths[1]->whmm_quantity);
            $activeSheet->setCellValue('F'. $rowIndex, "=E$rowIndex*8");
            $activeSheet->setCellValue('G'. $rowIndex, "=F$rowIndex+D$rowIndex");
            $activeSheet->setCellValue('H'. $rowIndex, $value->whmMonths[2]->whmm_quantity);
            $activeSheet->setCellValue('I'. $rowIndex, "=H$rowIndex*8");
            $activeSheet->setCellValue('J'. $rowIndex, "=I$rowIndex+G$rowIndex");
            $activeSheet->setCellValue('K'. $rowIndex, $value->whmMonths[3]->whmm_quantity);
            $activeSheet->setCellValue('L'. $rowIndex, "=K$rowIndex*8");
            $activeSheet->setCellValue('M'. $rowIndex, "=L$rowIndex+J$rowIndex");
            $activeSheet->setCellValue('N'. $rowIndex, $value->whmMonths[4]->whmm_quantity);
            $activeSheet->setCellValue('O'. $rowIndex, "=N$rowIndex*8");
            $activeSheet->setCellValue('P'. $rowIndex, "=O$rowIndex+M$rowIndex");
            $activeSheet->setCellValue('Q'. $rowIndex, $value->whmMonths[5]->whmm_quantity);
            $activeSheet->setCellValue('R'. $rowIndex, "=Q$rowIndex*8");
            $activeSheet->setCellValue('S'. $rowIndex, "=R$rowIndex+P$rowIndex");
            $activeSheet->setCellValue('T'. $rowIndex, $value->whmMonths[6]->whmm_quantity);
            $activeSheet->setCellValue('U'. $rowIndex, "=T$rowIndex*8");
            $activeSheet->setCellValue('V'. $rowIndex, "=U$rowIndex+S$rowIndex");
            $activeSheet->setCellValue('W'. $rowIndex, $value->whmMonths[7]->whmm_quantity);
            $activeSheet->setCellValue('X'. $rowIndex, "=W$rowIndex*8");
            $activeSheet->setCellValue('Y'. $rowIndex, "=X$rowIndex+V$rowIndex");
            $activeSheet->setCellValue('Z'. $rowIndex, $value->whmMonths[8]->whmm_quantity);
            $activeSheet->setCellValue('AA'. $rowIndex, "=Z$rowIndex*8");
            $activeSheet->setCellValue('AB'. $rowIndex, "=AA$rowIndex+Y$rowIndex");
            $activeSheet->setCellValue('AC'. $rowIndex, $value->whmMonths[9]->whmm_quantity);
            $activeSheet->setCellValue('AD'. $rowIndex, "=AC$rowIndex*8");
            $activeSheet->setCellValue('AE'. $rowIndex, "=AD$rowIndex+AB$rowIndex");
            $activeSheet->setCellValue('AF'. $rowIndex, $value->whmMonths[10]->whmm_quantity);
            $activeSheet->setCellValue('AG'. $rowIndex, "=AF$rowIndex*8");
            $activeSheet->setCellValue('AH'. $rowIndex, "=AG$rowIndex+AE$rowIndex");
            $activeSheet->setCellValue('AI'. $rowIndex, $value->whmMonths[11]->whmm_quantity);
            $activeSheet->setCellValue('AJ'. $rowIndex, "=AI$rowIndex*8");
            $activeSheet->setCellValue('AK'. $rowIndex, "=AJ$rowIndex+AH$rowIndex");


            $activeSheet->getStyle("A". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("B". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("C". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("D". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("E". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("F". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("G". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("H". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("I". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("J". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("K". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("L". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("M". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("N". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("O". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("P". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("Q". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("R". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("S". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("T". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("U". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("V". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("W". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("X". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("Y". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("Z". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("AA". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("AB". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("AC". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("AD". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("AE". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("AF". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("AG". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("AH". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("AI". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("AJ". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("AK". $rowIndex)->applyFromArray($styleArray);

            $rowIndex++;
        }
        $endIndex = $rowIndex-1;

        $activeSheet->getStyle("B". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("C". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("D". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("E". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("F". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("G". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("H". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("I". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("J". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("K". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("L". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("M". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("N". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("O". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("P". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("Q". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("R". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("S". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("T". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("U". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("V". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("W". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("X". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("Y". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("Z". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("AA". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("AB". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("AC". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("AD". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("AE". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("AF". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("AG". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("AH". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("AI". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("AJ". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->getStyle("AK". $rowIndex)->applyFromArray($styleArray);
        $activeSheet->setCellValue('B'. $rowIndex, "=SUM(B$initialIndex:B$endIndex)");
        $activeSheet->setCellValue('C'. $rowIndex, "=SUM(C$initialIndex:C$endIndex)");
        $activeSheet->setCellValue('D'. $rowIndex, "=SUM(D$initialIndex:D$endIndex)");
        $activeSheet->setCellValue('E'. $rowIndex, "=SUM(E$initialIndex:E$endIndex)");
        $activeSheet->setCellValue('F'. $rowIndex, "=SUM(F$initialIndex:F$endIndex)");
        $activeSheet->setCellValue('G'. $rowIndex, "=SUM(G$initialIndex:G$endIndex)");
        $activeSheet->setCellValue('H'. $rowIndex, "=SUM(H$initialIndex:H$endIndex)");
        $activeSheet->setCellValue('I'. $rowIndex, "=SUM(I$initialIndex:I$endIndex)");
        $activeSheet->setCellValue('J'. $rowIndex, "=SUM(J$initialIndex:J$endIndex)");
        $activeSheet->setCellValue('K'. $rowIndex, "=SUM(K$initialIndex:K$endIndex)");
        $activeSheet->setCellValue('L'. $rowIndex, "=SUM(L$initialIndex:L$endIndex)");
        $activeSheet->setCellValue('M'. $rowIndex, "=SUM(M$initialIndex:M$endIndex)");
        $activeSheet->setCellValue('N'. $rowIndex, "=SUM(N$initialIndex:N$endIndex)");
        $activeSheet->setCellValue('O'. $rowIndex, "=SUM(O$initialIndex:O$endIndex)");
        $activeSheet->setCellValue('P'. $rowIndex, "=SUM(P$initialIndex:P$endIndex)");
        $activeSheet->setCellValue('Q'. $rowIndex, "=SUM(Q$initialIndex:Q$endIndex)");
        $activeSheet->setCellValue('R'. $rowIndex, "=SUM(R$initialIndex:R$endIndex)");
        $activeSheet->setCellValue('S'. $rowIndex, "=SUM(S$initialIndex:S$endIndex)");
        $activeSheet->setCellValue('T'. $rowIndex, "=SUM(T$initialIndex:T$endIndex)");
        $activeSheet->setCellValue('U'. $rowIndex, "=SUM(U$initialIndex:U$endIndex)");
        $activeSheet->setCellValue('V'. $rowIndex, "=SUM(V$initialIndex:V$endIndex)");
        $activeSheet->setCellValue('W'. $rowIndex, "=SUM(W$initialIndex:W$endIndex)");
        $activeSheet->setCellValue('X'. $rowIndex, "=SUM(X$initialIndex:X$endIndex)");
        $activeSheet->setCellValue('Y'. $rowIndex, "=SUM(Y$initialIndex:Y$endIndex)");
        $activeSheet->setCellValue('Z'. $rowIndex, "=SUM(Z$initialIndex:Z$endIndex)");
        $activeSheet->setCellValue('AA'. $rowIndex, "=SUM(AA$initialIndex:AA$endIndex)");
        $activeSheet->setCellValue('AB'. $rowIndex, "=SUM(AB$initialIndex:AB$endIndex)");
        $activeSheet->setCellValue('AC'. $rowIndex, "=SUM(AC$initialIndex:AC$endIndex)");
        $activeSheet->setCellValue('AD'. $rowIndex, "=SUM(AD$initialIndex:AD$endIndex)");
        $activeSheet->setCellValue('AE'. $rowIndex, "=SUM(AE$initialIndex:AE$endIndex)");
        $activeSheet->setCellValue('AF'. $rowIndex, "=SUM(AF$initialIndex:AF$endIndex)");
        $activeSheet->setCellValue('AG'. $rowIndex, "=SUM(AG$initialIndex:AG$endIndex)");
        $activeSheet->setCellValue('AH'. $rowIndex, "=SUM(AH$initialIndex:AH$endIndex)");
        $activeSheet->setCellValue('AI'. $rowIndex, "=SUM(AI$initialIndex:AI$endIndex)");
        $activeSheet->setCellValue('AJ'. $rowIndex, "=SUM(AJ$initialIndex:AJ$endIndex)");
        $activeSheet->setCellValue('AK'. $rowIndex, "=SUM(Ak$initialIndex:AK$endIndex)");


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
            ],
        ];

        $activeSheet->setCellValue('A'. $rowIndex, "TOTAL MANHOURS");
        $activeSheet->getStyle("A". $rowIndex)->applyFromArray($styleArray);



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
