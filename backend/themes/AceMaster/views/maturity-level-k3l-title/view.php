<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\MaturityLevelK3lTitle */

$this->title = sprintf('%s %s %s', AppLabels::BTN_VIEW, AppLabels::TITLE, AppLabels::MATURITY_LEVEL_K3L);
$this->params['subtitle'] = $model->title_text;
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::TITLE, AppLabels::MATURITY_LEVEL_K3L), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maturity-level-k3l-title-view">

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

    <?= DetailView::widget(['model' => $model]); ?>
    <?= ViewButton::widget(['model' => $model]); ?>

</div>
