<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = AppLabels::AUTH_ITEM;
$this->params['breadcrumbs'][] = $this->title;

$customButtons = [
    'custom_buttons' => function ($url, $model) {
        $buttons = Html::a('<i class="ace-icon fa fa-eye bigger-120"></i> ' . sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::AUTH_CHILD), ['/auth-item-child/view', 'parent' => $model->id], ['class' => 'btn btn-xs btn-success']);
        $buttons .= Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['update', 'id' => $model->id], ['class' => 'btn btn-xs btn-info']);
        $buttons .= Html::a('<i class="ace-icon fa fa-trash-o bigger-120"></i> ' . AppLabels::BTN_DELETE, ['delete', 'id' => $model->id], ['class' => 'btn btn-xs btn-danger', 'data' => ['method' => 'post', 'confirm' => AppLabels::ALERT_CONFIRM_DELETE_AUTH_ITEM]]);
        
        return $buttons;
    },
    'custom_buttons_xs' => function ($url, $model) {
        $buttonsXs = Html::tag('li', Html::a('<span class="green"><i class="ace-icon fa fa-eye bigger-120"></i></span>', ['/auth-item-child/view', 'parent' => $model->id], ['class' => 'tooltip-info', 'data-rel' => 'tooltip', 'data-original-title' => sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::AUTH_CHILD)]));
        $buttonsXs .= Html::tag('li', Html::a('<span class="blue"><i class="ace-icon fa fa-pencil bigger-120"></i></span>', ['update', 'id' => $model->id], ['class' => 'tooltip-info', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_UPDATE]));
        $buttonsXs .= Html::tag('li', Html::a('<span class="red"><i class="ace-icon fa fa-trash-o bigger-120"></i></span>', ['delete', 'id' => $model->id], ['class' => 'tooltip-info', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_DELETE, 'data' => ['method' => 'post', 'confirm' => AppLabels::ALERT_CONFIRM_DELETE_AUTH_ITEM]]));
        
        return $buttonsXs;
    },
];
?>
<div class="auth-item-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create'], ['class' => 'btn btn-sm btn-success']) ?>
            <?= Html::a(sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::AUTH_CHILD), ['/auth-item-child/create'], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>
    <hr />
            
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',
                'description:ntext',
                'type',

                ['class' => 'yii\grid\ActionColumn',
                    'headerOptions' => ['style' => 'width: 25%;'],
                    'template' => AppConstants::GRID_TEMPLATE_CUSTOM,
                    'buttons' => $customButtons
                ],
            ],
        ]); ?>
    </div>
</div>
