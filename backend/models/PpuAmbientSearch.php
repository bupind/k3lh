<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;

/**
 * PpuAmbientSearch represents the model behind the search form about `backend\models\PpuAmbient`.
 */
class PpuAmbientSearch extends PpuAmbient
{
    public $filename;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'ppua_year'], 'integer'],
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
        $query = PpuAmbient::find();

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
            'ppua_year' => $this->ppua_year,
        ]);

        return $dataProvider;
    }

    public function exportPpuaMonitoringPoint(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(AppLabels::MONITORING_POINT);
    }

    public function exportPpuaParameterObligation(\PHPExcel &$objPHPExcel, $sheetIndex, $model){
        //Creating sheet
        $activeSheet = $objPHPExcel->createSheet($sheetIndex);
        $activeSheet->setTitle(sprintf("%s %s", AppLabels::ADHERENCE, AppLabels::BM_REPORT_PARAMETER));
    }


    public function export($id) {

        $query = PpuAmbient::find()->where(['id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $model = $dataProvider->getModels()[0];

        $ppuaMonitoringPointModel = $model->ppuaMonitoringPoints;

        // export to excel

        //main excel setup
        $objPHPExcel = new \PHPExcel();
        $filename = sprintf(AppConstants::REPORT_NAME_PPU_AMBIENT, Date('dmYHis'));
        $defaultStyleArray = [
            'font' => [
                'size' => 10
            ],
        ];

        $objPHPExcel->getDefaultStyle()->applyFromArray($defaultStyleArray);

        $sheetIndex = 0;
        //Creating sheet
        $this->exportPpuaMonitoringPoint($objPHPExcel, $sheetIndex++, $ppuaMonitoringPointModel);
        $this->exportPpuaParameterObligation($objPHPExcel, $sheetIndex++, $ppuaMonitoringPointModel);

        $objPHPExcel->removeSheetByIndex($objPHPExcel->getSheetCount() - 1);
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename);

        $this->filename = $filename;

        return true;
    }
}
