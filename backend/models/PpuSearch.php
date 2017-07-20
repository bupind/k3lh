<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * PpuSearch represents the model behind the search form about `backend\models\Ppu`.
 */
class PpuSearch extends Ppu
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'ppu_year'], 'integer'],
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
        $query = Ppu::find();

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
            'ppu_year' => $this->ppu_year,
        ]);

        return $dataProvider;
    }

    public function exportPpuEmissionSource(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(AppLabels::EMISSION_SOURCE_INVENTORY);
    }

    public function exportAdherencePoint(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(AppLabels::ADHERENCE_POINT);
    }

    public function exportParameterObligation(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(sprintf("%s %s", AppLabels::ADHERENCE, AppLabels::BM_REPORT_PARAMETER));
    }

    public function exportEmissionLoadGrk(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(sprintf("%s %s", AppLabels::EMISSION_LOAD_CALCULATION, AppLabels::GRK));
    }

    public function exportTechnicalProvision(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(AppLabels::TECHNICAL_PROVISION);
    }

    public function exportPollutionLoad(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(AppLabels::POLLUTION_LOAD);
    }

    public function export($id) {

        $query = Ppu::find()->where(['id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $model = $dataProvider->getModels()[0];

        $ppuEmissionSourceModel = $model->ppuEmissionSources;
        $ppuTechnicalProvision = $model->ppuTechnicalProvisions;

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
        $this->exportPpuEmissionSource($objPHPExcel, $sheetIndex++, $ppuEmissionSourceModel);
        $this->exportAdherencePoint($objPHPExcel, $sheetIndex++, $ppuEmissionSourceModel);
        $this->exportParameterObligation($objPHPExcel, $sheetIndex++, $ppuEmissionSourceModel);
        $this->exportEmissionLoadGrk($objPHPExcel, $sheetIndex++, $ppuEmissionSourceModel);
        $this->exportTechnicalProvision($objPHPExcel, $sheetIndex++, $ppuTechnicalProvision);
        $this->exportPollutionLoad($objPHPExcel, $sheetIndex++, $model);

        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }

    public function exportPpucemsReportBm(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(sprintf("%s %s", AppLabels::BM_REPORT_PARAMETER, AppLabels::CEMS));
    }

    public function exportPpucemsrbParameterReport(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(sprintf("%s %s", AppLabels::REPORT, AppLabels::PARAMETER));
    }

    public function exportEmissionLoadCalc(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(sprintf("%s %s", AppLabels::EMISSION_LOAD_CALCULATION, AppLabels::CEMS));
    }

    public function exportCems($id) {

        $query = Ppu::find()->where(['id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $model = $dataProvider->getModels()[0];

        $ppuEmissionSourceModel = $model->ppuEmissionSources;

        // export to excel

        //main excel setup
        $objPHPExcel = new \PHPExcel();
        $filename = sprintf(AppConstants::REPORT_NAME_PPU_CEMS, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);

        $sheetIndex = 0;
        //Creating sheet
        $this->exportPpucemsReportBm($objPHPExcel, $sheetIndex++, $ppuEmissionSourceModel);
        $this->exportPpucemsrbParameterReport($objPHPExcel, $sheetIndex++, $ppuEmissionSourceModel);
        $this->exportEmissionLoadCalc($objPHPExcel, $sheetIndex++, $model);

        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }
}
