<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuEmissionLoadGrk */

$this->title = 'Update Ppu Emission Load Grk: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ppu Emission Load Grks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ppu-emission-load-grk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
