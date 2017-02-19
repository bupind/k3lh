<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PpuCompulsoryMonitoredEmissionSource;

/**
 * PpuCompulsoryMonitoredEmissionSourceSearch represents the model behind the search form about `backend\models\PpuCompulsoryMonitoredEmissionSource`.
 */
class PpuCompulsoryMonitoredEmissionSourceSearch extends PpuCompulsoryMonitoredEmissionSource
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ppu_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['ppucmes_name', 'ppucmes_freq_monitoring_obligation_code'], 'safe'],
            [['ppucmes_operation_time'], 'number'],
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
        $query = PpuCompulsoryMonitoredEmissionSource::find();

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
            'ppu_id' => $this->ppu_id,
            'ppucmes_operation_time' => $this->ppucmes_operation_time,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'ppucmes_name', $this->ppucmes_name])
            ->andFilterWhere(['like', 'ppucmes_freq_monitoring_obligation_code', $this->ppucmes_freq_monitoring_obligation_code]);

        return $dataProvider;
    }
}
