<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * HydrantChecklistSearch represents the model behind the search form about `backend\models\HydrantChecklist`.
 */
class HydrantChecklistSearch extends HydrantChecklist
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'hc_number'], 'integer'],
            [['hc_location', 'hc_date'], 'safe'],
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
        $query = HydrantChecklist::find();

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
            'hc_number' => $this->hc_number,
            'hc_date' => $this->hc_date,
        ]);

        $query->andFilterWhere(['like', 'hc_location', $this->hc_location]);

        return $dataProvider;
    }
}
