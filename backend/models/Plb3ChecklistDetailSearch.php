<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Plb3ChecklistDetailSearch represents the model behind the search form about `backend\models\Plb3ChecklistDetail`.
 */
class Plb3ChecklistDetailSearch extends Plb3ChecklistDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'plb3_checklist_id'], 'integer'],
            [['plb3cd_form_type_code', 'plb3cd_company_name', 'plb3cd_industrial_sector', 'plb3cd_location', 'plb3cd_assessment_team', 'plb3cd_assessment_date'], 'safe'],
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
        $query = Plb3ChecklistDetail::find();

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
            'plb3_checklist_id' => $this->plb3_checklist_id,
            'plb3cd_assessment_date' => $this->plb3cd_assessment_date,
        ]);

        $query->andFilterWhere(['like', 'plb3cd_form_type_code', $this->plb3cd_form_type_code])
            ->andFilterWhere(['like', 'plb3cd_company_name', $this->plb3cd_company_name])
            ->andFilterWhere(['like', 'plb3cd_industrial_sector', $this->plb3cd_industrial_sector])
            ->andFilterWhere(['like', 'plb3cd_location', $this->plb3cd_location])
            ->andFilterWhere(['like', 'plb3cd_assessment_team', $this->plb3cd_assessment_team]);

        return $dataProvider;
    }
}
