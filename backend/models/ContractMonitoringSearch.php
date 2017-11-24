<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * ContractMonitoringSearch represents the model behind the search form about `backend\models\ContractMonitoring`.
 */
class ContractMonitoringSearch extends ContractMonitoring
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id'], 'integer'],
            [['cm_name', 'cm_prk', 'cm_pagu', 'cm_aoai', 'cm_prog_status', 'cm_tor_rab_status', 'cm_tor_rab_date', 'cm_nd_number', 'cm_nd_date', 'cm_gm_status', 'cm_gm_date', 'cm_procure_receiver', 'cm_date', 'cm_method', 'cm_contr_number', 'cm_contr_start_date', 'cm_contr_end_date', 'cm_contr_value', 'cm_ref'], 'safe'],
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
        $query = ContractMonitoring::find();

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
            'cm_tor_rab_date' => $this->cm_tor_rab_date,
            'cm_nd_date' => $this->cm_nd_date,
            'cm_gm_date' => $this->cm_gm_date,
            'cm_date' => $this->cm_date,
            'cm_contr_start_date' => $this->cm_contr_start_date,
            'cm_contr_end_date' => $this->cm_contr_end_date,
        ]);

        $query->andFilterWhere(['like', 'cm_name', $this->cm_name])
            ->andFilterWhere(['like', 'cm_prk', $this->cm_prk])
            ->andFilterWhere(['like', 'cm_pagu', $this->cm_pagu])
            ->andFilterWhere(['like', 'cm_aoai', $this->cm_aoai])
            ->andFilterWhere(['like', 'cm_prog_status', $this->cm_prog_status])
            ->andFilterWhere(['like', 'cm_tor_rab_status', $this->cm_tor_rab_status])
            ->andFilterWhere(['like', 'cm_nd_number', $this->cm_nd_number])
            ->andFilterWhere(['like', 'cm_gm_status', $this->cm_gm_status])
            ->andFilterWhere(['like', 'cm_procure_receiver', $this->cm_procure_receiver])
            ->andFilterWhere(['like', 'cm_method', $this->cm_method])
            ->andFilterWhere(['like', 'cm_contr_number', $this->cm_contr_number])
            ->andFilterWhere(['like', 'cm_contr_value', $this->cm_contr_value])
            ->andFilterWhere(['like', 'cm_ref', $this->cm_ref]);

        return $dataProvider;
    }

    public function export() {

        $query = ContractMonitoring::find()->where([
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
        $filename = sprintf(AppConstants::REPORT_NAME_CONTRACT_MONITORING, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::FORM_CONTRACT_MONITORING);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('B')->setWidth(5);
        $activeSheet->getColumnDimension('C')->setWidth(40);
        $activeSheet->getColumnDimension('D')->setWidth(30);
        $activeSheet->getColumnDimension('E')->setWidth(25);
        $activeSheet->getColumnDimension('F')->setWidth(10);
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
        $activeSheet->getColumnDimension('U')->setWidth(40);

        //header
        $activeSheet->mergeCells('B2:U2');
        $activeSheet->setCellValue('B2', "MONITORING KONTRAK K3L");

        //header style
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 16,
                'color' => [
                    'argb' => \PHPExcel_Style_Color::COLOR_WHITE
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
        $activeSheet->getStyle('B2:U2')->applyFromArray($styleArray);

        //==========================================================================

        // body header

        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 16,
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
                'startcolor' => ['argb' => 'FFD9D9D9']
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
        $no2 = 6;
        for($i = 1; $i<7; $i++){
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }

        //body header merge and style
        $activeSheet->mergeCells('H4:K4');
        $activeSheet->mergeCells('H5:I5');
        $activeSheet->mergeCells('J5:K5');
        $activeSheet->mergeCells('L4:M4');
        $activeSheet->mergeCells('N4:P4');
        $activeSheet->mergeCells('Q4:T4');

        $activeSheet->getStyle("H4:K4")->applyFromArray($styleArray);
        $activeSheet->getStyle("H5:I5")->applyFromArray($styleArray);
        $activeSheet->getStyle("J5:K5")->applyFromArray($styleArray);
        $activeSheet->getStyle("L4:M4")->applyFromArray($styleArray);
        $activeSheet->getStyle("N4:P4")->applyFromArray($styleArray);
        $activeSheet->getStyle("Q4:T4")->applyFromArray($styleArray);

        $activeSheet->getStyle("H6")->applyFromArray($styleArray);
        $activeSheet->getStyle("I6")->applyFromArray($styleArray);
        $activeSheet->getStyle("J6")->applyFromArray($styleArray);
        $activeSheet->getStyle("K6")->applyFromArray($styleArray);

        $no1 = 5;
        $no2 = 6;
        for($i = 11; $i<20; $i++){
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }

        $activeSheet->mergeCells("U4:U6");
        $activeSheet->getStyle("U4:U6")->applyFromArray($styleArray);

        //body header data
        $activeSheet->setCellValue('B4', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('C4', AppLabels::PROGRAM);
        $activeSheet->setCellValue('D4', AppLabels::PRK_NUMBER);
        $activeSheet->setCellValue('E4', "Nilai Pagu (Rp.)");
        $activeSheet->setCellValue('F4', "AO/AI");
        $activeSheet->setCellValue('G4', "Status Program");
        $activeSheet->setCellValue('H4', "Usulan User");
        $activeSheet->setCellValue('H5', "TOR & RAB");
        $activeSheet->setCellValue('H6', AppLabels::STATUS);
        $activeSheet->setCellValue('J5', "ND Usulan");
        $activeSheet->setCellValue('I6', AppLabels::DATE);
        $activeSheet->setCellValue('J6', AppLabels::NUMBER);
        $activeSheet->setCellValue('K6', AppLabels::DATE);
        $activeSheet->setCellValue('L4', "Persetujuan GM");
        $activeSheet->setCellValue('N4', "Proses Pengadaan");
        $activeSheet->setCellValue('Q4', "Kontrak");
        $activeSheet->setCellValue('L5', AppLabels::STATUS);
        $activeSheet->setCellValue('M5', AppLabels::STATUS);
        $activeSheet->setCellValue('N5', "Diterima oleh");
        $activeSheet->setCellValue('O5', AppLabels::DATE);
        $activeSheet->setCellValue('P5', AppLabels::METHOD);
        $activeSheet->setCellValue('Q5', AppLabels::NUMBER);
        $activeSheet->setCellValue('R5', AppLabels::DATE);
        $activeSheet->setCellValue('S5', AppLabels::END_DATE);
        $activeSheet->setCellValue('T5', "Nilai Kontrak (Rp.)");
        $activeSheet->setCellValue('U4', AppLabels::DESCRIPTION);


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

        $rowIndex = 7;
        $model = $dataProvider->getModels();
        foreach($model as $key => $value){
            $activeSheet->setCellValue('B'. $rowIndex, ($key+1));
            $activeSheet->setCellValue('C'. $rowIndex, $value->cm_name);
            $activeSheet->setCellValue('D'. $rowIndex, $value->cm_prk);
            $activeSheet->setCellValue('E'. $rowIndex, !empty($value->cm_pagu) ? number_format($value->cm_pagu) : "");
            $activeSheet->setCellValue('F'. $rowIndex, $value->cm_aoai_desc);
            $activeSheet->setCellValue('G'. $rowIndex, $value->cm_prog_status_desc);
            $activeSheet->setCellValue('H'. $rowIndex, $value->cm_tor_rab_status_desc);
            $activeSheet->setCellValue('I'. $rowIndex, $value->cm_tor_rab_date);
            $activeSheet->setCellValue('J'. $rowIndex, $value->cm_nd_number);
            $activeSheet->setCellValue('K'. $rowIndex, $value->cm_nd_date);
            $activeSheet->setCellValue('L'. $rowIndex, $value->cm_gm_status_desc);
            $activeSheet->setCellValue('M'. $rowIndex, $value->cm_gm_date);
            $activeSheet->setCellValue('N'. $rowIndex, $value->cm_procure_receiver_desc);
            $activeSheet->setCellValue('O'. $rowIndex, $value->cm_date);
            $activeSheet->setCellValue('P'. $rowIndex, $value->cm_method_desc);
            $activeSheet->setCellValue('Q'. $rowIndex, $value->cm_contr_number);
            $activeSheet->setCellValue('R'. $rowIndex, $value->cm_contr_start_date);
            $activeSheet->setCellValue('S'. $rowIndex, $value->cm_contr_end_date);
            $activeSheet->setCellValue('T'. $rowIndex, !empty($value->cm_contr_value) ? number_format($value->cm_contr_value) : "");
            $activeSheet->setCellValue('U'. $rowIndex, $value->cm_ref);

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
