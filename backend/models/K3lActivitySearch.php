<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use common\components\helpers\Converter;


/**
 * K3lActivitySearch represents the model behind the search form about `backend\models\K3lActivity`.
 */
class K3lActivitySearch extends K3lActivity
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id'], 'integer'],
            [['ka_name', 'ka_description', 'ka_date'], 'safe'],
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
        $query = K3lActivity::find();

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
            'ka_date' => $this->ka_date,
        ]);

        $query->andFilterWhere(['like', 'ka_name', $this->ka_name])
            ->andFilterWhere(['like', 'ka_description', $this->ka_description]);

        return $dataProvider;
    }

    public function export() {

        $query = K3lActivity::find()->where([
            'power_plant_id' => $this->power_plant_id,
        ]);

        // add conditions that should always apply here

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
        $filename = sprintf(AppConstants::REPORT_NAME_K3L_ACTIVITY, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);


        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet(0);
        $activeSheet->setTitle(AppLabels::FORM_K3L_ACTIVITY);

        // set dimension

        // set row width

        // set column width
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(30);
        $activeSheet->getColumnDimension('C')->setWidth(30);
        $activeSheet->getColumnDimension('D')->setWidth(30);
        $activeSheet->getColumnDimension('E')->setWidth(30);

        //header
        $activeSheet->mergeCells('A1:C1');
        $activeSheet->setCellValue('A1', "Monitoring Dokumentasi Kegiatan K3L");

        //header style
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 16,
                'color' => [
                    'argb' => \PHPExcel_Style_Color::COLOR_BLACK
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
        $activeSheet->getStyle('A1:C1')->applyFromArray($styleArray);

        //==========================================================================

        // body header

        $styleArray = [
            'font' => [
                'bold' => true,
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

        $no = 3;
        for($i = 0; $i<5; $i++){
            $alphabet = $this->toAlphabet($i);
            $activeSheet->mergeCells("$alphabet$no:$alphabet$no");
            $activeSheet->getStyle("$alphabet$no:$alphabet$no")->applyFromArray($styleArray);
        }

        //body header data
        $activeSheet->setCellValue('A3', AppLabels::NUMBER_SHORT);
        $activeSheet->setCellValue('B3', sprintf("%s %s", AppLabels::NAME, AppLabels::ACTIVITY));
        $activeSheet->setCellValue('C3', sprintf("Deskripsi %s", AppLabels::ACTIVITY));
        $activeSheet->setCellValue('D3', sprintf("%s %s", AppLabels::DATE, AppLabels::ACTIVITY));
        $activeSheet->setCellValue('E3', "Upload Laporan");


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

        $rowIndex = 4;
        $model = $dataProvider->getModels();
        foreach($model as $key => $value){
            $activeSheet->setCellValue('A'. $rowIndex, ($key+1));
            $activeSheet->setCellValue('B'. $rowIndex, $value->ka_name);
            $activeSheet->setCellValue('C'. $rowIndex, $value->ka_description);
            $activeSheet->setCellValue('D'. $rowIndex, $value->ka_date);
            if (!empty($value->attachmentOwner)) {
                $attachment = Converter::attachmentsFullPath($value->attachmentOwner);
                $activeSheet->setCellValue('E' . $rowIndex, $attachment['label']);
                $activeSheet->getCell('E' . $rowIndex)->getHyperlink()->setUrl($attachment['path']);
                $activeSheet->getCell('E' . $rowIndex)->getStyle()->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLUE);
                $activeSheet->getCell('E' . $rowIndex)->getStyle()->getAlignment()->setWrapText(true);
            }

            $activeSheet->getStyle("A". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("B". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("C". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("D". $rowIndex)->applyFromArray($styleArray);
            $activeSheet->getStyle("E". $rowIndex)->applyFromArray($styleArray);
            $rowIndex++;
        }

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
