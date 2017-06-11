<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * MonitoringAparSearch represents the model behind the search form about `backend\models\MonitoringApar`.
 */
class MonitoringAparSearch extends MonitoringApar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'ma_year', 'ma_weight', 'ma_working_pressure'], 'integer'],
            [['ma_form_month_type_code', 'ma_location', 'ma_extinguish_media', 'ma_fire_rating', 'ma_tube_condition_code', 'ma_nozzle_condition_code', 'ma_handle_condition_code', 'ma_pin_condition_code', 'ma_technical_triangle', 'ma_technical_ik', 'ma_technical_card', 'ma_technical_height', 'ma_technical_dis', 'ma_noting_date', 'ma_officer', 'ma_using_date', 'ma_activity'], 'safe'],
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
        $query = MonitoringApar::find();

        // add conditions that should always apply here

        $powerPlant = PowerPlant::find()->where(['id' => $params['_ppId']])->one();

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
            'sector_id' => $powerPlant->sector_id,
            'power_plant_id' => $powerPlant->id,
            'ma_year' => $this->ma_year,
            'ma_weight' => $this->ma_weight,
            'ma_working_pressure' => $this->ma_working_pressure,
            'ma_noting_date' => $this->ma_noting_date,
            'ma_using_date' => $this->ma_using_date,
        ]);

        $query->andFilterWhere(['like', 'ma_form_month_type_code', $this->ma_form_month_type_code])
            ->andFilterWhere(['like', 'ma_location', $this->ma_location])
            ->andFilterWhere(['like', 'ma_extinguish_media', $this->ma_extinguish_media])
            ->andFilterWhere(['like', 'ma_fire_rating', $this->ma_fire_rating])
            ->andFilterWhere(['like', 'ma_tube_condition_code', $this->ma_tube_condition_code])
            ->andFilterWhere(['like', 'ma_nozzle_condition_code', $this->ma_nozzle_condition_code])
            ->andFilterWhere(['like', 'ma_handle_condition_code', $this->ma_handle_condition_code])
            ->andFilterWhere(['like', 'ma_pin_condition_code', $this->ma_pin_condition_code])
            ->andFilterWhere(['like', 'ma_technical_triangle', $this->ma_technical_triangle])
            ->andFilterWhere(['like', 'ma_technical_ik', $this->ma_technical_ik])
            ->andFilterWhere(['like', 'ma_technical_card', $this->ma_technical_card])
            ->andFilterWhere(['like', 'ma_technical_height', $this->ma_technical_height])
            ->andFilterWhere(['like', 'ma_technical_dis', $this->ma_technical_dis])
            ->andFilterWhere(['like', 'ma_officer', $this->ma_officer])
            ->andFilterWhere(['like', 'ma_activity', $this->ma_activity]);

        return $dataProvider;
    }
}
