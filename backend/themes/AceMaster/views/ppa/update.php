<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Ppa */
/* @var $powerPlantList \backend\models\PowerPlant[] */

$this->title = sprintf('%s %s', AppLabels::BTN_UPDATE, AppLabels::WATER_POLLUTION_CONTROL);
$this->params['breadcrumbs'][] = ['label' => AppLabels::ROADMAP_PROGRAM, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', $model->sector->sector_name, $model->powerPlant->pp_name), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="ppa-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantList' => $powerPlantList
    ]) ?>

</div>
