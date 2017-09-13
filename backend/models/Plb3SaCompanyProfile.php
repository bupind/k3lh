<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;

/**
 * This is the model class for table "plb3_sa_company_profile".
 *
 * @property integer $id
 * @property integer $plb3_self_assessment_id
 * @property string $profile_name
 * @property string $profile_activity_loc_address
 * @property string $profile_phone_fax
 * @property string $profile_main_office_address
 * @property string $profile_main_office_phone_fax
 * @property string $profile_holding_name
 * @property string $profile_holding_office_address
 * @property string $profile_holding_phone_fax
 * @property integer $profile_company_established_year
 * @property string $profile_industry_field
 * @property string $profile_capital_status
 * @property string $profile_area_factory
 * @property string $profile_number_of_employees
 * @property string $profile_production_capacity_installed
 * @property string $profile_production_capacity_realization
 * @property string $profile_raw_material
 * @property string $profile_adjuvant_material
 * @property string $profile_production_process
 * @property string $profile_export_marketing_percentage
 * @property string $profile_local_marketing_percentage
 * @property string $profile_environment_document
 * @property string $profile_contacts_name
 * @property string $profile_contacts_mobile_phone
 * @property string $profile_contacts_email
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Plb3SelfAssessment $plb3SelfAssessment
 */
class Plb3SaCompanyProfile extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'plb3_sa_company_profile';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['plb3_self_assessment_id', 'profile_name'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['plb3_self_assessment_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['profile_activity_loc_address', 'profile_main_office_address', 'profile_holding_office_address', 'profile_production_process', 'profile_environment_document', 'profile_contacts_name', 'profile_contacts_mobile_phone', 'profile_contacts_email', 'profile_company_established_year'], 'string'],
            [['profile_name', 'profile_holding_name'], 'string', 'max' => 255],
            [['profile_phone_fax', 'profile_main_office_phone_fax', 'profile_holding_phone_fax', 'profile_company_established_year'], 'string', 'max' => 100],
            [['profile_industry_field', 'profile_capital_status', 'profile_number_of_employees', 'profile_raw_material', 'profile_adjuvant_material', 'profile_export_marketing_percentage', 'profile_local_marketing_percentage'], 'string', 'max' => 150],
            [['profile_area_factory', 'profile_production_capacity_installed', 'profile_production_capacity_realization'], 'string', 'max' => 50],
            [['plb3_self_assessment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plb3SelfAssessment::className(), 'targetAttribute' => ['plb3_self_assessment_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'plb3_self_assessment_id' => AppLabels::SELF_ASSESSMENT,
            'profile_name' => AppLabels::COMPANY_NAME,
            'profile_activity_loc_address' => AppLabels::ACTIVITY_LOCATION_ADDRESS,
            'profile_phone_fax' => AppLabels::PHONE_FAX,
            'profile_main_office_address' => AppLabels::MAIN_COMPANY_ADDRESS,
            'profile_main_office_phone_fax' => AppLabels::PHONE_FAX,
            'profile_holding_name' => AppLabels::HOLDING_COMPANY_NAME,
            'profile_holding_office_address' => AppLabels::HOLDING_COMPANY_OFFICE_ADDRESS,
            'profile_holding_phone_fax' => AppLabels::PHONE_FAX,
            'profile_company_established_year' => AppLabels::COMPANY_ESTABLISHED_YEAR,
            'profile_industry_field' => AppLabels::INDUSTRY_FIELD,
            'profile_capital_status' => AppLabels::CAPITAL_STATUS,
            'profile_area_factory' => AppLabels::AREA_FACTORY,
            'profile_number_of_employees' => AppLabels::NUMBER_OF_EMPLOYEES,
            'profile_production_capacity_installed' => sprintf('%s %s', AppLabels::PRODUCTION_CAPACITY, AppLabels::INSTALLED),
            'profile_production_capacity_realization' => sprintf('%s %s', AppLabels::PRODUCTION_CAPACITY, AppLabels::REALIZATION),
            'profile_raw_material' => AppLabels::RAW_MATERIAL,
            'profile_adjuvant_material' => AppLabels::ADJUVANT_MATERIAL,
            'profile_production_process' => AppLabels::PRODUCTION_PROCESS,
            'profile_export_marketing_percentage' => AppLabels::EXPORT_MARKETING_PERCENTAGE,
            'profile_local_marketing_percentage' => AppLabels::LOCAL_MARKETING_PERCENTAGE,
            'profile_environment_document' => AppLabels::ENVIRONMENT_DOCUMENT_OWNED,
            'profile_contacts_name' => AppLabels::CONTACT_NAME,
            'profile_contacts_mobile_phone' => AppLabels::MOBILE_PHONE,
            'profile_contacts_email' => AppLabels::CONTACT_EMAIL,
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlb3SelfAssessment() {
        return $this->hasOne(Plb3SelfAssessment::className(), ['id' => 'plb3_self_assessment_id']);
    }
}
