<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "login_history".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $username
 * @property string $password
 * @property string $remark
 * @property string $ip_address
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property User $user
 */
class LoginHistory extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'login_history';
    }
    
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id'], 'integer'],
            [['username', 'password'], 'string', 'max' => 255],
            [['remark', 'ip_address'], 'string', 'max' => 20],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => AppLabels::USER,
            'username' => AppLabels::USERNAME,
            'password' => AppLabels::PASSWORD,
            'remark' => AppLabels::REMARK,
            'ip_address' => AppLabels::IP_ADDRESS,
            'created_at' => AppLabels::CREATED_AT
        ];
    }
    
    public function loginSuccess($user) {
        $data = ['LoginHistory' => [
            'user_id' => Yii::$app->user->identity->id,
//            'username' => $user->username,
//            'password' => $user->password,
            'remark' => AppConstants::LOGIN_STATUS_SUCCESS,
            'ip_address' => Yii::$app->request->userIP
        ]];
        
        if ($this->load($data) && $this->save()) {
            return true;
        }
        
        return false;
    }
    
    public function loginFailed($user) {
        $data = ['LoginHistory' => [
            'username' => $user->username,
            'password' => $user->password,
            'remark' => AppConstants::LOGIN_STATUS_FAILED,
            'ip_address' => Yii::$app->request->userIP
        ]];
        
        if ($this->load($data) && $this->save()) {
            return true;
        }
        
        return false;
    }
    
    public function logout() {
        $data = ['LoginHistory' => [
            'user_id' => Yii::$app->user->identity->id,
//            'username' => Yii::$app->user->identity->username,
            'remark' => AppConstants::LOGIN_STATUS_LOGOUT,
            'ip_address' => Yii::$app->request->userIP
        ]];
        
        if ($this->load($data) && $this->save()) {
            return true;
        }
        
        return false;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}
