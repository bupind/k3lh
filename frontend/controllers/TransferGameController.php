<?php
namespace frontend\controllers;

use Yii;
use common\vendor\AppConstants;
use frontend\models\TransferGame;
use common\components\helpers\Mailer;

/**
 * TransferGame controller
 */
class TransferGameController extends AppController {
    
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
        $model = new TransferGame();
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Mailer::sendTransferGameEmail(['model' => $model]);
            
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['/transfer-game']);
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
    
}
