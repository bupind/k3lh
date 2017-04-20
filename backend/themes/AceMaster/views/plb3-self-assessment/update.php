<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3SelfAssessment */

$this->title = sprintf('%s %s', AppLabels::BTN_UPDATE, AppLabels::SELF_ASSESSMENT);
$this->params['breadcrumbs'][] = ['label' => AppLabels::SELF_ASSESSMENT, 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', $model->sector->sector_name, $model->powerPlant->pp_name), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="plb3-self-assessment-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
