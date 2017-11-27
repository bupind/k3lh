<?php

use yii\helpers\Html;
use common\vendor\AppLabels;



/* @var $this yii\web\View */
/* @var $model backend\models\ApdMonitoring */
/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf("%s %s", AppLabels::BTN_ADD,  AppLabels::FORM_APD_MONITORING);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_APD_MONITORING), 'url' => ['index', '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apd-monitoring-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
    ]) ?>

</div>
