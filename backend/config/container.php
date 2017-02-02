<?php
use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

$defaultTemplate = AppConstants::GRID_TEMPLATE_DEFAULT;
$defaultButtons = [
    'view' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-eye bigger-120"></i> ' . AppLabels::BTN_VIEW, $url, ['class' => 'btn btn-xs btn-success']);
    },
    'view_xs' => function ($url, $model) {
        return Html::a('<span class="blue"><i class="ace-icon fa fa-eye bigger-120"></i></span>', ['view', 'id' => $model->id], ['class' => 'tooltip-info', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_VIEW]);
    },
    'update' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, $url, ['class' => 'btn btn-xs btn-info']);
    },
    'update_xs' => function ($url, $model) {
        return Html::a('<span class="green"><i class="ace-icon fa fa-pencil bigger-120"></i></span>', ['update', 'id' => $model->id], ['class' => 'tooltip-success', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_UPDATE]);
    },
    'delete' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-trash-o bigger-120"></i> ' . AppLabels::BTN_DELETE, $url, ['class' => 'btn btn-xs btn-danger', 'data' => ['method' => 'post', 'confirm' => AppLabels::ALERT_CONFIRM_DELETE]]);
    },
    'delete_xs' => function ($url, $model) {
        return Html::a('<span class="red"><i class="ace-icon fa fa-trash-o bigger-120"></i></span>', ['delete', 'id' => $model->id], ['class' => 'tooltip-error', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_DELETE, 'data' => ['method' => 'post', 'confirm' => AppLabels::ALERT_CONFIRM_DELETE]]);
    },
];

return [
    Yii::$container->set('yii\grid\GridView', [
        'tableOptions' => [
            'class' => 'table table-striped table-responsive table-hover table-vcenter text-nowrap',
        ],
    ]),
    
    Yii::$container->set('yii\grid\ActionColumn', [
        'header' => 'Actions',
        'headerOptions' => ['style' => 'width: 20%;'],
        'template' => $defaultTemplate,
        'buttons' => $defaultButtons
    ]),
];
        