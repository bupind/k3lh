<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\MonitoringApar */
/* @var $monthModel backend\models\MaMonth */
/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf("%s %s", AppLabels::BTN_ADD,  AppLabels::FORM_MONITORING_APAR);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_MONITORING_APAR), 'url' => ['index', '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monitoring-apar-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
        'monthModel' => $monthModel,
    ]) ?>

</div>
