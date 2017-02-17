<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Ppu */

$this->title = 'Create Ppu';
$this->params['breadcrumbs'][] = ['label' => 'Ppus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
