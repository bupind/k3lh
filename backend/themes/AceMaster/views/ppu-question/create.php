<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PpuQuestion */

$this->title = 'Create Ppu Question';
$this->params['breadcrumbs'][] = ['label' => 'Ppu Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-question-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
