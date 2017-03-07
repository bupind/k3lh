<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;

/**
 * PpucemsrbParameterReportSearch represents the model behind the search form about `backend\models\PpucemsrbParameterReport`.
 */
class PpucemsrbParameterReportSearch extends PpucemsrbParameterReport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ppu_emission_source_id', 'ppucems_report_bm_id', 'ppucemsrbpr_operation_time'], 'integer'],
            [['ppucemsrbpr_quarter', 'ppucemsrbpr_calc_date', 'ppucemsrbpr_qs_unit_code', 'ppucemsrbpr_ref'], 'safe'],
            [['ppucemsrbpr_avg_concentration', 'ppucemsrbpr_calc_result', 'ppucemsrbpr_qs'], 'number'],
        ];
    }

    public function afterFind() {
        parent::afterFind();

        $this->ppucemsReportBm->ppucemsrb_parameter_code = Codeset::getCodesetValue(AppConstants::CODESET_PPUCEMS_RBM_PARAM_CODE, $this->ppucemsReportBm->ppucemsrb_parameter_code );

        return true;
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
        $query = PpucemsrbParameterReport::find();

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
            'ppu_emission_source_id' => $this->ppu_emission_source_id,
            'ppucems_report_bm_id' => $this->ppucems_report_bm_id,
            'ppucemsrbpr_calc_date' => $this->ppucemsrbpr_calc_date,
            'ppucemsrbpr_avg_concentration' => $this->ppucemsrbpr_avg_concentration,
            'ppucemsrbpr_calc_result' => $this->ppucemsrbpr_calc_result,
            'ppucemsrbpr_operation_time' => $this->ppucemsrbpr_operation_time,
            'ppucemsrbpr_qs' => $this->ppucemsrbpr_qs,
        ]);

        $query->andFilterWhere(['like', 'ppucemsrbpr_quarter', $this->ppucemsrbpr_quarter])
            ->andFilterWhere(['like', 'ppucemsrbpr_qs_unit_code', $this->ppucemsrbpr_qs_unit_code])
            ->andFilterWhere(['like', 'ppucemsrbpr_ref', $this->ppucemsrbpr_ref]);

        return $dataProvider;
    }

    public function searchPpu($params, $ppuId)
    {
        $query = PpucemsrbParameterReport::find();

        // add conditions that should always apply here

        $query->joinWith(['ppuEmissionSource pes'], true, 'INNER JOIN')
            ->where(['pes.ppu_id' => $ppuId]);

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
            'ppu_emission_source_id' => $this->ppu_emission_source_id,
            'ppucems_report_bm_id' => $this->ppucems_report_bm_id,
            'ppucemsrbpr_calc_date' => $this->ppucemsrbpr_calc_date,
            'ppucemsrbpr_avg_concentration' => $this->ppucemsrbpr_avg_concentration,
            'ppucemsrbpr_calc_result' => $this->ppucemsrbpr_calc_result,
            'ppucemsrbpr_operation_time' => $this->ppucemsrbpr_operation_time,
            'ppucemsrbpr_qs' => $this->ppucemsrbpr_qs,
        ]);

        $query->andFilterWhere(['like', 'ppucemsrbpr_quarter', $this->ppucemsrbpr_quarter])
            ->andFilterWhere(['like', 'ppucemsrbpr_qs_unit_code', $this->ppucemsrbpr_qs_unit_code])
            ->andFilterWhere(['like', 'ppucemsrbpr_ref', $this->ppucemsrbpr_ref]);

        return $dataProvider;
    }
}
