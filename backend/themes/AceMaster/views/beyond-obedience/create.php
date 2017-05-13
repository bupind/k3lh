<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\BeyondObedience */
/* @var $bot string */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $title string */
/* @var $boAspect backend\models\BoAssessmentAspect */
/* @var $boAssessment backend\models\BoAssessment[] */

$this->title = sprintf("%s %s", AppLabels::BTN_ADD, $title);
$this->params['breadcrumbs'][] = ['label' => $title, 'url' => ['index', 'bot' => $bot, '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beyond-obedience-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'boAspect' => $boAspect,
        'boAssessment' => $boAssessment,
        'bot' => $bot,
        'title' => $title,
        'powerPlantModel' => $powerPlantModel,
    ]) ?>

</div>
