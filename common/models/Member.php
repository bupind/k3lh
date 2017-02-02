<?php

namespace common\models;

use backend\models\AppModel;
use backend\models\Bank;
use backend\models\Game;
use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "member".
 *
 * @property integer $id
 * @property string $member_email
 * @property string $member_phone
 * @property integer $game_id
 * @property integer $bank_id
 * @property string $member_account_name
 * @property string $member_account_no
 * @property string $ip_address
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Bank $bank
 * @property Game $game
 */
class Member extends AppModel {
    
    const SCENARIO_REGISTER = 'register';
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'member';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['member_email', 'member_phone', 'game_id', 'bank_id', 'member_account_name', 'member_account_no'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['game_id', 'bank_id'], 'integer'],
            [['member_email', 'member_account_name'], 'string', 'max' => 150],
            ['member_email', 'email', 'message' => AppConstants::VALIDATE_EMAIL],
            ['member_email', 'unique', 'on' => self::SCENARIO_REGISTER, 'targetClass' => '\common\models\Member', 'message' => AppConstants::VALIDATE_UNIQUE],
            [['member_phone', 'ip_address'], 'string', 'max' => 15],
            [['member_phone'], 'string', 'min' => 11, 'tooShort' => AppConstants::VALIDATE_TOO_SHORT],
            [['member_phone'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['member_account_no'], 'string', 'max' => 50],
            [['member_account_no'], 'string', 'min' => 10, 'tooShort' => AppConstants::VALIDATE_TOO_SHORT],
            ['member_account_no', 'unique', 'on' => self::SCENARIO_REGISTER, 'targetClass' => '\common\models\Member', 'message' => AppConstants::VALIDATE_UNIQUE],
            [['bank_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bank::className(), 'targetAttribute' => ['bank_id' => 'id']],
            [['game_id'], 'exist', 'skipOnError' => true, 'targetClass' => Game::className(), 'targetAttribute' => ['game_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'member_email' => AppLabels::EMAIL,
            'member_phone' => AppLabels::HANDPHONE,
            'game_id' => AppLabels::GAME,
            'bank_id' => AppLabels::BANK,
            'member_account_name' => AppLabels::ACCOUNT_NAME,
            'member_account_no' => AppLabels::ACCOUNT_NO,
        ];
    }
    
    public function beforeSave($insert) {
        parent::beforeSave($insert);
        
        if ($insert) {
            $this->ip_address = Yii::$app->request->getUserIP();
        }
        
        return true;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBank() {
        return $this->hasOne(Bank::className(), ['id' => 'bank_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGame() {
        return $this->hasOne(Game::className(), ['id' => 'game_id']);
    }
}
