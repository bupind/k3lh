<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * BeyondObedienceProgramSearch represents the model behind the search form about `backend\models\BeyondObedienceProgram`.
 */
class BeyondObedienceProgramSearch extends BeyondObedienceProgram
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'bop_year', 'bop_production'], 'integer'],
            [['bop_form_type_code'], 'safe'],
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
        $query = BeyondObedienceProgram::find();

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
            'bop_year' => $this->bop_year,
            'bop_production' => $this->bop_production,
        ]);

        $query->andFilterWhere(['like', 'bop_form_type_code', $this->bop_form_type_code]);

        return $dataProvider;
    }
}
