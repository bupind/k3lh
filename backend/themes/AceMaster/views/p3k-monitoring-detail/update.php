<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\P3kMonitoringDetail */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $pmId int */
/* @var $startDate DateTime */
/* @var $pmdmMonth backend\models\PmdMonth */

$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::FORM_P3K_MONITORING_DETAIL);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_P3K_MONITORING_DETAIL), 'url' => ['index', '_ppId' => $powerPlantModel->id, 'pmId' => $pmId]];
$this->params['breadcrumbs'][] = ['label' => $model->pmd_value, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="p3k-monitoring-detail-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
        'startDate' => $startDate,
        'pmdmMonth' => $pmdmMonth,
    ]) ?>

</div>
