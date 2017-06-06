<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ImportantPhoneNumberSearch represents the model behind the search form about `backend\models\ImportantPhoneNumber`.
 */
class ImportantPhoneNumberSearch extends ImportantPhoneNumber
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id'], 'integer'],
            [['ipn_instance_name', 'ipn_phone_number', 'ipn_address'], 'safe'],
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
        $query = ImportantPhoneNumber::find();

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
        ]);

        $query->andFilterWhere(['like', 'ipn_instance_name', $this->ipn_instance_name])
            ->andFilterWhere(['like', 'ipn_phone_number', $this->ipn_phone_number])
            ->andFilterWhere(['like', 'ipn_address', $this->ipn_address]);

        return $dataProvider;
    }
}
