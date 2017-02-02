<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "sector".
 *
 * @property integer $id
 * @property string $sector_name
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
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'sector_name' => AppLabels::NAME,
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
}
