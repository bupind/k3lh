<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SloGeneratorSearch represents the model behind the search form about `backend\models\SloGenerator`.
 */
class SloGeneratorSearch extends SloGenerator
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sg_year', 'id', 'sector_id', 'power_plant_id', 'sg_year'], 'integer'],
            [['generator_unit', 'generator_status','sg_form_month_type_code', 'sg_number', 'sg_published', 'sg_end', 'sg_max_extension', 'sg_publisher'], 'safe'],
            [['power_installed'], 'number'],
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
        $query = SloGenerator::find();

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
            'power_installed' => $this->power_installed,
            'sg_year' => $this->sg_year,
            'sg_operation_year' => $this->sg_operation_year,
            'sg_published' => $this->sg_published,
            'sg_end' => $this->sg_end,
            'sg_max_extension' => $this->sg_max_extension,
        ]);

        $query->andFilterWhere(['like', 'generator_unit', $this->generator_unit])
            ->andFilterWhere(['like', 'generator_status', $this->generator_status])
            ->andFilterWhere(['like', 'sg_form_month_type_code', $this->sg_form_month_type_code])
            ->andFilterWhere(['like', 'sg_number', $this->sg_number])
            ->andFilterWhere(['like', 'sg_publisher', $this->sg_publisher]);

        return $dataProvider;
    }
}
