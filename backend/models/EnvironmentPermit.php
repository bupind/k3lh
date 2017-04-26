<?php

namespace backend\models;

use common\vendor\AppLabels;
use common\vendor\AppConstants;

/**
 * This is the model class for table "environment_permit".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property integer $ep_year
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property EnvironmentPermitDetail[] $environmentPermitDetails
 * @property EnvironmentPermitReport[] $environmentPermitReports
 */
class EnvironmentPermit extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'environment_permit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'ep_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'ep_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
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
            'ep_year' => AppLabels::YEAR,
        ];
    }



    public function getSummary() {
        return sprintf('%s - %s - %s', $this->sector->sector_name, $this->powerPlant->pp_name, $this->ep_year);
    }

    public function beforeDelete()
    {
        $epDetail = $this->environmentPermitDetails;
        foreach($epDetail as $keyD => $detail){
            $attachment = $detail->attachmentOwner;
            if (!is_null($attachment)) {
                $attachment = $attachment->attachment;
            }
            if (!is_null($attachment)) {
                $attachment->delete();
            }
        }
        return parent::beforeDelete();
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
    public function getEnvironmentPermitDetails()
    {
        return $this->hasMany(EnvironmentPermitDetail::className(), ['environment_permit_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnvironmentPermitReports()
    {
        return $this->hasMany(EnvironmentPermitReport::className(), ['environment_permit_id' => 'id']);
    }

}
