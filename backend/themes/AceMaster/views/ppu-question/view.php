<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuQuestion */

$this->title = sprintf('%s %s %s', AppLabels::BTN_VIEW, AppLabels::QUESTION, AppLabels::TECHNICAL_PROVISION);
$this->params['subtitle'] = $model->ppuq_question_type_code_desc;
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::QUESTION, AppLabels::TECHNICAL_PROVISION), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-question-view">

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
                'ppuq_question_type_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppuq_question_type_code_desc]
            ]
        ]
    ]); ?>
    <?= ViewButton::widget(['model' => $model]); ?>

</div>
