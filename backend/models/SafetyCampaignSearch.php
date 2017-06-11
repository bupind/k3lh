<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SafetyCampaignSearch represents the model behind the search form about `backend\models\SafetyCampaign`.
 */
class SafetyCampaignSearch extends SafetyCampaign
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'sc_amount'], 'integer'],
            [['sc_campaign_name', 'sc_description', 'sc_date', 'sc_location', 'sc_campaigner', 'sc_part', 'sc_result'], 'safe'],
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
        $query = SafetyCampaign::find();

        // add conditions that should always apply here

        $powerPlant = PowerPlant::find()->where(['id' => $params['_ppId']])->one();

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
            'sector_id' => $powerPlant->sector_id,
            'power_plant_id' => $powerPlant->id,
            'sc_date' => $this->sc_date,
            'sc_amount' => $this->sc_amount,
        ]);

        $query->andFilterWhere(['like', 'sc_campaign_name', $this->sc_campaign_name])
            ->andFilterWhere(['like', 'sc_description', $this->sc_description])
            ->andFilterWhere(['like', 'sc_location', $this->sc_location])
            ->andFilterWhere(['like', 'sc_campaigner', $this->sc_campaigner])
            ->andFilterWhere(['like', 'sc_part', $this->sc_part])
            ->andFilterWhere(['like', 'sc_result', $this->sc_result]);

        return $dataProvider;
    }
}
