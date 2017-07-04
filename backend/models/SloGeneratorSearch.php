<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;

/**
 * SloGeneratorSearch represents the model behind the search form about `backend\models\SloGenerator`.
 */
class SloGeneratorSearch extends SloGenerator
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sg_year', 'id', 'sector_id', 'power_plant_id', 'sg_year'], 'integer'],
            [['generator_unit', 'generator_status','sg_form_month_type_code', 'sg_number', 'sg_published', 'sg_end', 'sg_max_extension', 'sg_publisher'], 'safe'],
            [['power_installed'], 'number'],
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
        $query = SloGenerator::find();

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
            'power_installed' => $this->power_installed,
            'sg_year' => $this->sg_year,
            'sg_operation_year' => $this->sg_operation_year,
            'sg_published' => $this->sg_published,
            'sg_end' => $this->sg_end,
            'sg_max_extension' => $this->sg_max_extension,
        ]);

        $query->andFilterWhere(['like', 'generator_unit', $this->generator_unit])
            ->andFilterWhere(['like', 'generator_status', $this->generator_status])
            ->andFilterWhere(['like', 'sg_form_month_type_code', $this->sg_form_month_type_code])
            ->andFilterWhere(['like', 'sg_number', $this->sg_number])
            ->andFilterWhere(['like', 'sg_publisher', $this->sg_publisher]);

        return $dataProvider;
    }

    public function export() {

        $query = SloGenerator::find()->where(
            [
                'power_plant_id' => $this->power_plant_id,
                'sg_form_month_type_code' => $this->sg_form_month_type_code,
                'sg_year' => $this->sg_year,
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
        $filename = sprintf(AppConstants::REPORT_NAME_SLO_GENERATOR, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::FORM_SLO_GENERATOR);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(1);
        $activeSheet->getColumnDimension('B')->setWidth(5);
        for($i = 2; $i<20; $i++){
            $activeSheet->getColumnDimension($this->toAlphabet($i))->setWidth(50);
        }
        $activeSheet->getColumnDimension('T')->setWidth(80);
        $activeSheet->getColumnDimension('U')->setWidth(60);

        //header
        $activeSheet->mergeCells('B4:O5');
        $activeSheet->setCellValue('B4', "MONITORING SERTIFIKASI LAIK OPERASI (SLO)");
        $activeSheet->mergeCells('U4:U5');
        $activeSheet->setCellValue('U4', sprintf("Periode: %s %s", Codeset::getCodesetValue(AppConstants::CODESET_FORM_MONTH_TYPE_CODE,$this->sg_form_month_type_code) , $this->sg_year));

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
                'startcolor' => ['argb' => 'FFFFC000']
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
        $activeSheet->getStyle('B4:O5')->applyFromArray($styleArray);
        $activeSheet->getStyle('U4:U5')->applyFromArray($styleArray);

        //==========================================================================

        // body header

        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 16,
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
                'startcolor' => ['argb' => 'FF0070C0']
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

        $seven = 7;
        $nine = 9;
        for($i = 1; $i<16; $i++){
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$seven:$alphabet$nine");
            $activeSheet->getStyle("$alphabet$seven:$alphabet$nine")->applyFromArray($styleArray);
        }

        $activeSheet->mergeCells('Q7:S8');
        $activeSheet->mergeCells('T7:T9');
        $activeSheet->mergeCells('U7:U9');
        $activeSheet->getStyle("Q7:S8")->applyFromArray($styleArray);

        $activeSheet->getStyle("Q9")->applyFromArray($styleArray);
        $activeSheet->getStyle("R9")->applyFromArray($styleArray);
        $activeSheet->getStyle("S9")->applyFromArray($styleArray);
        $activeSheet->getStyle("T7:T9")->applyFromArray($styleArray);
        $activeSheet->getStyle("U7:U9")->applyFromArray($styleArray);

        $activeSheet->setCellValue('B7', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('C7', AppLabels::SG_GENERATOR_UNIT);
        $activeSheet->setCellValue('D7', AppLabels::SG_POWER_INSTALLED);
        $activeSheet->setCellValue('E7', sprintf("%s %s", AppLabels::NAME, AppLabels::MACHINE));
        $activeSheet->setCellValue('F7', sprintf("%s %s", AppLabels::CODE, AppLabels::MACHINE));
        $activeSheet->setCellValue('G7', sprintf("%s %s", AppLabels::BRAND, AppLabels::SG_MACHINE));
        $activeSheet->setCellValue('H7', sprintf("%s %s", AppLabels::TYPE, AppLabels::MACHINE));
        $activeSheet->setCellValue('I7', sprintf("%s %s", AppLabels::SERIAL_NUMBER, AppLabels::MACHINE));
        $activeSheet->setCellValue('J7', sprintf("%s %s", AppLabels::BRAND, AppLabels::GENERATOR));
        $activeSheet->setCellValue('K7', sprintf("%s %s", AppLabels::TYPE, AppLabels::GENERATOR));
        $activeSheet->setCellValue('L7', sprintf("%s %s", AppLabels::SERIAL_NUMBER, AppLabels::GENERATOR));
        $activeSheet->setCellValue('M7', sprintf("%s %s", AppLabels::BRAND, AppLabels::SG_BOILER));
        $activeSheet->setCellValue('N7', sprintf("%s %s", AppLabels::YEAR, AppLabels::OPERATION));
        $activeSheet->setCellValue('O7', AppLabels::SG_GENERATOR_STATUS);
        $activeSheet->setCellValue('P7', AppLabels::SG_SLO_NUMBER);
        $activeSheet->setCellValue('Q7', AppLabels::DATE);
        $activeSheet->setCellValue('Q9', AppLabels::PUBLISHED);
        $activeSheet->setCellValue('R9', AppLabels::SG_END);
        $activeSheet->setCellValue('S9', AppLabels::SG_MAX_EXTENSION);
        $activeSheet->setCellValue('T7', AppLabels::PUBLISHER);
        $activeSheet->setCellValue('U7', AppLabels::FILES);

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
                'startcolor' => ['argb' => 'FFFFC000']
            ],

        ];

        $rowIndex = 10;
        foreach($dataProvider->getModels() as $key => $model){
            $activeSheet->setCellValue('B' . $rowIndex, ($key+1));
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $rowIndex, $model->generator_unit);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $rowIndex, $model->power_installed);
            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('E' . $rowIndex, $model->sg_machine_name);
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('F' . $rowIndex, $model->sg_machine_code);
            $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('G' . $rowIndex, $model->sg_machine_brand_desc);
            $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('H' . $rowIndex, $model->sg_machine_type);
            $activeSheet->getStyle('H' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('I' . $rowIndex, $model->sg_machine_serial_number);
            $activeSheet->getStyle('I' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('J' . $rowIndex, $model->sg_generator_brand_desc);
            $activeSheet->getStyle('J' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('K' . $rowIndex, $model->sg_generator_type);
            $activeSheet->getStyle('K' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('L' . $rowIndex, $model->sg_generator_serial_number);
            $activeSheet->getStyle('L' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('M' . $rowIndex, $model->sg_boiler_brand_desc);
            $activeSheet->getStyle('M' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('N' . $rowIndex, $model->sg_operation_year);
            $activeSheet->getStyle('N' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('O' . $rowIndex, $model->generator_status_desc);
            $activeSheet->getStyle('O' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('P' . $rowIndex, $model->sg_number);
            $activeSheet->getStyle('P' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('Q' . $rowIndex, $model->sg_published);
            $activeSheet->getStyle('Q' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('R' . $rowIndex, $model->sg_end);
            $activeSheet->getStyle('R' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('S' . $rowIndex, $model->sg_max_extension);
            $activeSheet->getStyle('S' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('T' . $rowIndex, $model->sg_publisher);
            $activeSheet->getStyle('T' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('U' . $rowIndex)->applyFromArray($styleArray);

            if (!empty($model->attachmentOwners)) {
                foreach (Converter::attachmentsFullPath($model->attachmentOwners) as $key2 => $attachment) {
                    $activeSheet->setCellValue('U' . $rowIndex, $attachment['label']);
                    $activeSheet->getCell('U' . $rowIndex)->getHyperlink()->setUrl($attachment['path']);
                    $activeSheet->getCell('U' . $rowIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                    $activeSheet->getCell('U' . $rowIndex)->getStyle()->getAlignment()->setWrapText(true);

                    if ($key2 > 0) {
                        $activeSheet->mergeCells(sprintf('B%s:T%s', $rowIndex, $rowIndex));
                        $activeSheet->getStyle('B' . $rowIndex . ':U' . $rowIndex)->applyFromArray($styleArray);
                    }

                    $rowIndex++;
                }
            }else{
                $rowIndex++;
            }

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
