<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RoadmapK3lSearch represents the model behind the search form about `backend\models\roadmap-k3l`.
 */
class RoadmapK3lSearch extends RoadmapK3l {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'sector_id', 'power_plant_id'], 'integer'],
            [['form_type_code', 'k3l_year'], 'safe'],
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
        $query = RoadmapK3l::find();
        $sort = ['defaultOrder' => ['k3l_year' => SORT_ASC]];
        
        // add conditions that should always apply here
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => $sort
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
            'sector_id' => $this->sector_id,
            'power_plant_id' => $this->power_plant_id,
        ]);
        
        $query->andFilterWhere(['like', 'form_type_code', $this->form_type_code])
            ->andFilterWhere(['like', 'k3l_year', $this->k3l_year]);
        
        return $dataProvider;
    }
}
