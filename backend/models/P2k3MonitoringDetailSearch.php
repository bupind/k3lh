<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * P2k3MonitoringDetailSearch represents the model behind the search form about `backend\models\P2k3MonitoringDetail`.
 */
class P2k3MonitoringDetailSearch extends P2k3MonitoringDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'p2k3_monitoring_id'], 'integer'],
            [['pmd_finding', 'pmd_action', 'pmd_deadline', 'pmd_status'], 'safe'],
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
        $query = P2k3MonitoringDetail::find();

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
            'p2k3_monitoring_id' => $this->p2k3_monitoring_id,
            'pmd_deadline' => $this->pmd_deadline,
        ]);

        $query->andFilterWhere(['like', 'pmd_finding', $this->pmd_finding])
            ->andFilterWhere(['like', 'pmd_action', $this->pmd_action])
            ->andFilterWhere(['like', 'pmd_status', $this->pmd_status]);

        return $dataProvider;
    }
}
