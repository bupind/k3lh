<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PpaLaboratorium */

$this->title = 'Create Ppa Laboratorium';
$this->params['breadcrumbs'][] = ['label' => 'Ppa Laboratoria', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-laboratorium-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
