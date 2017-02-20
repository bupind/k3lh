<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuParameterObligation */

$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::PARAMETER_OBLIGATION);
$this->params['breadcrumbs'][] = ['label' => AppLabels::PARAMETER_OBLIGATION, 'url' => ['index', 'ppuId' => $model->ppu_id]];
$this->params['breadcrumbs'][] = ['label' => 'asd', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="ppu-parameter-obligation-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
