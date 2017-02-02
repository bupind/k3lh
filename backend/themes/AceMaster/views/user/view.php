<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Lihat Pengguna';
$this->params['subtitle'] = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Pengguna', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
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
        <div class="col-sm-6">
            <div class="widget-box transparent">
                <div class="widget-header widget-header-small">
                    <h4 class="widget-title blue smaller">
                        <i class="ace-icon fa fa-user orange"></i>
                        <?= AppLabels::USER; ?>
                    </h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main padding-8">
                        <?= DetailView::widget([
                            'model' => $model, 
                            'options' => [
                                'excluded' => ['branch_id', 'auth_key', 'password_hash', 'password_reset_token', 'created_at', 'updated_at'],
                                'converter' => [
                                    'status' => AppConstants::FORMAT_TYPE_YES_NO,
                                    'employee_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->employee->name],
                                ]
                            ]
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="widget-box transparent">
                <div class="widget-header widget-header-small">
                    <h4 class="widget-title blue smaller">
                        <i class="ace-icon fa fa-gear orange"></i>
                        <?= AppLabels::AUTH_ASSIGNMENT; ?>
                    </h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main padding-8">
                        <?php foreach ($model->authAssigments as $auth): ?>
                        <span class="label label-success label-white middle"><?= $auth->item_name; ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <?= ViewButton::widget(['model' => $model]); ?>

</div>
