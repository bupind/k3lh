<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * EnvironmentPermitDetailSearch represents the model behind the search form about `backend\models\EnvironmentPermitDetail`.
 */
class EnvironmentPermitDetailSearch extends EnvironmentPermitDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'environment_permit_id', 'ep_limit_capacity', 'ep_realization_capacity', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['ep_document_name', 'ep_institution', 'ep_date'], 'safe'],
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
        $query = EnvironmentPermitDetail::find();

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
            'environment_permit_id' => $this->environment_permit_id,
            'ep_date' => $this->ep_date,
            'ep_limit_capacity' => $this->ep_limit_capacity,
            'ep_realization_capacity' => $this->ep_realization_capacity,
        ]);

        $query->andFilterWhere(['like', 'ep_document_name', $this->ep_document_name])
            ->andFilterWhere(['like', 'ep_institution', $this->ep_institution]);

        return $dataProvider;
    }
}
