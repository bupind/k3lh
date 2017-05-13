<?php

use yii\helpers\Html;
use common\vendor\AppLabels;
use app\components\DetailView;
use app\components\ViewButton;

/* @var $this yii\web\View */
/* @var $model backend\models\BoAssessmentAspect */

$this->title = $model->bo_form_type_code_desc;
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s", AppLabels::ASSESSMENT_ASPECT, AppLabels::BEYOND_OBEDIENCE), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bo-assessment-aspect-view">

    <div class="page-header">
        <h1>
            <?= Html::encode($this->title) ?>
            <?php if (isset($this->params['subtitle'])): ?>
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <?= $this->params['subtitle']; ?>
                </small>
            <?php endif; ?>
        </h1>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'options' => [
            'excluded' => [
                'bo_form_type_code'
            ],
        ]
    ]); ?>

    <?php foreach($model->boasCriterias as $key => $criteria) : ?>
        <?= DetailView::widget([
            'model' => $criteria,
            'options' => [
                'excluded' => ['bo_assessment_aspect_id'],
            ]
        ]); ?>
    <?php endforeach; ?>

    <?= ViewButton::widget(['model' => $model]); ?>

</div>
