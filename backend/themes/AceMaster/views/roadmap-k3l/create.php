<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\RoadmapK3l */

$this->title = sprintf('%s %s %s', AppLabels::BTN_ADD, AppLabels::ROADMAP_PROGRAM, $title);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::ROADMAP_PROGRAM, $title), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roadmap-k3l-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantList' => $powerPlantList
    ]) ?>

</div>
