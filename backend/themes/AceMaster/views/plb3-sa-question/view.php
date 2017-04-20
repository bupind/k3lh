<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3SaQuestion */

$this->title = sprintf('%s %s %s %s', AppLabels::BTN_VIEW, AppLabels::QUESTION, AppLabels::PLB3, AppLabels::SELF_ASSESSMENT_SHORT);
$this->params['subtitle'] = $model->label_short;
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s %s', AppLabels::QUESTION, AppLabels::PLB3, AppLabels::SELF_ASSESSMENT_SHORT), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plb3-sa-question-view">

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
            'order' => [
                'category_code',
                'input_type_code',
                'is_question',
                'parent_id',
                'label'
            ],
            'converter' => [
                'category_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->category_code_desc],
                'input_type_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->input_type_code_desc],
                'is_question' => AppConstants::FORMAT_TYPE_YES_NO,
                'parent_id' => [AppConstants::FORMAT_TYPE_VARIABLE, !is_null($model->parent) ? Html::a($model->parent->label_short, ['view', 'id' => $model->parent_id]) : '-']
            ]
        ]
    ]); ?>
    <?= ViewButton::widget(['model' => $model]); ?>

</div>
