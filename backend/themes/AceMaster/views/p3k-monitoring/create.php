<?php

use yii\helpers\Html;
use common\vendor\AppLabels;



/* @var $this yii\web\View */
/* @var $model backend\models\P3kMonitoring */
/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf("%s %s", AppLabels::BTN_ADD, AppLabels::FORM_P3K_MONITORING, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = ['label' => AppLabels::FORM_P3K_MONITORING, 'url' => ['index', '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p3k-monitoring-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
    ]) ?>

</div>
