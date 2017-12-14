<?php

use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaturityLevelK3lQuestion */

$this->title = sprintf('%s %s %s', AppLabels::BTN_VIEW, AppLabels::QUESTION, AppLabels::MATURITY_LEVEL_K3L);
$this->params['subtitle'] = $model->maturityLevelK3lTitle->title_text;
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::QUESTION, AppLabels::MATURITY_LEVEL_K3L), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maturity-level-k3l-question-view">

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
                'maturity_level_k3l_title_id',
                'q_unit_code',
                'q_weight',
                'q_action_plan',
                'q_criteria',
                'q_eviden'
            ],
            'converter' => [
                'maturity_level_title_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->maturityLevelK3lTitle->title_text],
                'q_unit_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->q_unit_code_desc]
            ]
        ]
    ]); ?>
    <?= ViewButton::widget(['model' => $model]); ?>

</div>
