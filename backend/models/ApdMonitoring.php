<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "apd_monitoring".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $am_name
 * @property string $am_type
 * @property string $am_brand
 * @property string $am_amount
 * @property string $am_location
 * @property string $am_good_value
 * @property string $am_bad_value
 * @property string $am_ref
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 */
class ApdMonitoring extends AppModel
{
    public $am_type_desc;
    public $am_brand_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'apd_monitoring';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'am_name'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['am_ref'], 'string'],
            [['am_name', 'am_location'], 'string', 'max' => 50],
            [['am_type', 'am_brand'], 'string', 'max' => 10],
            [['am_amount', 'am_good_value', 'am_bad_value'], 'string', 'max' => 20],
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
            'am_name' => sprintf("%s APD",AppLabels::NAME),
            'am_type' => 'Jenis APD',
            'am_brand' => 'Merk & Tipe',
            'am_amount' => AppLabels::AMOUNT,
            'am_location' => 'Lokasi APD',
            'am_good_value' => sprintf("%s %s", AppLabels::AMOUNT,AppLabels::GOOD),
            'am_bad_value' => sprintf("%s Rusak", AppLabels::AMOUNT),
            'am_ref' => AppLabels::DESCRIPTION,
        ];
    }

    public function toAlphabet($number){
        $alphabet = range('A', 'Z');

        return ($alphabet[$number]);
    }

    public function afterFind() {
        parent::afterFind();

        $this->am_type_desc = Codeset::getCodesetValue(AppConstants::CODESET_AM_APD_TYPE, $this->am_type);
        $this->am_brand_desc = Codeset::getCodesetValue(AppConstants::CODESET_AM_APD_BRAND, $this->am_brand);

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
}
