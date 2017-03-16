<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Ppa */

$this->title = 'Create Ppa';
$this->params['breadcrumbs'][] = ['label' => 'Ppas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
