<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use Yii;
use common\vendor\AppLabels;
/**
 * Plb3BalanceSheetSearch represents the model behind the search form about `backend\models\Plb3BalanceSheet`.
 */
class Plb3BalanceSheetSearch extends Plb3BalanceSheet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'plb3_year'], 'integer'],
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
        $query = Plb3BalanceSheet::find();

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
        ]);

        return $dataProvider;
    }

    public function export($id) {

        $query = Plb3BalanceSheet::find()->where(['id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $model = $dataProvider->getModels()[0];

        $plb3BalanceSheetDetails = $model->plb3BalanceSheetDetails;

        // export to excel

        //main excel setup
        $objPHPExcel = new \PHPExcel();
        $filename = sprintf(AppConstants::REPORT_NAME_PPU, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);

        $sheetIndex = 0;
        //Creating sheet

        foreach($plb3BalanceSheetDetails as $key => $value) {
            $this->exportPlb3BalanceSheetDetail($objPHPExcel, $sheetIndex++, $value);
        }
        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }

    public function exportPlb3BalanceSheetDetail(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(sprintf("%s %s", AppLabels::BM_REPORT_PARAMETER, AppLabels::CEMS));

        //getting model
        $ppuEmissionSourceModel = $model->ppuEmissionSources;

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(60);
        $activeSheet->getColumnDimension('B')->setWidth(30);
        $activeSheet->getColumnDimension('C')->setWidth(30);
        $activeSheet->getColumnDimension('D')->setWidth(30);
        $activeSheet->getColumnDimension('E')->setWidth(30);
        $activeSheet->getColumnDimension('F')->setWidth(60);
        $activeSheet->getColumnDimension('G')->setWidth(30);
        $activeSheet->getColumnDimension('H')->setWidth(30);
        $activeSheet->getColumnDimension('I')->setWidth(30);
        $activeSheet->getColumnDimension('J')->setWidth(30);
        $activeSheet->getColumnDimension('K')->setWidth(35);

        //==========================================================================

        // body header

        $styleArrayTitle = [
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
            'fill' => [
                'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => ['argb' => 'FFF2F2F2']
            ],
        ];

        $activeSheet->setCellValue('A2', sprintf("%s %s %s", AppLabels::ADHERENCE, AppLabels::MONITORING, AppLabels::CEMS));
        $activeSheet->setCellValue('B2', sprintf("%s %s-%s", AppLabels::QUARTER, "III", $model->ppu_year-1));
        $activeSheet->setCellValue('C2', sprintf("%s %s-%s", AppLabels::QUARTER, "IV", $model->ppu_year-1));
        $activeSheet->setCellValue('D2', sprintf("%s %s-%s", AppLabels::QUARTER, "I", $model->ppu_year));
        $activeSheet->setCellValue('E2', sprintf("%s %s-%s", AppLabels::QUARTER, "II", $model->ppu_year));
        $activeSheet->setCellValue('F2', AppLabels::DESCRIPTION);
        $activeSheet->setCellValue('G2', sprintf("%s %s-%s", AppLabels::QUARTER, "III", $model->ppu_year-1));
        $activeSheet->setCellValue('H2', sprintf("%s %s-%s", AppLabels::QUARTER, "IV", $model->ppu_year-1));
        $activeSheet->setCellValue('I2', sprintf("%s %s-%s", AppLabels::QUARTER, "I", $model->ppu_year));
        $activeSheet->setCellValue('J2', sprintf("%s %s-%s", AppLabels::QUARTER, "II", $model->ppu_year));
        $activeSheet->setCellValue('K2', AppLabels::DESCRIPTION);
        $activeSheet->setCellValue('A3', "Jumlah data parameter pemantauan harian CEMS selama 3 bulanan");

        $activeSheet->getStyle('A2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('B2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('C2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('D2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('E2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('F2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('G2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('H2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('I2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('J2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('K2')->applyFromArray($styleArrayTitle);
        $activeSheet->getStyle('A3')->applyFromArray($styleArrayTitle);

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
        ];

        //Get the number of parameter code

        $cemsConstant = [
            0 => 92,
            1 => 92,
            2 => 90,
            3 => 91,
        ];

        $rowIndex = 4;
        foreach ($ppuEmissionSourceModel as $key => $detail) {
            $ppucemsReportBm = $detail->ppucemsReportBms;

            $activeSheet->setCellValue('A' . $rowIndex, $detail->ppues_name);
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);
            $rowIndex++;

            foreach($ppucemsReportBm as $keyB => $reportBM){
                $activeSheet->setCellValue('A' . $rowIndex, $reportBM->ppucemsrb_parameter_code_desc);
                $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);

                $columnIndexNumber = \PHPExcel_Cell::columnIndexFromString('B');
                foreach($reportBM->ppucemsrbQuarters as $keyQ => $quarter){
                    $column = \PHPExcel_Cell::stringFromColumnIndex($columnIndexNumber-1);
                    $column2 = \PHPExcel_Cell::stringFromColumnIndex($columnIndexNumber+4);
                    $activeSheet->setCellValue($column . $rowIndex, $quarter->ppucemsrbq_value);
                    $activeSheet->getStyle($column . $rowIndex)->applyFromArray($styleArray);
                    $activeSheet->setCellValue($column2 . $rowIndex, sprintf("%s %%",number_format($quarter->ppucemsrbq_value/$cemsConstant[$keyQ]*100,2)));
                    $activeSheet->getStyle($column2 . $rowIndex)->applyFromArray($styleArray);
                    $columnIndexNumber++;
                }
                $activeSheet->setCellValue('F' . $rowIndex, $reportBM->ppucemsrb_ref);
                $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArray);
                if (!empty($reportBM->attachmentOwner)) {
                    $attachment = Converter::attachmentsFullPath($reportBM->attachmentOwner);
                    $activeSheet->setCellValue('K' . $rowIndex, $attachment['label']);
                    $activeSheet->getCell('K' . $rowIndex)->getHyperlink()->setUrl($attachment['path']);
                    $activeSheet->getCell('K' . $rowIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                    $activeSheet->getCell('K' . $rowIndex)->getStyle()->getAlignment()->setWrapText(true);
                    $activeSheet->getStyle('K' . $rowIndex)->applyFromArray($styleArray);
                }
                $rowIndex++;
            }
        }

        $rowIndex+=2;
        $activeSheet->setCellValue('A' . $rowIndex, "Jumlah data pemantauan yang memenuhi Baku Mutu CEMS");
        $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArrayTitle);
        $rowIndex++;

        foreach ($ppuEmissionSourceModel as $key => $detail) {
            $ppucemsReportBm = $detail->ppucemsReportBms;

            $activeSheet->setCellValue('A' . $rowIndex, $detail->ppues_name);
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);
            $rowIndex++;

            foreach($ppucemsReportBm as $keyB => $reportBM){
                $activeSheet->setCellValue('A' . $rowIndex, $reportBM->ppucemsrb_parameter_code_desc);
                $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);

                $columnIndexNumber = \PHPExcel_Cell::columnIndexFromString('B');
                foreach($reportBM->ppucemsrbQuarters as $keyQ => $quarter){
                    $column = \PHPExcel_Cell::stringFromColumnIndex($columnIndexNumber-1);
                    $column2 = \PHPExcel_Cell::stringFromColumnIndex($columnIndexNumber+4);
                    $activeSheet->setCellValue($column . $rowIndex, $quarter->ppucemsrbq_qs_value);
                    $activeSheet->getStyle($column . $rowIndex)->applyFromArray($styleArray);
                    $activeSheet->setCellValue($column2 . $rowIndex, sprintf("%s %%",number_format($quarter->ppucemsrbq_qs_value/$quarter->ppucemsrbq_value*100,2)));
                    $activeSheet->getStyle($column2 . $rowIndex)->applyFromArray($styleArray);
                    $columnIndexNumber++;
                }
                $activeSheet->setCellValue('F' . $rowIndex, $reportBM->ppucemsrb_sec_ref);
                $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArray);
                if (!empty($reportBM->attachmentOwner)) {
                    $attachment = Converter::attachmentsFullPath($reportBM->attachmentOwner);
                    $activeSheet->setCellValue('K' . $rowIndex, $attachment['label']);
                    $activeSheet->getCell('K' . $rowIndex)->getHyperlink()->setUrl($attachment['path']);
                    $activeSheet->getCell('K' . $rowIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                    $activeSheet->getCell('K' . $rowIndex)->getStyle()->getAlignment()->setWrapText(true);
                    $activeSheet->getStyle('K' . $rowIndex)->applyFromArray($styleArray);
                }
                $rowIndex++;
            }
        }

    }
}
