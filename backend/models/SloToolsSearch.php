<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;

/**
 * SloToolsSearch represents the model behind the search form about `backend\models\SloTools`.
 */
class SloToolsSearch extends SloTools
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['st_year', 'id', 'sector_id', 'power_plant_id'], 'integer'],
            [['st_form_month_type_code', 'st_generator_unit', 'st_generator_location', 'st_generator_status', 'st_category', 'st_type', 'st_location', 'st_validation_number', 'st_published', 'st_check1', 'st_check2', 'st_next_check', 'st_certificate_publisher'], 'safe'],
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
        $query = SloTools::find();

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
            'st_year' => $this->st_year,
            'st_published' => $this->st_published,
            'st_check1' => $this->st_check1,
            'st_check2' => $this->st_check2,
        ]);

        $query->andFilterWhere(['like', 'st_generator_unit', $this->st_generator_unit])
            ->andFilterWhere(['like', 'st_generator_location', $this->st_generator_location])
            ->andFilterWhere(['like', 'st_generator_status', $this->st_generator_status])
            ->andFilterWhere(['like', 'st_form_month_type_code', $this->st_form_month_type_code])
            ->andFilterWhere(['like', 'st_category', $this->st_category])
            ->andFilterWhere(['like', 'st_type', $this->st_type])
            ->andFilterWhere(['like', 'st_location', $this->st_location])
            ->andFilterWhere(['like', 'st_validation_number', $this->st_validation_number])
            ->andFilterWhere(['like', 'st_next_check', $this->st_next_check])
            ->andFilterWhere(['like', 'st_certificate_publisher', $this->st_certificate_publisher]);

        return $dataProvider;
    }

    public function export() {

        $query = SloTools::find()->where(
            [
                'power_plant_id' => $this->power_plant_id,
                'st_form_month_type_code' => $this->st_form_month_type_code,
                'st_year' => $this->st_year,
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
        $filename = sprintf(AppConstants::REPORT_NAME_SLO_TOOLS, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle('SLO Peralatan');

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(1);
        $activeSheet->getColumnDimension('B')->setWidth(5);
        $activeSheet->getColumnDimension('O')->setWidth(50);
        for($i = 2; $i<14; $i++){
            $activeSheet->getColumnDimension($this->toAlphabet($i))->setWidth(50);
        }

        //header
        $activeSheet->mergeCells('B1:H2');
        $activeSheet->setCellValue('B1', "MONITORING SERTIFIKAS BEJANA BERTEKANAN");
        $activeSheet->mergeCells('O1:O2');
        $activeSheet->setCellValue('O1', sprintf("Periode: %s %s", Codeset::getCodesetValue(AppConstants::CODESET_FORM_MONTH_TYPE_CODE,$this->st_form_month_type_code) , $this->st_year));

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
        $activeSheet->getStyle('B1:H2')->applyFromArray($styleArray);
        $activeSheet->getStyle('O1:O2')->applyFromArray($styleArray);

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

        $no1 = 4;
        $no2 = 6;
        for($i = 1; $i<9; $i++){
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }

        $activeSheet->mergeCells('J4:M4');
        $activeSheet->mergeCells('J5:J6');
        $activeSheet->mergeCells('K5:K6');
        $activeSheet->mergeCells('L5:L6');
        $activeSheet->mergeCells('M5:M6');
        $activeSheet->mergeCells('N4:N6');
        $activeSheet->mergeCells('O4:O6');

        $activeSheet->getStyle("J4:M4")->applyFromArray($styleArray);
        $activeSheet->getStyle("J5:J6")->applyFromArray($styleArray);
        $activeSheet->getStyle("K5:K6")->applyFromArray($styleArray);
        $activeSheet->getStyle("L5:L6")->applyFromArray($styleArray);
        $activeSheet->getStyle("M5:M6")->applyFromArray($styleArray);
        $activeSheet->getStyle("N4:N6")->applyFromArray($styleArray);
        $activeSheet->getStyle("O4:O6")->applyFromArray($styleArray);

        $activeSheet->setCellValue('B4', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('C4', AppLabels::SG_GENERATOR_UNIT);
        $activeSheet->setCellValue('D4', AppLabels::ST_LOCATION);
        $activeSheet->setCellValue('E4', AppLabels::SG_GENERATOR_STATUS);
        $activeSheet->setCellValue('F4', AppLabels::ST_CATEGORY);
        $activeSheet->setCellValue('G4', AppLabels::ST_TYPE);
        $activeSheet->setCellValue('H4', AppLabels::LOCATION);
        $activeSheet->setCellValue('I4', AppLabels::ST_VALIDATION);
        $activeSheet->setCellValue('J4', AppLabels::DATE);
        $activeSheet->setCellValue('J5', AppLabels::PUBLISHED);
        $activeSheet->setCellValue('K5', AppLabels::ST_CHECK1);
        $activeSheet->setCellValue('L5', AppLabels::ST_CHECK2);
        $activeSheet->setCellValue('M5', AppLabels::ST_NEXT_CHECK);
        $activeSheet->setCellValue('N4', AppLabels::ST_CERTIFICATE_PUBLISHER);
        $activeSheet->setCellValue('O4', AppLabels::FILES);

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

        $rowIndex = 7;
        foreach($dataProvider->getModels() as $key => $model){
            $activeSheet->setCellValue('B' . $rowIndex, ($key+1));
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $rowIndex, $model->st_generator_unit);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $rowIndex, $model->st_generator_location);
            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('E' . $rowIndex, $model->st_generator_status_code_desc);
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('F' . $rowIndex, $model->st_category_desc);
            $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('G' . $rowIndex, $model->st_type);
            $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('H' . $rowIndex, $model->st_location);
            $activeSheet->getStyle('H' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('I' . $rowIndex, $model->st_validation_number);
            $activeSheet->getStyle('I' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('J' . $rowIndex, $model->st_published);
            $activeSheet->getStyle('J' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('K' . $rowIndex, $model->st_check1);
            $activeSheet->getStyle('K' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('L' . $rowIndex, $model->st_check2);
            $activeSheet->getStyle('L' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('M' . $rowIndex, $model->st_next_check_desc);
            $activeSheet->getStyle('M' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('N' . $rowIndex, $model->st_certificate_publisher);
            $activeSheet->getStyle('N' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('O' . $rowIndex)->applyFromArray($styleArray);


            if (!empty($model->attachmentOwners)) {
                foreach (Converter::attachmentsFullPath($model->attachmentOwners) as $key2 => $attachment) {
                    $activeSheet->setCellValue('O' . $rowIndex, $attachment['label']);
                    $activeSheet->getCell('O' . $rowIndex)->getHyperlink()->setUrl($attachment['path']);
                    $activeSheet->getCell('O' . $rowIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                    $activeSheet->getCell('O' . $rowIndex)->getStyle()->getAlignment()->setWrapText(true);

                    if ($key2 > 0) {
                        $activeSheet->mergeCells(sprintf('B%s:N%s', $rowIndex, $rowIndex));
                        $activeSheet->getStyle('B' . $rowIndex . ':O' . $rowIndex)->applyFromArray($styleArray);
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
