<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * WorkingPlanDetailSearch represents the model behind the search form about `backend\models\WorkingPlanDetail`.
 */
class WorkingPlanDetailSearch extends WorkingPlanDetail {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'working_plan_id', 'working_plan_attribute_id', 'wpd_order'], 'integer'],
            [['wpd_rnr', 'wpd_location', 'wpd_pic'], 'safe'],
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
        $query = WorkingPlanDetail::find();
        $sort = ['defaultOrder' => ['wpd_order' => SORT_ASC]];
        
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
            'working_plan_id' => $this->working_plan_id,
            'working_plan_attribute_id' => $this->working_plan_attribute_id,
            'wpd_order' => $this->wpd_order
        ]);
        
        $query->andFilterWhere(['like', 'wpd_rnr', $this->wpd_rnr])
            ->andFilterWhere(['like', 'wpd_location', $this->wpd_location])
            ->andFilterWhere(['like', 'wpd_pic', $this->wpd_pic]);
        
        return $dataProvider;
    }
}
