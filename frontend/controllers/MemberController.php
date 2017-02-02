<?php
namespace frontend\controllers;

use Yii;
use common\vendor\AppConstants;
use frontend\models\Member;
use common\components\helpers\Mailer;

/**
 * Member controller
 */
class MemberController extends AppController {
    
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => null,
            ],
        ];
    }
    
    public function actionIndex() {
        $model = new Member();
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $params = ['model' => $model];
            Mailer::sendNewMemberConfirmationEmail($params);
            Mailer::sendNewMemberEmail($params);
            
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
        }
    
        return $this->redirect(['/']);
    }
    
}
