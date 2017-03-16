<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PpaPollutionLoadDecrease;

/**
 * PpaPollutionLoadDecreaseSearch represents the model behind the search form about `backend\models\PpaPollutionLoadDecrease`.
 */
class PpaPollutionLoadDecreaseSearch extends PpaPollutionLoadDecrease
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ppa_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['ppapld_activity', 'ppapld_parameter', 'ppapld_unit'], 'safe'],
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
        $query = PpaPollutionLoadDecrease::find();

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
            'ppa_id' => $this->ppa_id,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'ppapld_activity', $this->ppapld_activity])
            ->andFilterWhere(['like', 'ppapld_parameter', $this->ppapld_parameter])
            ->andFilterWhere(['like', 'ppapld_unit', $this->ppapld_unit]);

        return $dataProvider;
    }
}
