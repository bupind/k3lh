<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuEmissionSource */
/* @var $ppuModel backend\models\Ppu */
/* @var $startDate DateTime */
/* @var $ppuMonthModels \backend\models\PpuesMonth[] */

$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::EMISSION_SOURCE);
$this->params['breadcrumbs'][] = ['label' => AppLabels::EMISSION_SOURCE_INVENTORY, 'url' => ['index', 'ppuId' => $model->ppu_id]];
$this->params['breadcrumbs'][] = ['label' => $model->ppues_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="ppu-emission-source-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'ppuModel' => $ppuModel,
        'model' => $model,
        'startDate' => $startDate,
        'ppuMonthModels' => $ppuMonthModels,
    ]) ?>

</div>
