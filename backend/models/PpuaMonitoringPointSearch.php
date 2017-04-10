<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PpuaMonitoringPointSearch represents the model behind the search form about `backend\models\PpuaMonitoringPoint`.
 */
class PpuaMonitoringPointSearch extends PpuaMonitoringPoint
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ppu_ambient_id'], 'integer'],
            [['ppua_monitoring_location', 'ppua_code_location', 'ppua_coord_latitude', 'ppua_coord_longitude', 'ppua_env_doc_name', 'ppua_institution', 'ppua_confirm_date', 'ppua_freq_monitoring_obligation_code', 'ppua_monitoring_data_status_code'], 'safe'],
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
        $query = PpuaMonitoringPoint::find();

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
            'ppu_ambient_id' => $this->ppu_ambient_id,
            'ppua_confirm_date' => $this->ppua_confirm_date,
        ]);

        $query->andFilterWhere(['like', 'ppua_monitoring_location', $this->ppua_monitoring_location])
            ->andFilterWhere(['like', 'ppua_code_location', $this->ppua_code_location])
            ->andFilterWhere(['like', 'ppua_coord_latitude', $this->ppua_coord_latitude])
            ->andFilterWhere(['like', 'ppua_coord_longitude', $this->ppua_coord_longitude])
            ->andFilterWhere(['like', 'ppua_env_doc_name', $this->ppua_env_doc_name])
            ->andFilterWhere(['like', 'ppua_institution', $this->ppua_institution])
            ->andFilterWhere(['like', 'ppua_freq_monitoring_obligation_code', $this->ppua_freq_monitoring_obligation_code])
            ->andFilterWhere(['like', 'ppua_monitoring_data_status_code', $this->ppua_monitoring_data_status_code]);

        return $dataProvider;
    }

    public function searchPpua($params, $ppuaId)
    {
        $query = PpuaMonitoringPoint::find();

        // add conditions that should always apply here
        $query->joinWith(['ppuAmbient pa'], true, 'INNER JOIN')
            ->where(['pa.id' => $ppuaId]);

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
            'ppu_ambient_id' => $this->ppu_ambient_id,
            'ppua_confirm_date' => $this->ppua_confirm_date,
        ]);

        $query->andFilterWhere(['like', 'ppua_monitoring_location', $this->ppua_monitoring_location])
            ->andFilterWhere(['like', 'ppua_code_location', $this->ppua_code_location])
            ->andFilterWhere(['like', 'ppua_coord_latitude', $this->ppua_coord_latitude])
            ->andFilterWhere(['like', 'ppua_coord_longitude', $this->ppua_coord_longitude])
            ->andFilterWhere(['like', 'ppua_env_doc_name', $this->ppua_env_doc_name])
            ->andFilterWhere(['like', 'ppua_institution', $this->ppua_institution])
            ->andFilterWhere(['like', 'ppua_freq_monitoring_obligation_code', $this->ppua_freq_monitoring_obligation_code])
            ->andFilterWhere(['like', 'ppua_monitoring_data_status_code', $this->ppua_monitoring_data_status_code]);

        return $dataProvider;
    }
}
