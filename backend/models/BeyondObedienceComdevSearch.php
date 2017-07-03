<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * BeyondObedienceComdevSearch represents the model behind the search form about `backend\models\BeyondObedienceComdev`.
 */
class BeyondObedienceComdevSearch extends BeyondObedienceComdev
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'boc_year', 'boc_production'], 'integer'],
            [['boc_form_type_code'], 'safe'],
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
        $query = BeyondObedienceComdev::find();

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
            'boc_year' => $this->boc_year,
            'boc_production' => $this->boc_production,
        ]);

        $query->andFilterWhere(['like', 'boc_form_type_code', $this->boc_form_type_code]);

        return $dataProvider;
    }

    public function export($id) {

        $query = BeyondObedienceComdev::find()->where(['id' => $id]);

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
        $filename = sprintf(AppConstants::REPORT_NAME_BEYOND_OBEDIENCE_COMDEV, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::COMDEV);

        //Get model
        $model = $dataProvider->getModels()[0];

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(30);
        $activeSheet->getColumnDimension('C')->setWidth(20);
        $activeSheet->getColumnDimension('D')->setWidth(15);
        $activeSheet->getColumnDimension('E')->setWidth(20);
        $activeSheet->getColumnDimension('F')->setWidth(10);
        $activeSheet->getColumnDimension('G')->setWidth(15);

        //header

        $activeSheet->mergeCells('A2:D2');
        $activeSheet->setCellValue('A2', sprintf("%s %s",AppLabels::PROGRAM,AppLabels::COMDEV));

        //==========================================================================

        // body header
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => [
                        'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                    ]
                ]
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
        ];

        $activeSheet->mergeCells('A4:A5');
        $activeSheet->mergeCells('B4:B5');
        $activeSheet->mergeCells('C4:G4');
        $activeSheet->mergeCells('C5:F5');
        $activeSheet->mergeCells('G5:G6');
        $activeSheet->getStyle('A4:A5')->applyFromArray($styleArray);
        $activeSheet->getStyle('B4:B5')->applyFromArray($styleArray);
        $activeSheet->getStyle('C4:G4')->applyFromArray($styleArray);
        $activeSheet->getStyle('C5:F5')->applyFromArray($styleArray);
        $activeSheet->getStyle('G5:G6')->applyFromArray($styleArray);
        $activeSheet->getStyle('A6')->applyFromArray($styleArray);
        $activeSheet->getStyle('B6')->applyFromArray($styleArray);
        $activeSheet->getStyle('C6')->applyFromArray($styleArray);
        $activeSheet->getStyle('D6')->applyFromArray($styleArray);
        $activeSheet->getStyle('E6')->applyFromArray($styleArray);
        $activeSheet->getStyle('F6')->applyFromArray($styleArray);
        $activeSheet->setCellValue('A4', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('B4', sprintf("%s %s", AppLabels::PROGRAM,AppLabels::COMDEV));
        $activeSheet->setCellValue('C4', AppLabels::PERCENT_COMDEV_SUCCESS);
        $activeSheet->setCellValue('C5', $model->boc_year);
        $activeSheet->setCellValue('G5', AppLabels::UNIT);

        $activeSheet->setCellValue('C6', AppLabels::PUBLIC_INCOME);
        $activeSheet->setCellValue('D6', AppLabels::BOC_IMPACT);
        $activeSheet->setCellValue('E6', AppLabels::BOC_EFFORT);
        $activeSheet->setCellValue('F6', AppLabels::BOC_BUDGET);

        //==========================================================================

        //body
        $rowIndex = 7;
        $publicIncomeTotal = 0;
        $impactTotal = 0;
        $effortTotal = 0;
        $budgetTotal = 0;
        foreach($model->bocDetails as $keyD => $detail){

            $activeSheet->setCellValue('A' . $rowIndex, ($keyD+1));
            $activeSheet->setCellValue('B' . $rowIndex, $detail->bocd_program);
            $activeSheet->setCellValue('C' . $rowIndex, $detail->bocd_public_income);
            $activeSheet->setCellValue('D' . $rowIndex, $detail->bocd_impact);
            $activeSheet->setCellValue('E' . $rowIndex, $detail->bocd_effort);
            $activeSheet->setCellValue('F' . $rowIndex, $detail->bocd_budget);
            $activeSheet->setCellValue('G' . $rowIndex, $detail->bocd_unit_code_desc);

            $publicIncomeTotal += $detail->bocd_public_income;
            $impactTotal += $detail->bocd_impact;
            $effortTotal += $detail->bocd_effort;
            $budgetTotal += $detail->bocd_budget;

            $rowIndex++;
        }

        $activeSheet->mergeCells('A' . $rowIndex . ':B' . $rowIndex);
        $activeSheet->getStyle('A' . $rowIndex . ':B' . $rowIndex)->applyFromArray($styleArray);
        $activeSheet->setCellValue('A' . $rowIndex, AppLabels::BUDGET_TOTAL);

        $activeSheet->setCellValue('C' . $rowIndex, $publicIncomeTotal);
        $activeSheet->setCellValue('D' . $rowIndex, $impactTotal);
        $activeSheet->setCellValue('E' . $rowIndex, $effortTotal);
        $activeSheet->setCellValue('F' . $rowIndex, $budgetTotal);

        $rowIndex++;

        $activeSheet->mergeCells('A' . $rowIndex . ':B' . $rowIndex);
        $activeSheet->mergeCells('C' . $rowIndex . ':F' . $rowIndex);
        $activeSheet->getStyle('A' . $rowIndex . ':B' . $rowIndex)->applyFromArray($styleArray);
        $activeSheet->setCellValue('A' . $rowIndex, AppLabels::PRODUCTION);

        $activeSheet->setCellValue('C' . $rowIndex, $model->boc_production);

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
