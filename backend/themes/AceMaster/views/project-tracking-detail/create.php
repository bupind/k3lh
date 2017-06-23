<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectTrackingDetail */
/* @var $projectTrackingModel \backend\models\ProjectTracking */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::ACTIVITY);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::ACTIVITY, $projectTrackingModel->pt_name), 'url' => ['/project-tracking-detail/index', 'ptId' => $projectTrackingModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-tracking-detail-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <?= $this->render('_form', [
        'model' => $model,
        'projectTrackingModel' => $projectTrackingModel,
    ]) ?>

</div>
