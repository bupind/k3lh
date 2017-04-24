<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "sector".
 *
 * @property integer $id
 * @property string $sector_name
 * @property string $sector_code
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlants
 * @property UserSector $userSectors
 */
class Sector extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'sector';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['sector_name'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_name'], 'unique', 'message' => AppConstants::VALIDATE_UNIQUE],
            [['sector_name'], 'string', 'max' => 150],
            [['sector_code'], 'string', 'max' => 10],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'sector_name' => AppLabels::NAME,
            'sector_code' => sprintf('%s %s', AppLabels::CODE, AppLabels::SECTOR),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPowerPlants() {
        return $this->hasMany(PowerPlant::className(), ['sector_id' => 'id']);
    }
    
    public function getUserSectors() {
        return $this->hasMany(UserSector::className(), ['sector_id' => 'id']);
    }

    public function getSummary() {
        return sprintf('%s: %s', AppLabels::SECTOR, $this->sector_name);
    }
}
