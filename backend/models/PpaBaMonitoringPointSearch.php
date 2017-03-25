<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PpaBaMonitoringPoint;

/**
 * PpaBaMonitoringPointSearch represents the model behind the search form about `backend\models\PpaBaMonitoringPoint`.
 */
class PpaBaMonitoringPointSearch extends PpaBaMonitoringPoint
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ppa_ba_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['ppabamp_wastewater_source', 'ppabamp_monitoring_point_name', 'ppabamp_coord_lat', 'ppabamp_coord_long', 'ppabamp_document_name', 'ppabamp_permit_publisher', 'ppabamp_validation_date', 'ppabamp_monitoring_frequency_code', 'ppabamp_monitoring_status_code'], 'safe'],
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
        $query = PpaBaMonitoringPoint::find();

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
            'ppa_ba_id' => $this->ppa_ba_id,
            'ppabamp_validation_date' => $this->ppabamp_validation_date,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'ppabamp_wastewater_source', $this->ppabamp_wastewater_source])
            ->andFilterWhere(['like', 'ppabamp_monitoring_point_name', $this->ppabamp_monitoring_point_name])
            ->andFilterWhere(['like', 'ppabamp_coord_lat', $this->ppabamp_coord_lat])
            ->andFilterWhere(['like', 'ppabamp_coord_long', $this->ppabamp_coord_long])
            ->andFilterWhere(['like', 'ppabamp_document_name', $this->ppabamp_document_name])
            ->andFilterWhere(['like', 'ppabamp_permit_publisher', $this->ppabamp_permit_publisher])
            ->andFilterWhere(['like', 'ppabamp_monitoring_frequency_code', $this->ppabamp_monitoring_frequency_code])
            ->andFilterWhere(['like', 'ppabamp_monitoring_status_code', $this->ppabamp_monitoring_status_code]);

        return $dataProvider;
    }
}
