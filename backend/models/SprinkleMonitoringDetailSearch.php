<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SprinkleMonitoringDetailSearch represents the model behind the search form about `backend\models\SprinkleMonitoringDetail`.
 */
class SprinkleMonitoringDetailSearch extends SprinkleMonitoringDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sprinkle_monitoring_id'], 'integer'],
            [['sm_location', 'sm_sprinkle_head', 'sm_detector', 'sm_piping_condition', 'sm_notes'], 'safe'],
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
        $query = SprinkleMonitoringDetail::find();

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
            'sprinkle_monitoring_id' => $this->sprinkle_monitoring_id,
        ]);

        $query->andFilterWhere(['like', 'sm_location', $this->sm_location])
            ->andFilterWhere(['like', 'sm_sprinkle_head', $this->sm_sprinkle_head])
            ->andFilterWhere(['like', 'sm_detector', $this->sm_detector])
            ->andFilterWhere(['like', 'sm_piping_condition', $this->sm_piping_condition])
            ->andFilterWhere(['like', 'sm_notes', $this->sm_notes]);

        return $dataProvider;
    }
}
