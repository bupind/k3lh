<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\WorkAccidentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $title string */
/* @var $wat string */

$this->title = sprintf("%s %s", $title, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge($actionColumn->buttons, [
    'view' => function ($url, $model) use ($wat) {
        return Html::a('<i class="ace-icon fa fa-eye bigger-120"></i> ' . AppLabels::BTN_VIEW, ['work-accident/view',  'id' => $model->id, 'wat' => $wat], ['class' => 'btn btn-xs btn-success']);
    },
    'view_xs' => function ($url, $model) use ($wat) {
        return Html::a('<span class="green"><i class="ace-icon fa fa-eye bigger-120"></i></span>', ['work-accident/view', 'id' => $model->id, 'wat' => $wat], ['class' => 'tooltip-info', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_VIEW]);
    },
    'update' => function ($url, $model) use ($wat) {
        return Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['work-accident/update', '_ppId' => $model->powerPlant->id, 'id' => $model->id, 'wat' => $wat], ['class' => 'btn btn-xs btn-info']);
    },
    'update_xs' => function ($url, $model) use ($wat) {
        return Html::a('<span class="green"><i class="ace-icon fa fa-pencil bigger-120"></i></span>', ['work-accident/update', '_ppId' => $model->powerPlant->id, 'id' => $model->id, 'wat' => $wat], ['class' => 'tooltip-success', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_UPDATE]);
    },
    'export' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-cloud-download bigger-120"></i> ' . AppLabels::BTN_EXPORT, ['work-accident/export', '_ppId' => $model->powerPlant->id,  'id' => $model->id], ['class' => 'btn btn-xs', 'data' => ['method' => 'post']]);
    },
    'export_xs' => function ($url, $model) {
        return Html::a('<span class="blue"><i class="ace-icon fa fa-cloud-download bigger-120"></i></span>', $url, ['class' => 'tooltip-warning', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_EXPORT, 'data' => ['method' => 'post']]);
    },
    'detail' => function ($url, $model) use ($wat) {
        return Html::a('<i class="ace-icon fa fa-circle bigger-120"></i> ' . AppLabels::BTN_DETAIL, ['work-accident-detail/index', '_ppId' => $model->powerPlant->id,  'waId' => $model->id, 'wat' => $wat], ['class' => 'btn btn-xs']);
    },
    'detail_xs' => function ($url, $model) {
        return Html::a('<span class="bl0ue"><i class="ace-icon fa fa-circle bigger-120"></i></span>', $url, ['class' => 'tooltip-warning', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_DETAIL]);
    },
    'delete' => function ($url, $model) use ($wat) {
        return Html::a('<i class="ace-icon fa fa-trash-o bigger-120"></i> ' . AppLabels::BTN_DELETE, ['work-accident/delete', 'id' => $model->id, 'wat' => $wat], ['class' => 'btn btn-xs btn-danger', 'data' => ['method' => 'post', 'confirm' => AppLabels::ALERT_CONFIRM_DELETE]]);
    },
    'delete_xs' => function ($url, $model) use ($wat) {
        return Html::a('<span class="red"><i class="ace-icon fa fa-trash-o bigger-120"></i></span>', ['delete', 'id' => $model->id, 'wat' => $wat], ['class' => 'tooltip-error', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_DELETE, 'data' => ['method' => 'post', 'confirm' => AppLabels::ALERT_CONFIRM_DELETE]]);
    },
]);
$template = Yii::t('app', \common\vendor\AppConstants::GRID_TEMPLATE_DEFAULT_EXTRA, ['additional_buttons' => '{export}{detail}', 'additional_buttons_xs' => '<li>{export_xs}{detail_xs}</li>']);
?>
<div class="work-accident-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', '_ppId' => $powerPlantModel->id, 'wat' => $wat], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>

    <hr/>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'wa_year',

            [
                'headerOptions' => ['style' => 'width: 30%;'],
                'class' => 'yii\grid\ActionColumn',
                'buttons' => $buttons,
                'template' => $template,
            ],
        ],
    ]); ?>
</div>
