<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PpuEmissionSource */

$this->title = 'Create Ppu Emission Source';
$this->params['breadcrumbs'][] = ['label' => 'Ppu Emission Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-emission-source-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
