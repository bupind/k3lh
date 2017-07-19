<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;


/**
 * This is the model class for table "environment_permit_company_profile".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $ep_profile_name
 * @property string $ep_profile_activity_loc_address
 * @property string $ep_profile_phone_fax
 * @property string $ep_profile_main_office_address
 * @property string $ep_profile_holding_name
 * @property string $ep_profile_holding_office_address
 * @property string $ep_profile_holding_phone_fax
 * @property string $ep_profile_company_established_year
 * @property string $ep_profile_industry_field
 * @property string $ep_profile_capital_status
 * @property string $ep_profile_area_factory
 * @property string $ep_profile_number_of_employees
 * @property string $ep_profile_production_capacity_installed
 * @property string $ep_profile_production_capacity_realization
 * @property string $ep_profile_raw_material
 * @property string $ep_profile_adjuvant_material
 * @property string $ep_profile_production_process
 * @property string $ep_profile_export_marketing_percentage
 * @property string $ep_profile_local_marketing_percentage
 * @property string $ep_profile_environment_document
 * @property string $ep_profile_contacts_name
 * @property string $ep_profile_contacts_mobile_phone
 * @property string $ep_profile_contacts_email
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 */
class EnvironmentPermitCompanyProfile extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'environment_permit_company_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'ep_profile_name'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ep_profile_activity_loc_address', 'ep_profile_main_office_address', 'ep_profile_holding_office_address', 'ep_profile_production_process', 'ep_profile_environment_document', 'ep_profile_contacts_name', 'ep_profile_contacts_mobile_phone', 'ep_profile_contacts_email'], 'string'],
            [['ep_profile_name', 'ep_profile_holding_name'], 'string', 'max' => 255],
            [['ep_profile_phone_fax', 'ep_profile_holding_phone_fax', 'ep_profile_company_established_year'], 'string', 'max' => 100],
            [['ep_profile_industry_field', 'ep_profile_capital_status', 'ep_profile_number_of_employees', 'ep_profile_raw_material', 'ep_profile_adjuvant_material', 'ep_profile_export_marketing_percentage', 'ep_profile_local_marketing_percentage'], 'string', 'max' => 150],
            [['ep_profile_area_factory', 'ep_profile_production_capacity_installed', 'ep_profile_production_capacity_realization'], 'string', 'max' => 50],
            [['power_plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => PowerPlant::className(), 'targetAttribute' => ['power_plant_id' => 'id']],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sector_id' => AppLabels::SECTOR,
            'power_plant_id' => AppLabels::POWER_PLANT,
            'ep_profile_name' => AppLabels::COMPANY_NAME,
            'ep_profile_activity_loc_address' => AppLabels::ACTIVITY_LOCATION_ADDRESS,
            'ep_profile_phone_fax' => AppLabels::PHONE_FAX,
            'ep_profile_main_office_address' => AppLabels::MAIN_COMPANY_ADDRESS,
            'ep_profile_holding_name' => AppLabels::HOLDING_COMPANY_NAME,
            'ep_profile_holding_office_address' => AppLabels::HOLDING_COMPANY_OFFICE_ADDRESS,
            'ep_profile_holding_phone_fax' => AppLabels::PHONE_FAX,
            'ep_profile_company_established_year' => AppLabels::COMPANY_ESTABLISHED_YEAR,
            'ep_profile_industry_field' => AppLabels::INDUSTRY_FIELD,
            'ep_profile_capital_status' => AppLabels::CAPITAL_STATUS,
            'ep_profile_area_factory' => AppLabels::AREA_FACTORY,
            'ep_profile_number_of_employees' => AppLabels::NUMBER_OF_EMPLOYEES,
            'ep_profile_production_capacity_installed' => sprintf('%s %s', AppLabels::PRODUCTION_CAPACITY, AppLabels::INSTALLED),
            'ep_profile_production_capacity_realization' => sprintf('%s %s', AppLabels::PRODUCTION_CAPACITY, AppLabels::REALIZATION),
            'ep_profile_raw_material' => AppLabels::RAW_MATERIAL,
            'ep_profile_adjuvant_material' => AppLabels::ADJUVANT_MATERIAL,
            'ep_profile_production_process' => AppLabels::PRODUCTION_PROCESS,
            'ep_profile_export_marketing_percentage' => AppLabels::EXPORT_MARKETING_PERCENTAGE,
            'ep_profile_local_marketing_percentage' => AppLabels::LOCAL_MARKETING_PERCENTAGE,
            'ep_profile_environment_document' => AppLabels::ENVIRONMENT_DOCUMENT_OWNED,
            'ep_profile_contacts_name' => AppLabels::CONTACT_NAME,
            'ep_profile_contacts_mobile_phone' => AppLabels::MOBILE_PHONE,
            'ep_profile_contacts_email' => AppLabels::CONTACT_EMAIL,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPowerPlant()
    {
        return $this->hasOne(PowerPlant::className(), ['id' => 'power_plant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector()
    {
        return $this->hasOne(Sector::className(), ['id' => 'sector_id']);
    }
}
