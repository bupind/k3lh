<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\P2k3MonitoringDetail */
/* @var $pmId int */
/* @var $pmdmMonth backend\models\PmdMonth */
/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf("%s %s", AppLabels::BTN_ADD, AppLabels::FORM_P2K3_MONITORING_DETAIL, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = ['label' => AppLabels::FORM_P2K3_MONITORING_DETAIL, 'url' => ['index', '_ppId' => $powerPlantModel->id, 'pmId' => $pmId]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2k3-monitoring-detail-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
    ]) ?>

</div>
