<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * EnvironmentPermitReportSearch represents the model behind the search form about `backend\models\EnvironmentPermitReport`.
 */
class EnvironmentPermitReportSearch extends EnvironmentPermitReport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'environment_permit_id'], 'integer'],
            [['ep_quarter'], 'safe'],
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
        $query = EnvironmentPermitReport::find();

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
        ]);

        $query->andFilterWhere(['like', 'ep_quarter', $this->ep_quarter]);

        return $dataProvider;
    }
}
