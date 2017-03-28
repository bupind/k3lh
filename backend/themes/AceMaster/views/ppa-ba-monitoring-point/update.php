<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaBaMonitoringPoint */
/* @var $ppaBaModel \backend\models\PpaBa */
/* @var $startDate DateTime */
/* @var $ppaBaMonthModels \backend\models\PpaBaMonth[] */

$this->title = sprintf('%s %s', AppLabels::BTN_UPDATE, AppLabels::MONITORING_POINT);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::PPA_BA, $ppaBaModel->getSummary()), 'url' => ['/ppa-ba/update', 'id' => $ppaBaModel->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::MONITORING_POINT, 'url' => ['index', 'ppaBaId' => $ppaBaModel->id]];
$this->params['breadcrumbs'][] = ['label' => $model->ppabamp_wastewater_source, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="ppa-ba-monitoring-point-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <?= $this->render('_form', [
        'model' => $model,
        'ppaBaModel' => $ppaBaModel,
        'startDate' => $startDate,
        'ppaBaMonthModels' => $ppaBaMonthModels
    ]) ?>

</div>
