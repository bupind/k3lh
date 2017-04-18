<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Plb3QuestionSearch represents the model behind the search form about `backend\models\Plb3Question`.
 */
class Plb3QuestionSearch extends Plb3Question
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['plb3_question_type_code', 'plb3_question'], 'safe'],
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
        $query = Plb3Question::find();

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
        ]);

        $query->andFilterWhere(['like', 'plb3_form_type_code', $this->plb3_form_type_code])
            ->andFilterWhere(['like', 'plb3_question_type_code', $this->plb3_question_type_code])
            ->andFilterWhere(['like', 'plb3_question', $this->plb3_question]);

        return $dataProvider;
    }
}
