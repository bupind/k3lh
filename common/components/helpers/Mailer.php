<?php
/**
 * Created by PhpStorm.
 * User: Joko Hermanto
 * Date: 02/11/2016
 * Time: 13:12
 */

namespace common\components\helpers;

use backend\models\Support;
use common\vendor\AppConstants;
use yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;

class Mailer extends Component {
    
    public static function sendNewMemberConfirmationEmail($params) {
        $webProfile = Yii::$app->params['web_profile'];
        $model = $params['model'];
        $supports = Support::findAll(['supp_status' => AppConstants::STATUS_YES]);
        
        try {
            $email = Yii::$app->mailer->compose('new-member-confirmation', ArrayHelper::merge($params, ['supports' => $supports]))
                ->setFrom([$webProfile->master_email => $webProfile->app_name])
                ->setTo($model->member_email)
                ->setSubject(sprintf(AppConstants::EMAIL_SUBJECT_NEW_MEMBER_CONFIRMATION, $webProfile->app_name));
    
            $email->send();
        } catch (yii\base\Exception $e) {
            return false;
        }
        
        return true;
    }
    
    public static function sendNewMemberEmail($params) {
        $webProfile = Yii::$app->params['web_profile'];
        
        try {
            $email = Yii::$app->mailer->compose(['text' => 'new-member'], $params)
                ->setFrom([Yii::$app->params['adminEmail'] => $webProfile->app_name])
                ->setTo($webProfile->master_email)
                ->setSubject(AppConstants::EMAIL_SUBJECT_NEW_MEMBER);
        
            $email->send();
        } catch (yii\base\Exception $e) {
            return false;
        }
    
        return true;
    }
    
    public static function sendDepositEmail($params) {
        $webProfile = Yii::$app->params['web_profile'];
        
        try {
            $email = Yii::$app->mailer->compose(['text' => 'deposit'], $params)
                ->setFrom([Yii::$app->params['adminEmail'] => $webProfile->app_name])
                ->setTo($webProfile->master_email)
                ->setSubject(AppConstants::EMAIL_SUBJECT_DEPOSIT);
            
            $email->send();
        } catch (yii\base\Exception $e) {
            return false;
        }
        
        return true;
    }
    
    public static function sendWithdrawalEmail($params) {
        $webProfile = Yii::$app->params['web_profile'];
        
        try {
            $email = Yii::$app->mailer->compose(['text' => 'withdrawal'], $params)
                ->setFrom([Yii::$app->params['adminEmail'] => $webProfile->app_name])
                ->setTo($webProfile->master_email)
                ->setSubject(AppConstants::EMAIL_SUBJECT_WITHDRAWAL);
            
            $email->send();
        } catch (yii\base\Exception $e) {
            return false;
        }
        
        return true;
    }
    
    public static function sendTransferGameEmail($params) {
        $webProfile = Yii::$app->params['web_profile'];
        
        try {
            $email = Yii::$app->mailer->compose(['text' => 'transfer-game'], $params)
                ->setFrom([Yii::$app->params['adminEmail'] => $webProfile->app_name])
                ->setTo($webProfile->master_email)
                ->setSubject(AppConstants::EMAIL_SUBJECT_TRANSFER_GAME);
            
            $email->send();
        } catch (yii\base\Exception $e) {
            return false;
        }
        
        return true;
    }
    
}