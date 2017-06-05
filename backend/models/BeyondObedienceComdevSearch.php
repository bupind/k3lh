<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * BeyondObedienceComdevSearch represents the model behind the search form about `backend\models\BeyondObedienceComdev`.
 */
class BeyondObedienceComdevSearch extends BeyondObedienceComdev
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'boc_year', 'boc_production'], 'integer'],
            [['boc_form_type_code'], 'safe'],
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
        $query = BeyondObedienceComdev::find();

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
            'boc_year' => $this->boc_year,
            'boc_production' => $this->boc_production,
        ]);

        $query->andFilterWhere(['like', 'boc_form_type_code', $this->boc_form_type_code]);

        return $dataProvider;
    }
}
