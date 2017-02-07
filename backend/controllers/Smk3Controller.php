<?php

namespace backend\controllers;

use backend\models\Smk3Title;
use Yii;
use backend\models\Smk3;
use backend\models\Smk3Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\Sector;
use backend\models\PowerPlant;
/**
 * Smk3Controller implements the CRUD actions for Smk3 model.
 */
class Smk3Controller extends AppController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Smk3 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Smk3Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Smk3 model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Smk3 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Smk3();
        $allTitle = Smk3Title::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $powerPlantList = ['' => AppLabels::PLEASE_SELECT];
            if (!is_null($model->power_plant_id)) {
                $powerPlantList = PowerPlant::map(new PowerPlant(), 'pp_name', null, true, [
                    'where' => [
                        ['sector_id' => $model->sector_id]
                    ]
                ]);
            }

            return $this->render('create', [
                'model' => $model,
                'powerPlantList' => $powerPlantList,
                'allTitle' => $allTitle,
            ]);
        }
    }

    /**
     * Updates an existing Smk3 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Smk3 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Smk3 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Smk3 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Smk3::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
