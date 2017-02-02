<?php
namespace frontend\controllers;

use Yii;
use common\vendor\AppConstants;
use frontend\models\Withdrawal;
use common\components\helpers\Mailer;

/**
 * Withdrawal controller
 */
class WithdrawalController extends AppController {
    
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
        $model = new Withdrawal();
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Mailer::sendWithdrawalEmail(['model' => $model]);
            
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['/penarikan']);
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
    
}
