<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * WorkingPermitSearch represents the model behind the search form about `backend\models\WorkingPermit`.
 */
class WorkingPermitSearch extends WorkingPermit {
    
    public $filename;
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'sector_id', 'power_plant_id', 'wp_revision_number', 'wp_page', 'wp_pln_noe', 'wp_outsource_noe'], 'integer'],
            [['wp_registration_number', 'wp_submit_date', 'wp_work_type', 'wp_work_details', 'wp_work_location', 'wp_company_department', 'wp_leader_name', 'wp_leader_phone', 'wp_supervisor_name', 'wp_supervisor_phone', 'wp_start_date', 'wp_end_date', 'wp_job_classification', 'wp_k3_rules', 'wp_self_protection', 'wp_dangerous_work_type'], 'safe'],
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
        $query = WorkingPermit::find();
        
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
            'wp_submit_date' => $this->wp_submit_date,
            'wp_revision_number' => $this->wp_revision_number,
            'wp_page' => $this->wp_page,
            'wp_start_date' => $this->wp_start_date,
            'wp_end_date' => $this->wp_end_date,
            'wp_pln_noe' => $this->wp_pln_noe,
            'wp_outsource_noe' => $this->wp_outsource_noe,
        ]);
        
        $query->andFilterWhere(['like', 'wp_registration_number', $this->wp_registration_number])
            ->andFilterWhere(['like', 'wp_work_type', $this->wp_work_type])
            ->andFilterWhere(['like', 'wp_work_details', $this->wp_work_details])
            ->andFilterWhere(['like', 'wp_work_location', $this->wp_work_location])
            ->andFilterWhere(['like', 'wp_company_department', $this->wp_company_department])
            ->andFilterWhere(['like', 'wp_leader_name', $this->wp_leader_name])
            ->andFilterWhere(['like', 'wp_leader_phone', $this->wp_leader_phone])
            ->andFilterWhere(['like', 'wp_supervisor_name', $this->wp_supervisor_name])
            ->andFilterWhere(['like', 'wp_supervisor_phone', $this->wp_supervisor_phone])
            ->andFilterWhere(['like', 'wp_job_classification', $this->wp_job_classification])
            ->andFilterWhere(['like', 'wp_k3_rules', $this->wp_k3_rules])
            ->andFilterWhere(['like', 'wp_self_protection', $this->wp_self_protection])
            ->andFilterWhere(['like', 'wp_dangerous_work_type', $this->wp_dangerous_work_type]);
        
        return $dataProvider;
    }
    
    public function export($id) {
        $query = WorkingPermit::find()->where(['id' => $id]);
        $model = $query->one();
    
        // export to excel
        //main excel setup
        $objPHPExcel = new \PHPExcel();
        $filename = sprintf(AppConstants::REPORT_NAME_WORKING_PERMIT, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];
    
        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);
    
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
    
        // set cols width
        $activeSheet->getColumnDimension('A')->setWidth(25);
        $activeSheet->getColumnDimension('B')->setWidth(25);
        $activeSheet->getColumnDimension('C')->setWidth(25);
        $activeSheet->getColumnDimension('D')->setWidth(25);
        $activeSheet->getColumnDimension('E')->setWidth(25);
    
        $activeSheet->getRowDimension('8')->setRowHeight(40);
    
        //header
        $activeSheet->mergeCells('A1:E3');
        $activeSheet->setCellValue('A1', strtoupper(AppLabels::WORKING_PERMIT));
    
        //header style
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 16,
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
        $activeSheet->getStyle('A1:E3')->applyFromArray($styleArray);
        
        $valueCellStyle = [
            'font' => [
                'color' => [
                    'argb' => 'FF00B0F0'
                ]
            ],
        ];
        
        // content
        $activeSheet->setCellValue('A4', $model->getAttributeLabel('wp_registration_number'))->getStyle('A4')->getFont()->setBold(true);
        $activeSheet->setCellValue('C4', $model->getAttributeLabel('wp_submit_date'))->getStyle('C4')->getFont()->setBold(true);
        $activeSheet->setCellValue('D4', $model->getAttributeLabel('wp_revision_number'))->getStyle('D4')->getFont()->setBold(true);
        $activeSheet->setCellValue('E4', $model->getAttributeLabel('wp_page'))->getStyle('E4')->getFont()->setBold(true);
    
        $activeSheet->setCellValue('A5', $model->wp_registration_number);
        $activeSheet->setCellValue('C5', Yii::$app->formatter->asDate($model->wp_submit_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH));
        $activeSheet->setCellValue('D5', $model->wp_revision_number);
        $activeSheet->setCellValue('E5', $model->wp_page);
    
        $activeSheet->mergeCells('A4:B4');
        $activeSheet->mergeCells('A5:B5');
    
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
            ]
        ];
        $activeSheet->getStyle('A4:E5')->applyFromArray($styleArray);
        $activeSheet->getStyle('A5:E5')->applyFromArray($valueCellStyle);
        
        //==========
        
        $activeSheet->setCellValue('A7', $model->getAttributeLabel('wp_work_type'))->getStyle('A7')->getFont()->setBold(true);
        $activeSheet->setCellValue('A8', $model->getAttributeLabel('wp_work_details'))->getStyle('A8')->getFont()->setBold(true);
        $activeSheet->setCellValue('A9', $model->getAttributeLabel('wp_work_location'))->getStyle('A9')->getFont()->setBold(true);
        $activeSheet->setCellValue('A10', $model->getAttributeLabel('wp_company_department'))->getStyle('A10')->getFont()->setBold(true);
        $activeSheet->setCellValue('A11', $model->getAttributeLabel('wp_leader_name'))->getStyle('A11')->getFont()->setBold(true);
        $activeSheet->setCellValue('D11', $model->getAttributeLabel('wp_leader_phone'))->getStyle('D11')->getFont()->setBold(true);
        $activeSheet->setCellValue('A12', $model->getAttributeLabel('wp_supervisor_name'))->getStyle('A12')->getFont()->setBold(true);
        $activeSheet->setCellValue('D12', $model->getAttributeLabel('wp_supervisor_phone'))->getStyle('D12')->getFont()->setBold(true);
        $activeSheet->setCellValue('A13', AppLabels::WORK_DURATION)->getStyle('A13')->getFont()->setBold(true);
        $activeSheet->setCellValue('B13', $model->getAttributeLabel('wp_start_date'))->getStyle('B13')->getFont()->setBold(true);
        $activeSheet->setCellValue('E13', AppLabels::WP_WORK_DURATION)->getStyle('E13')->getFont()->setBold(true);
        $activeSheet->setCellValue('B14', $model->getAttributeLabel('wp_end_date'))->getStyle('B14')->getFont()->setBold(true);
        $activeSheet->setCellValue('A15', $model->getAttributeLabel('wp_pln_noe'))->getStyle('A15')->getFont()->setBold(true);
        $activeSheet->setCellValue('C15', $model->getAttributeLabel('wp_outsource_noe'))->getStyle('C15')->getFont()->setBold(true);
    
        $activeSheet->setCellValue('C7', $model->wp_work_type)->getStyle('C7')->applyFromArray($valueCellStyle);
        $activeSheet->setCellValue('C8', Yii::$app->formatter->asHtml($model->wp_work_details))->getStyle('C8')->applyFromArray($valueCellStyle);
        $activeSheet->setCellValue('C9', $model->wp_work_location)->getStyle('C9')->applyFromArray($valueCellStyle);
        $activeSheet->setCellValue('C10', $model->wp_company_department)->getStyle('C10')->applyFromArray($valueCellStyle);
        $activeSheet->setCellValue('C11', $model->wp_leader_name)->getStyle('C11')->applyFromArray($valueCellStyle);
        $activeSheet->setCellValue('E11', $model->wp_leader_phone)->getStyle('E11')->applyFromArray($valueCellStyle);
        $activeSheet->setCellValue('C12', $model->wp_supervisor_name)->getStyle('C12')->applyFromArray($valueCellStyle);
        $activeSheet->setCellValue('E12', $model->wp_supervisor_phone)->getStyle('E12')->applyFromArray($valueCellStyle);
        $activeSheet->setCellValue('C13', sprintf('%s, %s: %s', Yii::$app->formatter->asDate($model->wp_start_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH), AppLabels::TIME, Yii::$app->formatter->asDate($model->wp_start_date, AppConstants::FORMAT_TIME_PHP)))->getStyle('C13')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $activeSheet->setCellValue('C14', sprintf('%s, %s: %s', Yii::$app->formatter->asDate($model->wp_end_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH), AppLabels::TIME, Yii::$app->formatter->asDate($model->wp_end_date, AppConstants::FORMAT_TIME_PHP)))->getStyle('C14')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $activeSheet->getStyle('C13')->applyFromArray($valueCellStyle);
        $activeSheet->getStyle('C14')->applyFromArray($valueCellStyle);
        $activeSheet->setCellValue('E14', $model->work_duration)->getStyle('E14')->applyFromArray($valueCellStyle);
        $activeSheet->setCellValue('B15', sprintf('%s %s', $model->wp_pln_noe, AppLabels::PERSONNEL))->getStyle('B15')->applyFromArray($valueCellStyle);
        $activeSheet->setCellValue('D15', sprintf('%s %s', $model->wp_outsource_noe, AppLabels::PERSONNEL))->getStyle('D15')->applyFromArray($valueCellStyle);
        
        $activeSheet->mergeCells('A7:B7');
        $activeSheet->mergeCells('A8:B8');
        $activeSheet->mergeCells('A9:B9');
        $activeSheet->mergeCells('A10:B10');
        $activeSheet->mergeCells('A11:B11');
        $activeSheet->mergeCells('A12:B12');
        $activeSheet->mergeCells('A13:A14');
    
        $activeSheet->mergeCells('C7:E7');
        $activeSheet->mergeCells('C8:E8');
        $activeSheet->mergeCells('C9:E9');
        $activeSheet->mergeCells('C10:E10');
        $activeSheet->mergeCells('C13:D13');
        $activeSheet->mergeCells('C14:D14');
        $activeSheet->mergeCells('D15:E15');
    
        $styleArray = [
            'alignment' => [
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP,
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
        $activeSheet->getStyle('A6:E15')->applyFromArray($styleArray);
        
        // JOB CLASSIFICATION
        $activeSheet->setCellValue('A16', strtoupper($model->getAttributeLabel('wp_job_classification')))->getStyle('A16')->getFont()->setBold(true);
        $activeSheet->getStyle('A16')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $activeSheet->mergeCells('A16:E16');
        $list = Codeset::customMap(AppConstants::CODESET_WORKING_PERMIT_JOB_CLASSIFICATION, 'cset_value', ['empty' => false]);
        
        $index = 17;
        $cols = ['A', 'C', 'E'];
        $mergeCols = ['B', 'D'];
        $listChunk = array_chunk($list, 3, true);
        foreach ($listChunk as $list) {
            $colsIndex = 0;
            foreach ($list as $jobCode => $jobName) {
                $text = '[ ] ' . $jobName;
                if (in_array($jobCode, $model->job_classification_array)) {
                    $text = '[v] ' . $jobName;
                    if (isset($model->job_classification_array[$jobCode])) {
                        $text .= ': ' . $model->job_classification_array[$jobCode];
                    }
                }
        
                $activeSheet->setCellValue($cols[$colsIndex] . $index, $text);
                if (isset($mergeCols[$colsIndex])) {
                    $activeSheet->mergeCells(sprintf('%s%s:%s%s', $cols[$colsIndex], $index, $mergeCols[$colsIndex], $index));
                }
                $colsIndex++;
            }
            $index++;
        }
        $activeSheet->mergeCells(sprintf('A%s:E%s', $index, $index));
        $index++; // give space
        
        // K3 RULES
        $activeSheet->setCellValue('A' . $index, strtoupper($model->getAttributeLabel('wp_k3_rules')))->getStyle('A' . $index)->getFont()->setBold(true);
        $activeSheet->getStyle('A' . $index)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $activeSheet->mergeCells(sprintf('A%s:E%s', $index, $index));
        $list = Codeset::customMap(AppConstants::CODESET_WORKING_PERMIT_K3_RULES, 'cset_value', ['empty' => false]);
    
        $index++;
        $cols = ['A', 'D'];
        $mergeCols = ['C', 'E'];
        $listChunk = array_chunk($list, 2, true);
        foreach ($listChunk as $list) {
            $colsIndex = 0;
            foreach ($list as $jobCode => $jobName) {
                $text = '[ ] ' . $jobName;
                if (in_array($jobCode, $model->k3_rules_array)) {
                    $text = '[v] ' . $jobName;
                    if (isset($model->k3_rules_array[$jobCode])) {
                        $text .= ': ' . $model->k3_rules_array[$jobCode];
                    }
                }
            
                $activeSheet->setCellValue($cols[$colsIndex] . $index, $text);
                if (isset($mergeCols[$colsIndex])) {
                    $activeSheet->mergeCells(sprintf('%s%s:%s%s', $cols[$colsIndex], $index, $mergeCols[$colsIndex], $index));
                }
                $colsIndex++;
            }
            $index++;
        }
        $activeSheet->mergeCells(sprintf('A%s:E%s', $index, $index));
        $index++; // give space
        
        // SELF PROTECTION
        $activeSheet->setCellValue('A' . $index, strtoupper($model->getAttributeLabel('wp_self_protection')))->getStyle('A' . $index)->getFont()->setBold(true);
        $activeSheet->getStyle('A' . $index)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $activeSheet->mergeCells(sprintf('A%s:E%s', $index, $index));
        $list = Codeset::customMap(AppConstants::CODESET_WORKING_PERMIT_SELF_PROTECTION, 'cset_value', ['empty' => false]);
    
        $index++;
        $cols = ['A', 'C', 'E'];
        $mergeCols = ['B', 'D'];
        $listChunk = array_chunk($list, 3, true);
        foreach ($listChunk as $list) {
            $colsIndex = 0;
            foreach ($list as $jobCode => $jobName) {
                $text = '[ ] ' . $jobName;
                if (in_array($jobCode, $model->self_protection_array)) {
                    $text = '[v] ' . $jobName;
                    if (isset($model->self_protection_array[$jobCode])) {
                        $text .= ': ' . $model->self_protection_array[$jobCode];
                    }
                }
            
                $activeSheet->setCellValue($cols[$colsIndex] . $index, $text);
                if (isset($mergeCols[$colsIndex])) {
                    $activeSheet->mergeCells(sprintf('%s%s:%s%s', $cols[$colsIndex], $index, $mergeCols[$colsIndex], $index));
                }
                $colsIndex++;
            }
            $index++;
        }
        $activeSheet->mergeCells(sprintf('A%s:E%s', $index, $index));
        $index++; // give space
    
        // DANGEROUS WORK
        $activeSheet->setCellValue('A' . $index, strtoupper($model->getAttributeLabel('wp_dangerous_work_type')))->getStyle('A' . $index)->getFont()->setBold(true);
        $activeSheet->getStyle('A' . $index)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $activeSheet->mergeCells(sprintf('A%s:E%s', $index, $index));
        $list = Codeset::customMap(AppConstants::CODESET_WORKING_PERMIT_DANGEROUS_WORK, 'cset_value', ['empty' => false]);
    
        $index++;
        $cols = ['A', 'C', 'E'];
        $mergeCols = ['B', 'D'];
        $listChunk = array_chunk($list, 3, true);
        foreach ($listChunk as $list) {
            $colsIndex = 0;
            foreach ($list as $jobCode => $jobName) {
                $text = '[ ] ' . $jobName;
                if (in_array($jobCode, $model->dangerous_work_array)) {
                    $text = '[v] ' . $jobName;
                    if (isset($model->dangerous_work_array[$jobCode])) {
                        $text .= ': ' . $model->dangerous_work_array[$jobCode];
                    }
                }
            
                $activeSheet->setCellValue($cols[$colsIndex] . $index, $text);
                if (isset($mergeCols[$colsIndex])) {
                    $activeSheet->mergeCells(sprintf('%s%s:%s%s', $cols[$colsIndex], $index, $mergeCols[$colsIndex], $index));
                }
                $colsIndex++;
            }
            $index++;
        }
        $activeSheet->mergeCells(sprintf('A%s:E%s', $index, $index));
        $index++; // give space
        
        $styleArray = [
            'alignment' => [
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP,
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
        $activeSheet->getStyle('A16:E' . $index)->applyFromArray($styleArray);
        
        //=====================
        
        $startIndexForStyle = $index;
        $activeSheet->setCellValue('A' . $index, strtoupper(AppLabels::PHPEXCEL_WORKING_PERMIT_DOCUMENT_APPROVAL))->getStyle('A' . $index)->getFont()->setBold(true);
        $activeSheet->mergeCells(sprintf('A%s:E%s', $index, $index));
        $index++;
        
        $activeSheet->setCellValue('B' . $index, AppLabels::PHPEXCEL_CHECKED_APPROVED_IMPLEMENTED_ISOLATION_IF);
        $activeSheet->setCellValue('E' . $index, sprintf('%s %s,', AppLabels::PHPEXCEL_APPROVED_CONTROLLED_BY, AppLabels::WP_SUB_K2LH));
    
        $activeSheet->mergeCells(sprintf('A%s:A%s', $index, $index+5));
        $activeSheet->mergeCells(sprintf('B%s:D%s', $index, $index+5));
        $activeSheet->mergeCells(sprintf('E%s:E%s', $index, $index+5));
        $index += 6;
    
        $activeSheet->setCellValue('A' . $index, strtoupper(AppLabels::PHPEXCEL_WORKING_PERMIT_COMPLETION_APPROVAL))->getStyle('A' . $index)->getFont()->setBold(true);
        $activeSheet->mergeCells(sprintf('A%s:E%s', $index, $index));
        $index++;
    
        $activeSheet->setCellValue('B' . $index, AppLabels::PHPEXCEL_CHECKED_APPROVED_RELEASE_ISOLATION);
        $activeSheet->setCellValue('E' . $index, sprintf('%s %s,', AppLabels::PHPEXCEL_APPROVED_CONTROLLED_BY, AppLabels::WP_SAFETY_DEPARTMENT));
    
        $activeSheet->mergeCells(sprintf('A%s:A%s', $index, $index+5));
        $activeSheet->mergeCells(sprintf('B%s:D%s', $index, $index+5));
        $activeSheet->mergeCells(sprintf('E%s:E%s', $index, $index+5));
        $index += 5;
    
        $styleArray = [
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP,
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
        $activeSheet->getStyle(sprintf('A%s:E%s', $startIndexForStyle, $index))->applyFromArray($styleArray);
        
        //=======================
        $index++;
        $activeSheet->setCellValue('A' . $index, AppLabels::PHPEXCEL_WORKING_PERMIT_FOOTER_NOTE)->getStyle('A' . $index);
        $activeSheet->mergeCells(sprintf('A%s:E%s', $index, $index));
        
        $styleArray = [
            'font' => [
                'size' => 8,
                'color' => [
                    'argb' => \PHPExcel_Style_Color::COLOR_RED
                ]
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
        $activeSheet->getStyle(sprintf('A%s:E%s', $index, $index))->applyFromArray($styleArray);
        
        // FINISH
        
        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);
    
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);
    
        $this->filename = $filename;
    
        return true;
    }
}
