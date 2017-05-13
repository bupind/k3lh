<?php

namespace backend\controllers;

use backend\models\BoAssessment;
use backend\models\BoAssessmentAspect;
use backend\models\Codeset;
use Yii;
use backend\models\BeyondObedience;
use backend\models\BeyondObedienceSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\PowerPlant;

/**
 * BeyondObedienceController implements the CRUD actions for BeyondObedience model.
 */
class BeyondObedienceController extends AppController
{
    public $powerPlantModel;
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
     * Lists all BeyondObedience models.
     * @return mixed
     */

    public function beforeAction($action) {
        parent::beforeAction($action);

        if (in_array($action->id, ['index', 'create', 'update'])) {
            $powerPlantId = Yii::$app->request->get('_ppId');
            if (($powerPlant = PowerPlant::findOne($powerPlantId)) !== null) {
                $this->powerPlantModel = $powerPlant;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }

        return $this->rbac();
    }

    public function actionIndex($bot)
    {
        if (is_null($bot)) {
            $bot = AppConstants::FORM_TYPE_DRKPL;
        }

        $searchModel = new BeyondObedienceSearch();
        $searchModel->sector_id = $this->powerPlantModel->sector_id;
        $searchModel->power_plant_id = $this->powerPlantModel->id;
        $searchModel->bo_form_type_code = $bot;

        $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_BO_FORM_TYPE_CODE, $bot);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'bot' => $bot,
            'title' => $title,
            'powerPlantModel' => $this->powerPlantModel,
        ]);
    }

    /**
     * Displays a single BeyondObedience model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id, $bot)
    {
        $model = $this->findModel($id);

        $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_BO_FORM_TYPE_CODE, $bot);

        $boAspect = BoAssessmentAspect::find()->where(['bo_form_type_code' => $bot])->all();

        return $this->render('view', [
            'model' => $model,
            'title' => $title,
            'boAspect' => $boAspect,
        ]);
    }

    /**
     * Creates a new BeyondObedience model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($bot)
    {
        if (is_null($bot)) {
            $bot = AppConstants::FORM_TYPE_DRKPL;
        }

        $model = new BeyondObedience();

        $boAspect = BoAssessmentAspect::find()->where(['bo_form_type_code' => $bot])->all();

        $criteriaCount = 0;
        foreach($boAspect as $keyA => $aspect) {
            foreach($aspect->boasCriterias as $keyC => $c) {
                $criteriaCount++;
            }
        }

        $boAssessment = [];
        for($i = 0; $i<$criteriaCount; $i++){
            $boAssessment[] = new BoAssessment();
        }

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'bot' => $model->bo_form_type_code, 'id' => $model->id]);
        } else {

            $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_BO_FORM_TYPE_CODE, $bot);

            return $this->render('create', [
                'model' => $model,
                'bot' => $bot,
                'title' => $title,
                'powerPlantModel' => $this->powerPlantModel,
                'boAspect' => $boAspect,
                'boAssessment' => $boAssessment,
            ]);
        }
    }

    /**
     * Updates an existing BeyondObedience model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $bot)
    {
        $model = $this->findModel($id);

        $boAspect = BoAssessmentAspect::find()->where(['bo_form_type_code' => $bot])->all();

        $boAssessment = $model->boAssessments;

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'bot' => $model->bo_form_type_code, 'id' => $model->id]);
        } else {

            $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_BO_FORM_TYPE_CODE, $bot);

            return $this->render('update', [
                'model' => $model,
                'bot' => $bot,
                'title' => $title,
                'powerPlantModel' => $this->powerPlantModel,
                'boAspect' => $boAspect,
                'boAssessment' => $boAssessment,
            ]);
        }
    }

    /**
     * Deletes an existing BeyondObedience model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }

        return $this->redirect(['index', '_ppId' => $model->power_plant_id, 'bot' => $model->bo_form_type_code] );
    }

    /**
     * Finds the BeyondObedience model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BeyondObedience the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BeyondObedience::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
