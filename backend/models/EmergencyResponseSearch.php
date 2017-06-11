<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * EmergencyResponseSearch represents the model behind the search form about `backend\models\EmergencyResponse`.
 */
class EmergencyResponseSearch extends EmergencyResponse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'er_participant', 'er_simulation_time', 'er_simulation_victim', 'er_simulation_loss', 'er_evaluation_time', 'er_evaluation_victim', 'er_evaluation_loss'], 'integer'],
            [['er_training_name', 'er_team', 'er_location', 'er_date', 'er_failure_detail'], 'safe'],
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
        $query = EmergencyResponse::find();

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
            'er_participant' => $this->er_participant,
            'er_simulation_time' => $this->er_simulation_time,
            'er_simulation_victim' => $this->er_simulation_victim,
            'er_simulation_loss' => $this->er_simulation_loss,
            'er_date' => $this->er_date,
            'er_evaluation_time' => $this->er_evaluation_time,
            'er_evaluation_victim' => $this->er_evaluation_victim,
            'er_evaluation_loss' => $this->er_evaluation_loss,
        ]);

        $query->andFilterWhere(['like', 'er_training_name', $this->er_training_name])
            ->andFilterWhere(['like', 'er_team', $this->er_team])
            ->andFilterWhere(['like', 'er_location', $this->er_location])
            ->andFilterWhere(['like', 'er_failure_detail', $this->er_failure_detail]);

        return $dataProvider;
    }
}
