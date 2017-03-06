<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuParameterObligation */
/* @var $startDate DateTime */
/* @var $ppupoMonth \backend\models\PpupoMonth[] */
/* @var $ppuModel \backend\models\Ppu */

$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::PARAMETER_OBLIGATION);
$this->params['breadcrumbs'][] = ['label' => AppLabels::PARAMETER_OBLIGATION, 'url' => ['index', 'ppuId' => $ppuModel->id]];
$this->params['breadcrumbs'][] = ['label' => $model->ppuEmissionSource->ppues_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="ppu-parameter-obligation-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'ppuModel' => $ppuModel,
        'model' => $model,
        'startDate' => $startDate,
        'ppupoMonth' => $ppupoMonth,
    ]) ?>

</div>
