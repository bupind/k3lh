<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * P3kMonitoringSearch represents the model behind the search form about `backend\models\P3kMonitoring`.
 */
class P3kMonitoringSearch extends P3kMonitoring
{
    public $filename;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id'], 'integer'],
            [['pm_number', 'pm_location'], 'safe'],
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
        $query = P3kMonitoring::find();

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

        $query->andFilterWhere(['like', 'pm_number', $this->pm_number])
            ->andFilterWhere(['like', 'pm_location', $this->pm_location]);

        return $dataProvider;
    }

    public function export($id)
    {

        $query = \backend\models\P3kMonitoring::find()->where(['id' => $id]);

        // add conditions that should always apply here

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
        $filename = sprintf(AppConstants::REPORT_NAME_P3K_MONITORING, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::FORM_P3K_MONITORING);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(20);
        $activeSheet->getColumnDimension('C')->setWidth(15);
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
        $activeSheet->getColumnDimension('P')->setWidth(40);


        //header
        $activeSheet->mergeCells('A1:B1');
        $activeSheet->setCellValue('A1', "Form Monitoring P3K");

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
        $activeSheet->getStyle('A1:B1')->applyFromArray($styleArray);

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

        $no1 = 4;
        $no2 = 5;
        for ($i = 0; $i < 3; $i++) {
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }

        //body header merge and style
        $activeSheet->mergeCells('D4:O4');
        $activeSheet->mergeCells('P4:P5');
        $activeSheet->mergeCells('A2:B2');
        $activeSheet->mergeCells('A3:B3');

        $activeSheet->getStyle("D4:O4")->applyFromArray($styleArray);
        $activeSheet->getStyle("P4:P5")->applyFromArray($styleArray);
        $activeSheet->getStyle("D5")->applyFromArray($styleArray);
        $activeSheet->getStyle("E5")->applyFromArray($styleArray);
        $activeSheet->getStyle("F5")->applyFromArray($styleArray);
        $activeSheet->getStyle("G5")->applyFromArray($styleArray);
        $activeSheet->getStyle("H5")->applyFromArray($styleArray);
        $activeSheet->getStyle("I5")->applyFromArray($styleArray);
        $activeSheet->getStyle("J5")->applyFromArray($styleArray);
        $activeSheet->getStyle("K5")->applyFromArray($styleArray);
        $activeSheet->getStyle("L5")->applyFromArray($styleArray);
        $activeSheet->getStyle("M5")->applyFromArray($styleArray);
        $activeSheet->getStyle("N5")->applyFromArray($styleArray);
        $activeSheet->getStyle("O5")->applyFromArray($styleArray);

        $activeSheet->setCellValue('A2', "No. Kotak");
        $activeSheet->setCellValue('A3', AppLabels::LOCATION);
        $activeSheet->setCellValue('C2', sprintf(": %s", $model->pm_number));
        $activeSheet->setCellValue('C3', sprintf(": %s", $model->pm_location));


        $activeSheet->setCellValue('A4', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('B4', "Isi Kotak P3K");
        $activeSheet->setCellValue('C4', "Jumlah Standar");
        $activeSheet->setCellValue('D4', "Jumlah Isi Kotak P3K");
        $activeSheet->setCellValue('P4', AppLabels::DESCRIPTION);

        $activeSheet->setCellValue('D5', AppLabels::SHORT_JANUARY);
        $activeSheet->setCellValue('E5', AppLabels::SHORT_FEBRUARY);
        $activeSheet->setCellValue('F5', AppLabels::SHORT_MARCH);
        $activeSheet->setCellValue('G5', AppLabels::SHORT_APRIL);
        $activeSheet->setCellValue('H5', AppLabels::SHORT_MAY);
        $activeSheet->setCellValue('I5', AppLabels::SHORT_JUNE);
        $activeSheet->setCellValue('J5', AppLabels::SHORT_JULY);
        $activeSheet->setCellValue('K5', AppLabels::SHORT_AUGUST);
        $activeSheet->setCellValue('L5', AppLabels::SHORT_SEPTEMBER);
        $activeSheet->setCellValue('M5', AppLabels::SHORT_OCTOBER);
        $activeSheet->setCellValue('N5', AppLabels::SHORT_NOVEMBER);
        $activeSheet->setCellValue('O5', AppLabels::SHORT_DECEMBER);


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
        foreach ($model->p3kMonitoringDetails as $key => $value) {
            $activeSheet->setCellValue('A' . $rowIndex, ($key + 1));
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('B' . $rowIndex, $value->pmd_value);
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $rowIndex, $value->pmd_standard_amount);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('P' . $rowIndex, $value->pmd_ref);
            $activeSheet->getStyle('P' . $rowIndex)->applyFromArray($styleArray);
            $first = 3;
            foreach ($value->pmdMonths as $key2 => $month) {
                $alphabet = $this->toAlphabet($first);
                $activeSheet->setCellValue("$alphabet$rowIndex", $month->pmdm_value);
                $activeSheet->getStyle("$alphabet$rowIndex")->applyFromArray($styleArray);
                $first++;
            }

            $rowIndex++;
        }

        //extra footer

        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }
}
