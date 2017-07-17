<?php

namespace backend\models;

use common\components\helpers\Converter;
use common\vendor\AppLabels;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;

/**
 * WorkingPlanSearch represents the model behind the search form about `backend\models\WorkingPlan`.
 */
class WorkingPlanSearch extends WorkingPlan {
    
    public $filename;
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'sector_id'], 'integer'],
            [['form_type_code', 'wp_year'], 'safe'],
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
        $query = WorkingPlan::find();
        
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
        ]);
        
        $query->andFilterWhere(['like', 'form_type_code', $this->form_type_code])
            ->andFilterWhere(['like', 'wp_year', $this->wp_year]);
        
        return $dataProvider;
    }
    
    public function export($id) {
        $query = WorkingPlan::find()->where(['id' => $id]);
        $model = $query->one();
    
        if (!$model->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $model;
        }
    
        // export to excel
        //main excel setup
        $objPHPExcel = new \PHPExcel();
        $filename = sprintf(AppConstants::REPORT_NAME_WORKING_PLAN, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];
    
        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);
    
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle($model->wp_year);
    
        // set cols width A - BB
        $activeSheet->getColumnDimensionByColumn(0)->setWidth(5);
        $activeSheet->getColumnDimensionByColumn(1)->setWidth(40);
        $activeSheet->getColumnDimensionByColumn(2)->setWidth(5);
        $activeSheet->getColumnDimensionByColumn(3)->setWidth(15);
        $activeSheet->getColumnDimensionByColumn(4)->setWidth(15);
        for ($i=5; $i<=52; $i++) {
            $activeSheet->getColumnDimensionByColumn($i)->setWidth(5);
        }
        $activeSheet->getColumnDimensionByColumn(53)->setWidth(40);
        
        // begin header
        $activeSheet->setCellValue('A2', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('B2', AppLabels::PROGRAM);
        $activeSheet->setCellValue('C2', AppLabels::RNR);
        $activeSheet->setCellValue('D2', AppLabels::LOCATION);
        $activeSheet->setCellValue('E2', AppLabels::PIC);
        $activeSheet->setCellValue('F2', $model->wp_year);
        $activeSheet->setCellValue('BB2', AppLabels::DOCUMENTS);
        
        $colIndex = 5;
        foreach (AppConstants::$monthsList as $monthLabel) {
            $mergeStartIndex = $colIndex;
            $activeSheet->setCellValueByColumnAndRow($colIndex,3, $monthLabel);
            for ($i=1; $i<=4; $i++) {
                $activeSheet->setCellValueByColumnAndRow($colIndex,4, Converter::toRoman($i));
                $colIndex++;
            }
            $activeSheet->mergeCellsByColumnAndRow($mergeStartIndex, 3, $colIndex - 1, 3);
        }
        
        $activeSheet->mergeCells('A2:A4');
        $activeSheet->mergeCells('B2:B4');
        $activeSheet->mergeCells('C2:C4');
        $activeSheet->mergeCells('D2:D4');
        $activeSheet->mergeCells('E2:E4');
        $activeSheet->mergeCells('BB2:BB4');
        $activeSheet->mergeCellsByColumnAndRow(5, 2, 52, 2);
    
        //header style
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFFFDA65']
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap' => true
            ],
        ];
        $activeSheet->getStyle('A2:BB4')->applyFromArray($styleArray);
        
        // loop content
        $index = 5;
        $no = 1;
        $colors = [1 => 'FFA5A5A5', 2 => 'FF44546A', 3 => 'FFFF0000', 4 => 'FF70AD47', 5 => 'FF7030A0'];
        foreach ($model->workingPlanDetails as $key => $detail) {
            if ($detail->workingPlanAttribute->attr_type_code == AppConstants::ATTRIBUTE_TYPE_PROGRAM_ITEM) {
    
                $styleArray = [
                    'alignment' => [
                        'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                        'wrap' => true
                    ],
                ];
                $activeSheet->getStyle(sprintf('A%s:E%s', $index, $index))->applyFromArray($styleArray);
                
                $activeSheet->setCellValue('A' . $index, $no);
                $activeSheet->setCellValue('B' . $index, $detail->workingPlanAttribute->attr_text)->getStyle('B' . $index)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                $activeSheet->setCellValue('C' . $index, $detail->wpd_rnr);
                $activeSheet->setCellValue('D' . $index, $detail->wpd_location);
                $activeSheet->setCellValue('E' . $index, $detail->wpd_pic);
    
                $colIndex = 5;
                foreach (AppConstants::$monthsList as $monthKey => $monthLabel) {
                    for ($i=1; $i<=4; $i++) {
                        $val = isset($detail->monthly_progress[$monthKey][$i]) ? $detail->monthly_progress[$monthKey][$i] : '';
                        
                        if (!empty($val)) {
                            $activeSheet->getStyleByColumnAndRow($colIndex, $index)->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID);
                            $activeSheet->getStyleByColumnAndRow($colIndex, $index)->getFill()->getStartColor()->setARGB($colors[$val]);
                        }
                        
                        $colIndex++;
                    }
                }
                
                $no++;
            } else {
                $activeSheet->setCellValue('A' . $index, $detail->workingPlanAttribute->attr_text);
                $activeSheet->mergeCells(sprintf('A%s:BB%s', $index, $index));
    
                $styleArray = [
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                        'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                        'wrap' => true
                    ],
                ];
                
                if ($detail->workingPlanAttribute->attr_type_code == AppConstants::ATTRIBUTE_TYPE_PROGRAM_HEADER) {
                    $styleArray = array_merge($styleArray, [
                        'font' => [
                            'bold' => true,
                            'color' => [
                                'argb' => \PHPExcel_Style_Color::COLOR_WHITE
                            ]
                        ],
                        'fill' => [
                            'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                            'startcolor' => ['argb' => 'FFC00000']
                        ],
                    ]);
                } else {
                    $styleArray = array_merge($styleArray, [
                        'fill' => [
                            'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                            'startcolor' => ['argb' => 'FFF4B082']
                        ],
                    ]);
                }
                $activeSheet->getStyle(sprintf('A%s:BB%s', $index, $index))->applyFromArray($styleArray);
                
                $no = 1;
            }
            
            $index++;
        }
    
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
        $activeSheet->getStyle('A2:BB' . ($index - 1))->applyFromArray($styleArray);
        $index++;
        
        // legend
        $activeSheet->setCellValue('A' . $index, strtoupper(AppLabels::LEGEND))->getStyle('A' . $index)->getFont()->setBold(true);
        $index++;
    
        $legends = Codeset::getCodesetAll(AppConstants::CODESET_WORKING_PLAN_LEGEND);
        foreach ($legends as $legend) {
            $activeSheet->setCellValue('A' . $index)->getStyle('A' . $index)->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID);
            $activeSheet->setCellValue('A' . $index)->getStyle('A' . $index)->getFill()->getStartColor()->setARGB($colors[$legend->cset_code]);
            $activeSheet->setCellValue('B' . $index, sprintf(': %s', $legend->cset_value));
            
            $index++;
        }
        
        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);
    
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);
    
        $this->filename = $filename;
    
        return true;
    }
}
