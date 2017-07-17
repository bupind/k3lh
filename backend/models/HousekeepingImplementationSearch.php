<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;


/**
 * HousekeepingImplementationSearch represents the model behind the search form about `backend\models\HousekeepingImplementation`.
 */
class HousekeepingImplementationSearch extends HousekeepingImplementation
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id'], 'integer'],
            [['hi_unit', 'hi_date', 'hi_auditor'], 'safe'],
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
        $query = HousekeepingImplementation::find();

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
            'hi_date' => $this->hi_date,
        ]);

        $query->andFilterWhere(['like', 'hi_unit', $this->hi_unit])
            ->andFilterWhere(['like', 'hi_auditor', $this->hi_auditor]);

        return $dataProvider;
    }

    public function export($id) {

        $query = HousekeepingImplementation::find()->where(['id' => $id]);

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
        $filename = sprintf(AppConstants::REPORT_NAME_HOUSEKEEPING_IMPLEMENTATION, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::FORM_HOUSEKEEPING_IMPLEMENTATION);

        //Get model
        $model = $dataProvider->getModels()[0];

        //common style
        $center = [
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap' => true
            ],
        ];

        // set dimension

        // set row width

        // set column width

        $activeSheet->getColumnDimension('A')->setWidth(15);
        $activeSheet->getColumnDimension('B')->setWidth(70);
        $activeSheet->getColumnDimension('C')->setWidth(15);
        $activeSheet->getColumnDimension('D')->setWidth(15);
        $activeSheet->getColumnDimension('E')->setWidth(15);
        $activeSheet->getColumnDimension('F')->setWidth(15);
        $activeSheet->getColumnDimension('G')->setWidth(50);

        //header

        //header style
        $styleArray = [
            'font' => [
                'bold' => true,
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
                'startcolor' => ['argb' => 'FF002060']
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

        $styleArray2 = [
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

        $activeSheet->mergeCells('A1:G2');
        $activeSheet->setCellValue('A1', sprintf("%s",AppLabels::FORM_HOUSEKEEPING_IMPLEMENTATION));
        $activeSheet->getStyle('A1:G2')->applyFromArray($styleArray);

        $activeSheet->mergeCells('A4:B4');
        $activeSheet->setCellValue('A4', sprintf("%s",AppLabels::HI_UNIT));
        $activeSheet->getStyle('A4:B4')->applyFromArray($styleArray2);
        $activeSheet->mergeCells('A5:B5');
        $activeSheet->setCellValue('A5', $model->hi_unit);
        $activeSheet->getStyle('A5:B5')->applyFromArray($center);

        $activeSheet->mergeCells('C4:G4');
        $activeSheet->setCellValue('C4', sprintf("%s",AppLabels::AUDITEE));
        $activeSheet->getStyle('C4:G4')->applyFromArray($styleArray2);
        $activeSheet->mergeCells('C5:G5');
        $activeSheet->setCellValue('C5', $model->hi_auditee);
        $activeSheet->getStyle('C5:G5')->applyFromArray($center);

        $activeSheet->mergeCells('A6:B6');
        $activeSheet->setCellValue('A6', sprintf("%s",AppLabels::DATE));
        $activeSheet->getStyle('A6:B6')->applyFromArray($styleArray2);
        $activeSheet->mergeCells('A7:B7');
        $activeSheet->setCellValue('A7', $model->hi_date);
        $activeSheet->getStyle('A7:B7')->applyFromArray($center);

        $activeSheet->mergeCells('C6:G6');
        $activeSheet->setCellValue('C6', sprintf("%s",AppLabels::AUDITOR));
        $activeSheet->getStyle('C6:G6')->applyFromArray($styleArray2);
        $activeSheet->mergeCells('C7:G7');
        $activeSheet->setCellValue('C7', $model->hi_auditor);
        $activeSheet->getStyle('C7:G7')->applyFromArray($center);

        //==========================================================================

        // body header


        $activeSheet->setCellValue('A8', sprintf("%s",AppLabels::NUMBER_SHORT));
        $activeSheet->getStyle('A8')->applyFromArray($styleArray);

        $activeSheet->setCellValue('B8', 'Kriteria Implementasi 5S');
        $activeSheet->getStyle('B8')->applyFromArray($styleArray);

        $activeSheet->mergeCells('C8:D8');
        $activeSheet->setCellValue('C8', sprintf("%s %s",AppLabels::CRITERIA, AppLabels::VALUE));
        $activeSheet->getStyle('C8:D8')->applyFromArray($styleArray);

        $activeSheet->mergeCells('E8:F8');
        $activeSheet->setCellValue('E8', sprintf("%s %s",AppLabels::SHORT_PERCENT, AppLabels::QUALITY));
        $activeSheet->getStyle('E8:F8')->applyFromArray($styleArray);

        $activeSheet->setCellValue('G8', 'Rekomendasi');
        $activeSheet->getStyle('G8')->applyFromArray($styleArray);

        //==========================================================================

        //body

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
                'startcolor' => ['argb' => 'FF00CC00']
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

        $styleArray2 = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap' => true
            ],
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FF00CC00']
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

        $styleArray3 = [
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

        $styleArray4 = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
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

        $styleArrayFooter = [
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
                'startcolor' => ['argb' => 'FF00CC00']
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

        $rowIndex = 9;
        $titleCounter = 0;
        $questionTitleId = 0;

        $criteriaTotal = 0;
        $qualityTotal = 0;
        $subtitleCount = 0;

        foreach($model->hiDetails as $keyD => $detail){
            $question = HqDetail::find()->where(['id' => $detail->hq_detail_id])->one();
            if($questionTitleId != 0) {
                $questionTitle = $question->housekeepingQuestionDetail->id;
                if($questionTitleId != $questionTitle) {
                    $questionTitleId = $questionTitle;

                    //footer
                    $activeSheet->getStyle('A' . $rowIndex . ':G' . $rowIndex)->applyFromArray($styleArrayFooter);
                    $activeSheet->setCellValue('B' . $rowIndex, AppLabels::AMOUNT);
                    $criteriaTotal = number_format($criteriaTotal/$subtitleCount,1);
                    $qualityTotal = number_format($qualityTotal/$subtitleCount,1);
                    $activeSheet->setCellValue('D' . $rowIndex, $criteriaTotal);
                    $activeSheet->setCellValue('F' . $rowIndex, $qualityTotal);
                    $criteriaTotal = 0;
                    $qualityTotal = 0;
                    $subtitleCount = 0;
                    $rowIndex++;
                    $rowIndex++;

                    //title
                    $activeSheet->mergeCells('B' . $rowIndex . ':G' . $rowIndex);
                    $activeSheet->setCellValue('A' . $rowIndex, sprintf("%s.",$this->toAlphabet($titleCounter)));
                    $activeSheet->setCellValue('B' . $rowIndex, $question->housekeepingQuestionDetail->hq_title);
                    $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);
                    $activeSheet->getStyle('B' . $rowIndex . ':G' . $rowIndex)->applyFromArray($styleArray2);
                    $titleCounter++;
                    $rowIndex++;


                }
            }else{
                $questionTitleId = $question->housekeepingQuestionDetail->id;
                //title
                $activeSheet->mergeCells('B' . $rowIndex . ':G' . $rowIndex);
                $activeSheet->setCellValue('A' . $rowIndex, sprintf("%s.",$this->toAlphabet($titleCounter)));
                $activeSheet->setCellValue('B' . $rowIndex, $question->housekeepingQuestionDetail->hq_title);
                $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);
                $activeSheet->getStyle('B' . $rowIndex . ':G' . $rowIndex)->applyFromArray($styleArray2);
                $titleCounter++;
                $rowIndex++;
            }

            //subtitle
            $activeSheet->mergeCells('B' . $rowIndex . ':G' . $rowIndex);
            $activeSheet->setCellValue('A' . $rowIndex, ($subtitleCount+1));
            $wizard = new \PHPExcel_Helper_HTML();
            $richText = $wizard->toRichTextObject($question->hqd_subtitle);
            $activeSheet->setCellValue('B' . $rowIndex, $richText);
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray3);
            $activeSheet->getStyle('B' . $rowIndex . ':G' . $rowIndex)->applyFromArray($styleArray4);
            $rowIndex++;
            $subtitleCount++;

            //answer content (hi_detail)
            $activeSheet->mergeCells('D' . $rowIndex . ':D' . ($rowIndex+4));
            $activeSheet->mergeCells('F' . $rowIndex . ':F' . ($rowIndex+4));
            $activeSheet->mergeCells('G' . $rowIndex . ':G' . ($rowIndex+4));
            $criteriaTotal += $detail->hi_criteria_value;
            $qualityTotal += $detail->hi_quality_value;
            $activeSheet->setCellValue('D' . $rowIndex, $detail->hi_criteria_value);
            $activeSheet->setCellValue('F' . $rowIndex, $detail->hi_quality_value);

            $wizard = new \PHPExcel_Helper_HTML();
            $richText = $wizard->toRichTextObject($detail->hi_recommendation);

            $activeSheet->setCellValue('G' . $rowIndex, $richText);
            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($center);
            $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($center);
            $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($center);

            //question content(hq_detail)
            $activeSheet->setCellValue('A' . $rowIndex, "a.");
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($center);
            $wizard = new \PHPExcel_Helper_HTML();
            $richText = $wizard->toRichTextObject($question->hqd_criteria_1);
            $activeSheet->setCellValue('B' . $rowIndex, $richText);
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($center);
            $activeSheet->setCellValue('C' . $rowIndex, "5");
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($center);
            $activeSheet->setCellValue('E' . $rowIndex, "90 - 100");
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($center);
            $rowIndex++;

            $activeSheet->setCellValue('A' . $rowIndex, "b.");
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($center);
            $wizard = new \PHPExcel_Helper_HTML();
            $richText = $wizard->toRichTextObject($question->hqd_criteria_2);
            $activeSheet->setCellValue('B' . $rowIndex,$richText);
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($center);
            $activeSheet->setCellValue('C' . $rowIndex, "4");
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($center);
            $activeSheet->setCellValue('E' . $rowIndex, "76 - 90");
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($center);
            $rowIndex++;

            $activeSheet->setCellValue('A' . $rowIndex, "c.");
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($center);
            $wizard = new \PHPExcel_Helper_HTML();
            $richText = $wizard->toRichTextObject($question->hqd_criteria_3);
            $activeSheet->setCellValue('B' . $rowIndex, $richText);
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($center);
            $activeSheet->setCellValue('C' . $rowIndex, "3");
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($center);
            $activeSheet->setCellValue('E' . $rowIndex, "56 - 75");
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($center);
            $rowIndex++;

            $activeSheet->setCellValue('A' . $rowIndex, "d.");
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($center);
            $wizard = new \PHPExcel_Helper_HTML();
            $richText = $wizard->toRichTextObject($question->hqd_criteria_4);
            $activeSheet->setCellValue('B' . $rowIndex, $richText);
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($center);
            $activeSheet->setCellValue('C' . $rowIndex, "2");
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($center);
            $activeSheet->setCellValue('E' . $rowIndex, "31 - 55");
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($center);
            $rowIndex++;

            $activeSheet->setCellValue('A' . $rowIndex, "e.");
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($center);
            $wizard = new \PHPExcel_Helper_HTML();
            $richText = $wizard->toRichTextObject($question->hqd_criteria_5);
            $activeSheet->setCellValue('B' . $rowIndex, $richText);
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($center);
            $activeSheet->setCellValue('C' . $rowIndex, "1");
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($center);
            $activeSheet->setCellValue('E' . $rowIndex, "10 - 30");
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($center);
            $rowIndex++;

        }

        //==========================================================================

        //footer

        $activeSheet->getStyle('A' . $rowIndex . ':G' . $rowIndex)->applyFromArray($styleArrayFooter);
        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::AMOUNT);
        $criteriaTotal = number_format($criteriaTotal/$subtitleCount,1);
        $qualityTotal = number_format($qualityTotal/$subtitleCount,1);
        $activeSheet->setCellValue('D' . $rowIndex, $criteriaTotal);
        $activeSheet->setCellValue('F' . $rowIndex, $qualityTotal);

        $rowIndex++;$rowIndex++;
        //==========================================================================

        //extra footer
        $activeSheet->setCellValue('B' . $rowIndex, AppLabels::FILES);
        $rowIndex++;
        if (!empty($model->attachmentOwners)) {
            foreach (Converter::attachmentsFullPath($model->attachmentOwners) as $key2 => $attachment) {
                $activeSheet->setCellValue('B' . $rowIndex, $attachment['label']);
                $activeSheet->getCell('B' . $rowIndex)->getHyperlink()->setUrl($attachment['path']);
                $activeSheet->getCell('B' . $rowIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                $activeSheet->getCell('B' . $rowIndex)->getStyle()->getAlignment()->setWrapText(true);

                $rowIndex++;
            }
        }

        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }
}
