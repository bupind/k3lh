<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PowerPlant;

/**
 * PowerPlantSearch represents the model behind the search form about `backend\models\PowerPlant`.
 */
class PowerPlantSearch extends PowerPlant {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'sector_id'], 'integer'],
            [['pp_name'], 'safe'],
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
        $query = PowerPlant::find();
        $query->joinWith(['sector']);
        $sort = ['defaultOrder' => ['sector_id' => SORT_ASC, 'pp_name' => SORT_ASC]];
        
        // add conditions that should always apply here
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => $sort
        ]);
        
        $dataProvider->sort->attributes['sector_id'] = [
            'asc' => ['sector.sector_name' => SORT_ASC],
            'desc' => ['sector.sector_name' => SORT_DESC],
        ];
        
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
        ]);
        
        $query->andFilterWhere(['like', 'pp_name', $this->pp_name]);
        
        return $dataProvider;
    }
}
