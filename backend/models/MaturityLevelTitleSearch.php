<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * MaturityLevelTitleSearch represents the model behind the search form about `backend\models\MaturityLevelTitle`.
 */
class MaturityLevelTitleSearch extends MaturityLevelTitle {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['title_text'], 'safe'],
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
        $query = MaturityLevelTitle::find();
        
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
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);
        
        $query->andFilterWhere(['like', 'title_text', $this->title_text]);
        
        return $dataProvider;
    }
}
