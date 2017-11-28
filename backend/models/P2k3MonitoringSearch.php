<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;


/**
 * P2k3MonitoringSearch represents the model behind the search form about `backend\models\P2k3Monitoring`.
 */
class P2k3MonitoringSearch extends P2k3Monitoring
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'pm_year'], 'integer'],
            [['pm_form_month_type_code'], 'safe'],
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
        $query = P2k3Monitoring::find();

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
            'pm_year' => $this->pm_year,
        ]);

        $query->andFilterWhere(['like', 'pm_form_month_type_code', $this->pm_form_month_type_code]);

        return $dataProvider;
    }

    public function export($id) {

        $query = \backend\models\P2k3Monitoring::find()->where(['id' => $id]);

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
        $filename = sprintf(AppConstants::REPORT_NAME_P2K3_MONITORING, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::FORM_P2K3_MONITORING);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(30);
        $activeSheet->getColumnDimension('C')->setWidth(30);
        $activeSheet->getColumnDimension('D')->setWidth(20);
        $activeSheet->getColumnDimension('E')->setWidth(30);


        //header
        $activeSheet->mergeCells('A2:B2');
        $activeSheet->setCellValue('A2', "MONITORING P2K3");
        $activeSheet->mergeCells('A4:B4');
        $activeSheet->setCellValue('A4', sprintf("Periode Monitoring: %s %s", Codeset::getCodesetValue(AppConstants::CODESET_FORM_MONTH_TYPE_CODE,$model->pm_form_month_type_code) , $model->pm_year));

        //header style
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
        $activeSheet->getStyle("A5")->applyFromArray($styleArray);
        $activeSheet->getStyle("B5")->applyFromArray($styleArray);
        $activeSheet->getStyle("C5")->applyFromArray($styleArray);
        $activeSheet->getStyle("D5")->applyFromArray($styleArray);
        $activeSheet->getStyle("E5")->applyFromArray($styleArray);

        $activeSheet->setCellValue('A5', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('B5', AppLabels::FINDING);
        $activeSheet->setCellValue('C5', AppLabels::ACTION);
        $activeSheet->setCellValue('D5', "Deadline Penyelesaian");
        $activeSheet->setCellValue('E5', AppLabels::STATUS);
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

        $percentage = 0;
        $finding = 0;
        $rowIndex = 6;
        foreach($model->p2k3MonitoringDetails as $key => $value){
            $activeSheet->setCellValue('A' . $rowIndex, ($key+1));
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('B' . $rowIndex, $value->pmd_finding);
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $rowIndex, $value->pmd_action);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $rowIndex, $value->pmd_deadline);
            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('E' . $rowIndex, $value->pmd_status_desc);
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);

            if($value->pmd_status == "PS3"){
                $percentage++;
            }

            $finding++;

            $rowIndex++;
        }
        $rowIndex++;

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

        $activeSheet->mergeCells("A" . $rowIndex . ":B" . $rowIndex);
        $activeSheet->setCellValue('A' . $rowIndex, "Progres Penyelesaian");
        $activeSheet->getStyle("A" . $rowIndex . ":B" . $rowIndex)->applyFromArray($styleArray);

        $activeSheet->setCellValue('C' . $rowIndex, sprintf("%s%%",$percentage / $finding * 100));
        $activeSheet->getStyle("C" . $rowIndex)->applyFromArray($styleArray);

        //extra footer

        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }
}
