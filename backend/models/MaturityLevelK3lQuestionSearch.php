<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * MaturityLevelK3lQuestionSearch represents the model behind the search form about `backend\models\MaturityLevelK3lQuestion`.
 */
class MaturityLevelK3lQuestionSearch extends MaturityLevelK3lQuestion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'maturity_level_k3l_title_id'], 'integer'],
            [['q_action_plan', 'q_criteria', 'q_eviden', 'q_unit_code'], 'safe'],
            [['q_weight'], 'number'],
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
        $query = MaturityLevelK3lQuestion::find();

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
            'maturity_level_k3l_title_id' => $this->maturity_level_k3l_title_id,
            'q_weight' => $this->q_weight,
        ]);

        $query->andFilterWhere(['like', 'q_action_plan', $this->q_action_plan])
            ->andFilterWhere(['like', 'q_criteria', $this->q_criteria])
            ->andFilterWhere(['like', 'q_eviden', $this->q_eviden])
            ->andFilterWhere(['like', 'q_unit_code', $this->q_unit_code]);

        return $dataProvider;
    }
}
