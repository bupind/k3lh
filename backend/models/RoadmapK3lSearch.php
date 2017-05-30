<?php

namespace backend\models;

use common\vendor\AppLabels;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;

/**
 * RoadmapK3lSearch represents the model behind the search form about `backend\models\roadmap-k3l`.
 */
class RoadmapK3lSearch extends RoadmapK3l {
    
    public $filename;
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'sector_id', 'power_plant_id'], 'integer'],
            [['form_type_code', 'k3l_year'], 'safe'],
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
        $query = RoadmapK3l::find();
        $sort = ['defaultOrder' => ['k3l_year' => SORT_ASC]];
        
        // add conditions that should always apply here
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => $sort
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
        ]);
        
        $query->andFilterWhere(['like', 'form_type_code', $this->form_type_code])
            ->andFilterWhere(['like', 'k3l_year', $this->k3l_year]);
        
        return $dataProvider;
    }
    
    public function export() {
        $endYear = (int) $this->k3l_year + (int) AppConstants::DEFAULT_YEAR_RANGE;
    
        $query = RoadmapK3l::find();
        $sort = ['defaultOrder' => ['k3l_year' => SORT_ASC]];
    
        // add conditions that should always apply here
    
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => $sort
        ]);
    
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
    
        // grid filtering conditions
        $query->andFilterWhere([
            'sector_id' => $this->sector_id,
            'power_plant_id' => $this->power_plant_id,
        ]);
    
        $query->andFilterWhere(['>=', 'k3l_year', $this->k3l_year])
            ->andFilterWhere(['<=', 'k3l_year', $endYear]);
        
        // export to excel
        $objPHPExcel = new \PHPExcel();
        $filename = sprintf(AppConstants::REPORT_NAME_ROADMAP, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];
        
        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);
    
        foreach ($dataProvider->getModels() as $key => $model) {
            $activeSheet = $objPHPExcel->createSheet($key);
            $activeSheet->setTitle($model->k3l_year);
            $activeSheet->setCellValue('C1', sprintf("ROAD MAP PROGRAM %s %s-%s\n%s %s\n%s %s", $this->form_type_code, $this->k3l_year, $endYear, AppLabels::SECTOR, $this->sector->sector_name, AppLabels::POWER_PLANT, $this->powerPlant->pp_name));
            
            // set dimension
            $activeSheet->getRowDimension('1')->setRowHeight(65);
    
            $activeSheet->getColumnDimension('A')->setWidth(5);
            $activeSheet->getColumnDimension('B')->setWidth(35);
            $activeSheet->getColumnDimension('C')->setWidth(15);
            $activeSheet->getColumnDimension('D')->setWidth(15);
            $activeSheet->getColumnDimension('E')->setWidth(15);
            $activeSheet->getColumnDimension('F')->setWidth(15);
            $activeSheet->getColumnDimension('G')->setWidth(15);
    
            $columnIndexFromString = \PHPExcel_Cell::columnIndexFromString('C');
            $columnIndex = \PHPExcel_Cell::stringFromColumnIndex($columnIndexFromString - 1);
            $rowIndex = 2;
            $index = $columnIndex.$rowIndex;
            $columnIndexFromString += 4;
            $mergeColumnIndex = \PHPExcel_Cell::stringFromColumnIndex($columnIndexFromString - 1);
            $mergeIndex = $mergeColumnIndex.$rowIndex;
    
            // merge header
            $styleArray = [
                'font' => [
                    'bold' => true,
                    'size' => 16
                ],
                'alignment' => [
                    'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap' => true
                ],
                'fill' => [
                    'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                    'startcolor' => ['argb' => \PHPExcel_Style_Color::COLOR_RED]
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
            $mergeCells = sprintf('C1:%s1', $mergeColumnIndex);
            $activeSheet->mergeCells($mergeCells);
            $activeSheet->getStyle($mergeCells)->applyFromArray($styleArray);
            
            // merge target header
            $styleArray = [
                'font' => [
                    'bold' => true
                ],
                'alignment' => [
                    'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ],
                'fill' => [
                    'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                    'startcolor' => ['argb' => 'FFED7D31']
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
            $mergeCells = sprintf('%s:%s', $index, $mergeIndex);
            $activeSheet->setCellValue($index, sprintf('%s %s', strtoupper(AppLabels::TARGET), $model->k3l_year));
            $activeSheet->getStyle($mergeCells)->applyFromArray($styleArray);
            $activeSheet->mergeCells($mergeCells);
    
            // TARGET
            $rowIndex++;
            foreach ($model->roadmapK3lTargets as $keyTarget => $target) {
                $index = $columnIndex.$rowIndex;
                $mergeIndex = $mergeColumnIndex.$rowIndex;
                $mergeCells = sprintf('%s:%s', $index, $mergeIndex);
        
                $activeSheet->setCellValue($index, sprintf('%s) %s = %s', ++$keyTarget, $target->roadmapK3lAttribute->attr_text, $target->target_value));
                $activeSheet->getStyle($mergeCells)->applyFromArray($styleArray);
                $activeSheet->getStyle($mergeCells)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        
                $activeSheet->mergeCells($mergeCells);
                $rowIndex++;
            }
            
            // PROGRAM
            $styleArray = [
                'font' => [
                    'bold' => true
                ],
                'alignment' => [
                    'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ],
                'fill' => [
                    'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                    'startcolor' => ['argb' => 'FFC0504D']
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
            $activeSheet->getStyle(sprintf('A%s:G%s', $rowIndex, $rowIndex))->applyFromArray($styleArray);
    
            $mergeCells = sprintf('A%s:B%s', $rowIndex, $rowIndex);
            $activeSheet->setCellValue('A' . $rowIndex, strtoupper(AppLabels::PROGRAM));
            $activeSheet->mergeCells($mergeCells);
            $activeSheet->getStyle($mergeCells)->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID);
            $activeSheet->getStyle($mergeCells)->getFill()->getStartColor()->setARGB('FFCCC0DA');
            
            $activeSheet->setCellValue('C' . $rowIndex, strtoupper(AppLabels::WHEN));
            $activeSheet->setCellValue('D' . $rowIndex, strtoupper(AppLabels::WHERE));
            $activeSheet->setCellValue('E' . $rowIndex, strtoupper(AppLabels::WHO));
            $activeSheet->setCellValue('F' . $rowIndex, strtoupper(AppLabels::HOW_MANY));
            $activeSheet->setCellValue('G' . $rowIndex, strtoupper(AppLabels::HOW_MUCH));
            
            $programHeaderStyleArray = [
                'font' => [
                    'bold' => true
                ],
                'fill' => [
                    'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                    'startcolor' => ['argb' => \PHPExcel_Style_Color::COLOR_YELLOW]
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
    
            $programSubHeaderStyleArray = [
                'font' => [
                    'bold' => true
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
    
            $programItemStyleArray = [
                'borders' => [
                    'allborders' => [
                        'style' => \PHPExcel_Style_Border::BORDER_THIN,
                        'color' => [
                            'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                        ]
                    ]
                ]
            ];
            
            $no = 1;
            $rowIndex++;
            foreach ($model->roadmapK3lItems as $keyItem => $item) {
                if ($item->roadmapK3lAttribute->attr_type_code == AppConstants::ATTRIBUTE_TYPE_PROGRAM_ITEM) {
                    $activeSheet->setCellValue('A' . $rowIndex, sprintf('%s.', $no));
                    $activeSheet->setCellValue('B' . $rowIndex, $item->roadmapK3lAttribute->attr_text);
                    $activeSheet->setCellValue('C' . $rowIndex, $item->item_value_when);
                    $activeSheet->getStyle('C' . $rowIndex)->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
                    $activeSheet->setCellValue('D' . $rowIndex, $item->item_value_where);
                    $activeSheet->setCellValue('E' . $rowIndex, $item->item_value_who);
    
                    // attach file into sheet
//                    $activeSheet->setCellValue('E' . $rowIndex, '1492696550_D3JEUY.pdf');
//                    $activeSheet->getCell('E' . $rowIndex)->getHyperlink()->setUrl('file:///D:/xampp/htdocs/k3lh/backend/web/themes/AceMaster/uploads/plb3_sa_static/1492696550_D3JEUY.pdf');
                    
                    $activeSheet->setCellValue('F' . $rowIndex, $item->item_value_how_many);
                    $activeSheet->setCellValue('G' . $rowIndex, $item->item_value_how_much);
                    $activeSheet->getStyle('G' . $rowIndex)->getNumberFormat()->setFormatCode(AppConstants::PHPEXCEL_FORMAT_CURRENCY);
                    
                    $cells = sprintf('A%s:G%s', $rowIndex, $rowIndex);
                    $activeSheet->getStyle($cells)->getAlignment()->setWrapText(true);
                    $activeSheet->getStyle($cells)->applyFromArray($programItemStyleArray);
                    
                    $no++;
                } else {
                    $mergeCells = sprintf('A%s:G%s', $rowIndex, $rowIndex);
                    $activeSheet->setCellValue('A' . $rowIndex, $item->roadmapK3lAttribute->attr_text);
                    $activeSheet->mergeCells($mergeCells);
                    $activeSheet->getStyle($mergeCells)->applyFromArray($item->roadmapK3lAttribute->attr_type_code == AppConstants::ATTRIBUTE_TYPE_PROGRAM_HEADER ? $programHeaderStyleArray : $programSubHeaderStyleArray);
    
                    $no = 1;
                }
    
                $rowIndex++;
            }
            
            // sign
            $styleArray = [
                'font' => [
                    'size' => 8
                ],
                'alignment' => [
                    'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ],
            ];
            
            $rowIndex++;
            $mergeCells = sprintf('A%s:G%s', $rowIndex, $rowIndex);
            $activeSheet->setCellValue('A' . $rowIndex, sprintf('%s, %s %s %s', AppLabels::PHPEXCEL_SIGN_CITY, date('d'), AppConstants::$monthsList[date('n')], date('Y')));
            $activeSheet->mergeCells($mergeCells);
            $activeSheet->getStyle($mergeCells)->applyFromArray($styleArray);
            
            $rowIndex++;
            $mergeCells = sprintf('A%s:G%s', $rowIndex, $rowIndex);
            $activeSheet->setCellValue('A' . $rowIndex, AppLabels::PHPEXCEL_SIGN_DETERMINED_BY);
            $activeSheet->mergeCells($mergeCells);
            $activeSheet->getStyle($mergeCells)->applyFromArray($styleArray);
    
            $rowIndex++;
            $mergeCells = sprintf('A%s:G%s', $rowIndex, $rowIndex);
            $activeSheet->setCellValue('A' . $rowIndex, Yii::$app->user->identity->getEmployee()->name);
            $activeSheet->mergeCells($mergeCells);
            $activeSheet->getStyle($mergeCells)->applyFromArray($styleArray);
            
            $rowIndex += 4;
            $mergeCells = sprintf('A%s:G%s', $rowIndex, $rowIndex);
            $activeSheet->setCellValue('A' . $rowIndex, AppLabels::PHPEXCEL_SIGN_DOT_LINE);
            $activeSheet->mergeCells($mergeCells);
            $activeSheet->getStyle($mergeCells)->applyFromArray($styleArray);
        }
    
        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);
    
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);
        
        $this->filename = $filename;
        
        return true;
    }
}
