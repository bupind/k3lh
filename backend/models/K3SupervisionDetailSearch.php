<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * K3SupervisionDetailSearch represents the model behind the search form about `backend\models\K3SupervisionDetail`.
 */
class K3SupervisionDetailSearch extends K3SupervisionDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'k3_supervision_id'], 'integer'],
            [['ksd_date', 'ksd_finding', 'ksd_officer_action', 'ksd_response', 'ksd_finding_desc'], 'safe'],
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
        $query = K3SupervisionDetail::find();

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
            'k3_supervision_id' => $this->k3_supervision_id,
            'ksd_date' => $this->ksd_date,
        ]);

        $query->andFilterWhere(['like', 'ksd_finding', $this->ksd_finding])
            ->andFilterWhere(['like', 'ksd_officer_action', $this->ksd_officer_action])
            ->andFilterWhere(['like', 'ksd_response', $this->ksd_response])
            ->andFilterWhere(['like', 'ksd_finding_desc', $this->ksd_finding_desc]);

        return $dataProvider;
    }
}
