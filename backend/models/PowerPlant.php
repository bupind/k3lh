<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "power_plant".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property string $pp_name
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Sector $sector
 */
class PowerPlant extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'power_plant';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['sector_id', 'pp_name'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id'], 'integer'],
            [['pp_name'], 'string', 'max' => 150],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'sector_id' => AppLabels::SECTOR,
            'pp_name' => AppLabels::NAME,
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector() {
        return $this->hasOne(Sector::className(), ['id' => 'sector_id']);
    }
    
    public function getSummary() {
        return sprintf('%s: %s, %s: %s', AppLabels::SECTOR, $this->sector->sector_name, AppLabels::POWER_PLANT, $this->pp_name);
    }
}
