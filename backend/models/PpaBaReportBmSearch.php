<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PpaBaReportBmSearch represents the model behind the search form about `backend\models\PpaBaReportBm`.
 */
class PpaBaReportBmSearch extends PpaBaReportBm {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'ppa_ba_monitoring_point_id'], 'integer'],
            [['ppabar_param_code', 'ppabar_param_unit_code', 'ppabar_qs_unit_code', 'ppabar_qs_ref'], 'safe'],
            [['ppabar_qs_1', 'ppabar_qs_2'], 'number'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = PpaBaReportBm::find();
        
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
            'ppa_ba_monitoring_point_id' => $this->ppa_ba_monitoring_point_id,
            'ppabar_qs_1' => $this->ppabar_qs_1,
            'ppabar_qs_2' => $this->ppabar_qs_2,
        ]);
        
        $query->andFilterWhere(['like', 'ppabar_param_code', $this->ppabar_param_code])
            ->andFilterWhere(['like', 'ppabar_param_unit_code', $this->ppabar_param_unit_code])
            ->andFilterWhere(['like', 'ppabar_qs_unit_code', $this->ppabar_qs_unit_code])
            ->andFilterWhere(['like', 'ppabar_qs_ref', $this->ppabar_qs_ref]);
        
        return $dataProvider;
    }
    
    public function searchPpaBa ($params, $ppaBaId) {
        $query = PpaBaReportBm::find();
        
        // add conditions that should always apply here
        
        $query->joinWith(['ppaBaMonitoringPoint mp'], true, 'INNER JOIN')
            ->where(['mp.ppa_ba_id' => $ppaBaId]);
        
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
            'ppa_ba_monitoring_point_id' => $this->ppa_ba_monitoring_point_id,
            'ppabar_qs_1' => $this->ppabar_qs_1,
            'ppabar_qs_2' => $this->ppabar_qs_2,
        ]);
    
        $query->andFilterWhere(['like', 'ppabar_param_code', $this->ppabar_param_code])
            ->andFilterWhere(['like', 'ppabar_param_unit_code', $this->ppabar_param_unit_code])
            ->andFilterWhere(['like', 'ppabar_qs_unit_code', $this->ppabar_qs_unit_code])
            ->andFilterWhere(['like', 'ppabar_qs_ref', $this->ppabar_qs_ref]);
        
        return $dataProvider;
    }
}
