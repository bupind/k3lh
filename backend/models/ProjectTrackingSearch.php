<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\helpers\Converter;

/**
 * ProjectTrackingSearch represents the model behind the search form about `backend\models\ProjectTracking`.
 */
class ProjectTrackingSearch extends ProjectTracking {
    
    public $filename;
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'sector_id', 'power_plant_id', 'pt_estimated_project_value'], 'integer'],
            [['pt_name', 'pt_goal', 'pt_description', 'pt_owner_code', 'pt_report_period', 'pt_controller_code', 'pt_report_to_code', 'pt_ao_no', 'pt_easy_impact', 'pt_support'], 'safe'],
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
        $query = ProjectTracking::find();
        
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
            'pt_report_period' => $this->pt_report_period,
            'pt_estimated_project_value' => $this->pt_estimated_project_value,
        ]);
        
        $query->andFilterWhere(['like', 'pt_name', $this->pt_name])
            ->andFilterWhere(['like', 'pt_goal', $this->pt_goal])
            ->andFilterWhere(['like', 'pt_description', $this->pt_description])
            ->andFilterWhere(['like', 'pt_owner_code', $this->pt_owner_code])
            ->andFilterWhere(['like', 'pt_controller_code', $this->pt_controller_code])
            ->andFilterWhere(['like', 'pt_report_to_code', $this->pt_report_to_code])
            ->andFilterWhere(['like', 'pt_ao_no', $this->pt_ao_no])
            ->andFilterWhere(['like', 'pt_easy_impact', $this->pt_easy_impact])
            ->andFilterWhere(['like', 'pt_support', $this->pt_support]);
        
        return $dataProvider;
    }
    
    public function export($id) {
        $query = ProjectTracking::find()->where(['id' => $id]);
        $model = $query->one();
        
        if (!$model->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $model;
        }
        
        // export to excel
        //main excel setup
        $objPHPExcel = new \PHPExcel();
        $filename = sprintf(AppConstants::REPORT_NAME_PROJECT_TRACKING, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];
        
        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);
        
        
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle($model->pt_name);
        
        // set cols width
        $activeSheet->getColumnDimension('A')->setWidth(35);
        $activeSheet->getColumnDimension('B')->setWidth(12);
        $activeSheet->getColumnDimension('C')->setWidth(12);
        $activeSheet->getColumnDimension('D')->setWidth(12);
        $activeSheet->getColumnDimension('E')->setWidth(12);
        $activeSheet->getColumnDimension('F')->setWidth(12);
        $activeSheet->getColumnDimension('G')->setWidth(12);
        $activeSheet->getColumnDimension('H')->setWidth(12);
        $activeSheet->getColumnDimension('I')->setWidth(35);
        $activeSheet->getColumnDimension('J')->setWidth(35);
    
        // set row width
        $activeSheet->getRowDimension('4')->setRowHeight(40);
        $activeSheet->getRowDimension('7')->setRowHeight(5);
    
        //header
        $activeSheet->mergeCells('A1:J1');
        $activeSheet->setCellValue('A1', strtoupper(AppLabels::PROJECT_TRACKING));
    
        //header style
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 12,
                'underline' => true,
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap' => true
            ],
        ];
        $activeSheet->getStyle('A1:J1')->applyFromArray($styleArray);
        
        // top content
        // set label
        $activeSheet->setCellValue('A2', $model->getAttributeLabel('pt_name'))->getStyle('A2')->getFont()->setBold(true);
        $activeSheet->setCellValue('A3', $model->getAttributeLabel('pt_goal'))->getStyle('A3')->getFont()->setBold(true);
        $activeSheet->setCellValue('A4', $model->getAttributeLabel('pt_description'))->getStyle('A4')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_TOP);
        $activeSheet->getStyle('A4')->getFont()->setBold(true);
        $activeSheet->setCellValue('A5', $model->getAttributeLabel('start_date'))->getStyle('A5')->getFont()->setBold(true);
        $activeSheet->setCellValue('A6', $model->getAttributeLabel('end_date'))->getStyle('A6')->getFont()->setBold(true);
        $activeSheet->setCellValue('D5', AppLabels::LOCATION)->getStyle('D5')->getFont()->setBold(true);
        $activeSheet->setCellValue('D6', $model->getAttributeLabel('pt_owner_code'))->getStyle('D6')->getFont()->setBold(true);
        
        // set value
        $activeSheet->setCellValue('B2', $model->pt_name);
        $activeSheet->setCellValue('B3', $model->pt_goal)->getStyle('B3')->getAlignment()->setWrapText(true);
        $activeSheet->setCellValue('B4', $model->pt_description)->getStyle('B4')->getAlignment()->setWrapText(true)->setVertical(\PHPExcel_Style_Alignment::VERTICAL_TOP);
        $activeSheet->setCellValue('B5', $model->start_date);
        $activeSheet->setCellValue('B6', $model->end_date);
        $activeSheet->setCellValue('F5', $model->powerPlant->pp_name);
        $activeSheet->setCellValue('F6', $model->pt_owner_code_desc);
        
        // merge
        $activeSheet->mergeCells('B2:J2');
        $activeSheet->mergeCells('B3:J3');
        $activeSheet->mergeCells('B4:J4');
        $activeSheet->mergeCells('B5:C5');
        $activeSheet->mergeCells('B6:C6');
        $activeSheet->mergeCells('D5:E5');
        $activeSheet->mergeCells('D6:E6');
        $activeSheet->mergeCells('F5:J5');
        $activeSheet->mergeCells('F6:J6');
    
        // top content style
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
        $activeSheet->getStyle('A2:J6')->applyFromArray($styleArray);
        
        // table content
        // set table header
        $activeSheet->setCellValue('A8', $model->firstActivity->getAttributeLabel('ptd_step'));
        $activeSheet->setCellValue('B8', $model->firstActivity->getAttributeLabel('ptd_pic_code'));
        $activeSheet->setCellValue('C8', $model->firstActivity->getAttributeLabel('ptd_status'));
        $activeSheet->setCellValue('D8', AppLabels::DATE);
        $activeSheet->setCellValue('D9', $model->firstActivity->getAttributeLabel('ptd_duration'));
        $activeSheet->setCellValue('E9', $model->firstActivity->getAttributeLabel('ptd_start_date'));
        $activeSheet->setCellValue('F9', $model->firstActivity->getAttributeLabel('end_date'));
        $activeSheet->setCellValue('G8', AppLabels::PROGRESS);
        $activeSheet->setCellValue('G9', '%');
        $activeSheet->setCellValue('H9', '% Acc.');
        $activeSheet->setCellValue('I8', $model->firstActivity->getAttributeLabel('ptd_information'));
        $activeSheet->setCellValue('J8', $model->firstActivity->getAttributeLabel('files'));
        
        // merge table header
        $activeSheet->mergeCells('A8:A9');
        $activeSheet->mergeCells('B8:B9');
        $activeSheet->mergeCells('C8:C9');
        $activeSheet->mergeCells('D8:F8');
        $activeSheet->mergeCells('G8:H8');
        $activeSheet->mergeCells('I8:I9');
        $activeSheet->mergeCells('J8:J9');
    
        // style table header
        $styleArray = [
            'font' => [
                'bold' => true
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap' => true,
            ],
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFFFE799']
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
        $activeSheet->getStyle('A8:J9')->applyFromArray($styleArray);
        
        // set table rows
        $index = 10;
        $progressAccumulation = 0;
        foreach ($model->projectTrackingDetails as $key => $projectTrackingDetail) {
            
            $progressAccumulation += $projectTrackingDetail->ptd_progress_percentage;
            
            $activeSheet->setCellValue('A' . $index, $projectTrackingDetail->ptd_step);
            $activeSheet->setCellValue('B' . $index, $projectTrackingDetail->ptd_pic_code_desc);
            $activeSheet->setCellValue('C' . $index, $projectTrackingDetail->ptd_status_desc);
            $activeSheet->setCellValue('D' . $index, $projectTrackingDetail->ptd_duration);
            $activeSheet->setCellValue('E' . $index, $projectTrackingDetail->ptd_start_date);
            $activeSheet->setCellValue('F' . $index, $projectTrackingDetail->end_date);
            $activeSheet->setCellValue('G' . $index, $projectTrackingDetail->ptd_progress_percentage);
            $activeSheet->setCellValue('H' . $index, $progressAccumulation);
            $activeSheet->setCellValue('I' . $index, $projectTrackingDetail->ptd_information);
            
            if (!empty($projectTrackingDetail->attachmentOwners)) {
                foreach (Converter::attachmentsFullPath($projectTrackingDetail->attachmentOwners) as $key2 => $attachment) {
                    $activeSheet->setCellValue('J' . $index, $attachment['label']);
                    $activeSheet->getCell('J' . $index)->getHyperlink()->setUrl($attachment['path']);
                    $activeSheet->getCell('J' . $index)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                    $activeSheet->getCell('J' . $index)->getStyle()->getAlignment()->setWrapText(true);
                    
                    if ($key2 > 0) {
                        $activeSheet->mergeCells(sprintf('A%s:I%s', $index, $index));
                    }
                    
                    $index++;
                }
            } else {
                $index++;
            }
        }
        
        // set table footer
        $activeSheet->setCellValue('A' . $index, AppLabels::PT_RESUME)->getStyle('A' . $index)->getFont()->setBold(true);
        $activeSheet->getCell('A' . $index)->getStyle()->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $activeSheet->setCellValue('H' . $index, $progressAccumulation)->getStyle('H' . $index)->getFont()->setBold(true);
        $activeSheet->mergeCells(sprintf('A%s:G%s', $index, $index));
    
        // style table rows and footer
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
        $activeSheet->getStyle('A10:J' . $index)->applyFromArray($styleArray);
    
        $index += 2;
        
        // set footer label
        $activeSheet->setCellValue('A' . $index, $model->getAttributeLabel('pt_report_period'))->getStyle('A' . $index)->getFont()->setBold(true);
        $activeSheet->setCellValue('A' . ($index+1), $model->getAttributeLabel('pt_controller_code'))->getStyle('A' . ($index+1))->getFont()->setBold(true);
        $activeSheet->setCellValue('A' . ($index+2), $model->getAttributeLabel('pt_report_to_code'))->getStyle('A' . ($index+2))->getFont()->setBold(true);
        $activeSheet->getCell('A' . ($index+2))->getStyle()->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_TOP);
    
        $activeSheet->setCellValue('E' . $index, $model->getAttributeLabel('pt_estimated_project_value'))->getStyle('E' . $index)->getFont()->setBold(true);
        $activeSheet->setCellValue('E' . ($index+1), $model->getAttributeLabel('pt_ao_no'))->getStyle('E' . ($index+1))->getFont()->setBold(true);
        $activeSheet->setCellValue('E' . ($index+2), $model->getAttributeLabel('pt_easy_impact'))->getStyle('E' . ($index+2))->getFont()->setBold(true);
        $activeSheet->getCell('E' . ($index+2))->getStyle()->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_TOP);
        $activeSheet->setCellValue('E' . ($index+3), $model->getAttributeLabel('pt_support'))->getStyle('E' . ($index+3))->getFont()->setBold(true);
        
        // set footer value
        $activeSheet->setCellValue('B' . $index, \PHPExcel_Shared_Date::PHPToExcel(new \DateTime($model->pt_report_period)))->getStyle('B' . $index)->getFont()->setBold(true);
        $activeSheet->getStyle('B' . $index)->getNumberFormat()->setFormatCode('mm/yyyy');
        
        $activeSheet->setCellValue('B' . ($index+1), $model->pt_controller_code_desc);
        $activeSheet->setCellValue('B' . ($index+2), Converter::toHtmlList($model->pt_report_to_code_view));
        $activeSheet->getCell('B' . ($index+2))->getStyle()->getAlignment()->setWrapText(true)->setVertical(\PHPExcel_Style_Alignment::VERTICAL_TOP);
    
        $activeSheet->setCellValue('G' . $index, $model->pt_estimated_project_value);
        $activeSheet->getStyle('G' . $index)->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
        $activeSheet->setCellValue('G' . ($index+1), $model->pt_ao_no);
        $activeSheet->setCellValue('G' . ($index+2), Converter::format($model->pt_easy_impact, AppConstants::FORMAT_TYPE_HIGH_LOW));
        $activeSheet->getCell('G' . ($index+2))->getStyle()->getAlignment()->setWrapText(true)->setVertical(\PHPExcel_Style_Alignment::VERTICAL_TOP);
        $activeSheet->setCellValue('G' . ($index+3), $model->pt_support);
        
        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);
        
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);
        
        $this->filename = $filename;
        
        return true;
    }
}
