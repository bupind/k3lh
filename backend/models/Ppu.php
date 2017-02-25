<?php

namespace backend\models;

use common\vendor\AppLabels;
use common\vendor\AppConstants;

/**
 * This is the model class for table "ppu".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property integer $ppu_year
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 *
 * @property PpuEmissionSource[] $ppuEmissionSources
 * @property PpuCompulsoryMonitoredEmissionSource[] $ppuCompulsoryMonitoredEmissionSources
 * @property PpuTechnicalProvision[] $ppuTechnicalProvisions
 */
class Ppu extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'ppu_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'ppu_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
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
            'ppu_year' => AppLabels::YEAR,
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
    public function getPpuEmissionSources()
    {
        return $this->hasMany(PpuEmissionSource::className(), ['ppu_id' =>  'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuTechnicalProvisions()
    {
        return $this->hasMany(PpuTechnicalProvision::className(), ['ppu_id' =>  'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuCompulsoryMonitoredEmissionSources()
    {
        return $this->hasMany(PpuCompulsoryMonitoredEmissionSource::className(), ['ppu_id' =>  'id']);
    }
}
