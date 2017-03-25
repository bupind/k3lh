<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppa_ba".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property integer $ppaba_year
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property PpaBaMonitoringPoint[] $ppaBaMonitoringPoints
 */
class PpaBa extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ppa_ba';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['sector_id', 'power_plant_id', 'ppaba_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'ppaba_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppaba_year'], 'string', 'max' => 4]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'sector_id' => AppLabels::SECTOR,
            'power_plant_id' => AppLabels::POWER_PLANT,
            'ppaba_year' => AppLabels::YEAR,
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPowerPlant() {
        return $this->hasOne(PowerPlant::className(), ['id' => 'power_plant_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector() {
        return $this->hasOne(Sector::className(), ['id' => 'sector_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaBaMonitoringPoints() {
        return $this->hasMany(PpaBaMonitoringPoint::className(), ['ppa_ba_id' => 'id']);
    }
    
    public function getSummary() {
        return sprintf('%s - %s - %s', $this->sector->sector_name, $this->powerPlant->pp_name, $this->ppaba_year);
    }
}
