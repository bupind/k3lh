<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RoadmapK3lAttribute */

$this->title = 'Update Roadmap K3l Attribute: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Roadmap K3l Attributes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="roadmap-k3l-attribute-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
