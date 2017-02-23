<?php

namespace backend\models;
use yii\base\Model;
use yii\data\ActiveDataProvider;
/**
 * PpuParameterObligationSearch represents the model behind the search form about `backend\models\PpuParameterObligation`.
 */
class PpuParameterObligationSearch extends PpuParameterObligation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ppu_compulsory_monitored_emission_source_id'], 'integer'],
            [['ppupo_parameter_code', 'ppupo_parameter_unit_code', 'ppupo_qs_unit_code', 'ppupo_qs_ref', 'ppupo_qs_load_unit_code', 'ppupo_qs_max_pollution_load_ref'], 'safe'],
            [['ppupo_qs', 'ppupo_qs_max_pollution_load'], 'number'],
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
        $query = PpuParameterObligation::find();

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
            'ppu_compulsory_monitored_emission_source_id' => $this->ppu_compulsory_monitored_emission_source_id,
            'ppupo_qs' => $this->ppupo_qs,
            'ppupo_qs_max_pollution_load' => $this->ppupo_qs_max_pollution_load,
        ]);

        $query->andFilterWhere(['like', 'ppupo_parameter_code', $this->ppupo_parameter_code])
            ->andFilterWhere(['like', 'ppupo_parameter_unit_code', $this->ppupo_parameter_unit_code])
            ->andFilterWhere(['like', 'ppupo_qs_unit_code', $this->ppupo_qs_unit_code])
            ->andFilterWhere(['like', 'ppupo_qs_ref', $this->ppupo_qs_ref])
            ->andFilterWhere(['like', 'ppupo_qs_load_unit_code', $this->ppupo_qs_load_unit_code])
            ->andFilterWhere(['like', 'ppupo_qs_max_pollution_load_ref', $this->ppupo_qs_max_pollution_load_ref]);

        return $dataProvider;
    }

    public function searchPpu($params, $ppuId)
    {
        $query = PpuParameterObligation::find();

        // add conditions that should always apply here

        $query->joinWith(['ppuCompulsoryMonitoredEmissionSource cmes'], true, 'INNER JOIN')
            ->where(['cmes.ppu_id' => $ppuId]);

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
            'ppu_compulsory_monitored_emission_source_id' => $this->ppu_compulsory_monitored_emission_source_id,
            'ppupo_qs' => $this->ppupo_qs,
            'ppupo_qs_max_pollution_load' => $this->ppupo_qs_max_pollution_load,
        ]);

        $query->andFilterWhere(['like', 'ppupo_parameter_code', $this->ppupo_parameter_code])
            ->andFilterWhere(['like', 'ppupo_parameter_unit_code', $this->ppupo_parameter_unit_code])
            ->andFilterWhere(['like', 'ppupo_qs_unit_code', $this->ppupo_qs_unit_code])
            ->andFilterWhere(['like', 'ppupo_qs_ref', $this->ppupo_qs_ref])
            ->andFilterWhere(['like', 'ppupo_qs_load_unit_code', $this->ppupo_qs_load_unit_code])
            ->andFilterWhere(['like', 'ppupo_qs_max_pollution_load_ref', $this->ppupo_qs_max_pollution_load_ref]);

        return $dataProvider;
    }
}
