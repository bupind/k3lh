<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\BeyondObedience */
/* @var $boAspect backend\models\BoAssessmentAspect */
/* @var $boAssessment backend\models\BoAssessment[] */
/* @var $bot string */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $title string */

$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::BEYOND_OBEDIENCE);
$this->params['breadcrumbs'][] = ['label' => $title, 'url' => ['index', 'bot' => $bot, '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = ['label' => $model->bo_year, 'url' => ['view', 'bot' => $bot, 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="beyond-obedience-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'boAspect' => $boAspect,
        'boAssessment' => $boAssessment,
        'bot' => $bot,
        'powerPlantModel' => $powerPlantModel,
        'title' => $title,
    ]) ?>

</div>
