<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * FireDetectorSearch represents the model behind the search form about `backend\models\FireDetector`.
 */
class FireDetectorSearch extends FireDetector
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'fd_year'], 'integer'],
            [['fd_form_month_type_code', 'fd_floor_code', 'fd_location', 'fd_detector_type_code', 'fd_alarm_zone_code', 'fd_installation', 'fd_detector_physic', 'fd_wiring_condition', 'fd_last_check', 'fd_test_result_record'], 'safe'],
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
        $query = FireDetector::find();

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
            'fd_year' => $this->fd_year,
            'fd_last_check' => $this->fd_last_check,
        ]);

        $query->andFilterWhere(['like', 'fd_form_month_type_code', $this->fd_form_month_type_code])
            ->andFilterWhere(['like', 'fd_floor_code', $this->fd_floor_code])
            ->andFilterWhere(['like', 'fd_location', $this->fd_location])
            ->andFilterWhere(['like', 'fd_detector_type_code', $this->fd_detector_type_code])
            ->andFilterWhere(['like', 'fd_alarm_zone_code', $this->fd_alarm_zone_code])
            ->andFilterWhere(['like', 'fd_installation', $this->fd_installation])
            ->andFilterWhere(['like', 'fd_detector_physic', $this->fd_detector_physic])
            ->andFilterWhere(['like', 'fd_wiring_condition', $this->fd_wiring_condition])
            ->andFilterWhere(['like', 'fd_test_result_record', $this->fd_test_result_record]);

        return $dataProvider;
    }
}
