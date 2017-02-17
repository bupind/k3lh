<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuEmissionSource */

$this->title = 'Update Ppu Emission Source: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ppu Emission Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ppu-emission-source-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
