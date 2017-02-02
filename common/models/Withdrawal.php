<?php

namespace common\models;

use Yii;
use backend\models\AppModel;
use backend\models\Bank;
use backend\models\Game;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "withdrawal".
 *
 * @property integer $id
 * @property string $wd_name
 * @property string $wd_username
 * @property string $wd_email
 * @property integer $wd_amount
 * @property integer $game_id
 * @property integer $wd_receiver_bank_id
 * @property string $wd_account_name
 * @property string $wd_account_no
 * @property string $ip_address
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Bank $wdReceiverBank
 * @property Game $game
 */
class Withdrawal extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'withdrawal';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['wd_name', 'wd_username', 'wd_email', 'wd_amount', 'game_id', 'wd_receiver_bank_id', 'wd_account_name', 'wd_account_no'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['wd_amount', 'game_id', 'wd_receiver_bank_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['wd_amount'], 'compare', 'compareValue' => 50000, 'operator' => '>=', 'message' => AppConstants::VALIDATE_LARGER_OR_EQUAL],
            [['wd_name', 'wd_email', 'wd_account_name'], 'string', 'max' => 150],
            ['wd_email', 'email', 'message' => AppConstants::VALIDATE_EMAIL],
            [['wd_username', 'wd_account_no'], 'string', 'max' => 50],
            [['wd_account_no'], 'string', 'min' => 10, 'tooShort' => AppConstants::VALIDATE_TOO_SHORT],
            [['ip_address'], 'string', 'max' => 15],
            [['wd_receiver_bank_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bank::className(), 'targetAttribute' => ['wd_receiver_bank_id' => 'id']],
            [['game_id'], 'exist', 'skipOnError' => true, 'targetClass' => Game::className(), 'targetAttribute' => ['game_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'wd_name' => AppLabels::FULL_NAME,
            'wd_username' => AppLabels::USERNAME,
            'wd_email' => AppLabels::EMAIL,
            'wd_amount' => AppLabels::AMOUNT,
            'game_id' => AppLabels::GAME,
            'wd_receiver_bank_id' => AppLabels::RECEIVER_BANK,
            'wd_account_name' => AppLabels::ACCOUNT_NAME,
            'wd_account_no' => AppLabels::ACCOUNT_NO,
            'ip_address' => AppLabels::IP_ADDRESS
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
    public function getWdReceiverBank() {
        return $this->hasOne(Bank::className(), ['id' => 'wd_receiver_bank_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGame() {
        return $this->hasOne(Game::className(), ['id' => 'game_id']);
    }
}
