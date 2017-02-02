<?php

namespace common\models;

use Yii;
use yii\base\Model;
use backend\models\LoginHistory;
use common\vendor\AppConstants;

/**
 * Login form
 */
class LoginForm extends Model {

    public $username;
    public $password;
    public $rememberMe = true;
    private $_user;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'activeAcount', 'params' => ['message' => AppConstants::VALIDATE_LOGIN_FAILED]],
            ['password', 'validatePassword', 'params' => ['message' => AppConstants::VALIDATE_LOGIN_FAILED]],
//            ['password', 'validateIpAddress', 'params' => ['message' => AppConstants::VALIDATE_NOT_ALLOWED_IP]],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params) {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, $params['message']);
            }
        }
    }
    
    public function validateIpAddress($attribute, $params) {
        if (!$this->hasErrors()) {
            $user = $this->getUser();            
            if (!$user || !$user->validateIpAddress()) {
                $this->addError($attribute, $params['message']);
            }
        }
    }
    
    public function activeAcount($attribute, $params) {
        if (!$this->hasErrors()) {
            $user = $this->getUser();            
            if (!$user || !$user->status == AppConstants::STATUS_NO) {
                $this->addError($attribute, $params['message']);
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login() {
        $loginHistoryMdl = new LoginHistory();
        
        if ($this->validate()) {            
            $result = Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
            $loginHistoryMdl->loginSuccess($this);
            return $result;
        } else {
            $loginHistoryMdl->loginFailed($this);
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser() {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

}
