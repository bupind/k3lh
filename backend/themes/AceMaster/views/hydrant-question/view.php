<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\HydrantQuestion */

$this->title = sprintf('%s %s %s', AppLabels::BTN_VIEW, AppLabels::ITEM, AppLabels::HYDRANT);
$this->params['subtitle'] = $model->id;
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::ITEM, AppLabels::HYDRANT), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hydrant-question-view">

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
        ]
    ]); ?>
    <?= ViewButton::widget(['model' => $model]); ?>

</div>
