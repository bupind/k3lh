<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppLabels;
use common\vendor\AppConstants;

/**
 * LotoMonitoringSearch represents the model behind the search form about `backend\models\LotoMonitoring`.
 */
class LotoMonitoringSearch extends LotoMonitoring
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id'], 'integer'],
            [['lm_key_name', 'lm_permission_number', 'lm_tool_description', 'lm_tool_status', 'lm_open_date', 'lm_open_hour', 'lm_open_operation', 'lm_open_k3', 'lm_close_date', 'lm_close_hour', 'lm_close_operation', 'lm_close_k3'], 'safe'],
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
        $query = LotoMonitoring::find();

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
            'lm_open_date' => $this->lm_open_date,
            'lm_close_date' => $this->lm_close_date,
        ]);

        $query->andFilterWhere(['like', 'lm_key_name', $this->lm_key_name])
            ->andFilterWhere(['like', 'lm_permission_number', $this->lm_permission_number])
            ->andFilterWhere(['like', 'lm_tool_description', $this->lm_tool_description])
            ->andFilterWhere(['like', 'lm_tool_status', $this->lm_tool_status])
            ->andFilterWhere(['like', 'lm_open_hour', $this->lm_open_hour])
            ->andFilterWhere(['like', 'lm_open_operation', $this->lm_open_operation])
            ->andFilterWhere(['like', 'lm_open_k3', $this->lm_open_k3])
            ->andFilterWhere(['like', 'lm_close_hour', $this->lm_close_hour])
            ->andFilterWhere(['like', 'lm_close_operation', $this->lm_close_operation])
            ->andFilterWhere(['like', 'lm_close_k3', $this->lm_close_k3]);

        return $dataProvider;
    }

    public function export() {

        $query = LotoMonitoring::find()->where([
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
        $filename = sprintf(AppConstants::REPORT_NAME_LOTO_MONITORING, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::FORM_LOTO_MONITORING);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(15);
        $activeSheet->getColumnDimension('C')->setWidth(30);
        $activeSheet->getColumnDimension('D')->setWidth(40);
        $activeSheet->getColumnDimension('E')->setWidth(40);
        $activeSheet->getColumnDimension('F')->setWidth(15);
        $activeSheet->getColumnDimension('G')->setWidth(15);
        $activeSheet->getColumnDimension('H')->setWidth(30);
        $activeSheet->getColumnDimension('I')->setWidth(30);
        $activeSheet->getColumnDimension('J')->setWidth(30);
        $activeSheet->getColumnDimension('K')->setWidth(15);
        $activeSheet->getColumnDimension('L')->setWidth(15);
        $activeSheet->getColumnDimension('M')->setWidth(30);
        $activeSheet->getColumnDimension('N')->setWidth(30);
        $activeSheet->getColumnDimension('O')->setWidth(30);

        //header
        $activeSheet->mergeCells('A1:C1');
        $activeSheet->setCellValue('A1', "Form Monitoring Lock Out Tag Out (LOTO)");

        //header style
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 14,
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
        $activeSheet->getStyle('A1:C1')->applyFromArray($styleArray);

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

        $no1 = 3;
        $no2 = 4;
        for($i = 0; $i<5; $i++){
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }

        //body header merge and style
        $activeSheet->mergeCells('F3:J3');
        $activeSheet->mergeCells('K3:O3');

        $activeSheet->getStyle("F3:J3")->applyFromArray($styleArray);
        $activeSheet->getStyle("K3:O3")->applyFromArray($styleArray);

        $no = 4;
        for($i = 5; $i<15; $i++){
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no:$alphabet$no");
            $activeSheet->getStyle("$alphabet$no:$alphabet$no")->applyFromArray($styleArray);
        }

        //body header data
        $activeSheet->setCellValue('A3', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('B3', AppLabels::NUMBER . " Kunci");
        $activeSheet->setCellValue('C3', "Nomor Izin Kerja/ PTW");
        $activeSheet->setCellValue('D3', "Deskripsi Peralatan/ Equipment");
        $activeSheet->setCellValue('E3', "Status LOTO (Open/ Closed)");
        $activeSheet->setCellValue('F3', "Pasang (Open LOTO)");
        $activeSheet->setCellValue('F4', AppLabels::DATE);
        $activeSheet->setCellValue('G4', AppLabels::HOUR);
        $activeSheet->setCellValue('H4', "Bag. Operasi");
        $activeSheet->setCellValue('I4', "Bag. Pemeliharaan");
        $activeSheet->setCellValue('J4', "Bag. K3");
        $activeSheet->setCellValue('K3', "Tanggal Lepas (Closed LOTO)");
        $activeSheet->setCellValue('K4', AppLabels::DATE);
        $activeSheet->setCellValue('L4', AppLabels::HOUR);
        $activeSheet->setCellValue('M4', "Bag. Operasi");
        $activeSheet->setCellValue('N4', "Bag. Pemeliharaan");
        $activeSheet->setCellValue('O4', "Bag. K3");



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
        $model = $dataProvider->getModels();
        foreach($model as $key => $value){
            $activeSheet->setCellValue('A'. $rowIndex, ($key+1));
            $activeSheet->setCellValue('B'. $rowIndex, $value->lm_key_name);
            $activeSheet->setCellValue('C'. $rowIndex, $value->lm_permission_number);
            $activeSheet->setCellValue('D'. $rowIndex, $value->lm_tool_description);
            $activeSheet->setCellValue('E'. $rowIndex, $value->lm_tool_status_desc);
            $activeSheet->setCellValue('F'. $rowIndex, $value->lm_open_date);
            $activeSheet->setCellValue('G'. $rowIndex, $value->lm_open_hour);
            $activeSheet->setCellValue('H'. $rowIndex, $value->lm_open_operation);
            $activeSheet->setCellValue('I'. $rowIndex, $value->lm_open_maint);
            $activeSheet->setCellValue('J'. $rowIndex, $value->lm_open_k3);
            $activeSheet->setCellValue('K'. $rowIndex, $value->lm_close_date);
            $activeSheet->setCellValue('L'. $rowIndex, $value->lm_close_hour);
            $activeSheet->setCellValue('M'. $rowIndex, $value->lm_close_operation);
            $activeSheet->setCellValue('N'. $rowIndex, $value->lm_close_maint);
            $activeSheet->setCellValue('O'. $rowIndex, $value->lm_close_k3);

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
