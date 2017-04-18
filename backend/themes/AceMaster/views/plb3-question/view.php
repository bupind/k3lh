<?php

use yii\helpers\Html;
use common\vendor\AppLabels;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
/* @var $this yii\web\View */
/* @var $model backend\models\Plb3Question */

$this->title = sprintf('%s %s %s %s %s', AppLabels::BTN_VIEW, AppLabels::QUESTION, AppLabels::CHECKLIST, AppLabels::WASTE, AppLabels::B3);
$this->params['subtitle'] = $model->plb3_question_type_code_desc;
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s %s %s', AppLabels::QUESTION, AppLabels::CHECKLIST, AppLabels::WASTE, AppLabels::B3), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plb3-question-view">

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
            'converter' => [
                'plb3_question_type_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->plb3_question_type_code_desc]
            ]
        ]
    ]); ?>
    <?= ViewButton::widget(['model' => $model]); ?>


</div>
