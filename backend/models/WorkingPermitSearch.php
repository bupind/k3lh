<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\WorkingPermit;

/**
 * WorkingPermitSearch represents the model behind the search form about `backend\models\WorkingPermit`.
 */
class WorkingPermitSearch extends WorkingPermit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'wp_revision_number', 'wp_page', 'wp_pln_noe', 'wp_outsource_noe'], 'integer'],
            [['wp_registration_number', 'wp_submit_date', 'wp_work_type', 'wp_work_details', 'wp_work_location', 'wp_company_department', 'wp_leader_name', 'wp_leader_phone', 'wp_supervisor_name', 'wp_supervisor_phone', 'wp_start_date', 'wp_end_date', 'wp_job_classification', 'wp_k3_rules', 'wp_self_protection', 'wp_dangerous_work_type'], 'safe'],
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
        $query = WorkingPermit::find();

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
            'wp_submit_date' => $this->wp_submit_date,
            'wp_revision_number' => $this->wp_revision_number,
            'wp_page' => $this->wp_page,
            'wp_start_date' => $this->wp_start_date,
            'wp_end_date' => $this->wp_end_date,
            'wp_pln_noe' => $this->wp_pln_noe,
            'wp_outsource_noe' => $this->wp_outsource_noe,
        ]);

        $query->andFilterWhere(['like', 'wp_registration_number', $this->wp_registration_number])
            ->andFilterWhere(['like', 'wp_work_type', $this->wp_work_type])
            ->andFilterWhere(['like', 'wp_work_details', $this->wp_work_details])
            ->andFilterWhere(['like', 'wp_work_location', $this->wp_work_location])
            ->andFilterWhere(['like', 'wp_company_department', $this->wp_company_department])
            ->andFilterWhere(['like', 'wp_leader_name', $this->wp_leader_name])
            ->andFilterWhere(['like', 'wp_leader_phone', $this->wp_leader_phone])
            ->andFilterWhere(['like', 'wp_supervisor_name', $this->wp_supervisor_name])
            ->andFilterWhere(['like', 'wp_supervisor_phone', $this->wp_supervisor_phone])
            ->andFilterWhere(['like', 'wp_job_classification', $this->wp_job_classification])
            ->andFilterWhere(['like', 'wp_k3_rules', $this->wp_k3_rules])
            ->andFilterWhere(['like', 'wp_self_protection', $this->wp_self_protection])
            ->andFilterWhere(['like', 'wp_dangerous_work_type', $this->wp_dangerous_work_type]);

        return $dataProvider;
    }
}
