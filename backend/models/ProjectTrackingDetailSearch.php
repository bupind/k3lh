<?php

namespace backend\models;

use common\vendor\AppConstants;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProjectTrackingDetailSearch represents the model behind the search form about `backend\models\ProjectTrackingDetail`.
 */
class ProjectTrackingDetailSearch extends ProjectTrackingDetail {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'project_tracking_id', 'ptd_duration'], 'integer'],
            [['ptd_step', 'ptd_pic_code', 'ptd_status', 'ptd_start_date', 'ptd_information'], 'safe'],
            [['ptd_progress_percentage'], 'number'],
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
        $query = ProjectTrackingDetail::find();
        $sort = ['defaultOrder' => ['ptd_start_date' => SORT_ASC]];
        
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
            'project_tracking_id' => $this->project_tracking_id,
            'ptd_duration' => $this->ptd_duration,
            'ptd_pic_code' => $this->ptd_pic_code,
            'ptd_start_date' => !empty($this->ptd_start_date) ? \Yii::$app->formatter->asDate($this->ptd_start_date, AppConstants::FORMAT_DB_DATE_PHP) : $this->ptd_start_date,
            'ptd_progress_percentage' => $this->ptd_progress_percentage,
        ]);
        
        $query->andFilterWhere(['like', 'ptd_step', $this->ptd_step])
            ->andFilterWhere(['like', 'ptd_status', $this->ptd_status])
            ->andFilterWhere(['like', 'ptd_information', $this->ptd_information]);
        
        return $dataProvider;
    }
}
