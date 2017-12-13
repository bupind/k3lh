<?php

use yii\helpers\Html;
use common\vendor\AppLabels;



/* @var $this yii\web\View */
/* @var $model backend\models\WorkAccidentDetail */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $waId int */
/* @var $wat string */
/* @var $title string */

$this->title = sprintf("%s %s", AppLabels::BTN_ADD, $title, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = ['label' => sprintf("Detail %s", $title), 'url' => ['index', '_ppId' => $powerPlantModel->id, 'waId' => $waId, 'wat' => $wat]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-accident-detail-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
        'wat' => $wat,
    ]) ?>

</div>
