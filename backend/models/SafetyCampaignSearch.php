<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;
/**
 * SafetyCampaignSearch represents the model behind the search form about `backend\models\SafetyCampaign`.
 */
class SafetyCampaignSearch extends SafetyCampaign
{
    public $filename;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'sc_amount'], 'integer'],
            [['sc_campaign_name', 'sc_description', 'sc_date', 'sc_location', 'sc_campaigner', 'sc_part', 'sc_result'], 'safe'],
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
        $query = SafetyCampaign::find();

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
            'sc_date' => $this->sc_date,
            'sc_amount' => $this->sc_amount,
        ]);

        $query->andFilterWhere(['like', 'sc_campaign_name', $this->sc_campaign_name])
            ->andFilterWhere(['like', 'sc_description', $this->sc_description])
            ->andFilterWhere(['like', 'sc_location', $this->sc_location])
            ->andFilterWhere(['like', 'sc_campaigner', $this->sc_campaigner])
            ->andFilterWhere(['like', 'sc_part', $this->sc_part])
            ->andFilterWhere(['like', 'sc_result', $this->sc_result]);

        return $dataProvider;
    }

    public function export()
    {

        $query = SafetyCampaign::find()->where([
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
        $filename = sprintf(AppConstants::REPORT_NAME_SAFETY_CAMPAIGN, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle("Safety Campaign");

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(1);
        $activeSheet->getColumnDimension('B')->setWidth(5);
        $activeSheet->getColumnDimension('C')->setWidth(30);
        for ($i = 2; $i < 8; $i++) {
            $activeSheet->getColumnDimension($this->toAlphabet($i))->setWidth(20);
        }

        $activeSheet->getColumnDimension('I')->setWidth(30);
        $activeSheet->getColumnDimension('J')->setWidth(30);
        $activeSheet->getColumnDimension('K')->setWidth(30);

        //header
        $activeSheet->mergeCells('B2:D2');
        $activeSheet->setCellValue('B2', "MONITORING SAFETY CAMPAIGN");

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
        for ($i = 1; $i < 3; $i++) {
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }

        for ($i = 9; $i < 11; $i++) {
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no1:$alphabet$no2");
            $activeSheet->getStyle("$alphabet$no1:$alphabet$no2")->applyFromArray($styleArray);
        }


        for ($i = 3; $i < 9; $i++) {
            $alphabet = $this->toAlphabet($i);
            $activeSheet->getStyle("$alphabet$no2")->applyFromArray($styleArray);
        }


        $activeSheet->mergeCells('D4:G4');
        $activeSheet->mergeCells('H4:I4');

        $activeSheet->getStyle("D4:G4")->applyFromArray($styleArray);
        $activeSheet->getStyle("H4:I4")->applyFromArray($styleArray);

        $activeSheet->setCellValue('B4', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('C4', AppLabels::SC_CAMPAIGN);
        $activeSheet->setCellValue('D4', "Pelaksanaan Kampanye");
        $activeSheet->setCellValue('D5', AppLabels::DESCRIPTION);
        $activeSheet->setCellValue('E5', AppLabels::DATE);
        $activeSheet->setCellValue('F5', AppLabels::LOCATION);
        $activeSheet->setCellValue('G5', AppLabels::CAMPAIGNER);
        $activeSheet->setCellValue('H4', "Sasaran Kampanye");
        $activeSheet->setCellValue('H5', AppLabels::PART);
        $activeSheet->setCellValue('I5', AppLabels::AMOUNT);
        $activeSheet->setCellValue('J4', AppLabels::RESULT);
        $activeSheet->setCellValue('K4', AppLabels::DOCUMENTATION);

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
        foreach ($dataProvider->getModels() as $key => $model) {
            $activeSheet->setCellValue('B' . $rowIndex, ($key + 1));
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $rowIndex, $model->sc_campaign_name);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $rowIndex, $model->sc_description);
            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('E' . $rowIndex, $model->sc_date);
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('F' . $rowIndex, $model->sc_location);
            $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('G' . $rowIndex, $model->sc_campaigner);
            $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('H' . $rowIndex, $model->sc_part);
            $activeSheet->getStyle('H' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('I' . $rowIndex, $model->sc_amount);
            $activeSheet->getStyle('I' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('J' . $rowIndex, $model->sc_result);
            $activeSheet->getStyle('J' . $rowIndex)->applyFromArray($styleArray);

            if (!empty($model->attachmentOwner)) {
                $attachment = Converter::attachmentsFullPath($model->attachmentOwner);
                $activeSheet->setCellValue('K' . $rowIndex, $attachment['label']);
                $activeSheet->getCell('K' . $rowIndex)->getHyperlink()->setUrl($attachment['path']);
                $activeSheet->getCell('K' . $rowIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                $activeSheet->getCell('K' . $rowIndex)->getStyle()->getAlignment()->setWrapText(true);
            }
            $activeSheet->getStyle('K' . $rowIndex)->applyFromArray($styleArray);

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
