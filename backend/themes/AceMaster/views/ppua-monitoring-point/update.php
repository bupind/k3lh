<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuaMonitoringPoint */
/* @var $ppuaModel backend\models\PpuAmbient */

$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::MONITORING_POINT);
$this->params['breadcrumbs'][] = ['label' => AppLabels::MONITORING_POINT, 'url' => ['index', 'ppuaId' => $model->ppu_ambient_id]];
$this->params['breadcrumbs'][] = ['label' => $model->ppua_monitoring_location, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="ppua-monitoring-point-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'ppuaModel' => $ppuaModel,
    ]) ?>

</div>
