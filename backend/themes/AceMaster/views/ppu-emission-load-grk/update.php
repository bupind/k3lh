<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuEmissionLoadGrk */
/* @var $ppuModel backend\models\Ppu */
/* @var $startDate DateTime */
/* @var $ppuCalc backend\models\PpuEmissionLoadGrkCalc */

$this->title = sprintf('%s %s %s', AppLabels::BTN_UPDATE, AppLabels::EMISSION_LOAD_CALCULATION, AppLabels::GRK);
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s", AppLabels::EMISSION_LOAD_CALCULATION, AppLabels::GRK), 'url' => ['index', 'ppuId' => $ppuModel->id]];
$this->params['breadcrumbs'][] = ['label' => $model->ppuEmissionSource->ppues_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="ppu-emission-load-grk-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'ppuCalc' => $ppuCalc,
        'startDate' => $startDate,
        'ppuModel' => $ppuModel,
        'model' => $model,
    ]) ?>

</div>
