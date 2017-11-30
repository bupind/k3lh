<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * HydrantTestingDetailSearch represents the model behind the search form about `backend\models\HydrantTestingDetail`.
 */
class HydrantTestingDetailSearch extends HydrantTestingDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hydrant_testing_id'], 'integer'],
            [['htd_number', 'htd_location', 'htd_pump_type'], 'safe'],
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
        $query = HydrantTestingDetail::find();

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
            'hydrant_testing_id' => $this->hydrant_testing_id,
        ]);

        $query->andFilterWhere(['like', 'htd_number', $this->htd_number])
            ->andFilterWhere(['like', 'htd_location', $this->htd_location])
            ->andFilterWhere(['like', 'htd_pump_type', $this->htd_pump_type]);

        return $dataProvider;
    }
}
