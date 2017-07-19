<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;

/**
 * EnvironmentPermitSearch represents the model behind the search form about `backend\models\EnvironmentPermit`.
 */
class EnvironmentPermitSearch extends EnvironmentPermit
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'ep_year'], 'integer'],
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
        $query = EnvironmentPermit::find();

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
            'ep_year' => $this->ep_year,
        ]);

        return $dataProvider;
    }

    public function exportDocumentValidation(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(AppLabels::DOCUMENT_VALIDATION);


        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(30);
        $activeSheet->getColumnDimension('C')->setWidth(30);
        $activeSheet->getColumnDimension('D')->setWidth(30);
        $activeSheet->getColumnDimension('E')->setWidth(30);
        $activeSheet->getColumnDimension('F')->setWidth(30);
        $activeSheet->getColumnDimension('G')->setWidth(30);

        //header
        $activeSheet->mergeCells('A1:C1');
        $activeSheet->setCellValue('A1', "Formulir Self Assessment Izin Lingkungan Proper");
        $activeSheet->mergeCells('A3:B3');
        $activeSheet->setCellValue('A3', "Daftar Dokumen Lingkungan");

        //header style
        $styleArray = [
            'font' => [
                'bold' => true,
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
        $activeSheet->getStyle('A1:C1')->applyFromArray($styleArray);
        $activeSheet->getStyle('A3:B3')->applyFromArray($styleArray);

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
            ]
        ];

        $activeSheet->setCellValue('A6', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('B6', sprintf("%s %s %s", AppLabels::NAME, AppLabels::DOCUMENTS, AppLabels::ENVIRONMENT));
        $activeSheet->setCellValue('C6', sprintf("%s %s %s", AppLabels::INSTITUTION, AppLabels::DOCUMENT_VALIDATION, AppLabels::ENVIRONMENT));
        $activeSheet->setCellValue('D6', sprintf("%s %s %s", AppLabels::DATE, AppLabels::DOCUMENT_VALIDATION, AppLabels::ENVIRONMENT));
        $activeSheet->setCellValue('E6', sprintf("%s %s", AppLabels::CAPACITY_LIMIT, AppLabels::PRODUCTION));
        $activeSheet->setCellValue('F6', sprintf("%s %s", AppLabels::CAPACITY_REALIZATION, AppLabels::PRODUCTION));
        $activeSheet->setCellValue('G6', "Dampak Penting yang dikelola");

        $activeSheet->getStyle('A6')->applyFromArray($styleArray);
        $activeSheet->getStyle('B6')->applyFromArray($styleArray);
        $activeSheet->getStyle('C6')->applyFromArray($styleArray);
        $activeSheet->getStyle('D6')->applyFromArray($styleArray);
        $activeSheet->getStyle('E6')->applyFromArray($styleArray);
        $activeSheet->getStyle('F6')->applyFromArray($styleArray);
        $activeSheet->getStyle('G6')->applyFromArray($styleArray);

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

        $rowIndex = 7;
        foreach($model as $key => $detail){
            $activeSheet->setCellValue('A' . $rowIndex, ($key+1));
            $activeSheet->getStyle('A' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('B' . $rowIndex, $detail->ep_document_name);
            $activeSheet->getStyle('B' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $rowIndex, $detail->ep_institution);
            $activeSheet->getStyle('C' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $rowIndex, $detail->ep_date);
            $activeSheet->getStyle('D' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('E' . $rowIndex, $detail->ep_limit_capacity);
            $activeSheet->getStyle('E' . $rowIndex)->applyFromArray($styleArray);
            $activeSheet->setCellValue('F' . $rowIndex, $detail->ep_realization_capacity);
            $activeSheet->getStyle('F' . $rowIndex)->applyFromArray($styleArray);
            if (!empty($detail->attachmentOwner)) {
                $attachment = Converter::attachmentsFullPath($detail->attachmentOwner);
                $activeSheet->setCellValue('G' . $rowIndex, $attachment['label']);
                $activeSheet->getCell('G' . $rowIndex)->getHyperlink()->setUrl($attachment['path']);
                $activeSheet->getCell('G' . $rowIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                $activeSheet->getCell('G' . $rowIndex)->getStyle()->getAlignment()->setWrapText(true);
                $activeSheet->getStyle('G' . $rowIndex)->applyFromArray($styleArray);
            }

            $rowIndex++;
        }

        //==========================================================================

        //footer

        //==========================================================================

        //extra footer
    }

    public function exportParameterReport(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(AppLabels::BM_REPORT_PARAMETER);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(50);

        //header
        $activeSheet->mergeCells('A1:B1');
        $activeSheet->setCellValue('A1', "Bukti Pelaporan RKL-RPL atau UKL-UPL");


        //header style
        $styleArray = [
            'font' => [
                'bold' => true,
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
        $activeSheet->getStyle('A1:B1')->applyFromArray($styleArray);

        //==========================================================================

        // body header

        $styleArrayBodyHeader = [
            'font' => [
                'bold' => false,
                'size' => 13,
                'color' => [
                    'argb' => \PHPExcel_Style_Color::COLOR_BLACK
                ]
            ],
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
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

        $activeSheet->setCellValue('A3', AppLabels::IPN_INSTANCE);
        $activeSheet->setCellValue('A4', AppLabels::DISTRICT);
        $activeSheet->setCellValue('A5', AppLabels::PROVINCE);
        $activeSheet->setCellValue('A6', AppLabels::ENVIRONMENT_MINISTRY);

        $activeSheet->getStyle('A3')->applyFromArray($styleArrayBodyHeader);
        $activeSheet->getStyle('A4')->applyFromArray($styleArray);
        $activeSheet->getStyle('A5')->applyFromArray($styleArray);
        $activeSheet->getStyle('A6')->applyFromArray($styleArray);

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

        $columnIndexNumber = \PHPExcel_Cell::columnIndexFromString('B');

        foreach($model as $keyR => $report){
            $activeSheet->getColumnDimension(\PHPExcel_Cell::stringFromColumnIndex($columnIndexNumber-1))->setWidth(40);
            $column = \PHPExcel_Cell::stringFromColumnIndex($columnIndexNumber-1) . '3';
            $activeSheet->setCellValue($column, $report->ep_quarter);
            $activeSheet->getStyle($column)->applyFromArray($styleArrayBodyHeader);
            foreach ($report->environmentPermitDistricts as $keyD => $district) {

                $objRichText = new \PHPExcel_RichText();
                $string1 = $objRichText->createTextRun($district->ep_district);
                $string1->getFont()->setBold(true);

                $column = \PHPExcel_Cell::stringFromColumnIndex($columnIndexNumber - 1) . '4';

                if (!empty($district->attachmentOwner)) {
                    $break = $objRichText->createTextRun("   ");

                    $attachment = Converter::attachmentsFullPath($district->attachmentOwner);
                    $string2 = $objRichText->createTextRun($attachment['label']);
                    $string2->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                    $activeSheet->getCell($column)->getHyperlink()->setUrl($attachment['path']);
                }
                $activeSheet->setCellValue($column, $objRichText);
                $activeSheet->getStyle($column)->applyFromArray($styleArray);
            }
            foreach ($report->environmentPermitProvinces as $keyP => $province) {

                $objRichText = new \PHPExcel_RichText();
                $string1 = $objRichText->createTextRun($province->ep_province);
                $string1->getFont()->setBold(true);

                $column = \PHPExcel_Cell::stringFromColumnIndex($columnIndexNumber - 1) . '5';
                if (!empty($province->attachmentOwner)) {
                    $attachment = Converter::attachmentsFullPath($province->attachmentOwner);
                    $break = $objRichText->createTextRun("   ");

                    $string2 = $objRichText->createTextRun($attachment['label']);
                    $string2->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                    $activeSheet->getCell($column)->getHyperlink()->setUrl($attachment['path']);
                }

                $activeSheet->setCellValue($column, $objRichText);
                $activeSheet->getStyle($column)->applyFromArray($styleArray);
            }
            foreach ($report->environmentPermitMinistrys as $keyM => $ministry) {

                $objRichText = new \PHPExcel_RichText();
                $string1 = $objRichText->createTextRun($ministry->ep_ministry);
                $string1->getFont()->setBold(true);

                $column = \PHPExcel_Cell::stringFromColumnIndex($columnIndexNumber - 1) . '6';
                if (!empty($ministry->attachmentOwner)) {
                    $attachment = Converter::attachmentsFullPath($ministry->attachmentOwner);
                    $break = $objRichText->createTextRun("   ");

                    $string2 = $objRichText->createTextRun($attachment['label']);
                    $string2->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                    $activeSheet->getCell($column)->getHyperlink()->setUrl($attachment['path']);
                }

                $activeSheet->setCellValue($column, $objRichText);
                $activeSheet->getStyle($column)->applyFromArray($styleArray);
            }

            $columnIndexNumber++;
        }

        //==========================================================================

        //footer

        //==========================================================================

        //extra footer
    }

    public function export($id) {

        $query = EnvironmentPermit::find()->where(['id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $model = $dataProvider->getModels()[0];

        $documentValidationModel = $model->environmentPermitDetails;
        $parameterReportModel = $model->environmentPermitReports;
        // export to excel

        //main excel setup
        $objPHPExcel = new \PHPExcel();
        $filename = sprintf(AppConstants::REPORT_NAME_ENVIRONMENT_PERMIT, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);

        $sheetIndex = 0;
        //Creating sheet
        $this->exportDocumentValidation($objPHPExcel, $sheetIndex++, $documentValidationModel);
        $this->exportParameterReport($objPHPExcel, $sheetIndex++, $parameterReportModel);

        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }
}
