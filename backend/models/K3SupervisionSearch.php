<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;


/**
 * K3SupervisionSearch represents the model behind the search form about `backend\models\K3Supervision`.
 */
class K3SupervisionSearch extends K3Supervision
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id'], 'integer'],
            [['ks_name', 'ks_permission_number', 'ks_operator', 'ks_duration_time', 'ks_start_date', 'ks_end_date', 'ks_contr_number', 'ks_fo_name', 'ks_fo_phone', 'ks_supervisor', 'ks_sheet_creator'], 'safe'],
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
        $query = K3Supervision::find();

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
            'ks_start_date' => $this->ks_start_date,
            'ks_end_date' => $this->ks_end_date,
        ]);

        $query->andFilterWhere(['like', 'ks_name', $this->ks_name])
            ->andFilterWhere(['like', 'ks_permission_number', $this->ks_permission_number])
            ->andFilterWhere(['like', 'ks_operator', $this->ks_operator])
            ->andFilterWhere(['like', 'ks_duration_time', $this->ks_duration_time])
            ->andFilterWhere(['like', 'ks_contr_number', $this->ks_contr_number])
            ->andFilterWhere(['like', 'ks_fo_name', $this->ks_fo_name])
            ->andFilterWhere(['like', 'ks_fo_phone', $this->ks_fo_phone])
            ->andFilterWhere(['like', 'ks_supervisor', $this->ks_supervisor])
            ->andFilterWhere(['like', 'ks_sheet_creator', $this->ks_sheet_creator]);

        return $dataProvider;
    }

    public function export($id) {

        $query = \backend\models\K3Supervision::find()->where(['id' => $id]);

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
        $filename = sprintf(AppConstants::REPORT_NAME_K3_SUPERVISION, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::FORM_K3_SUPERVISION);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(5);
        $activeSheet->getColumnDimension('C')->setWidth(20);
        $activeSheet->getColumnDimension('D')->setWidth(25);
        $activeSheet->getColumnDimension('E')->setWidth(30);
        $activeSheet->getColumnDimension('F')->setWidth(20);
        $activeSheet->getColumnDimension('G')->setWidth(50);


        //header
        $activeSheet->mergeCells('B2:G2');
        $activeSheet->setCellValue('B2', "LAPORAN PENGAWASAN K3");

        //header style
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 14,
                'color' => [
                    'argb' => \PHPExcel_Style_Color::COLOR_WHITE
                ]
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
        $activeSheet->getStyle('B2:G2')->applyFromArray($styleArray);

        //==========================================================================

        // body header

        $styleArray = [
            'font' => [
                'bold' => true,
                'color' => [
                    'argb' => \PHPExcel_Style_Color::COLOR_WHITE
                ]
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

        //body header merge and style
        $activeSheet->mergeCells('B4:E4');
        $activeSheet->mergeCells('F4:G4');

        $activeSheet->mergeCells('B6:E6');
        $activeSheet->mergeCells('F6:G6');

        $activeSheet->mergeCells('B8:E8');

        $activeSheet->mergeCells('B10:E10');
        $activeSheet->mergeCells('F10:G10');

        $activeSheet->getStyle("B4:E4")->applyFromArray($styleArray);
        $activeSheet->getStyle("F4:G4")->applyFromArray($styleArray);
        $activeSheet->getStyle("B6:E6")->applyFromArray($styleArray);
        $activeSheet->getStyle("F6:G6")->applyFromArray($styleArray);
        $activeSheet->getStyle("B8:E8")->applyFromArray($styleArray);
        $activeSheet->getStyle("B10:E10")->applyFromArray($styleArray);
        $activeSheet->getStyle("F10:G10")->applyFromArray($styleArray);

        $styleArray = [
            'font' => [
                'bold' => true,
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


        $activeSheet->getStyle("B14")->applyFromArray($styleArray);
        $activeSheet->getStyle("C14")->applyFromArray($styleArray);
        $activeSheet->getStyle("D14")->applyFromArray($styleArray);
        $activeSheet->getStyle("E14")->applyFromArray($styleArray);
        $activeSheet->getStyle("F14")->applyFromArray($styleArray);
        $activeSheet->getStyle("G14")->applyFromArray($styleArray);

        //body header data
        $activeSheet->mergeCells('B5:E5');
        $activeSheet->mergeCells('F5:G5');

        $activeSheet->mergeCells('B7:E7');
        $activeSheet->mergeCells('F7:G7');

        $activeSheet->mergeCells('B9:E9');

        $activeSheet->mergeCells('B11:C11');
        $activeSheet->mergeCells('B12:C12');
        $activeSheet->mergeCells('D11:E11');
        $activeSheet->mergeCells('D12:E12');
        $activeSheet->mergeCells('F11:G12');

        $activeSheet->setCellValue('B4', AppLabels::WORK_NAME);
        $activeSheet->setCellValue('F4', "Nomor Izin Kerja");
        $activeSheet->setCellValue('B6', "Pelaksana Pekerjaan");
        $activeSheet->setCellValue('F6', "Durasi Pekerjaan");
        $activeSheet->setCellValue('B8', "Nomor Kontrak");
        $activeSheet->setCellValue('B10', "Pengawas Lapangan Kontraktor/ No. Telepon");
        $activeSheet->setCellValue('F10', "Pengawas K3");
        $activeSheet->setCellValue('F8', "Mulai");
        $activeSheet->setCellValue('F9', "Selesai");
        $activeSheet->setCellValue('G7', "hari");
        $activeSheet->setCellValue('B11', "Nama");
        $activeSheet->setCellValue('B12', "No. Telepon");

        $activeSheet->setCellValue('B14', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('C14', AppLabels::DATE);
        $activeSheet->setCellValue('D14', AppLabels::FINDING);
        $activeSheet->setCellValue('E14', "Tindakan Pengawas K3");
        $activeSheet->setCellValue('F14', AppLabels::RESPONSE);
        $activeSheet->setCellValue('G14', sprintf("%s %s", AppLabels::INFORMATION, AppLabels::FINDING));

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

        $model = $dataProvider->getModels()[0];

        $activeSheet->setCellValue('B5', $model->ks_name);
        $activeSheet->setCellValue('F5', $model->ks_permission_number);
        $activeSheet->setCellValue('B7', $model->ks_operator);
        $activeSheet->setCellValue('F7', $model->ks_duration_time);
        $activeSheet->setCellValue('B9', $model->ks_contr_number);
        $activeSheet->setCellValue('G8', $model->ks_start_date);
        $activeSheet->setCellValue('G9', $model->ks_end_date);
        $activeSheet->setCellValue('D11', $model->ks_fo_name);
        $activeSheet->setCellValue('D12', $model->ks_fo_phone);
        $activeSheet->setCellValue('F11', $model->ks_supervisor);

        $rowIndex = 15;
        foreach($model->k3SupervisionDetails as $key => $value){
            $activeSheet->setCellValue('B' . $rowIndex, ($key+1));
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $rowIndex, $value->ksd_date);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $rowIndex, $value->ksd_finding);
            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('E' . $rowIndex, $value->ksd_officer_action);
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('F' . $rowIndex, $value->ksd_response);
            $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('G' . $rowIndex, $value->ksd_finding_desc);
            $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArray);


            $rowIndex++;
        }
        $rowIndex++;

        $styleArray = [
            'font' => [
                'bold' => true,
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

        $activeSheet->setCellValue('G' . $rowIndex, "Pengawas K3");
        $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArray);

        $styleArray = [
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                    ]
                ]
            ]
        ];

        $activeSheet->getStyle('G' . $rowIndex . ':G' . ($rowIndex+4))->applyFromArray($styleArray);

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

        $rowIndex = $rowIndex+4;

        $activeSheet->setCellValue('G' . $rowIndex, $model->ks_sheet_creator);
        $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArray);

        //extra footer

        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }
}
