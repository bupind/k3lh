<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * P3kMonitoringDetailSearch represents the model behind the search form about `backend\models\P3kMonitoringDetail`.
 */
class P3kMonitoringDetailSearch extends P3kMonitoringDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'p3k_monitoring_id'], 'integer'],
            [['pmd_value', 'pmd_standard_amount', 'pmd_ref'], 'safe'],
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
        $query = P3kMonitoringDetail::find();

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
            'p3k_monitoring_id' => $this->p3k_monitoring_id,
        ]);

        $query->andFilterWhere(['like', 'pmd_value', $this->pmd_value])
            ->andFilterWhere(['like', 'pmd_standard_amount', $this->pmd_standard_amount])
            ->andFilterWhere(['like', 'pmd_ref', $this->pmd_ref]);

        return $dataProvider;
    }
}
