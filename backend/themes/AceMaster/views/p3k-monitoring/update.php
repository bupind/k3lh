<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\P3kMonitoring */
/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::FORM_P3K_MONITORING);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_P3K_MONITORING), 'url' => ['index', '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = ['label' => $model->pm_location, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="p3k-monitoring-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
    ]) ?>

</div>
