<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "user_sector".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $sector_id
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property User $user
 * @property Sector $sector
 */
class UserSector extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user_sector';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'sector_id'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['user_id', 'sector_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => AppLabels::USER,
            'sector_id' => AppLabels::SECTOR,
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector() {
        return $this->hasOne(Sector::className(), ['id' => 'sector_id']);
    }
}
