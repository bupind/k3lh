<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\PpuParameterObligation */
/* @var $ppuId int */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::PARAMETER_OBLIGATION);
$this->params['breadcrumbs'][] = ['label' => AppLabels::PARAMETER_OBLIGATION, 'url' => ['index', 'ppuId' => $ppuId]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-parameter-obligation-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
