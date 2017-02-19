<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuCompulsoryMonitoredEmissionSource */

$this->title = 'Update Ppu Compulsory Monitored Emission Source: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ppu Compulsory Monitored Emission Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ppu-compulsory-monitored-emission-source-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
