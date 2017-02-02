<?php
namespace frontend\controllers;

use Yii;
use common\vendor\AppConstants;
use frontend\models\Deposit;
use common\components\helpers\Mailer;

/**
 * Deposit controller
 */
class DepositController extends AppController {
    
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
        $model = new Deposit();
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Mailer::sendDepositEmail(['model' => $model]);
            
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['/deposit']);
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
    
}
