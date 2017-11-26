<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\K3SupervisionDetail */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $ksId int */


$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::FORM_K3_SUPERVISION_DETAIL);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_K3_SUPERVISION_DETAIL), 'url' => ['index', '_ppId' => $powerPlantModel->id, 'ksId' => $ksId]];
$this->params['breadcrumbs'][] = ['label' => $model->ksd_date, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="k3-supervision-detail-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
    ]) ?>

</div>
