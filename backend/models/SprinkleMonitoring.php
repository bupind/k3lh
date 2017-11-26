<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "sprinkle_monitoring".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $sm_form_month_type_code
 * @property integer sm_year
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property SprinkleMonitoringDetail[] $sprinkleMonitoringDetails
 */
class SprinkleMonitoring extends AppModel
{

    public $sm_form_month_type_code_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sprinkle_monitoring';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'sm_form_month_type_code', 'sm_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id','sm_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['sm_year'], 'string', 'max' => 4],
            [['sm_form_month_type_code'], 'string', 'max' => 10],
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
            'sm_form_month_type_code' => AppLabels::MONTH,
            'sm_year' => AppLabels::YEAR,
        ];
    }

    public function afterFind() {
        parent::afterFind();

        $this->sm_form_month_type_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_FORM_MONTH_TYPE_CODE, $this->sm_form_month_type_code);

        return true;
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSprinkleMonitoringDetails()
    {
        return $this->hasMany(SprinkleMonitoringDetail::className(), ['sprinkle_monitoring_id' => 'id']);
    }
}
