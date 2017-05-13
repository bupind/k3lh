<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\BoAssessmentAspect */
/* @var $boCriteria backend\models\BoasCriteria[] */

$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::ASSESSMENT_ASPECT);
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s", AppLabels::ASSESSMENT_ASPECT, AppLabels::BEYOND_OBEDIENCE), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bo_form_type_code, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="bo-assessment-aspect-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'boCriteria' => $boCriteria,
    ]) ?>

</div>
