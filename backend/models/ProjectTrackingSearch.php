<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ProjectTracking;

/**
 * ProjectTrackingSearch represents the model behind the search form about `backend\models\ProjectTracking`.
 */
class ProjectTrackingSearch extends ProjectTracking
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'pt_estimated_project_value', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['pt_name', 'pt_goal', 'pt_description', 'pt_owner_code', 'pt_report_period', 'pt_controller_code', 'pt_report_to_code', 'pt_ao_no', 'pt_easy_impact', 'pt_support'], 'safe'],
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
        $query = ProjectTracking::find();

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
            'sector_id' => $this->sector_id,
            'power_plant_id' => $this->power_plant_id,
            'pt_report_period' => $this->pt_report_period,
            'pt_estimated_project_value' => $this->pt_estimated_project_value,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'pt_name', $this->pt_name])
            ->andFilterWhere(['like', 'pt_goal', $this->pt_goal])
            ->andFilterWhere(['like', 'pt_description', $this->pt_description])
            ->andFilterWhere(['like', 'pt_owner_code', $this->pt_owner_code])
            ->andFilterWhere(['like', 'pt_controller_code', $this->pt_controller_code])
            ->andFilterWhere(['like', 'pt_report_to_code', $this->pt_report_to_code])
            ->andFilterWhere(['like', 'pt_ao_no', $this->pt_ao_no])
            ->andFilterWhere(['like', 'pt_easy_impact', $this->pt_easy_impact])
            ->andFilterWhere(['like', 'pt_support', $this->pt_support]);

        return $dataProvider;
    }
}
