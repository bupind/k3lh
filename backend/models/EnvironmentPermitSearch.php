<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\EnvironmentPermit;

/**
 * EnvironmentPermitSearch represents the model behind the search form about `backend\models\EnvironmentPermit`.
 */
class EnvironmentPermitSearch extends EnvironmentPermit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sector_id', 'power_plant_id', 'ep_year'], 'integer'],
            [['ep_quarter', 'ep_district', 'ep_province', 'ep_env_ministry'], 'safe'],
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
        $query = EnvironmentPermit::find();

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
            'ep_year' => $this->ep_year,
        ]);

        $query->andFilterWhere(['like', 'ep_quarter', $this->ep_quarter])
            ->andFilterWhere(['like', 'ep_district', $this->ep_district])
            ->andFilterWhere(['like', 'ep_province', $this->ep_province])
            ->andFilterWhere(['like', 'ep_env_ministry', $this->ep_env_ministry]);

        return $dataProvider;
    }
}
