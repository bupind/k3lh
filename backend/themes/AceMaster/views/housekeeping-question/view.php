<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppLabels;
/* @var $this yii\web\View */
/* @var $model backend\models\HousekeepingQuestion */

$this->title = sprintf('%s %s %s', AppLabels::BTN_VIEW, AppLabels::QUESTION, AppLabels::HOUSEKEEPING);
$this->params['subtitle'] = $model->id;
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::QUESTION, AppLabels::HOUSEKEEPING), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="housekeeping-question-view">

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
    ]); ?>

    <?php foreach($model->hqDetails as $key => $detail) : ?>
        <?= DetailView::widget([
            'model' => $detail,
            'options' => [
                    'excluded' => ['housekeeping_question_detail_id'],
            ],
        ]); ?>
    <?php endforeach; ?>
    <?= ViewButton::widget(['model' => $model]); ?>

</div>
