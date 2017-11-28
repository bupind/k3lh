<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\WorkingHourMonitoring */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $whmMonths backend\models\WhmMonth */

$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::FORM_WORK_HOUR_MONITORING);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_WORK_HOUR_MONITORING), 'url' => ['index', '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = ['label' => $model->worker_type_desc, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="working-hour-monitoring-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
        'whmMonths' => $whmMonths
    ]) ?>

</div>
