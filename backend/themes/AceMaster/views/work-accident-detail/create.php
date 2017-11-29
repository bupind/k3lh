<?php

use yii\helpers\Html;
use common\vendor\AppLabels;



/* @var $this yii\web\View */
/* @var $model backend\models\WorkAccidentDetail */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $waId int */

$this->title = sprintf("%s %s", AppLabels::BTN_ADD, AppLabels::FORM_WORK_ACCIDENT_DETAIL, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = ['label' => AppLabels::FORM_WORK_ACCIDENT_DETAIL, 'url' => ['index', '_ppId' => $powerPlantModel->id, 'waId' => $waId]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-accident-detail-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
    ]) ?>

</div>
