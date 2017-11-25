<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\K3SupervisionDetail */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $ksId int */

$this->title = sprintf("%s %s", AppLabels::BTN_ADD, AppLabels::FORM_K3_SUPERVISION_DETAIL, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = ['label' => AppLabels::FORM_K3_SUPERVISION_DETAIL, 'url' => ['index', '_ppId' => $powerPlantModel->id, 'ksId' => $ksId]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="k3-supervision-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
    ]) ?>

</div>
