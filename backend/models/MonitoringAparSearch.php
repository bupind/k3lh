<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * MonitoringAparSearch represents the model behind the search form about `backend\models\MonitoringApar`.
 */
class MonitoringAparSearch extends MonitoringApar
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'ma_year', 'ma_weight', 'ma_working_pressure'], 'integer'],
            [['ma_form_month_type_code', 'ma_location', 'ma_extinguish_media', 'ma_fire_rating', 'ma_tube_condition_code', 'ma_nozzle_condition_code', 'ma_handle_condition_code', 'ma_pin_condition_code', 'ma_technical_triangle', 'ma_technical_ik', 'ma_technical_card', 'ma_technical_height', 'ma_technical_dis', 'ma_noting_date', 'ma_officer', 'ma_using_date', 'ma_activity'], 'safe'],
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
        $query = MonitoringApar::find();

        // add conditions that should always apply here

        $powerPlant = PowerPlant::find()->where(['id' => $params['_ppId']])->one();

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
            'sector_id' => $powerPlant->sector_id,
            'power_plant_id' => $powerPlant->id,
            'ma_year' => $this->ma_year,
            'ma_weight' => $this->ma_weight,
            'ma_working_pressure' => $this->ma_working_pressure,
            'ma_noting_date' => $this->ma_noting_date,
            'ma_using_date' => $this->ma_using_date,
        ]);

        $query->andFilterWhere(['like', 'ma_form_month_type_code', $this->ma_form_month_type_code])
            ->andFilterWhere(['like', 'ma_location', $this->ma_location])
            ->andFilterWhere(['like', 'ma_extinguish_media', $this->ma_extinguish_media])
            ->andFilterWhere(['like', 'ma_fire_rating', $this->ma_fire_rating])
            ->andFilterWhere(['like', 'ma_tube_condition_code', $this->ma_tube_condition_code])
            ->andFilterWhere(['like', 'ma_nozzle_condition_code', $this->ma_nozzle_condition_code])
            ->andFilterWhere(['like', 'ma_handle_condition_code', $this->ma_handle_condition_code])
            ->andFilterWhere(['like', 'ma_pin_condition_code', $this->ma_pin_condition_code])
            ->andFilterWhere(['like', 'ma_technical_triangle', $this->ma_technical_triangle])
            ->andFilterWhere(['like', 'ma_technical_ik', $this->ma_technical_ik])
            ->andFilterWhere(['like', 'ma_technical_card', $this->ma_technical_card])
            ->andFilterWhere(['like', 'ma_technical_height', $this->ma_technical_height])
            ->andFilterWhere(['like', 'ma_technical_dis', $this->ma_technical_dis])
            ->andFilterWhere(['like', 'ma_officer', $this->ma_officer])
            ->andFilterWhere(['like', 'ma_activity', $this->ma_activity]);

        return $dataProvider;
    }

    public function export() {

        $query = MonitoringApar::find()->where([
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
        $filename = sprintf(AppConstants::REPORT_NAME_MONITORING_APAR, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle("Monitoring APAR");

        // set dimension

        // set row width
        $activeSheet->getRowDimension('8')->setRowHeight(30);

        // set column width11
        $activeSheet->getColumnDimension('A')->setWidth(1);
        $activeSheet->getColumnDimension('B')->setWidth(20);
        for($i = 2; $i<6; $i++){
            $activeSheet->getColumnDimension($this->toAlphabet($i))->setWidth(40);
        }

        for($i = 6; $i<26; $i++){
            $activeSheet->getColumnDimension($this->toAlphabet($i))->setWidth(30);
        }

        $activeSheet->getColumnDimension('AA')->setWidth(30);
        $activeSheet->getColumnDimension('AB')->setWidth(30);
        $activeSheet->getColumnDimension('AC')->setWidth(30);
        $activeSheet->getColumnDimension('AD')->setWidth(30);
        $activeSheet->getColumnDimension('AE')->setWidth(30);
        $activeSheet->getColumnDimension('AF')->setWidth(30);
        $activeSheet->getColumnDimension('AG')->setWidth(50);

        //header
        $activeSheet->mergeCells('B5:M6');
        $activeSheet->setCellValue('B5', "MONITORING APAR/APAB ");

        $activeSheet->mergeCells('AG5:AG6');
        $activeSheet->setCellValue('AG5', sprintf("PERIODE : sd. %s %s", Codeset::getCodesetValue(AppConstants::CODESET_FORM_MONTH_TYPE_CODE,$this->ma_form_month_type_code) , $this->ma_year));

        //header style
        $styleArray = [
            'font' => [
                'bold' => true,
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
        $activeSheet->getStyle('B5:M6')->applyFromArray($styleArray);
        $activeSheet->getStyle('AG5:AG6')->applyFromArray($styleArray);

        //==========================================================================

        // body header

        $styleArray = [
            'font' => [
                'bold' => true,
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
                'startcolor' => ['argb' => 'FFFFFF00']
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

        $no1 = 8;
        $no2 = 10;
        for($i = 1; $i<6; $i++){
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }

        $no1 = 9;
        $no2 = 10;
        for($i = 6; $i<26; $i++){
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }
        //body header merge and style

        $activeSheet->mergeCells("G8:H8");
        $activeSheet->mergeCells("I8:L8");
        $activeSheet->mergeCells("M8:Q8");
        $activeSheet->mergeCells("R8:AC8");
        $activeSheet->mergeCells("AD8:AE8");
        $activeSheet->mergeCells("AF8:AG8");

        $activeSheet->getStyle("G8:H8")->applyFromArray($styleArray);
        $activeSheet->getStyle("I8:L8")->applyFromArray($styleArray);
        $activeSheet->getStyle("M8:Q8")->applyFromArray($styleArray);
        $activeSheet->getStyle("R8:AC8")->applyFromArray($styleArray);
        $activeSheet->getStyle("AD8:AE8")->applyFromArray($styleArray);
        $activeSheet->getStyle("AF8:AG8")->applyFromArray($styleArray);

        //body header data
        $activeSheet->setCellValue('B8', AppLabels::MA_NUMBER);
        $activeSheet->setCellValue('C8', AppLabels::LOCATION);
        $activeSheet->setCellValue('D8', AppLabels::MA_EXTINGUISH_MEDIA);
        $activeSheet->setCellValue('E8', AppLabels::MA_FIRE_RATING);
        $activeSheet->setCellValue('F8', AppLabels::MA_FIRE_CLASS);
        $activeSheet->setCellValue('G8', "Spesifikasi APAR / APAB");
        $activeSheet->setCellValue('I8', "Kondisi APAR / APAB");
        $activeSheet->setCellValue('M8', "Ketentuan Teknis");
        $activeSheet->setCellValue('R8', "Pengecekan Bulanan Berat vs Tekanan (KG/BAR)");
        $activeSheet->setCellValue('AD8', "Catatan Pengisian APAR");
        $activeSheet->setCellValue('AF8', "Catatan Penggunaan APAR");

        $activeSheet->setCellValue('G9', AppLabels::MA_WEIGHT);
        $activeSheet->setCellValue('H9', AppLabels::MA_WORKING_PRESSURE);
        $activeSheet->setCellValue('I9', AppLabels::MA_TUBE);
        $activeSheet->setCellValue('J9', AppLabels::MA_NOZZLE);
        $activeSheet->setCellValue('K9', AppLabels::MA_HANDLE);
        $activeSheet->setCellValue('L9', AppLabels::MA_PIN);
        $activeSheet->setCellValue('M9', AppLabels::MA_TRIANGLE);
        $activeSheet->setCellValue('N9', AppLabels::MA_IK);
        $activeSheet->setCellValue('O9', AppLabels::MA_CARD);
        $activeSheet->setCellValue('P9', AppLabels::MA_HEIGHT);
        $activeSheet->setCellValue('Q9', AppLabels::MA_DISTANCE);
        $activeSheet->setCellValue('R9', AppLabels::SHORT_JANUARY);
        $activeSheet->setCellValue('S9', AppLabels::SHORT_FEBRUARY);
        $activeSheet->setCellValue('T9', AppLabels::SHORT_MARCH);
        $activeSheet->setCellValue('U9', AppLabels::SHORT_APRIL);
        $activeSheet->setCellValue('V9', AppLabels::SHORT_MAY);
        $activeSheet->setCellValue('W9', AppLabels::SHORT_JUNE);
        $activeSheet->setCellValue('X9', AppLabels::SHORT_JULY);
        $activeSheet->setCellValue('Y9', AppLabels::SHORT_AUGUST);
        $activeSheet->setCellValue('Z9', AppLabels::SHORT_SEPTEMBER);
        $activeSheet->setCellValue('AA9', AppLabels::SHORT_OCTOBER);
        $activeSheet->setCellValue('AB9', AppLabels::SHORT_NOVEMBER);
        $activeSheet->setCellValue('AC9', AppLabels::SHORT_DECEMBER);
        $activeSheet->setCellValue('AD9', AppLabels::DATE);
        $activeSheet->setCellValue('AE9', AppLabels::MA_OFFICER);
        $activeSheet->setCellValue('AF9', AppLabels::DATE);
        $activeSheet->setCellValue('AG9', AppLabels::MA_ACTIVITY);

        $activeSheet->mergeCells("AA9:AA10");
        $activeSheet->mergeCells("AB9:AB10");
        $activeSheet->mergeCells("AC9:AC10");
        $activeSheet->mergeCells("AD9:AD10");
        $activeSheet->mergeCells("AE9:AE10");
        $activeSheet->mergeCells("AF9:AF10");
        $activeSheet->mergeCells("AG9:AG10");

        $activeSheet->getStyle("AA9:AA10")->applyFromArray($styleArray);
        $activeSheet->getStyle("AB9:AB10")->applyFromArray($styleArray);
        $activeSheet->getStyle("AC9:AC10")->applyFromArray($styleArray);
        $activeSheet->getStyle("AD9:AD10")->applyFromArray($styleArray);
        $activeSheet->getStyle("AE9:AE10")->applyFromArray($styleArray);
        $activeSheet->getStyle("AF9:AF10")->applyFromArray($styleArray);
        $activeSheet->getStyle("AG9:AG10")->applyFromArray($styleArray);


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

        $rowIndex = 11;
        foreach($dataProvider->getModels() as $key => $model){
            $activeSheet->setCellValue('B' . $rowIndex, ($key+1));
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $rowIndex, $model->ma_location);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $rowIndex, $model->ma_extinguish_media);
            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('E' . $rowIndex, $model->ma_fire_rating);
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('F' . $rowIndex, $model->ma_fire_class_desc);
            $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('G' . $rowIndex, $model->ma_weight);
            $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('H' . $rowIndex, $model->ma_working_pressure);
            $activeSheet->getStyle('H' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('I' . $rowIndex, $model->ma_tube_condition_desc);
            $activeSheet->getStyle('I' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('J' . $rowIndex, $model->ma_nozzle_condition_desc);
            $activeSheet->getStyle('J' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('K' . $rowIndex, $model->ma_handle_condition_desc);
            $activeSheet->getStyle('K' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('L' . $rowIndex, $model->ma_pin_condition_desc);
            $activeSheet->getStyle('L' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('M' . $rowIndex, $model->ma_technical_triangle_desc);
            $activeSheet->getStyle('M' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('N' . $rowIndex, $model->ma_technical_ik_desc);
            $activeSheet->getStyle('N' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('O' . $rowIndex, $model->ma_technical_card_desc);
            $activeSheet->getStyle('O' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('P' . $rowIndex, $model->ma_technical_height_desc);
            $activeSheet->getStyle('P' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('Q' . $rowIndex, $model->ma_technical_dis_desc);
            $activeSheet->getStyle('Q' . $rowIndex)->applyFromArray($styleArray);

            foreach($model->maMonths as $keyM => $month) {
                switch ($month->mam_month){
                    case 1:
                        $activeSheet->setCellValue('R' . $rowIndex, $month->mam_value);
                        $activeSheet->getStyle('R' . $rowIndex)->applyFromArray($styleArray);
                        break;
                    case 2:
                        $activeSheet->setCellValue('S' . $rowIndex, $month->mam_value);
                        $activeSheet->getStyle('S' . $rowIndex)->applyFromArray($styleArray);
                        break;
                    case 3:
                        $activeSheet->setCellValue('T' . $rowIndex, $month->mam_value);
                        $activeSheet->getStyle('T' . $rowIndex)->applyFromArray($styleArray);
                        break;
                    case 4:
                        $activeSheet->setCellValue('U' . $rowIndex, $month->mam_value);
                        $activeSheet->getStyle('U' . $rowIndex)->applyFromArray($styleArray);
                        break;
                    case 5:
                        $activeSheet->setCellValue('V' . $rowIndex, $month->mam_value);
                        $activeSheet->getStyle('V' . $rowIndex)->applyFromArray($styleArray);
                        break;
                    case 6:
                        $activeSheet->setCellValue('W' . $rowIndex, $month->mam_value);
                        $activeSheet->getStyle('W' . $rowIndex)->applyFromArray($styleArray);
                        break;
                    case 7:
                        $activeSheet->setCellValue('X' . $rowIndex, $month->mam_value);
                        $activeSheet->getStyle('X' . $rowIndex)->applyFromArray($styleArray);
                        break;
                    case 8:
                        $activeSheet->setCellValue('Y' . $rowIndex, $month->mam_value);
                        $activeSheet->getStyle('Y' . $rowIndex)->applyFromArray($styleArray);
                        break;
                    case 9:
                        $activeSheet->setCellValue('Z' . $rowIndex, $month->mam_value);
                        $activeSheet->getStyle('Z' . $rowIndex)->applyFromArray($styleArray);
                        break;
                    case 10:
                        $activeSheet->setCellValue('AA' . $rowIndex, $month->mam_value);
                        $activeSheet->getStyle('AA' . $rowIndex)->applyFromArray($styleArray);
                        break;
                    case 11:
                        $activeSheet->setCellValue('AB' . $rowIndex, $month->mam_value);
                        $activeSheet->getStyle('AB' . $rowIndex)->applyFromArray($styleArray);
                        break;
                    case 12:
                        $activeSheet->setCellValue('AC' . $rowIndex, $month->mam_value);
                        $activeSheet->getStyle('AC' . $rowIndex)->applyFromArray($styleArray);
                        break;
                }
            }

            $activeSheet->setCellValue('AD' . $rowIndex, $model->ma_noting_date);
            $activeSheet->getStyle('AD' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('AE' . $rowIndex, $model->ma_officer);
            $activeSheet->getStyle('AE' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('AF' . $rowIndex, $model->ma_using_date);
            $activeSheet->getStyle('AF' . $rowIndex)->applyFromArray($styleArray);

            $wizard = new \PHPExcel_Helper_HTML();
            $richText = $wizard->toRichTextObject($model->ma_activity);

            $activeSheet->setCellValue('AG' . $rowIndex, $richText);
            $activeSheet->getStyle('AG' . $rowIndex)->applyFromArray($styleArray);

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
