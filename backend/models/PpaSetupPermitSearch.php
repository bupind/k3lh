<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PpaSetupPermitSearch represents the model behind the search form about `backend\models\PpaSetupPermit`.
 */
class PpaSetupPermitSearch extends PpaSetupPermit {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'ppa_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['ppasp_wastewater_source', 'ppasp_setup_point_name', 'ppasp_coord_ls', 'ppasp_coord_bt', 'ppasp_wastewater_tech_code', 'ppasp_permit_number', 'ppasp_permit_publisher', 'ppasp_permit_publish_date', 'ppasp_permit_end_date'], 'safe'],
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
        $query = PpaSetupPermit::find();
        
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
            'ppasp_permit_publish_date' => $this->ppasp_permit_publish_date,
            'ppasp_permit_end_date' => $this->ppasp_permit_end_date,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);
        
        $query->andFilterWhere(['like', 'ppasp_wastewater_source', $this->ppasp_wastewater_source])
            ->andFilterWhere(['like', 'ppasp_setup_point_name', $this->ppasp_setup_point_name])
            ->andFilterWhere(['like', 'ppasp_coord_ls', $this->ppasp_coord_ls])
            ->andFilterWhere(['like', 'ppasp_coord_bt', $this->ppasp_coord_bt])
            ->andFilterWhere(['like', 'ppasp_wastewater_tech_code', $this->ppasp_wastewater_tech_code])
            ->andFilterWhere(['like', 'ppasp_permit_number', $this->ppasp_permit_number])
            ->andFilterWhere(['like', 'ppasp_permit_publisher', $this->ppasp_permit_publisher]);
        
        return $dataProvider;
    }
}
