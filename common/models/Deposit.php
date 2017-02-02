<?php

namespace common\models;

use backend\models\AppModel;
use Yii;
use backend\models\Bank;
use backend\models\Game;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "deposit".
 *
 * @property integer $id
 * @property string $dps_name
 * @property string $dps_username
 * @property string $dps_email
 * @property integer $dps_amount
 * @property integer $game_id
 * @property integer $dps_receiver_bank_id
 * @property integer $dps_sender_bank_id
 * @property string $dps_account_name
 * @property string $dps_account_no
 * @property string $ip_address
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Bank $dpsSenderBank
 * @property Game $game
 * @property Bank $dpsReceiverBank
 */
class Deposit extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'deposit';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['dps_name', 'dps_username', 'dps_email', 'dps_amount', 'game_id', 'dps_receiver_bank_id', 'dps_sender_bank_id', 'dps_account_name'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['dps_amount', 'game_id', 'dps_receiver_bank_id', 'dps_sender_bank_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['dps_amount'], 'compare', 'compareValue' => 50000, 'operator' => '>=', 'message' => AppConstants::VALIDATE_LARGER_OR_EQUAL],
            [['dps_name', 'dps_email', 'dps_account_name'], 'string', 'max' => 150],
            ['dps_email', 'email', 'message' => AppConstants::VALIDATE_EMAIL],
            [['dps_username', 'dps_account_no'], 'string', 'max' => 50],
            [['dps_account_no'], 'string', 'min' => 10, 'tooShort' => AppConstants::VALIDATE_TOO_SHORT],
            [['ip_address'], 'string', 'max' => 15],
            [['dps_sender_bank_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bank::className(), 'targetAttribute' => ['dps_sender_bank_id' => 'id']],
            [['game_id'], 'exist', 'skipOnError' => true, 'targetClass' => Game::className(), 'targetAttribute' => ['game_id' => 'id']],
            [['dps_receiver_bank_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bank::className(), 'targetAttribute' => ['dps_receiver_bank_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'dps_name' => AppLabels::FULL_NAME,
            'dps_username' => AppLabels::USERNAME,
            'dps_email' => AppLabels::EMAIL,
            'dps_amount' => AppLabels::AMOUNT,
            'game_id' => AppLabels::GAME,
            'dps_receiver_bank_id' => AppLabels::RECEIVER_BANK,
            'dps_sender_bank_id' => AppLabels::SENDER_BANK,
            'dps_account_name' => AppLabels::ACCOUNT_NAME,
            'dps_account_no' => AppLabels::ACCOUNT_NO,
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
    public function getDpsSenderBank() {
        return $this->hasOne(Bank::className(), ['id' => 'dps_sender_bank_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGame() {
        return $this->hasOne(Game::className(), ['id' => 'game_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDpsReceiverBank() {
        return $this->hasOne(Bank::className(), ['id' => 'dps_receiver_bank_id']);
    }
}
