<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;


/**
 * ApdMonitoringSearch represents the model behind the search form about `backend\models\ApdMonitoring`.
 */
class ApdMonitoringSearch extends ApdMonitoring
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id'], 'integer'],
            [['am_name', 'am_type', 'am_brand', 'am_amount', 'am_location', 'am_good_value', 'am_bad_value', 'am_ref'], 'safe'],
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
        $query = ApdMonitoring::find();

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

        $query->andFilterWhere(['like', 'am_name', $this->am_name])
            ->andFilterWhere(['like', 'am_type', $this->am_type])
            ->andFilterWhere(['like', 'am_brand', $this->am_brand])
            ->andFilterWhere(['like', 'am_amount', $this->am_amount])
            ->andFilterWhere(['like', 'am_location', $this->am_location])
            ->andFilterWhere(['like', 'am_good_value', $this->am_good_value])
            ->andFilterWhere(['like', 'am_bad_value', $this->am_bad_value])
            ->andFilterWhere(['like', 'am_ref', $this->am_ref]);

        return $dataProvider;
    }

    public function export() {

        $query = ApdMonitoring::find()->where([
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
        $filename = sprintf(AppConstants::REPORT_NAME_APD_MONITORING, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::FORM_APD_MONITORING);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(30);
        $activeSheet->getColumnDimension('C')->setWidth(25);
        $activeSheet->getColumnDimension('D')->setWidth(25);
        $activeSheet->getColumnDimension('E')->setWidth(25);
        $activeSheet->getColumnDimension('F')->setWidth(25);
        $activeSheet->getColumnDimension('G')->setWidth(20);
        $activeSheet->getColumnDimension('H')->setWidth(20);
        $activeSheet->getColumnDimension('I')->setWidth(30);

        //header
        $activeSheet->mergeCells('A1:B1');
        $activeSheet->setCellValue('A1', "FORM MONITORING APD");

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
        for($i = 0; $i<6; $i++){
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }

        //body header merge and style
        $activeSheet->mergeCells('G3:H3');
        $activeSheet->mergeCells('I3:I4');

        $activeSheet->getStyle("G3:H3")->applyFromArray($styleArray);
        $activeSheet->getStyle("I3:I4")->applyFromArray($styleArray);
        $activeSheet->getStyle("G4")->applyFromArray($styleArray);
        $activeSheet->getStyle("H4")->applyFromArray($styleArray);

        //body header data
        $activeSheet->setCellValue('A3', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('B3', sprintf("%s APD",AppLabels::NAME) );
        $activeSheet->setCellValue('C3', "Jenis APD");
        $activeSheet->setCellValue('D3', "Merk & Tipe");
        $activeSheet->setCellValue('E3', AppLabels::AMOUNT);
        $activeSheet->setCellValue('F3', sprintf("%s APD", AppLabels::LOCATION));
        $activeSheet->setCellValue('G3', "Status APD");
        $activeSheet->setCellValue('G4', "Jumlah Baik");
        $activeSheet->setCellValue('H4', "Jumlah Rusak");
        $activeSheet->setCellValue('I3', AppLabels::DESCRIPTION);


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
            $activeSheet->setCellValue('B'. $rowIndex, $value->am_name);
            $activeSheet->setCellValue('C'. $rowIndex, $value->am_type_desc);
            $activeSheet->setCellValue('D'. $rowIndex, $value->am_brand_desc);
            $activeSheet->setCellValue('E'. $rowIndex, $value->am_amount);
            $activeSheet->setCellValue('F'. $rowIndex, $value->am_location);
            $activeSheet->setCellValue('G'. $rowIndex, $value->am_good_value);
            $activeSheet->setCellValue('H'. $rowIndex, $value->am_bad_value);
            $activeSheet->setCellValue('I'. $rowIndex, $value->am_ref);

            $activeSheet->getStyle("A". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("B". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("C". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("D". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("E". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("F". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("G". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("H". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("I". $rowIndex)->applyFromArray($styleArray);
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
