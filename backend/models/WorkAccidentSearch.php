<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * WorkAccidentSearch represents the model behind the search form about `backend\models\WorkAccident`.
 */
class WorkAccidentSearch extends WorkAccident
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'wa_year'], 'integer'],
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
        $query = WorkAccident::find();

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
            'wa_year' => $this->wa_year,
        ]);

        return $dataProvider;
    }

    public function export($id) {

        $query = \backend\models\WorkAccident::find()->where(['id' => $id]);

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
        $filename = sprintf(AppConstants::REPORT_NAME_WORK_ACCIDENT, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);

        $model = $dataProvider->getModels()[0];

        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::FORM_WORK_ACCIDENT);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(25);
        $activeSheet->getColumnDimension('C')->setWidth(35);
        $activeSheet->getColumnDimension('D')->setWidth(30);
        $activeSheet->getColumnDimension('E')->setWidth(20);
        $activeSheet->getColumnDimension('F')->setWidth(30);
        $activeSheet->getColumnDimension('G')->setWidth(30);
        $activeSheet->getColumnDimension('H')->setWidth(30);
        $activeSheet->getColumnDimension('I')->setWidth(30);
        $activeSheet->getColumnDimension('J')->setWidth(30);
        $activeSheet->getColumnDimension('K')->setWidth(30);
        $activeSheet->getColumnDimension('L')->setWidth(30);
        $activeSheet->getColumnDimension('M')->setWidth(30);
        $activeSheet->getColumnDimension('N')->setWidth(30);
        $activeSheet->getColumnDimension('O')->setWidth(30);

        //header
        $activeSheet->mergeCells('A3:O4');
        $activeSheet->setCellValue('A3', "ACCIDENT RECORD" . $model->wa_year);

        //header style
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
        $activeSheet->getStyle('A3:O4')->applyFromArray($styleArray);

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
        $activeSheet->mergeCells('B6:H6');
        $activeSheet->mergeCells('A6:A8');
        $activeSheet->mergeCells('B7:B8');
        $activeSheet->mergeCells('C7:C8');
        $activeSheet->mergeCells('D7:D8');
        $activeSheet->mergeCells('E7:F7');
        $activeSheet->mergeCells('G7:H7');
        $activeSheet->mergeCells('I6:I8');
        $activeSheet->mergeCells('J6:N6');
        $activeSheet->mergeCells('J7:J8');
        $activeSheet->mergeCells('K7:K8');
        $activeSheet->mergeCells('L7:N7');
        $activeSheet->mergeCells('O6:O8');

        $activeSheet->getStyle('B6:H6')->applyFromArray($styleArray);
        $activeSheet->getStyle('A6:H8')->applyFromArray($styleArray);
        $activeSheet->getStyle('B7:B8')->applyFromArray($styleArray);
        $activeSheet->getStyle('C7:C8')->applyFromArray($styleArray);
        $activeSheet->getStyle('D7:D8')->applyFromArray($styleArray);
        $activeSheet->getStyle('E7:F7')->applyFromArray($styleArray);
        $activeSheet->getStyle('G7:H7')->applyFromArray($styleArray);
        $activeSheet->getStyle('I6:I8')->applyFromArray($styleArray);
        $activeSheet->getStyle('J6:N6')->applyFromArray($styleArray);
        $activeSheet->getStyle('J7:J8')->applyFromArray($styleArray);
        $activeSheet->getStyle('K7:K8')->applyFromArray($styleArray);
        $activeSheet->getStyle('L7:N7')->applyFromArray($styleArray);
        $activeSheet->getStyle('O6:O8')->applyFromArray($styleArray);
        $activeSheet->getStyle('L8')->applyFromArray($styleArray);
        $activeSheet->getStyle('M8')->applyFromArray($styleArray);
        $activeSheet->getStyle('N8')->applyFromArray($styleArray);

        //body header data
        $activeSheet->setCellValue('A6', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('B6', "Accident/ Nearmiss");
        $activeSheet->setCellValue('B7', sprintf("%s %s", AppLabels::DATE, AppLabels::EVENT));
        $activeSheet->setCellValue('C7', AppLabels::EVENT);
        $activeSheet->setCellValue('D7', "Jenis Kecelakaan");
        $activeSheet->setCellValue('E7', AppLabels::LOCATION);
        $activeSheet->setCellValue('G7', "Kerugian/ Dampak");
        $activeSheet->setCellValue('E8', AppLabels::WORK_AREA);
        $activeSheet->setCellValue('F8', AppLabels::ADDRESS);
        $activeSheet->setCellValue('G8', AppLabels::COMPANY);
        $activeSheet->setCellValue('H8', "INDIVIDU");
        $activeSheet->setCellValue('I6', "Kronologis Kejadian");
        $activeSheet->setCellValue('J6', "Investigasi Kecelakaan");
        $activeSheet->setCellValue('J7', AppLabels::DATE);
        $activeSheet->setCellValue('K7', "Tim Investigasi");
        $activeSheet->setCellValue('L7', "Fakta di Lapangan Saat Investigasi");
        $activeSheet->setCellValue('L8', "Penerapan K3");
        $activeSheet->setCellValue('M8', "Unsafe Condition");
        $activeSheet->setCellValue('N8', "Unsafe Act");
        $activeSheet->setCellValue('O6', "Kesimpulan Investigasi");


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

        $kecelakaanKerja = 0;
        $kecelakaanInstalasi = 0;
        $kecelakaanUmum = 0;
        $nearmiss = 0;

        $rowIndex = 9;
        $modelDetail = $model->workAccidentDetails;
        foreach($modelDetail as $key => $value){

            if($value->wad_type == 'WWAT1'){
                $kecelakaanKerja++;
            }else if($value->wad_type == 'WWAT2'){
                $kecelakaanInstalasi++;
            }else if($value->wad_type == 'WWAT3'){
                $kecelakaanUmum++;
            }else if($value->wad_type == 'WWAT4'){
                $nearmiss++;
            }

            $activeSheet->setCellValue('A'. $rowIndex, ($key+1));
            $activeSheet->setCellValue('B'. $rowIndex, $value->wad_date);
            $activeSheet->setCellValue('C'. $rowIndex, $value->wad_event);
            $activeSheet->setCellValue('D'. $rowIndex, $value->wad_type_desc);
            $activeSheet->setCellValue('E'. $rowIndex, $value->wad_work_area);
            $activeSheet->setCellValue('F'. $rowIndex, $value->wad_address);
            $activeSheet->setCellValue('G'. $rowIndex, $value->wad_impact_corp);
            $activeSheet->setCellValue('H'. $rowIndex, $value->wad_impact_indi);
            $activeSheet->setCellValue('I'. $rowIndex, $value->wad_chronology);
            $activeSheet->setCellValue('J'. $rowIndex, $value->wad_inv_date);
            $activeSheet->setCellValue('K'. $rowIndex, $value->wad_inv_team);
            $activeSheet->setCellValue('L'. $rowIndex, $value->wad_inv_k3_action);
            $activeSheet->setCellValue('M'. $rowIndex, $value->wad_inv_uns_condition);
            $activeSheet->setCellValue('N'. $rowIndex, $value->wad_inv_uns_action);
            $activeSheet->setCellValue('O'. $rowIndex, $value->wad_result);

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

        $rowIndex++;
        $activeSheet->mergeCells('B' . $rowIndex . ':B' . ($rowIndex+4));
        $activeSheet->setCellValue('B'. $rowIndex, "Resume");
        $activeSheet->getStyle('B' . $rowIndex . ':B' . ($rowIndex+4))->applyFromArray($styleArray);

        $activeSheet->setCellValue('C'. $rowIndex, "Accident");
        $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);

        $activeSheet->setCellValue('D'. $rowIndex, AppLabels::AMOUNT);
        $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);

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

        $rowIndex++;
        $activeSheet->setCellValue('C'. $rowIndex, "Kecelakaan Kerja");
        $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
        $activeSheet->setCellValue('D'. $rowIndex, $kecelakaanKerja);
        $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);

        $rowIndex++;
        $activeSheet->setCellValue('C'. $rowIndex, "Kecelakaan Instalasi");
        $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
        $activeSheet->setCellValue('D'. $rowIndex, $kecelakaanInstalasi);
        $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);

        $rowIndex++;
        $activeSheet->setCellValue('C'. $rowIndex, "Kecelakaan Masyarakat Umum");
        $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
        $activeSheet->setCellValue('D'. $rowIndex, $kecelakaanUmum);
        $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);

        $rowIndex++;
        $activeSheet->setCellValue('C'. $rowIndex, "Nearmiss");
        $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
        $activeSheet->setCellValue('D'. $rowIndex, $nearmiss);
        $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);

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
