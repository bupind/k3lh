<?php

namespace backend\models;

use common\vendor\AppConstants;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RoadmapK3lAttributeSearch represents the model behind the search form about `backend\models\RoadmapK3lAttribute`.
 */
class RoadmapK3lAttributeSearch extends RoadmapK3lAttribute {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'attr_parent_id'], 'integer'],
            [['attr_type_code', 'attr_text'], 'safe'],
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
        $query = RoadmapK3lAttribute::find();
        
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
            'attr_parent_id' => $this->attr_parent_id,
        ]);
        
        $query->andFilterWhere(['like', 'attr_type_code', $this->attr_type_code])
            ->andFilterWhere(['like', 'attr_text', $this->attr_text]);
        
        return $dataProvider;
    }
    
    public function ajaxSearch() {
        $query = RoadmapK3lAttribute::find()->select(['id', 'attr_text']);
        
        // grid filtering conditions
        $query->andFilterWhere(['like', 'attr_type_code', $this->attr_type_code])
            ->andFilterWhere(['like', 'attr_text', $this->attr_text]);
                
        return $query->all();
    }
}
