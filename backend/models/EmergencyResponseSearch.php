<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * EmergencyResponseSearch represents the model behind the search form about `backend\models\EmergencyResponse`.
 */
class EmergencyResponseSearch extends EmergencyResponse
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'er_participant', 'er_simulation_time', 'er_simulation_victim', 'er_simulation_loss', 'er_evaluation_time', 'er_evaluation_victim', 'er_evaluation_loss'], 'integer'],
            [['er_training_name', 'er_team', 'er_location', 'er_date', 'er_failure_detail'], 'safe'],
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
        $query = EmergencyResponse::find();

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
            'er_participant' => $this->er_participant,
            'er_simulation_time' => $this->er_simulation_time,
            'er_simulation_victim' => $this->er_simulation_victim,
            'er_simulation_loss' => $this->er_simulation_loss,
            'er_date' => $this->er_date,
            'er_evaluation_time' => $this->er_evaluation_time,
            'er_evaluation_victim' => $this->er_evaluation_victim,
            'er_evaluation_loss' => $this->er_evaluation_loss,
        ]);

        $query->andFilterWhere(['like', 'er_training_name', $this->er_training_name])
            ->andFilterWhere(['like', 'er_team', $this->er_team])
            ->andFilterWhere(['like', 'er_location', $this->er_location])
            ->andFilterWhere(['like', 'er_failure_detail', $this->er_failure_detail]);

        return $dataProvider;
    }

    public function export() {

        $query = EmergencyResponse::find();

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
        $filename = sprintf(AppConstants::REPORT_NAME_EMERGENCY_RESPONSE, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle("Simulasi Tanggap Darurat");

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(1);
        $activeSheet->getColumnDimension('B')->setWidth(5);
        $activeSheet->getColumnDimension('C')->setWidth(40);
        for($i = 3; $i<14; $i++){
            $activeSheet->getColumnDimension($this->toAlphabet($i))->setWidth(30);
        }

        $activeSheet->getColumnDimension('O')->setWidth(60);

        //header
        $activeSheet->mergeCells('B2:D2');
        $activeSheet->setCellValue('B2', "Form Evaluasi Pelatihan dan Simulasi Tanggap Darurat");

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
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                    ]
                ]
            ]
        ];
        $activeSheet->getStyle('B2:D2')->applyFromArray($styleArray);

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

        $no1 = 4;
        $no2 = 5;
        for($i = 1; $i<5; $i++){
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }

        $activeSheet->mergeCells('F4:H4');
        $activeSheet->mergeCells('I4:K4');
        $activeSheet->mergeCells('L4:O4');

        $activeSheet->getStyle("F4:H4")->applyFromArray($styleArray);
        $activeSheet->getStyle("I4:K4")->applyFromArray($styleArray);
        $activeSheet->getStyle("L4:O4")->applyFromArray($styleArray);

        for($i = 5; $i<15; $i++){
            $alphabet = $this->toAlphabet($i);
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }

        $activeSheet->setCellValue('B4', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('C4', AppLabels::ER_TRAINING_NAME);
        $activeSheet->setCellValue('D4', sprintf("%s %s",AppLabels::AMOUNT, AppLabels::PARTICIPANT));
        $activeSheet->setCellValue('E4', AppLabels::ER_TEAM);
        $activeSheet->setCellValue('F5', AppLabels::ER_TIME);
        $activeSheet->setCellValue('G5', AppLabels::ER_VICTIM);
        $activeSheet->setCellValue('H5', AppLabels::ER_LOSS);
        $activeSheet->setCellValue('I5', AppLabels::LOCATION);
        $activeSheet->setCellValue('J5', AppLabels::DATE);
        $activeSheet->setCellValue('K5', AppLabels::ER_UPLOAD);
        $activeSheet->setCellValue('L5', AppLabels::ER_TIME);
        $activeSheet->setCellValue('M5', AppLabels::ER_VICTIM);
        $activeSheet->setCellValue('N5', AppLabels::ER_LOSS);
        $activeSheet->setCellValue('O5', AppLabels::ER_FAILURE_DETAIL);

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
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFFFFFFF']
            ],

        ];

        $rowIndex = 6;
        foreach($dataProvider->getModels() as $key => $model){
            $activeSheet->setCellValue('B' . $rowIndex, ($key+1));
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $rowIndex, $model->er_training_name);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $rowIndex, $model->er_participant);
            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('E' . $rowIndex, $model->er_team);
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('F' . $rowIndex, $model->er_simulation_time);
            $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('G' . $rowIndex, $model->er_simulation_victim);
            $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('H' . $rowIndex, $model->er_simulation_loss);
            $activeSheet->getStyle('H' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('I' . $rowIndex, $model->er_location);
            $activeSheet->getStyle('I' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('J' . $rowIndex, $model->er_date);
            $activeSheet->getStyle('J' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('K' . $rowIndex, "Upload");
            $activeSheet->getStyle('K' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('L' . $rowIndex, $model->er_evaluation_time);
            $activeSheet->getStyle('L' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('M' . $rowIndex, $model->er_evaluation_victim);
            $activeSheet->getStyle('M' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('N' . $rowIndex, $model->er_evaluation_loss);
            $activeSheet->getStyle('N' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('O' . $rowIndex, $model->er_failure_detail);
            $activeSheet->getStyle('O' . $rowIndex)->applyFromArray($styleArray);


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
