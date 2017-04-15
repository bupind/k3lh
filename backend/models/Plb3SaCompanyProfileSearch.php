<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Plb3SaCompanyProfile;

/**
 * Plb3SaCompanyProfileSearch represents the model behind the search form about `backend\models\Plb3SaCompanyProfile`.
 */
class Plb3SaCompanyProfileSearch extends Plb3SaCompanyProfile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'plb3_self_assessment_id', 'profile_company_established_year', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['profile_name', 'profile_activity_loc_address', 'profile_phone_fax', 'profile_main_office_address', 'profile_holding_name', 'profile_holding_office_address', 'profile_holding_phone_fax', 'profile_industry_field', 'profile_capital_status', 'profile_area_factory', 'profile_number_of_employees', 'profile_production_capacity_installed', 'profile_production_capacity_realization', 'profile_raw_material', 'profile_adjuvant_material', 'profile_production_process', 'profile_export_marketing_percentage', 'profile_local_marketing_percentage', 'profile_environment_document', 'profile_contacts_name', 'profile_contacts_mobile_phone', 'profile_contacts_email'], 'safe'],
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
        $query = Plb3SaCompanyProfile::find();

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
            'plb3_self_assessment_id' => $this->plb3_self_assessment_id,
            'profile_company_established_year' => $this->profile_company_established_year,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'profile_name', $this->profile_name])
            ->andFilterWhere(['like', 'profile_activity_loc_address', $this->profile_activity_loc_address])
            ->andFilterWhere(['like', 'profile_phone_fax', $this->profile_phone_fax])
            ->andFilterWhere(['like', 'profile_main_office_address', $this->profile_main_office_address])
            ->andFilterWhere(['like', 'profile_holding_name', $this->profile_holding_name])
            ->andFilterWhere(['like', 'profile_holding_office_address', $this->profile_holding_office_address])
            ->andFilterWhere(['like', 'profile_holding_phone_fax', $this->profile_holding_phone_fax])
            ->andFilterWhere(['like', 'profile_industry_field', $this->profile_industry_field])
            ->andFilterWhere(['like', 'profile_capital_status', $this->profile_capital_status])
            ->andFilterWhere(['like', 'profile_area_factory', $this->profile_area_factory])
            ->andFilterWhere(['like', 'profile_number_of_employees', $this->profile_number_of_employees])
            ->andFilterWhere(['like', 'profile_production_capacity_installed', $this->profile_production_capacity_installed])
            ->andFilterWhere(['like', 'profile_production_capacity_realization', $this->profile_production_capacity_realization])
            ->andFilterWhere(['like', 'profile_raw_material', $this->profile_raw_material])
            ->andFilterWhere(['like', 'profile_adjuvant_material', $this->profile_adjuvant_material])
            ->andFilterWhere(['like', 'profile_production_process', $this->profile_production_process])
            ->andFilterWhere(['like', 'profile_export_marketing_percentage', $this->profile_export_marketing_percentage])
            ->andFilterWhere(['like', 'profile_local_marketing_percentage', $this->profile_local_marketing_percentage])
            ->andFilterWhere(['like', 'profile_environment_document', $this->profile_environment_document])
            ->andFilterWhere(['like', 'profile_contacts_name', $this->profile_contacts_name])
            ->andFilterWhere(['like', 'profile_contacts_mobile_phone', $this->profile_contacts_mobile_phone])
            ->andFilterWhere(['like', 'profile_contacts_email', $this->profile_contacts_email]);

        return $dataProvider;
    }
}
