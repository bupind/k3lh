<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\BoAssessmentAspect */
/* @var $boCriteria backend\models\BoasCriteria[] */

$this->title = sprintf("%s %s", AppLabels::BTN_ADD, AppLabels::ASSESSMENT_ASPECT);
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s", AppLabels::ASSESSMENT_ASPECT, AppLabels::BEYOND_OBEDIENCE), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bo-assessment-aspect-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'boCriteria' => $boCriteria,
    ]) ?>

</div>
