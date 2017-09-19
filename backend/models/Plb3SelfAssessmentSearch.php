<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;
use common\components\helpers\PLB3Helper;

/**
 * Plb3SelfAssessmentSearch represents the model behind the search form about `backend\models\Plb3SelfAssessment`.
 */
class Plb3SelfAssessmentSearch extends Plb3SelfAssessment {
    
    public $filename;
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'sector_id', 'power_plant_id', 'plb3_year', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Plb3SelfAssessment::find();
        
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
            'plb3_year' => $this->plb3_year,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);
        
        return $dataProvider;
    }
    
    public function export($id) {
        $query = Plb3SelfAssessment::find()->where(['id' => $id]);
        $model = $query->one();
    
        if (!$model->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $model;
        }
    
        // export to excel
        //main excel setup
        $objPHPExcel = new \PHPExcel();
        $filename = sprintf(AppConstants::REPORT_NAME_PLB3_SA, date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];
    
        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);
    
        //Creating sheet
        $this->companyProfileSheet($objPHPExcel->createSheet(0), $model);
        $this->wasteManagementSheet($objPHPExcel->createSheet(1), $model);
    
        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);
    
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);
    
        $this->filename = $filename;
    
        return true;
    }
    
    private function wasteManagementSheet(\PHPExcel_Worksheet $activeSheet, $model) {
        $activeSheet->setTitle(AppLabels::B3_WASTE_MANAGEMENT);
    
        $startDate = new \DateTime();
        $startDate->setDate($model->plb3_year - 1, 7, 1);
    
        $endDate = new \DateTime();
        $endDate->setDate($model->plb3_year, 6, 1);
    
        // set cols width
        $activeSheet->getColumnDimension('A')->setWidth(7);
        $activeSheet->getColumnDimension('B')->setWidth(40);
        $activeSheet->getColumnDimension('C')->setWidth(20);
        $activeSheet->getColumnDimension('D')->setWidth(20);
        $activeSheet->getColumnDimension('E')->setWidth(20);
        $activeSheet->getColumnDimension('F')->setWidth(20);
        $activeSheet->getColumnDimension('G')->setWidth(30);
    
        // header
        $activeSheet->setCellValue('A1', strtoupper(sprintf('%s %s', AppLabels::SELF_ASSESSMENT, AppLabels::B3_WASTE_MANAGEMENT)));
        $activeSheet->setCellValue('A2', strtoupper(sprintf('%s %s - %s', AppLabels::PERIOD, $startDate->format('M Y'), $endDate->format('M Y'))));
    
        // header style
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 11,
            ],
        ];
        $activeSheet->getStyle('A1:A2')->applyFromArray($styleArray);
    
        $questionGroups = Codeset::getCodesetAll(AppConstants::CODESET_PLB3_SA_QUESTION_CATEGORY_CODE);
    
        $plb3Form = $model->plb3SaForm;
        $plb3SaFormDetailModels = $plb3SaFormDetailStaticQuarterModels = [];
        $plb3SaFormDetailStaticModel = null;
    
        if (!is_null($plb3Form)) {
            $plb3SaFormDetailStaticModel = $plb3Form->plb3SaFormDetailStatic;
            $plb3SaFormDetailStaticQuarterModels = $plb3Form->plb3SaFormDetailStaticQuarters;
            foreach (Plb3SaQuestion::find()->all() as $key => $question) {
                $detailModel = $plb3Form->getPlb3SaFormDetailByQuestion($question->id);
                if (!is_null($detailModel)) {
                    $plb3SaFormDetailModels[$question->id] = $detailModel;
                }
            }
        }
        
        $index = 4;
        foreach ($questionGroups as $qKey => $qGroup) {
            switch (strtoupper($qGroup->cset_code)) {
                case AppConstants::PLB3_SA_QUESTION_CATEGORY_GENERAL:
                    $this->categoryGeneral($activeSheet, $qKey + 1, $index, $qGroup, $model, $plb3SaFormDetailModels);
                    $index++;
                    break;
                case AppConstants::PLB3_SA_QUESTION_CATEGORY_HAZARD:
                    $this->categoryHazard($activeSheet, $qKey + 1, $index, $qGroup, $model, $plb3SaFormDetailModels, $plb3SaFormDetailStaticModel, $plb3SaFormDetailStaticQuarterModels);
                    $index++;
                    break;
            }
        }
    }
    
    private function categoryHazard(\PHPExcel_Worksheet $activeSheet, $catNo, &$index, Codeset $codeset, $model, $plb3SaFormDetailModels, $plb3SaFormDetailStaticModel, $plb3SaFormDetailStaticQuarterModels) {
        $no = 1;
        $startDate = new \DateTime();
        $startDate->setDate($model->plb3_year - 1, 7, 1);
    
        //title
        $activeSheet->setCellValue('A' . $index, $catNo);
        $activeSheet->setCellValue('B' . $index, $codeset->cset_value);
    
        // title style
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 11,
            ],
        ];
        $activeSheet->getStyle(sprintf('A%s:B%s', $index, $index))->applyFromArray($styleArray);
        $index++;
    
        $startStyleIndex = $index;
        // header
        $activeSheet->setCellValue('A' . $index, AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('B' . $index, AppLabels::IMPLEMENTATION_OF_B3_WASTE_MANAGEMENT);
        $activeSheet->setCellValue('C' . $index, AppLabels::PERFORMANCE);
        $activeSheet->setCellValue('G' . $index, AppLabels::DOCUMENTS);
        $activeSheet->mergeCells(sprintf('C%s:F%s', $index, $index));
    
        // header style
        $styleArray = [
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFD9D9D9']
            ],
            'font' => [
                'bold' => true,
                'size' => 11,
            ],
            'alignment' => [
                'wrap' => true
            ],
        ];
        $activeSheet->getStyle(sprintf('A%s:G%s', $index, $index))->applyFromArray($styleArray);
        $index++;
        
        $activeSheet->setCellValue('A' . $index, $no++);
        $activeSheet->setCellValue('B' . $index, AppLabels::PLB3_STATIC_QUESTION_HEADER);
        $activeSheet->setCellValue('C' . $index, strtoupper(AppLabels::YES_NO));
        $activeSheet->getStyle('C' . $index)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $activeSheet->mergeCells(sprintf('C%s:F%s', $index, $index));
        // title style
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 11,
            ],
            'alignment' => [
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP,
                'wrap' => true
            ],
        ];
        $activeSheet->getStyle(sprintf('A%s:G%s', $index, $index))->applyFromArray($styleArray);
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $plb3SaFormDetailStaticModel->getAttributeLabel('plb3safds_ans_1'));
        $activeSheet->setCellValue('C' . $index, Converter::format($plb3SaFormDetailStaticModel->plb3safds_ans_1, AppConstants::FORMAT_TYPE_YES_NO));
        $activeSheet->mergeCells(sprintf('C%s:F%s', $index, $index));
        $startIndex = $index;
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $plb3SaFormDetailStaticModel->getAttributeLabel('plb3safds_ans_2'));
        $activeSheet->setCellValue('C' . $index, Converter::format($plb3SaFormDetailStaticModel->plb3safds_ans_2, AppConstants::FORMAT_TYPE_YES_NO));
        $activeSheet->mergeCells(sprintf('C%s:F%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $plb3SaFormDetailStaticModel->getAttributeLabel('plb3safds_ans_3'));
        $activeSheet->setCellValue('C' . $index, Converter::format($plb3SaFormDetailStaticModel->plb3safds_ans_3, AppConstants::FORMAT_TYPE_YES_NO));
        $activeSheet->mergeCells(sprintf('C%s:F%s', $index, $index));
        $index++;
        
        $attachmentOwners = $plb3SaFormDetailStaticModel->attachmentOwners;
        if (!empty($attachmentOwners)) {
            foreach (Converter::attachmentsFullPath($attachmentOwners) as $key2 => $attachment) {
                $activeSheet->setCellValue('G' . $startIndex, $attachment['label']);
                $activeSheet->getCell('G' . $startIndex)->getHyperlink()->setUrl($attachment['path']);
                $activeSheet->getCell('G' . $startIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                $activeSheet->getCell('G' . $startIndex)->getStyle()->getAlignment()->setWrapText(true);
    
                $startIndex++;
            }
        }
        
        $index = $startIndex > $index ? $startIndex : $index;
    
        $activeSheet->setCellValue('B' . $index, AppLabels::PLB3_STATIC_QUESTION_QUARTER_HEADER);
        $activeSheet->setCellValue('C' . $index, strtoupper(sprintf('TW 3 TH %s', $startDate->format('Y'))));
        $activeSheet->setCellValue('D' . $index, strtoupper(sprintf('TW 4 TH %s', $startDate->format('Y'))));
        $activeSheet->setCellValue('E' . $index, strtoupper(sprintf('TW 1 TH %s', $model->plb3_year)));
        $activeSheet->setCellValue('F' . $index, strtoupper(sprintf('TW 2 TH %s', $model->plb3_year)));
        $activeSheet->getStyle(sprintf('C%s:F%s', $index, $index))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // title style
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 11,
            ],
            'alignment' => [
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP,
                'wrap' => true
            ],
        ];
        $activeSheet->getStyle(sprintf('A%s:G%s', $index, $index))->applyFromArray($styleArray);
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $plb3SaFormDetailStaticQuarterModels[0]->getAttributeLabel('plb3safdsq_ans_1'));
        $activeSheet->setCellValue('C' . $index, Converter::format($plb3SaFormDetailStaticQuarterModels[0]->plb3safdsq_ans_1, AppConstants::FORMAT_TYPE_YES_NO));
        $activeSheet->setCellValue('D' . $index, Converter::format($plb3SaFormDetailStaticQuarterModels[1]->plb3safdsq_ans_1, AppConstants::FORMAT_TYPE_YES_NO));
        $activeSheet->setCellValue('E' . $index, Converter::format($plb3SaFormDetailStaticQuarterModels[2]->plb3safdsq_ans_1, AppConstants::FORMAT_TYPE_YES_NO));
        $activeSheet->setCellValue('F' . $index, Converter::format($plb3SaFormDetailStaticQuarterModels[3]->plb3safdsq_ans_1, AppConstants::FORMAT_TYPE_YES_NO));
        $startIndex = $index;
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $plb3SaFormDetailStaticQuarterModels[0]->getAttributeLabel('plb3safdsq_ans_2'));
        $activeSheet->setCellValue('C' . $index, Converter::format($plb3SaFormDetailStaticQuarterModels[0]->plb3safdsq_ans_2, AppConstants::FORMAT_TYPE_YES_NO));
        $activeSheet->setCellValue('D' . $index, Converter::format($plb3SaFormDetailStaticQuarterModels[1]->plb3safdsq_ans_2, AppConstants::FORMAT_TYPE_YES_NO));
        $activeSheet->setCellValue('E' . $index, Converter::format($plb3SaFormDetailStaticQuarterModels[2]->plb3safdsq_ans_2, AppConstants::FORMAT_TYPE_YES_NO));
        $activeSheet->setCellValue('F' . $index, Converter::format($plb3SaFormDetailStaticQuarterModels[3]->plb3safdsq_ans_2, AppConstants::FORMAT_TYPE_YES_NO));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $plb3SaFormDetailStaticQuarterModels[0]->getAttributeLabel('plb3safdsq_ans_3'));
        $activeSheet->setCellValue('C' . $index, Converter::format($plb3SaFormDetailStaticQuarterModels[0]->plb3safdsq_ans_3, AppConstants::FORMAT_TYPE_YES_NO));
        $activeSheet->setCellValue('D' . $index, Converter::format($plb3SaFormDetailStaticQuarterModels[1]->plb3safdsq_ans_3, AppConstants::FORMAT_TYPE_YES_NO));
        $activeSheet->setCellValue('E' . $index, Converter::format($plb3SaFormDetailStaticQuarterModels[2]->plb3safdsq_ans_3, AppConstants::FORMAT_TYPE_YES_NO));
        $activeSheet->setCellValue('F' . $index, Converter::format($plb3SaFormDetailStaticQuarterModels[3]->plb3safdsq_ans_3, AppConstants::FORMAT_TYPE_YES_NO));
        $index++;
    
        $attachmentOwners = $plb3SaFormDetailStaticQuarterModels[0]->attachmentOwners;
        if (!empty($attachmentOwners)) {
            foreach (Converter::attachmentsFullPath($attachmentOwners) as $key2 => $attachment) {
                $activeSheet->setCellValue('G' . $startIndex, $attachment['label']);
                $activeSheet->getCell('G' . $startIndex)->getHyperlink()->setUrl($attachment['path']);
                $activeSheet->getCell('G' . $startIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                $activeSheet->getCell('G' . $startIndex)->getStyle()->getAlignment()->setWrapText(true);
            
                $startIndex++;
            }
        }
    
        $index = $startIndex > $index ? $startIndex : $index;
        $wizard = new \PHPExcel_Helper_HTML();
    
        foreach (Plb3SaQuestion::find()
                     ->where(['category_code' => $codeset->cset_code])
                     ->andWhere(['parent_id' => null])
                     ->all() as $l1Key => $questionL1) {
    
            $richText = $wizard->toRichTextObject($questionL1->label);
            $activeSheet->setCellValue('A' . $index, $no++);
            $activeSheet->setCellValue('B' . $index, $richText);
            $activeSheet->mergeCells(sprintf('B%s:G%s', $index, $index));
            $index++;
                
            foreach ($questionL1->getChild() as $l2Key => $questionL2) {
                if (isset($plb3SaFormDetailModels[$questionL2->id]) && $questionL2->is_question == AppConstants::STATUS_YES) {
    
                    $richText = $wizard->toRichTextObject($questionL2->label);
                    $activeSheet->setCellValue('B' . $index, $richText);
                    $activeSheet->setCellValue('C' . $index, PLB3Helper::generateSALabelExcel($plb3SaFormDetailModels[$questionL2->id], $questionL2->input_type_code));
                    $activeSheet->mergeCells(sprintf('C%s:F%s', $index, $index));

                    $attachmentOwners = $plb3SaFormDetailModels[$questionL2->id]->attachmentOwners;
                    if (!empty($attachmentOwners)) {
                        foreach (Converter::attachmentsFullPath($attachmentOwners) as $key2 => $attachment) {
                            $activeSheet->setCellValue('G' . $index, $attachment['label']);
                            $activeSheet->getCell('G' . $index)->getHyperlink()->setUrl($attachment['path']);
                            $activeSheet->getCell('G' . $index)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                            $activeSheet->getCell('G' . $index)->getStyle()->getAlignment()->setWrapText(true);

                            $index++;
                        }
                        $index--;
                    }
                    
                    $index++;
                } else {
    
                    $richText = $wizard->toRichTextObject($questionL2->label);
                    $activeSheet->setCellValue('B' . $index, $richText);
                    $activeSheet->mergeCells(sprintf('B%s:F%s', $index, $index));
                    $index++;

                    foreach ($questionL2->getChild() as $l3Key => $questionL3) {
                        if (isset($plb3SaFormDetailModels[$questionL3->id]) && $questionL3->is_question == AppConstants::STATUS_YES) {

                            $richText = $wizard->toRichTextObject($questionL3->label);
                            $activeSheet->setCellValue('B' . $index, $richText);
                            $activeSheet->setCellValue('C' . $index, PLB3Helper::generateSALabelExcel($plb3SaFormDetailModels[$questionL3->id], $questionL3->input_type_code));
                            $activeSheet->mergeCells(sprintf('C%s:F%s', $index, $index));

                            $attachmentOwners = $plb3SaFormDetailModels[$questionL3->id]->attachmentOwners;
                            if (!empty($attachmentOwners)) {
                                foreach (Converter::attachmentsFullPath($attachmentOwners) as $key2 => $attachment) {
                                    $activeSheet->setCellValue('G' . $index, $attachment['label']);
                                    $activeSheet->getCell('G' . $index)->getHyperlink()->setUrl($attachment['path']);
                                    $activeSheet->getCell('G' . $index)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                                    $activeSheet->getCell('G' . $index)->getStyle()->getAlignment()->setWrapText(true);

                                    $index++;
                                }
                                $index--;
                            }

                            $index++;
                        } else {
                            $richText = $wizard->toRichTextObject($questionL3->label);
                            $activeSheet->setCellValue('B' . $index, $richText);
                            $activeSheet->mergeCells(sprintf('B%s:F%s', $index, $index));
                        }
                    }
                    
                }
            }
            
            $index++;
        }
    
        // style rows
        $styleArray = [
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                    ]
                ]
            ],
            'alignment' => [
                'wrap' => true
            ],
        ];
        $activeSheet->getStyle(sprintf('A%s:G%s', $startStyleIndex, $index - 1))->applyFromArray($styleArray);
    }
    
    private function categoryGeneral(\PHPExcel_Worksheet $activeSheet, $catNo, &$index, Codeset $codeset, $model, $plb3SaFormDetailModels) {
        $no = 1;
                
        //title
        $activeSheet->setCellValue('A' . $index, $catNo);
        $activeSheet->setCellValue('B' . $index, $codeset->cset_value);
        
        // title style
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 11,
            ],
        ];
        $activeSheet->getStyle(sprintf('A%s:B%s', $index, $index))->applyFromArray($styleArray);
        $index++;
    
        $startIndex = $index;
        
        // header
        $activeSheet->setCellValue('A' . $index, AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('B' . $index, AppLabels::IMPLEMENTATION_OF_B3_WASTE_MANAGEMENT);
        $activeSheet->setCellValue('G' . $index, AppLabels::DOCUMENTS);
        $activeSheet->mergeCells(sprintf('B%s:F%s', $index, $index));
    
        // header style
        $styleArray = [
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFD9D9D9']
            ],
            'font' => [
                'bold' => true,
                'size' => 11,
            ],
            'alignment' => [
                'wrap' => true
            ],
        ];
        $activeSheet->getStyle(sprintf('A%s:G%s', $index, $index))->applyFromArray($styleArray);
        $index++;
    
        $wizard = new \PHPExcel_Helper_HTML();
    
        foreach (Plb3SaQuestion::find()
                     ->where(['category_code' => $codeset->cset_code])
                     ->andWhere(['parent_id' => null])
                     ->all() as $l1Key => $questionL1) {
            
            $activeSheet->setCellValue('A' . $index, $no++);
    
            $richText = $wizard->toRichTextObject($questionL1->label);
            $activeSheet->setCellValue('B' . $index, $richText);
            $activeSheet->mergeCells(sprintf('B%s:F%s', $index, $index));
    
            $attachmentOwners = $plb3SaFormDetailModels[$questionL1->id]->attachmentOwners;
            if (!empty($attachmentOwners)) {
                foreach (Converter::attachmentsFullPath($attachmentOwners) as $key2 => $attachment) {
                    $activeSheet->setCellValue('G' . $index, $attachment['label']);
                    $activeSheet->getCell('G' . $index)->getHyperlink()->setUrl($attachment['path']);
                    $activeSheet->getCell('G' . $index)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                    $activeSheet->getCell('G' . $index)->getStyle()->getAlignment()->setWrapText(true);
            
                    $index++;
                }
        
                $index--;
            }
            
            $index++;
        }
    
        // style rows
        $styleArray = [
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                    ]
                ]
            ],
            'alignment' => [
//                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP,
                'wrap' => true
            ],
        ];
        $activeSheet->getStyle(sprintf('A%s:G%s', $startIndex, $index - 1))->applyFromArray($styleArray);
    }
    
    private function companyProfileSheet(\PHPExcel_Worksheet $activeSheet, $model) {
        $activeSheet->setTitle(AppLabels::COMPANY_PROFILE);
    
        $startDate = new \DateTime();
        $startDate->setDate($model->plb3_year - 1, 7, 1);
    
        $endDate = new \DateTime();
        $endDate->setDate($model->plb3_year, 6, 1);
        
        $companyProfileMdl = $model->plb3SaCompanyProfile;
    
        // set cols width
        $activeSheet->getColumnDimension('A')->setWidth(7);
        $activeSheet->getColumnDimension('B')->setWidth(50);
        $activeSheet->getColumnDimension('C')->setWidth(7);
        $activeSheet->getColumnDimension('D')->setWidth(15);
        $activeSheet->getColumnDimension('E')->setWidth(15);
        $activeSheet->getColumnDimension('F')->setWidth(15);
        $activeSheet->getColumnDimension('G')->setWidth(40);
    
        // set rows height
        $activeSheet->getRowDimension(6)->setRowHeight(30);
        $activeSheet->getRowDimension(8)->setRowHeight(30);
        $activeSheet->getRowDimension(11)->setRowHeight(30);
        $activeSheet->getRowDimension(23)->setRowHeight(30);
        $activeSheet->getRowDimension(27)->setRowHeight(70);
        $activeSheet->getRowDimension(28)->setRowHeight(70);
        $activeSheet->getRowDimension(29)->setRowHeight(70);
    
        // header
        $activeSheet->setCellValue('A1', strtoupper(AppLabels::SELF_ASSESSMENT));
        $activeSheet->setCellValue('A2', strtoupper(sprintf('%s %s - %s', AppLabels::PERIOD, $startDate->format('M Y'), $endDate->format('M Y'))));
        $activeSheet->setCellValue('B4', strtoupper(AppLabels::COMPANY_PROFILE));
    
        // header style
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 11,
            ],
        ];
        $activeSheet->getStyle('A1:B4')->applyFromArray($styleArray);
        
        $index = 5;
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_name'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_name);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_activity_loc_address'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_activity_loc_address);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_phone_fax'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_phone_fax);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_main_office_address'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_main_office_address);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_main_office_phone_fax'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_main_office_phone_fax);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_holding_name'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_holding_name);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_holding_office_address'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_holding_office_address);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_holding_phone_fax'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_holding_phone_fax);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_company_established_year'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_company_established_year);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_industry_field'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_industry_field);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
        
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_capital_status'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_capital_status);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_area_factory'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_area_factory);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_number_of_employees'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_number_of_employees);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, AppLabels::PRODUCTION_CAPACITY);
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, sprintf(' - %s', AppLabels::INSTALLED));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_production_capacity_installed);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, sprintf(' - %s', AppLabels::REALIZATION));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_production_capacity_realization);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_raw_material'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_raw_material);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_adjuvant_material'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_adjuvant_material);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_production_process'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_production_process);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_export_marketing_percentage'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_export_marketing_percentage);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_local_marketing_percentage'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_local_marketing_percentage);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_environment_document'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_environment_document);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_contacts_name'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_contacts_name);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_contacts_mobile_phone'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_contacts_mobile_phone);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, $companyProfileMdl->getAttributeLabel('profile_contacts_email'));
        $activeSheet->setCellValue('C' . $index, ':');
        $activeSheet->setCellValue('D' . $index, $companyProfileMdl->profile_contacts_email);
        $activeSheet->mergeCells(sprintf('D%s:G%s', $index, $index));
        $index++;
    
        // style rows
        $styleArray = [
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ],
        ];
        $activeSheet->getStyle('C5:C' . ($index - 1))->applyFromArray($styleArray);
        
        $styleArray = [
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                    ]
                ]
            ],
            'alignment' => [
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP,
                'wrap' => true
            ],
        ];
        $activeSheet->getStyle('A5:G' . ($index - 1))->applyFromArray($styleArray);
    }
}
