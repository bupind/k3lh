<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Plb3SaQuestionSearch represents the model behind the search form about `backend\models\Plb3SaQuestion`.
 */
class Plb3SaQuestionSearch extends Plb3SaQuestion {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'parent_id'], 'integer'],
            [['category_code', 'input_type_code', 'label', 'label_short', 'is_question'], 'safe'],
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
        $query = Plb3SaQuestion::find();
        
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
            'parent_id' => $this->parent_id,
        ]);
        
        $query->andFilterWhere(['like', 'category_code', $this->category_code])
            ->andFilterWhere(['like', 'input_type_code', $this->input_type_code])
            ->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'label', $this->label_short])
            ->andFilterWhere(['like', 'is_question', $this->is_question]);
        
        return $dataProvider;
    }
}
