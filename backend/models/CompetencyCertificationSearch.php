<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CompetencyCertificationSearch represents the model behind the search form about `backend\models\CompetencyCertification`.
 */
class CompetencyCertificationSearch extends CompetencyCertification
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id'], 'integer'],
            [['cc_name', 'cc_position', 'cc_type', 'cc_number', 'cc_date', 'cc_certificate_publisher', 'cc_pjk3'], 'safe'],
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
        $query = CompetencyCertification::find();

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
            'cc_date' => $this->cc_date,
        ]);

        $query->andFilterWhere(['like', 'cc_name', $this->cc_name])
            ->andFilterWhere(['like', 'cc_position', $this->cc_position])
            ->andFilterWhere(['like', 'cc_type', $this->cc_type])
            ->andFilterWhere(['like', 'cc_number', $this->cc_number])
            ->andFilterWhere(['like', 'cc_certificate_publisher', $this->cc_certificate_publisher])
            ->andFilterWhere(['like', 'cc_pjk3', $this->cc_pjk3]);

        return $dataProvider;
    }
}
