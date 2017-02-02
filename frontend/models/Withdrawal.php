<?php

namespace frontend\models;

use common\vendor\AppConstants;
use Yii;
use common\models\Withdrawal as CommonWithdrawal;

/**
 */
class Withdrawal extends CommonWithdrawal {
    
    public $captcha;
    
    public function rules() {
        $rules = parent::rules();
        $rules[] = ['captcha', 'required', 'message' => AppConstants::VALIDATE_REQUIRED];
        $rules[] = ['captcha', 'captcha', 'message' => AppConstants::VALIDATE_CAPTCHA];
//        $rules[] = [['wd_email'], 'exist', 'targetClass' => Member::className(), 'targetAttribute' => ['wd_email' => 'member_email'], 'message' => AppConstants::VALIDATE_NOT_EXISTS];
        return $rules;
    }
    
}
