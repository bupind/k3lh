<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\RoadmapK3lAttribute */

$this->title = 'Create Roadmap K3l Attribute';
$this->params['breadcrumbs'][] = ['label' => 'Roadmap K3l Attributes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roadmap-k3l-attribute-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
