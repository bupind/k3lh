<?php

namespace backend\models;

use common\vendor\AppConstants;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PpuaParameterObligationSearch represents the model behind the search form about `backend\models\PpuaParameterObligation`.
 */
class PpuaParameterObligationSearch extends PpuaParameterObligation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ppua_monitoring_point_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppuapo_parameter_code', 'ppuapo_qs_unit_code', 'ppuapo_qs_ref', 'ppuapo_qs_load_unit_code', 'ppuapo_qs_max_pollution_load_ref'], 'safe'],
            [['ppuapo_qs', 'ppuapo_qs_max_pollution_load'], 'number'],
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
        $query = PpuaParameterObligation::find();

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
            'ppua_monitoring_point_id' => $this->ppua_monitoring_point_id,
            'ppuapo_qs' => $this->ppuapo_qs,
            'ppuapo_qs_max_pollution_load' => $this->ppuapo_qs_max_pollution_load,
        ]);

        $query->andFilterWhere(['like', 'ppuapo_parameter_code', $this->ppuapo_parameter_code])
            ->andFilterWhere(['like', 'ppuapo_qs_unit_code', $this->ppuapo_qs_unit_code])
            ->andFilterWhere(['like', 'ppuapo_qs_ref', $this->ppuapo_qs_ref])
            ->andFilterWhere(['like', 'ppuapo_qs_load_unit_code', $this->ppuapo_qs_load_unit_code])
            ->andFilterWhere(['like', 'ppuapo_qs_max_pollution_load_ref', $this->ppuapo_qs_max_pollution_load_ref]);

        return $dataProvider;
    }

    public function searchPpua($params, $ppuaId)
    {
        $query = PpuaParameterObligation::find();

        // add conditions that should always apply here

        $query->joinWith(['ppuaMonitoringPoint pmp'], true, 'INNER JOIN')
            ->where(['pmp.ppu_ambient_id' => $ppuaId]);

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
            'ppua_monitoring_point_id' => $this->ppua_monitoring_point_id,
            'ppuapo_qs' => $this->ppuapo_qs,
            'ppuapo_qs_max_pollution_load' => $this->ppuapo_qs_max_pollution_load,
        ]);

        $query->andFilterWhere(['like', 'ppuapo_parameter_code', $this->ppuapo_parameter_code])
            ->andFilterWhere(['like', 'ppuapo_qs_unit_code', $this->ppuapo_qs_unit_code])
            ->andFilterWhere(['like', 'ppuapo_qs_ref', $this->ppuapo_qs_ref])
            ->andFilterWhere(['like', 'ppuapo_qs_load_unit_code', $this->ppuapo_qs_load_unit_code])
            ->andFilterWhere(['like', 'ppuapo_qs_max_pollution_load_ref', $this->ppuapo_qs_max_pollution_load_ref]);

        return $dataProvider;
    }
}
