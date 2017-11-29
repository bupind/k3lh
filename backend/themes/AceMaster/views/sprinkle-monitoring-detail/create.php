<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\SprinkleMonitoringDetail */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $smId int */

$this->title = sprintf("%s %s", AppLabels::BTN_ADD, AppLabels::FORM_SPRINKLE_MONITORING_DETAIL, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = ['label' => AppLabels::FORM_SPRINKLE_MONITORING_DETAIL, 'url' => ['index', '_ppId' => $powerPlantModel->id, 'smId' => $smId]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sprinkle-monitoring-detail-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
    ]) ?>

</div>
