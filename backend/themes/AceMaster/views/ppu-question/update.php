<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuQuestion */

$this->title = 'Update Ppu Question: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ppu Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ppu-question-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
