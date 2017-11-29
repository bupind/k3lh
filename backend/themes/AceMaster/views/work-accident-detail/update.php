<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\WorkAccidentDetail */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $waId int */


$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::FORM_WORK_ACCIDENT_DETAIL);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_WORK_ACCIDENT_DETAIL), 'url' => ['index', '_ppId' => $powerPlantModel->id, 'waId' => $waId]];
$this->params['breadcrumbs'][] = ['label' => $model->wad_type_desc, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="work-accident-detail-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
    ]) ?>

</div>
