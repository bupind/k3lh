<?php

namespace backend\controllers;

use Yii;
use backend\models\Codeset;
use backend\models\CodesetSearch;
use backend\controllers\AppController;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;

/**
 * SettingController implements the CRUD actions for Codeset model.
 */
class SettingController extends AppController {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className()
            ],
        ];
    }

    /**
     * Lists all Codeset models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CodesetSearch();
        
        if (Yii::$app->request->post()) {
            $settings = $searchModel->findAllUpdate(AppConstants::CODESET_NAME_WEB_CONFIG);
            
            if (Codeset::loadMultiple($settings, Yii::$app->request->post()) && Codeset::validateMultiple($settings)) {
                foreach ($settings as $setting) {
                    $setting->save(false);
                }
                
                Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            }
                    
        }
        
        $dataProvider = $searchModel->searchByCodesetName(Yii::$app->request->queryParams, AppConstants::CODESET_NAME_WEB_CONFIG);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

}
