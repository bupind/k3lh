<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * WorkAccidentDetailSearch represents the model behind the search form about `backend\models\WorkAccidentDetail`.
 */
class WorkAccidentDetailSearch extends WorkAccidentDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'work_accident_id'], 'integer'],
            [['wad_date', 'wad_event', 'wad_type', 'wad_work_area', 'wad_address', 'wad_impact_corp', 'wad_impact_indi', 'wad_chronology', 'wad_inv_date', 'wad_inv_team', 'wad_inv_k3_action', 'wad_inv_uns_condition', 'wad_inv_uns_action', 'wad_result'], 'safe'],
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
        $query = WorkAccidentDetail::find();

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
            'work_accident_id' => $this->work_accident_id,
            'wad_date' => $this->wad_date,
            'wad_inv_date' => $this->wad_inv_date,
        ]);

        $query->andFilterWhere(['like', 'wad_event', $this->wad_event])
            ->andFilterWhere(['like', 'wad_type', $this->wad_type])
            ->andFilterWhere(['like', 'wad_work_area', $this->wad_work_area])
            ->andFilterWhere(['like', 'wad_address', $this->wad_address])
            ->andFilterWhere(['like', 'wad_impact_corp', $this->wad_impact_corp])
            ->andFilterWhere(['like', 'wad_impact_indi', $this->wad_impact_indi])
            ->andFilterWhere(['like', 'wad_chronology', $this->wad_chronology])
            ->andFilterWhere(['like', 'wad_inv_team', $this->wad_inv_team])
            ->andFilterWhere(['like', 'wad_inv_k3_action', $this->wad_inv_k3_action])
            ->andFilterWhere(['like', 'wad_inv_uns_condition', $this->wad_inv_uns_condition])
            ->andFilterWhere(['like', 'wad_inv_uns_action', $this->wad_inv_uns_action])
            ->andFilterWhere(['like', 'wad_result', $this->wad_result]);

        return $dataProvider;
    }
}
