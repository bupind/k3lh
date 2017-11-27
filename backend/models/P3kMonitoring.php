<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "p3k_monitoring".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $pm_number
 * @property string $pm_location
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property P3kMonitoringDetail[] $p3kMonitoringDetails
 */
class P3kMonitoring extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'p3k_monitoring';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'pm_number'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['pm_number', 'pm_location'], 'string', 'max' => 50],
            [['power_plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => PowerPlant::className(), 'targetAttribute' => ['power_plant_id' => 'id']],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector_id' => 'id']],
        ];
    }

    public function toAlphabet($number){
        $alphabet = range('A', 'Z');

        return ($alphabet[$number]);
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
            'pm_number' => 'No. Kotak',
            'pm_location' => AppLabels::LOCATION,
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getP3kMonitoringDetails()
    {
        return $this->hasMany(P3kMonitoringDetail::className(), ['p3k_monitoring_id' => 'id']);
    }
}
