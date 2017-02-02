<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppLabels;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\Profile */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::PROFILE);
$this->params['subtitle'] = $model->app_name;
$this->params['breadcrumbs'][] = ['label' => AppLabels::PROFILE, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">
    
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
                'active_status' => AppConstants::FORMAT_TYPE_YES_NO
            ]
        ]
    ]); ?>
    
    <?= ViewButton::widget(['model' => $model]); ?>

</div>
