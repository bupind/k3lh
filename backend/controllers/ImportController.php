<?php

namespace backend\controllers;

use Yii;
use backend\models\UploadForm;
use backend\controllers\AppController;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\vendor\AppConstants;

/**
 * ImportController implements the CRUD actions for Codeset model.
 */
class ImportController extends AppController {

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
        $model = new UploadForm();

        if (Yii::$app->request->post()) {
            $model->excel_files = UploadedFile::getInstances($model, 'excel_files');
                        
            if ($model->upload()) {
                Yii::$app->session->setFlash('success', AppConstants::MSG_IMPORT_SUCCESS);
                return $this->redirect(['index']);
            }
        }

        return $this->render('index', ['model' => $model]);
    }

}
