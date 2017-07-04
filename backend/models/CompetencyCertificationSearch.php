<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;

/**
 * CompetencyCertificationSearch represents the model behind the search form about `backend\models\CompetencyCertification`.
 */
class CompetencyCertificationSearch extends CompetencyCertification
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id'], 'integer'],
            [['cc_name', 'cc_position', 'cc_type', 'cc_number', 'cc_date', 'cc_certificate_publisher', 'cc_pjk3'], 'safe'],
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
        $query = CompetencyCertification::find();

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
            'cc_date' => $this->cc_date,
        ]);

        $query->andFilterWhere(['like', 'cc_name', $this->cc_name])
            ->andFilterWhere(['like', 'cc_position', $this->cc_position])
            ->andFilterWhere(['like', 'cc_type', $this->cc_type])
            ->andFilterWhere(['like', 'cc_number', $this->cc_number])
            ->andFilterWhere(['like', 'cc_certificate_publisher', $this->cc_certificate_publisher])
            ->andFilterWhere(['like', 'cc_pjk3', $this->cc_pjk3]);

        return $dataProvider;
    }

    public function export() {

        $query = CompetencyCertification::find()->where([
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
        $filename = sprintf(AppConstants::REPORT_NAME_CC, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::FORM_COMPETENCY_CERTIFICATION);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(1);
        $activeSheet->getColumnDimension('B')->setWidth(5);
        for($i = 2; $i<6; $i++){
            $activeSheet->getColumnDimension($this->toAlphabet($i))->setWidth(50);
        }
        $activeSheet->getColumnDimension('G')->setWidth(40);
        $activeSheet->getColumnDimension('H')->setWidth(40);
        $activeSheet->getColumnDimension('I')->setWidth(50);
        $activeSheet->getColumnDimension('J')->setWidth(50);
        $activeSheet->getColumnDimension('K')->setWidth(50);

        //header
        $activeSheet->mergeCells('B4:C5');
        $activeSheet->setCellValue('B4', "MONITORING SERTIFIKASI KOMPETENSI K3");

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
        $activeSheet->getStyle('B4:C5')->applyFromArray($styleArray);

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

        $no1 = 7;
        $no2 = 9;
        for($i = 1; $i<6; $i++){
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }

        //body header merge and style
        $activeSheet->mergeCells('G7:H8');

        $activeSheet->getStyle("G7:H8")->applyFromArray($styleArray);
        $activeSheet->getStyle("G9")->applyFromArray($styleArray);
        $activeSheet->getStyle("H9")->applyFromArray($styleArray);

        $activeSheet->mergeCells('I7:I9');
        $activeSheet->mergeCells('J7:J9');
        $activeSheet->mergeCells('K7:K9');

        $activeSheet->getStyle("I7:I9")->applyFromArray($styleArray);
        $activeSheet->getStyle("J7:J9")->applyFromArray($styleArray);
        $activeSheet->getStyle("K7:K9")->applyFromArray($styleArray);

        //body header data
        $activeSheet->setCellValue('B7', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('C7', AppLabels::NAME);
        $activeSheet->setCellValue('D7', AppLabels::CC_POSITION);
        $activeSheet->setCellValue('E7', AppLabels::SECTOR);
        $activeSheet->setCellValue('F7', AppLabels::CC_TYPE);
        $activeSheet->setCellValue('G7', AppLabels::CERTIFICATION);
        $activeSheet->setCellValue('G9', AppLabels::NUMBER);
        $activeSheet->setCellValue('H9', AppLabels::DATE);
        $activeSheet->setCellValue('I7', AppLabels::CC_CERTIFICATE_PUBLISHER);
        $activeSheet->setCellValue('J7', AppLabels::PJK3);
        $activeSheet->setCellValue('K7', AppLabels::FILES);

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

        $rowIndex = 10;
        foreach($dataProvider->getModels() as $key => $model){
            $activeSheet->setCellValue('B' . $rowIndex, ($key+1));
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $rowIndex, $model->cc_name);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $rowIndex, $model->cc_position);
            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('E' . $rowIndex, $model->sector->sector_name);
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('F' . $rowIndex, $model->cc_type);
            $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('G' . $rowIndex, $model->cc_number);
            $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('H' . $rowIndex, $model->cc_date);
            $activeSheet->getStyle('H' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('I' . $rowIndex, $model->cc_certificate_publisher);
            $activeSheet->getStyle('I' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('J' . $rowIndex, $model->cc_pjk3);
            $activeSheet->getStyle('J' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle('K' . $rowIndex)->applyFromArray($styleArray);

            if (!empty($model->attachmentOwners)) {
                foreach (Converter::attachmentsFullPath($model->attachmentOwners) as $key2 => $attachment) {
                    $activeSheet->setCellValue('K' . $rowIndex, $attachment['label']);
                    $activeSheet->getCell('K' . $rowIndex)->getHyperlink()->setUrl($attachment['path']);
                    $activeSheet->getCell('K' . $rowIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                    $activeSheet->getCell('K' . $rowIndex)->getStyle()->getAlignment()->setWrapText(true);

                    if ($key2 > 0) {
                        $activeSheet->mergeCells(sprintf('B%s:J%s', $rowIndex, $rowIndex));
                        $activeSheet->getStyle('B' . $rowIndex . ':K' . $rowIndex)->applyFromArray($styleArray);
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
