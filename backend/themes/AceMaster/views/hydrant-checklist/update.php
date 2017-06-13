<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\HydrantChecklist */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $answerList backend\models\HcDetail */
/* @var $questionList backend\models\HydrantQuestion */

$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::FORM_CHECKLIST_HYDRANT);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_CHECKLIST_HYDRANT), 'url' => ['index', '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = ['label' => $model->hc_location, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hydrant-checklist-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
        'answerList' => $answerList,
        'questionList' => $questionList,
    ]) ?>

</div>
