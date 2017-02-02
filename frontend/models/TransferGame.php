<?php

namespace frontend\models;

use common\vendor\AppConstants;
use Yii;
use common\models\TransferGame as CommonTransferGame;

/**
 */
class TransferGame extends CommonTransferGame {
    
    public $captcha;
    
    public function rules() {
        $rules = parent::rules();
        $rules[] = ['captcha', 'required', 'message' => AppConstants::VALIDATE_REQUIRED];
        $rules[] = ['captcha', 'captcha', 'message' => AppConstants::VALIDATE_CAPTCHA];
//        $rules[] = [['tg_email'], 'exist', 'targetClass' => Member::className(), 'targetAttribute' => ['tg_email' => 'member_email'], 'message' => AppConstants::VALIDATE_NOT_EXISTS];
        return $rules;
    }
    
}
