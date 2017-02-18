<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\PpuEmissionSource */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::EMISSION_SOURCE_INVENTORY);
$this->params['breadcrumbs'][] = ['label' => AppLabels::EMISSION_SOURCE_INVENTORY, 'url' => ['index', 'ppuId' => $ppuId]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-emission-source-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'ppuId' => $ppuId,
    ]) ?>

</div>
