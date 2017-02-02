<?php

namespace backend\models;

use common\vendor\AppConstants;
use backend\models\AppModel;
use common\vendor\AppLabels;

/**
 * This is the model class for table "auth_assignment".
 *
 * @property string $item_name
 * @property string $user_id
 * @property integer $created_at
 *
 * @property AuthItem $itemName
 * @property User $user
 */
class AuthAssignment extends AppModel {
    
    public function behaviors() { return []; }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'auth_assignment';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['item_name', 'user_id'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['created_at'], 'integer'],
            [['item_name', 'user_id'], 'safe'],
            [['item_name'], 'exist', 'skipOnError' => true, 'targetClass' => AuthItem::className(), 'targetAttribute' => ['item_name' => 'name']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'item_name' => sprintf('%s %s', AppLabels::NAME, AppLabels::ROLE),
            'user_id' => AppLabels::USER,
        ];
    }
    
    public function getId() { return null; }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemName() {
        return $this->hasOne(AuthItem::className(), ['name' => 'item_name']);
    }
    
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}
