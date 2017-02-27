<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuaParameterObligation */
/* @var $startDate DateTime */
/* @var $ppuapoMonth \backend\models\PpuapoMonth[] */
/* @var $ppuaModel \backend\models\PpuAmbient */

$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::PARAMETER_OBLIGATION);
$this->params['breadcrumbs'][] = ['label' => AppLabels::PARAMETER_OBLIGATION, 'url' => ['index', 'ppuaId' => $ppuaModel->id]];
$this->params['breadcrumbs'][] = ['label' => $model->ppuaMonitoringPoint->ppua_monitoring_location, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="ppua-parameter-obligation-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'ppuaModel' => $ppuaModel,
        'model' => $model,
        'startDate' => $startDate,
        'ppuapoMonth' => $ppuapoMonth,
    ]) ?>

</div>
