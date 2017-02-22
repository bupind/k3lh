<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaLaboratorium */

$this->title = 'Update Ppa Laboratorium: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ppa Laboratoria', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ppa-laboratorium-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
