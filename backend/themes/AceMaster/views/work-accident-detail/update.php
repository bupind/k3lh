<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\WorkAccidentDetail */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $waId int */
/* @var $wat string */
/* @var $title string */


$this->title = sprintf("%s Detail %s", AppLabels::BTN_UPDATE, $title);
$this->params['breadcrumbs'][] = ['label' => sprintf("Detail %s", $title), 'url' => ['index', '_ppId' => $powerPlantModel->id, 'waId' => $waId, 'wat' => $wat]];
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
        'wat' => $wat,
    ]) ?>

</div>
