<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuaParameterObligation */
/* @var $ppuaModel backend\models\PpuAmbient */
/* @var $startDate DateTime */
/* @var $ppuapoMonth \backend\models\PpuapoMonth[] */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::PARAMETER_OBLIGATION);
$this->params['breadcrumbs'][] = ['label' => AppLabels::PARAMETER_OBLIGATION, 'url' => ['index', 'ppuaId' => $ppuaModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppua-parameter-obligation-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'startDate' => $startDate,
        'ppuapoMonth' => $ppuapoMonth,
        'ppuaModel' => $ppuaModel,
    ]) ?>

</div>
