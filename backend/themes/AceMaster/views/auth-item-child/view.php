<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppLabels;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItemChild */

$model = $models[0];

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::AUTH_ITEM_CHILD);
$this->params['subtitle'] = $model->parent;
$this->params['breadcrumbs'][] = ['label' => AppLabels::AUTH_ITEM_CHILD, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-child-view">
    
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
    
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
            <div class="profile-user-info profile-user-info-striped">
                <div class="profile-info-row">
                    <div class="profile-info-name info-large"><?= AppLabels::AUTH_PARENT; ?></div>
                    <div class="profile-info-value"><?= $model->parent; ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="space-12"></div>
    <div class="row">
        <?php foreach ($models as $model): ?>
        <div class="col-xs-4">
            <span class="label label-xlg label-yellow arrowed"><?= $model->child; ?></span>
            <?= Html::a('<i class="ace-icon fa fa-trash-o bigger-110 icon-only red"></i>', ['delete', 'parent' => $model->parent, 'child' => $model->child], ['class' => 'btn btn-link', 'data' => ['method' => 'post', 'confirm' => AppLabels::ALERT_CONFIRM_DELETE]]) ?>
            <div class="space-8"></div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <?= ViewButton::widget(['model' => $model, 'options' => ['template' => AppConstants::VIEW_BUTTON_TEMPLATE_CREATE_ONLY, 'backAction' => $model->parent0->type == 3 ? '/auth-item-child' : '/auth-item']]); ?>
</div>
