<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\PpuEmissionLoadGrk */
/* @var $ppuModel backend\models\Ppu */

$this->title = sprintf('%s %s %s', AppLabels::BTN_ADD, AppLabels::EMISSION_LOAD_CALCULATION, AppLabels::GRK);
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s", AppLabels::EMISSION_LOAD_CALCULATION, AppLabels::GRK), 'url' => ['index', 'ppuId' => $ppuModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-emission-load-grk-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'ppuModel' => $ppuModel,
        'model' => $model,
    ]) ?>

</div>
