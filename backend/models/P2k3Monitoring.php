<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "p2k3_monitoring".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $pm_form_month_type_code
 * @property integer $pm_year
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Sector $sector
 * @property PowerPlant $powerPlant
 * @property P2k3MonitoringDetail[] $p2k3MonitoringDetails
 */
class P2k3Monitoring extends AppModel
{
    public $pm_form_month_type_code_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'p2k3_monitoring';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'pm_form_month_type_code', 'pm_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'pm_year'], 'integer', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['pm_form_month_type_code'], 'string', 'max' => 10],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector_id' => 'id']],
            [['power_plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => PowerPlant::className(), 'targetAttribute' => ['power_plant_id' => 'id']],
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
            'pm_form_month_type_code' => AppLabels::MONTH,
            'pm_year' => AppLabels::YEAR,
        ];
    }



    public function afterFind() {
        parent::afterFind();

        $this->pm_form_month_type_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_FORM_MONTH_TYPE_CODE, $this->pm_form_month_type_code);

        return true;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector()
    {
        return $this->hasOne(Sector::className(), ['id' => 'sector_id']);
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
    public function getp2k3MonitoringDetails()
    {
        return $this->hasMany(P2k3MonitoringDetail::className(), ['p2k3_monitoring_id' => 'id']);
    }
}
