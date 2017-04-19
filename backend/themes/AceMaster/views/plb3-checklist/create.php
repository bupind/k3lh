<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Plb3Checklist */

$this->title = 'Create Plb3 Checklist';
$this->params['breadcrumbs'][] = ['label' => 'Plb3 Checklists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plb3-checklist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
