<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectTracking */
/* @var $powerPlantModel \backend\models\PowerPlant */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::FORM_PROJECT_TRACKING);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::FORM_PROJECT_TRACKING, $powerPlantModel->getSummary()), 'url' => ['/project-tracking/index', '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-tracking-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel
    ]) ?>

</div>
