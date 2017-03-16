<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PpaReportBmSearch represents the model behind the search form about `backend\models\PpaReportBm`.
 */
class PpaReportBmSearch extends PpaReportBm {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'ppa_setup_permit_id'], 'integer'],
            [['ppar_param_code', 'ppar_param_unit_code', 'ppar_qs_unit_code', 'ppar_qs_ref', 'ppar_qs_load_unit_code', 'ppar_qs_max_pollution_load_ref'], 'safe'],
            [['ppar_qs_1', 'ppar_qs_2', 'ppar_qs_max_pollution_load'], 'number'],
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
        $query = PpaReportBm::find();
        
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
            'ppa_setup_permit_id' => $this->ppa_setup_permit_id,
            'ppar_qs_1' => $this->ppar_qs_1,
            'ppar_qs_2' => $this->ppar_qs_2,
            'ppar_qs_max_pollution_load' => $this->ppar_qs_max_pollution_load,
        ]);
        
        $query->andFilterWhere(['like', 'ppar_param_code', $this->ppar_param_code])
            ->andFilterWhere(['like', 'ppar_param_unit_code', $this->ppar_param_unit_code])
            ->andFilterWhere(['like', 'ppar_qs_unit_code', $this->ppar_qs_unit_code])
            ->andFilterWhere(['like', 'ppar_qs_ref', $this->ppar_qs_ref])
            ->andFilterWhere(['like', 'ppar_qs_load_unit_code', $this->ppar_qs_load_unit_code])
            ->andFilterWhere(['like', 'ppar_qs_max_pollution_load_ref', $this->ppar_qs_max_pollution_load_ref]);
        
        return $dataProvider;
    }
    
    public function searchPpa($params, $ppaId) {
        $query = PpaReportBm::find();
        
        // add conditions that should always apply here
                
        $query->joinWith(['ppaSetupPermit sp'], true, 'INNER JOIN')
        ->where(['sp.ppa_id' => $ppaId]);
        
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
            'ppar_qs_1' => $this->ppar_qs_1,
            'ppar_qs_2' => $this->ppar_qs_2,
            'ppar_qs_max_pollution_load' => $this->ppar_qs_max_pollution_load,
        ]);
        
        $query->andFilterWhere(['like', 'ppar_param_code', $this->ppar_param_code])
            ->andFilterWhere(['like', 'ppar_param_unit_code', $this->ppar_param_unit_code])
            ->andFilterWhere(['like', 'ppar_qs_unit_code', $this->ppar_qs_unit_code])
            ->andFilterWhere(['like', 'ppar_qs_ref', $this->ppar_qs_ref])
            ->andFilterWhere(['like', 'ppar_qs_load_unit_code', $this->ppar_qs_load_unit_code])
            ->andFilterWhere(['like', 'ppar_qs_max_pollution_load_ref', $this->ppar_qs_max_pollution_load_ref]);
        
        return $dataProvider;
    }
}
