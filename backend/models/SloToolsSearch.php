<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SloToolsSearch represents the model behind the search form about `backend\models\SloTools`.
 */
class SloToolsSearch extends SloTools
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['st_year', 'id', 'sector_id', 'power_plant_id'], 'integer'],
            [['st_form_month_type_code', 'st_generator_unit', 'st_generator_location', 'st_generator_status', 'st_category', 'st_type', 'st_location', 'st_validation_number', 'st_published', 'st_check1', 'st_check2', 'st_next_check', 'st_certificate_publisher'], 'safe'],
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
        $query = SloTools::find();

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
            'st_year' => $this->st_year,
            'st_published' => $this->st_published,
            'st_check1' => $this->st_check1,
            'st_check2' => $this->st_check2,
        ]);

        $query->andFilterWhere(['like', 'st_generator_unit', $this->st_generator_unit])
            ->andFilterWhere(['like', 'st_generator_location', $this->st_generator_location])
            ->andFilterWhere(['like', 'st_generator_status', $this->st_generator_status])
            ->andFilterWhere(['like', 'st_form_month_type_code', $this->st_form_month_type_code])
            ->andFilterWhere(['like', 'st_category', $this->st_category])
            ->andFilterWhere(['like', 'st_type', $this->st_type])
            ->andFilterWhere(['like', 'st_location', $this->st_location])
            ->andFilterWhere(['like', 'st_validation_number', $this->st_validation_number])
            ->andFilterWhere(['like', 'st_next_check', $this->st_next_check])
            ->andFilterWhere(['like', 'st_certificate_publisher', $this->st_certificate_publisher]);

        return $dataProvider;
    }
}
