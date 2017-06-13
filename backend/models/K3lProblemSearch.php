<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * K3lProblemSearch represents the model behind the search form about `backend\models\K3lProblem`.
 */
class K3lProblemSearch extends K3lProblem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'kp_progress'], 'integer'],
            [['kp_problem_number', 'kp_date', 'kp_problem_description', 'kp_mitigation_plan', 'kp_mitigation_dateline_date', 'kp_status_code', 'kp_description'], 'safe'],
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
        $query = K3lProblem::find();

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
            'kp_date' => $this->kp_date,
            'kp_mitigation_dateline_date' => $this->kp_mitigation_dateline_date,
            'kp_progress' => $this->kp_progress,
        ]);

        $query->andFilterWhere(['like', 'kp_problem_number', $this->kp_problem_number])
            ->andFilterWhere(['like', 'kp_problem_description', $this->kp_problem_description])
            ->andFilterWhere(['like', 'kp_mitigation_plan', $this->kp_mitigation_plan])
            ->andFilterWhere(['like', 'kp_status_code', $this->kp_status_code])
            ->andFilterWhere(['like', 'kp_description', $this->kp_description]);

        return $dataProvider;
    }
}
