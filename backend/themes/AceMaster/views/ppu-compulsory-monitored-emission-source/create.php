<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PpuCompulsoryMonitoredEmissionSource */

$this->title = 'Create Ppu Compulsory Monitored Emission Source';
$this->params['breadcrumbs'][] = ['label' => 'Ppu Compulsory Monitored Emission Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-compulsory-monitored-emission-source-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
