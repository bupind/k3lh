<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\RoadmapK3l */

$this->title = sprintf('%s %s %s', AppLabels::BTN_UPDATE, AppLabels::ROADMAP_PROGRAM, $model->form_type_code_desc);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::ROADMAP_PROGRAM, $model->form_type_code_desc), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', $model->sector->sector_name, $model->powerPlant->pp_name), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="roadmap-k3l-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantList' => $powerPlantList
    ]) ?>

</div>
