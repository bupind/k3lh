<?php

namespace frontend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;
use common\models\Member as CommonMember;
use yii\helpers\ArrayHelper;

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
 */
class Member extends CommonMember {
    public $captcha;
    
    public function rules() {
        $rules = parent::rules();
        $rules[] = ['captcha', 'required', 'message' => AppConstants::VALIDATE_REQUIRED];
        $rules[] = ['captcha', 'captcha', 'message' => AppConstants::VALIDATE_CAPTCHA];
        return $rules;
    }
    
}
