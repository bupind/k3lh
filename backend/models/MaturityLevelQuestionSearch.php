<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * MaturityLevelQuestionSearch represents the model behind the search form about `backend\models\MaturityLevelQuestion`.
 */
class MaturityLevelQuestionSearch extends MaturityLevelQuestion {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'maturity_level_title_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['q_action_plan', 'q_criteria', 'q_unit_code'], 'safe'],
            [['q_weight'], 'number'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = MaturityLevelQuestion::find();
        
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
            'maturity_level_title_id' => $this->maturity_level_title_id,
            'q_weight' => $this->q_weight,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);
        
        $query->andFilterWhere(['like', 'q_action_plan', $this->q_action_plan])
            ->andFilterWhere(['like', 'q_criteria', $this->q_criteria])
            ->andFilterWhere(['like', 'q_unit_code', $this->q_unit_code]);
        
        return $dataProvider;
    }
}
