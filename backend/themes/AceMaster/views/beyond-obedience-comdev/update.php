<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\BeyondObedienceComdev */
/* @var $boct string */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $title string */
/* @var $detailModels backend\models\BocDetail[] */

$this->title = sprintf("%s %s %s", AppLabels::BTN_UPDATE, AppLabels::PROGRAM, AppLabels::BEYOND_OBEDIENCE);
$this->params['breadcrumbs'][] = ['label' => $title, 'url' => ['index', 'boct' => $boct, '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = ['label' => $model->boc_year, 'url' => ['view', 'boct' => $boct, 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="beyond-obedience-comdev-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'boct' => $boct,
        'title' => $title,
        'detailModels' => $detailModels,
        'powerPlantModel' => $powerPlantModel,
    ]) ?>

</div>
