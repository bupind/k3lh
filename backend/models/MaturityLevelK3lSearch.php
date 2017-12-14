<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;


/**
 * MaturityLevelK3lSearch represents the model behind the search form about `backend\models\MaturityLevelK3l`.
 */
class MaturityLevelK3lSearch extends MaturityLevelK3l
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'mlvl_year', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['mlvl_quarter'], 'safe'],
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
        $query = MaturityLevelK3l::find();

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
            'mlvl_year' => $this->mlvl_year,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'mlvl_quarter', $this->mlvl_quarter]);

        return $dataProvider;
    }

    public function export($id) {
        $query = MaturityLevelK3l::find()->where(['id' => $id]);
        $model = $query->one();

        if (!$model->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $model;
        }

        $maturityLevelK3lTitles = MaturityLevelK3lTitle::find()->all();
        $detailModels = $model->maturityLevelK3lDetails;

        // export to excel
        //main excel setup
        $objPHPExcel = new \PHPExcel();
        $filename = sprintf(AppConstants::REPORT_NAME_MATURITY_LEVEL_K3L, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);

        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle($model->sector->sector_name);

        // set cols width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(30);
        $activeSheet->getColumnDimension('C')->setWidth(40);
        $activeSheet->getColumnDimension('D')->setWidth(40);
        $activeSheet->getColumnDimension('E')->setWidth(15);
        $activeSheet->getColumnDimension('F')->setWidth(15);
        $activeSheet->getColumnDimension('G')->setWidth(15);
        $activeSheet->getColumnDimension('H')->setWidth(15);
        $activeSheet->getColumnDimension('I')->setWidth(15);
        $activeSheet->getColumnDimension('J')->setWidth(30);

        //header
        $activeSheet->mergeCells('A1:J1');
        $activeSheet->setCellValue('A1', strtoupper(AppLabels::MATURITY_LEVEL_REPORT_K3L_TITLE));
        $activeSheet->mergeCells('A2:J2');
        $activeSheet->setCellValue('A2', strtoupper(AppLabels::PT_PLN_PERSERO));
        $activeSheet->mergeCells('A3:J3');
        $activeSheet->setCellValue('A3', strtoupper(sprintf('%s %s %s %s', AppLabels::QUARTER, $model->mlvl_quarter, AppLabels::YEAR, $model->mlvl_year)));

        // table header
        // set label
        $activeSheet->setCellValue('A5', strtoupper(AppLabels::NUMBER_SHORT));
        $activeSheet->setCellValue('B5', strtoupper(AppLabels::ACTION_PLAN));
        $activeSheet->setCellValue('C5', strtoupper(AppLabels::CRITERIA));
        $activeSheet->setCellValue('D5', strtoupper(AppLabels::EVIDEN));
        $activeSheet->setCellValue('E5', strtoupper(AppLabels::WEIGHT));
        $activeSheet->setCellValue('F5', strtoupper(AppLabels::UNIT));
        $activeSheet->setCellValue('G5', strtoupper(AppLabels::TARGET));
        $activeSheet->setCellValue('H5', strtoupper(AppLabels::REALIZATION));
        $activeSheet->setCellValue('I5', strtoupper(AppLabels::VALUE));
        $activeSheet->setCellValue('J5', strtoupper(AppLabels::DOCUMENTS));

        // header style
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 12,
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'wrap' => true
            ],
        ];
        $activeSheet->getStyle('A1:J5')->applyFromArray($styleArray);

        // content
        $index = 6;
        $detailModelIndex = 0;
        $no = 1;
        $totalWeight = $totalValue = 0;
        $wizard = new \PHPExcel_Helper_HTML();
        foreach ($maturityLevelK3lTitles as $keyTitle => $title) {
            $activeSheet->setCellValue('A' . $index, Converter::toRoman(++$keyTitle));
            $activeSheet->setCellValue('B' . $index, strtoupper($title->title_text));
            $activeSheet->mergeCells(sprintf('B%s:J%s', $index, $index));

            // style title
            $styleArray = [
                'font' => [
                    'bold' => true
                ],
                'fill' => [
                    'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                    'startcolor' => ['argb' => 'FFBFBFBF']
                ]
            ];
            $activeSheet->getStyle(sprintf('A%s:J%s', $index, $index))->applyFromArray($styleArray);

            $index++;
            foreach ($title->maturityLevelK3lQuestions as $keyQuestion => $question) {
                if (isset($detailModels[$detailModelIndex])) {

                    $actionPlan = $wizard->toRichTextObject($question->q_action_plan);
                    $criteria = $wizard->toRichTextObject($question->q_criteria);
                    $eviden = $wizard->toRichTextObject($question->q_eviden);
                    $value = ($detailModels[$detailModelIndex]->mld_realization / $detailModels[$detailModelIndex]->mld_target) * $question->q_weight;

                    $activeSheet->setCellValue('A' . $index, $no++);
                    $activeSheet->setCellValue('B' . $index, $actionPlan);
                    $activeSheet->setCellValue('C' . $index, $criteria);
                    $activeSheet->setCellValue('D' . $index, $eviden);
                    $activeSheet->setCellValue('F' . $index, $question->q_unit_code_desc);
                    $activeSheet->setCellValue('G' . $index, Yii::$app->formatter->asInteger($detailModels[$detailModelIndex]->mld_target));
                    $activeSheet->setCellValue('H' . $index, Yii::$app->formatter->asInteger($detailModels[$detailModelIndex]->mld_realization));
                    $activeSheet->setCellValue('E' . $index, Yii::$app->formatter->asDecimal($question->q_weight, 2));
                    $activeSheet->setCellValue('I' . $index, Yii::$app->formatter->asDecimal($value, 2));

                    $attachmentOwner = Converter::attachmentsFullPath($detailModels[$detailModelIndex]->attachmentOwner);
                    if (!empty($attachmentOwner)) {
                        $activeSheet->setCellValue('J' . $index, $attachmentOwner['label']);
                        $activeSheet->getCell('J' . $index)->getHyperlink()->setUrl($attachmentOwner['path']);
                        $activeSheet->getCell('J' . $index)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                        $activeSheet->getCell('J' . $index)->getStyle()->getAlignment()->setWrapText(true);
                    }

                    $totalWeight += $question->q_weight;
                    $totalValue += $value;

                    $index++;
                    $detailModelIndex++;
                }
            }
        }

        // footer
        $activeSheet->mergeCells(sprintf('A%s:F%s', $index, $index));
        $activeSheet->setCellValue('A' . $index, AppLabels::TOTAL_MATURITY)->getStyle('A' . $index)->getFont()->setBold(true);
        $activeSheet->setCellValue('G' . $index, Yii::$app->formatter->asDecimal($totalWeight, 2))->getStyle('G' . $index)->getFont()->setBold(true);
        $activeSheet->setCellValue('H' . $index, Yii::$app->formatter->asDecimal($totalValue, 2))->getStyle('H' . $index)->getFont()->setBold(true);

        // style table rows
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
                'wrap' => true,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_TOP,
            ],
        ];
        $activeSheet->getStyle('A6:J' . $index)->applyFromArray($styleArray);

        // style table rows center
        $styleArray = [
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ],
        ];
        $activeSheet->getStyle('A' . $index)->applyFromArray($styleArray);
        $activeSheet->getStyle('D6:J' . $index)->applyFromArray($styleArray);

        $index += 3;
        $footerIndexStart = $index;

        $activeSheet->setCellValue('F' . $index, sprintf('%s, %s %s', AppLabels::PHPEXCEL_SIGN_CITY, Converter::indonesianMonthName(date('m')), date('Y')));
        $index++;

        $activeSheet->setCellValue('D' . $index, AppLabels::PHPEXCEL_KNOWING);
        $activeSheet->setCellValue('F' . $index, AppLabels::PHPEXCEL_CREATED_BY);
        $index++;

        $activeSheet->setCellValue('D' . $index, AppLabels::GENERAL_MANAGER);
        $activeSheet->setCellValue('F' . $index, AppLabels::PRODUCTION_MANAGER);
        $index += 5;

        $activeSheet->setCellValue('D' . $index, '???')->getStyle('D' . $index)->getFont()->setBold(true);
        $activeSheet->setCellValue('F' . $index, '???')->getStyle('F' . $index)->getFont()->setBold(true);

        // style table rows center
        $styleArray = [
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ],
        ];
        $activeSheet->getStyle(sprintf('D%s:J%s', $footerIndexStart, $index))->applyFromArray($styleArray);

        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }
}
