<?php

use yii\helpers\Html;
use common\vendor\AppLabels;



/* @var $this yii\web\View */
/* @var $model backend\models\HydrantTestingDetail */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $htdMonthsElectrical backend\models\HtdMonth */
/* @var $htdMonthsDiesel backend\models\HtdMonth */
/* @var $startDate DateTime */
/* @var $htId int */

$this->title = sprintf("%s %s", AppLabels::BTN_ADD, AppLabels::FORM_HYDRANT_TESTING_DETAIL, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = ['label' => AppLabels::FORM_HYDRANT_TESTING_DETAIL, 'url' => ['index', '_ppId' => $powerPlantModel->id, 'htId' => $htId]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hydrant-testing-detail-create">

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
