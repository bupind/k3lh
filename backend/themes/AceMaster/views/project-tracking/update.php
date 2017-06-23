<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectTracking */
/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf('%s %s', AppLabels::BTN_UPDATE, AppLabels::PROJECT_TRACKING);
$this->params['breadcrumbs'][] = ['label' => AppLabels::PROJECT_TRACKING, 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = ['label' => $model->powerPlant->getSummary(), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="project-tracking-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel
    ]) ?>

</div>
