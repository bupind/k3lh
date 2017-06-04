<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\BeyondObedienceProgram */
/* @var $bopt string */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $title string */
/* @var $detailModels backend\models\BopDetail[] */

$this->title = sprintf("%s %s %s", AppLabels::BTN_UPDATE, AppLabels::PROGRAM, AppLabels::BEYOND_OBEDIENCE);
$this->params['breadcrumbs'][] = ['label' => $title, 'url' => ['index', 'bopt' => $bopt, '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = ['label' => $model->bop_year, 'url' => ['view', 'bopt' => $bopt, 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="beyond-obedience-program-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'bopt' => $bopt,
        'title' => $title,
        'detailModels' => $detailModels,
        'powerPlantModel' => $powerPlantModel,
    ]) ?>

</div>
