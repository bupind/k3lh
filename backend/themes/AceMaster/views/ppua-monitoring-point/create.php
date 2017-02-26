<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\PpuaMonitoringPoint */
/* @var $ppuaModel backend\models\PpuAmbient */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::MONITORING_POINT);
$this->params['breadcrumbs'][] = ['label' => AppLabels::MONITORING_POINT, 'url' => ['index', 'ppuId' => $ppuaModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppua-monitoring-point-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'ppuaModel' => $ppuaModel,
    ]) ?>

</div>
