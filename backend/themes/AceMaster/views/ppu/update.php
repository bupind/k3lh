<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Ppu */

$this->title = 'Update Ppu: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ppus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ppu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
