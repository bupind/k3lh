<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\HydrantTestingDetail */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $htdMonthsElectrical backend\models\HtdMonth */
/* @var $htdMonthsDiesel backend\models\HtdMonth */
/* @var $htId int */
/* @var $startDate DateTime */


$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::FORM_HYDRANT_TESTING_DETAIL);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_HYDRANT_TESTING_DETAIL), 'url' => ['index', '_ppId' => $powerPlantModel->id, 'htId' => $htId]];
$this->params['breadcrumbs'][] = ['label' => $model->htd_location, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="hydrant-testing-detail-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
        'htdMonthsElectrical' => $htdMonthsElectrical,
        'htdMonthsDiesel' => $htdMonthsDiesel,
        'startDate' => $startDate,
    ]) ?>

</div>

