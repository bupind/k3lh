<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\BeyondObedienceComdev */
/* @var $boct string */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $title string */
/* @var $detailModels backend\models\BocDetail[] */

$this->title = sprintf("%s %s %s", AppLabels::BTN_ADD, AppLabels::PROGRAM, $title);
$this->params['breadcrumbs'][] = ['label' => $title, 'url' => ['index', 'boct' => $boct, '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beyond-obedience-comdev-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'detailModels' => $detailModels,
        'boct' => $boct,
        'title' => $title,
        'powerPlantModel' => $powerPlantModel,
    ]) ?>

</div>
