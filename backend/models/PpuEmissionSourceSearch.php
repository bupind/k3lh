<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PpuEmissionSource;

/**
 * PpuEmissionSourceSearch represents the model behind the search form about `backend\models\PpuEmissionSource`.
 */
class PpuEmissionSourceSearch extends PpuEmissionSource
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ppu_id', 'ppues_capacity', 'ppues_hole_position', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['ppues_name', 'ppues_chimney_name', 'ppues_control_device', 'ppues_fuel_name_code', 'ppues_fuel_unit_code', 'ppues_location', 'ppues_coord_ls', 'ppues_coord_bt', 'ppues_chimney_shape_code', 'ppues_monitoring_data_status_code', 'ppues_freq_monitoring_obligation_code', 'ppues_ref'], 'safe'],
            [['ppues_total_fuel', 'ppues_operation_time', 'ppues_chimney_height', 'ppues_chimney_diameter'], 'number'],
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
        $query = PpuEmissionSource::find();

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
            'ppu_id' => $this->ppu_id,
            'ppues_capacity' => $this->ppues_capacity,
            'ppues_total_fuel' => $this->ppues_total_fuel,
            'ppues_operation_time' => $this->ppues_operation_time,
            'ppues_chimney_height' => $this->ppues_chimney_height,
            'ppues_chimney_diameter' => $this->ppues_chimney_diameter,
            'ppues_hole_position' => $this->ppues_hole_position,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'ppues_name', $this->ppues_name])
            ->andFilterWhere(['like', 'ppues_chimney_name', $this->ppues_chimney_name])
            ->andFilterWhere(['like', 'ppues_control_device', $this->ppues_control_device])
            ->andFilterWhere(['like', 'ppues_fuel_name_code', $this->ppues_fuel_name_code])
            ->andFilterWhere(['like', 'ppues_fuel_unit_code', $this->ppues_fuel_unit_code])
            ->andFilterWhere(['like', 'ppues_location', $this->ppues_location])
            ->andFilterWhere(['like', 'ppues_coord_ls', $this->ppues_coord_ls])
            ->andFilterWhere(['like', 'ppues_coord_bt', $this->ppues_coord_bt])
            ->andFilterWhere(['like', 'ppues_chimney_shape_code', $this->ppues_chimney_shape_code])
            ->andFilterWhere(['like', 'ppues_monitoring_data_status_code', $this->ppues_monitoring_data_status_code])
            ->andFilterWhere(['like', 'ppues_freq_monitoring_obligation_code', $this->ppues_freq_monitoring_obligation_code])
            ->andFilterWhere(['like', 'ppues_ref', $this->ppues_ref]);

        return $dataProvider;
    }
}
