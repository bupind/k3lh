<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;


/**
 * SprinkleMonitoringSearch represents the model behind the search form about `backend\models\SprinkleMonitoring`.
 */
class SprinkleMonitoringSearch extends SprinkleMonitoring
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'sm_year'], 'integer'],
            [['sm_form_month_type_code'], 'safe'],
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
        $query = SprinkleMonitoring::find();

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
            'sm_year' => $this->sm_year,
        ]);

        $query->andFilterWhere(['like', 'sm_form_month_type_code', $this->sm_form_month_type_code]);

        return $dataProvider;
    }

    public function export($id) {

        $query = \backend\models\SprinkleMonitoring::find()->where(['id' => $id]);

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
        $filename = sprintf(AppConstants::REPORT_NAME_SPRINKLE_MONITORING, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);

        $model = $dataProvider->getModels()[0];

        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::FORM_SPRINKLE_MONITORING);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(1);
        $activeSheet->getColumnDimension('B')->setWidth(20);
        $activeSheet->getColumnDimension('C')->setWidth(35);
        $activeSheet->getColumnDimension('D')->setWidth(25);
        $activeSheet->getColumnDimension('E')->setWidth(25);
        $activeSheet->getColumnDimension('F')->setWidth(25);
        $activeSheet->getColumnDimension('G')->setWidth(40);

        //header
        $activeSheet->mergeCells('B5:F6');
        $activeSheet->setCellValue('B5', "MONITORING FIRE SPRINKLE");
        $activeSheet->mergeCells('G5:G6');
        $activeSheet->setCellValue('G5', sprintf("Periode: %s %s", Codeset::getCodesetValue(AppConstants::CODESET_FORM_MONTH_TYPE_CODE,$model->sm_form_month_type_code) , $model->sm_year));

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
                'startcolor' => ['argb' => 'FFC00000']
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
        $activeSheet->getStyle('B5:F6')->applyFromArray($styleArray);
        $activeSheet->getStyle('G5:G6')->applyFromArray($styleArray);

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

        //body header merge and style
        $activeSheet->mergeCells('B8:B10');
        $activeSheet->mergeCells('C8:C10');
        $activeSheet->mergeCells('G8:G10');
        $activeSheet->mergeCells('D8:F8');
        $activeSheet->mergeCells('D9:D10');
        $activeSheet->mergeCells('E9:E10');
        $activeSheet->mergeCells('F9:F10');

        $activeSheet->getStyle("B8:B10")->applyFromArray($styleArray);
        $activeSheet->getStyle("C8:C10")->applyFromArray($styleArray);
        $activeSheet->getStyle("G8:G10")->applyFromArray($styleArray);
        $activeSheet->getStyle("D8:F8")->applyFromArray($styleArray);
        $activeSheet->getStyle("D9:D10")->applyFromArray($styleArray);
        $activeSheet->getStyle("E9:E10")->applyFromArray($styleArray);
        $activeSheet->getStyle("F9:F10")->applyFromArray($styleArray);

        //body header data
        $activeSheet->setCellValue('B8', "Head Sprinkle No.");
        $activeSheet->setCellValue('C8', AppLabels::LOCATION);
        $activeSheet->setCellValue('D8', "Pengecekan Visual");
        $activeSheet->setCellValue('D9', "Head Sprinkle");
        $activeSheet->setCellValue('E9', "Fisik Detektor");
        $activeSheet->setCellValue('F9', "Kondisi Piping");
        $activeSheet->setCellValue('G8', "Catatan Hasil Pengecekan");


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
        $modelDetail = $model->sprinkleMonitoringDetails;
        foreach($modelDetail as $key => $value){
            $activeSheet->setCellValue('B'. $rowIndex, ($key+1));
            $activeSheet->setCellValue('C'. $rowIndex, $value->sm_location);
            $activeSheet->setCellValue('D'. $rowIndex, $value->sm_sprinkle_head_desc);
            $activeSheet->setCellValue('E'. $rowIndex, $value->sm_detector_desc);
            $activeSheet->setCellValue('F'. $rowIndex, $value->sm_piping_condition_desc);
            $activeSheet->setCellValue('G'. $rowIndex, $value->sm_notes);

            $activeSheet->getStyle("B". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("C". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("D". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("E". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("F". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("G". $rowIndex)->applyFromArray($styleArray);
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
