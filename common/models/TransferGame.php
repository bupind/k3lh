<?php

namespace common\models;

use Yii;
use backend\models\AppModel;
use backend\models\Game;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "transfer_game".
 *
 * @property integer $id
 * @property string $tg_name
 * @property string $tg_username
 * @property string $tg_email
 * @property integer $tg_amount
 * @property integer $tg_from_game_id
 * @property integer $tg_to_game_id
 * @property string $ip_address
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Game $tgToGame
 * @property Game $tgFromGame
 */
class TransferGame extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'transfer_game';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['tg_name', 'tg_username', 'tg_email', 'tg_amount', 'tg_from_game_id', 'tg_to_game_id'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['tg_amount', 'tg_from_game_id', 'tg_to_game_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['tg_amount'], 'compare', 'compareValue' => 50000, 'operator' => '>=', 'message' => AppConstants::VALIDATE_LARGER_OR_EQUAL],
            [['tg_name', 'tg_email'], 'string', 'max' => 150],
            ['tg_email', 'email', 'message' => AppConstants::VALIDATE_EMAIL],
            ['tg_to_game_id', 'compare', 'compareAttribute' => 'tg_from_game_id', 'operator' => '!=', 'message' => AppConstants::VALIDATE_COMPARE_MUST_NOT_EQUAL, 'enableClientValidation' => false],
            [['tg_username'], 'string', 'max' => 50],
            [['ip_address'], 'string', 'max' => 15],
            [['tg_to_game_id'], 'exist', 'skipOnError' => true, 'targetClass' => Game::className(), 'targetAttribute' => ['tg_to_game_id' => 'id']],
            [['tg_from_game_id'], 'exist', 'skipOnError' => true, 'targetClass' => Game::className(), 'targetAttribute' => ['tg_from_game_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'tg_name' => AppLabels::FULL_NAME,
            'tg_username' => AppLabels::USERNAME,
            'tg_email' => AppLabels::EMAIL,
            'tg_amount' => AppLabels::AMOUNT,
            'tg_from_game_id' => AppLabels::FROM_GAME,
            'tg_to_game_id' => AppLabels::TO_GAME,
            'ip_address' => AppLabels::IP_ADDRESS,
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
    public function getTgToGame() {
        return $this->hasOne(Game::className(), ['id' => 'tg_to_game_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTgFromGame() {
        return $this->hasOne(Game::className(), ['id' => 'tg_from_game_id']);
    }
}
