<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;
use common\components\helpers\Converter;

/**
 * Plb3ChecklistDetailSearch represents the model behind the search form about `backend\models\Plb3ChecklistDetail`.
 */
class Plb3ChecklistDetailSearch extends Plb3ChecklistDetail
{
    public $filename;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'plb3_checklist_id'], 'integer'],
            [['plb3cd_form_type_code', 'plb3cd_company_name', 'plb3cd_industrial_sector', 'plb3cd_location', 'plb3cd_assessment_team', 'plb3cd_assessment_date'], 'safe'],
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
        $query = Plb3ChecklistDetail::find();

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
            'plb3_checklist_id' => $this->plb3_checklist_id,
            'plb3cd_assessment_date' => $this->plb3cd_assessment_date,
        ]);

        $query->andFilterWhere(['like', 'plb3cd_form_type_code', $this->plb3cd_form_type_code])
            ->andFilterWhere(['like', 'plb3cd_company_name', $this->plb3cd_company_name])
            ->andFilterWhere(['like', 'plb3cd_industrial_sector', $this->plb3cd_industrial_sector])
            ->andFilterWhere(['like', 'plb3cd_location', $this->plb3cd_location])
            ->andFilterWhere(['like', 'plb3cd_assessment_team', $this->plb3cd_assessment_team]);

        return $dataProvider;
    }

    public function export($id)
    {

        $query = Plb3ChecklistDetail::find()->where(['id' => $id]);

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
        $filename = sprintf(AppConstants::REPORT_NAME_PLB3_CHECKLIST, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);

        $sheetIndex = 0;
        //Creating sheet

        $this->exportPlb3ChecklistDetail($objPHPExcel, $sheetIndex, $model);
        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }

    public function exportPlb3ChecklistDetail(\PHPExcel &$objPHPExcel, $sheetIndex, $model)
    {
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $checklistType = Codeset::getCodesetValue(AppConstants::CODESET_PLB3_CHECKLIST_FORM_TYPE_CODE, AppConstants::CODESET_PLB3_CHECKLIST_FTC_TPS);
        $activeSheet->setTitle(sprintf("%s %s", AppLabels::CHECKLIST, $checklistType));

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(70);
        $activeSheet->getColumnDimension('C')->setWidth(30);
        $activeSheet->getColumnDimension('D')->setWidth(20);
        $activeSheet->getColumnDimension('E')->setWidth(30);

        //==========================================================================

        // body header

        $styleArray = [
            'font' => [
                'bold' => false,
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
            ],
        ];

        $activeSheet->mergeCells("A1:C2");
        $activeSheet->getStyle("A1:C2")->applyFromArray($styleArray);
        $activeSheet->setCellValue('A1', sprintf("%s %s %s %s", AppLabels::CHECKLIST, AppLabels::WASTE, AppLabels::LB3, $checklistType));

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
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                    ]
                ]
            ],
        ];

        $activeSheet->mergeCells("A4:B4");
        $activeSheet->mergeCells("D4:E4");
        $activeSheet->mergeCells("D5:E5");
        $activeSheet->mergeCells("D6:E6");
        $activeSheet->mergeCells("D7:E7");
        $activeSheet->mergeCells("A5:B6");

        $activeSheet->getStyle("A1:C2")->applyFromArray($styleArray);
        $activeSheet->getStyle("D4:E4")->applyFromArray($styleArray);
        $activeSheet->getStyle("D5:E5")->applyFromArray($styleArray);
        $activeSheet->getStyle("D6:E6")->applyFromArray($styleArray);
        $activeSheet->getStyle("D7:E7")->applyFromArray($styleArray);
        $activeSheet->getStyle("A5:B6")->applyFromArray($styleArray);
        $activeSheet->getStyle("A4")->applyFromArray($styleArray);
        $activeSheet->getStyle("C4")->applyFromArray($styleArray);
        $activeSheet->getStyle("C5")->applyFromArray($styleArray);
        $activeSheet->getStyle("C6")->applyFromArray($styleArray);
        $activeSheet->getStyle("C7")->applyFromArray($styleArray);

        $activeSheet->setCellValue('A4', "Nama Perusahaan");
        $activeSheet->setCellValue('A5', $model->plb3cd_company_name);
        $activeSheet->setCellValue('C4', "Sektor Industri :");
        $activeSheet->setCellValue('C5', "Lokasi : ");
        $activeSheet->setCellValue('C6', "Tim Penilai :");
        $activeSheet->setCellValue('C7', "Tgl Penilaian :");
        $activeSheet->setCellValue('D4', $model->plb3cd_industrial_sector);
        $activeSheet->setCellValue('D5', $model->plb3cd_location);
        $activeSheet->setCellValue('D6', $model->plb3cd_assessment_team);
        $activeSheet->setCellValue('D7', $model->plb3cd_assessment_date);


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
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                    ]
                ]
            ],
        ];


        $activeSheet->setCellValue('A9', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('B9', AppLabels::DESCRIPTION);
        $activeSheet->setCellValue('C9', "Ya");
        $activeSheet->setCellValue('D9', "Tidak");
        $activeSheet->setCellValue('E9', AppLabels::DESCRIPTION);

        $activeSheet->getStyle('A9')->applyFromArray($styleArray);
        $activeSheet->getStyle('B9')->applyFromArray($styleArray);
        $activeSheet->getStyle('C9')->applyFromArray($styleArray);
        $activeSheet->getStyle('D9')->applyFromArray($styleArray);
        $activeSheet->getStyle('E9')->applyFromArray($styleArray);

        //==========================================================================

        $questionTitles = Codeset::getCodesetAll("PLB3_QUESTION_TYPE_CODE_" . $model->plb3cd_form_type_code);

        //body
        $styleArrayTitle = [
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
            ],
        ];

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
        foreach ($questionTitles as $key => $value) {
            $activeSheet->setCellValue('A' . $rowIndex, $this->toAlphabet($key));
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArrayTitle);
            $activeSheet->setCellValue('B' . $rowIndex, $value->cset_value);
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArrayTitle);
            $csetType = $value->cset_code;
            $rowIndex++;
            foreach ($model->plb3ChecklistAnswers as $key1 => $value1) {
                if ($csetType == $value1->plb3Question->plb3_question_type_code) {
                    $activeSheet->setCellValue('A' . $rowIndex, ($key1 + 1));
                    $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);
                    $wizard = new \PHPExcel_Helper_HTML();
                    $richText = $wizard->toRichTextObject($value1->plb3Question->plb3_question);
                    $activeSheet->setCellValue('B' . $rowIndex, $richText);
                    $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArrayTitle);
                    if ($value1->plb3ca_answer == 1) {
                        $activeSheet->setCellValue('C' . $rowIndex, "V");
                    }
                    $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArrayTitle);
                    if ($value1->plb3ca_answer == 0) {
                        $activeSheet->setCellValue('D' . $rowIndex, "V");
                    }
                    $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArrayTitle);

                    $attachmentOwner = Converter::attachmentsFullPath($value1->attachmentOwner);
                    if (!empty($attachmentOwner)) {
                        foreach ($attachmentOwner as $attachment) {
                            $activeSheet->setCellValue('E' . $rowIndex, $attachment['label']);
                            $activeSheet->getCell('E' . $rowIndex)->getHyperlink()->setUrl($attachment['path']);
                            $activeSheet->getCell('E' . $rowIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                            $activeSheet->getCell('E' . $rowIndex)->getStyle()->getAlignment()->setWrapText(true);
                        }
                    }
                    $rowIndex++;
                }

            }

            $rowIndex++;
            $rowIndex++;
        }

    }
}
