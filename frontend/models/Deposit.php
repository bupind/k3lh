<?php

namespace frontend\models;

use common\vendor\AppConstants;
use Yii;
use common\models\Deposit as CommonDeposit;

/**
 */
class Deposit extends CommonDeposit {
    
    public $captcha;
    
    public function rules() {
        $rules = parent::rules();
        $rules[] = ['captcha', 'required', 'message' => AppConstants::VALIDATE_REQUIRED];
        $rules[] = ['captcha', 'captcha', 'message' => AppConstants::VALIDATE_CAPTCHA];
//        $rules[] = [['dps_email'], 'exist', 'targetClass' => Member::className(), 'targetAttribute' => ['dps_email' => 'member_email'], 'message' => AppConstants::VALIDATE_NOT_EXISTS];
        return $rules;
    }
    
}
