<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * WorkingEnvDataSearch represents the model behind the search form about `backend\models\WorkingEnvData`.
 */
class WorkingEnvDataSearch extends WorkingEnvData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id'], 'integer'],
            [['wed_test_date', 'wed_work_area', 'wed_executor'], 'safe'],
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
        $query = WorkingEnvData::find();

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
            'wed_test_date' => $this->wed_test_date,
        ]);

        $query->andFilterWhere(['like', 'wed_work_area', $this->wed_work_area])
            ->andFilterWhere(['like', 'wed_executor', $this->wed_executor]);

        return $dataProvider;
    }
}
