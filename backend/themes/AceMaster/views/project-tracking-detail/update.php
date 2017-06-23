<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectTrackingDetail */
/* @var $projectTrackingModel \backend\models\ProjectTracking */

$this->title = sprintf('%s %s', AppLabels::BTN_UPDATE, AppLabels::ACTIVITY);
$this->params['breadcrumbs'][] = ['label' => AppLabels::ACTIVITY, 'url' => ['index', 'ptId' => $model->project_tracking_id]];
$this->params['breadcrumbs'][] = ['label' => $model->projectTracking->pt_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="project-tracking-detail-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <?= $this->render('_form', [
        'model' => $model,
        'projectTrackingModel' => $projectTrackingModel,
    ]) ?>

</div>
