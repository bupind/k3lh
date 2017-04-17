<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Plb3BalanceSheetDetailSearch represents the model behind the search form about `backend\models\Plb3BalanceSheetDetail`.
 */
class Plb3BalanceSheetDetailSearch extends Plb3BalanceSheetDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'plb3_balance_sheet_id'], 'integer'],
            [['form_type_code', 'plb3_waste_type', 'plb3_waste_source_code', 'plb3_waste_unit_code'], 'safe'],
            [['plb3_previous_waste'], 'number'],
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
        $query = Plb3BalanceSheetDetail::find();

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
            'plb3_balance_sheet_id' => $this->plb3_balance_sheet_id,
            'plb3_previous_waste' => $this->plb3_previous_waste,
        ]);

        $query->andFilterWhere(['like', 'form_type_code', $this->form_type_code])
            ->andFilterWhere(['like', 'plb3_waste_type', $this->plb3_waste_type])
            ->andFilterWhere(['like', 'plb3_waste_source_code', $this->plb3_waste_source_code])
            ->andFilterWhere(['like', 'plb3_waste_unit_code', $this->plb3_waste_unit_code]);

        return $dataProvider;
    }
}
