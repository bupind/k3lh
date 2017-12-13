<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\WorkAccidentDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $waId int */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $title string */
/* @var $wat string */

$this->title = sprintf("Detail %s %s", $title, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = ['label' => $title, 'url' => ['work-accident/index', '_ppId' => $powerPlantModel->id, 'wat' => $wat]];
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge($actionColumn->buttons, [
    'view' => function ($url, $model) use ($wat) {
        return Html::a('<i class="ace-icon fa fa-eye bigger-120"></i> ' . AppLabels::BTN_VIEW, ['work-accident-detail/view', 'id' => $model->id, 'wat' => $wat], ['class' => 'btn btn-xs btn-success']);
    },
    'view_xs' => function ($url, $model) {
        return Html::a('<span class="blue"><i class="ace-icon fa fa-eye bigger-120"></i></span>', ['view', 'id' => $model->id], ['class' => 'tooltip-info', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_VIEW]);
    },
    'update' => function ($url, $model) use ($wat) {
        return Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['work-accident-detail/update', '_ppId' => $model->workAccident->powerPlant->id, 'id' => $model->id, 'waId' => $model->work_accident_id, 'wat' => $wat] , ['class' => 'btn btn-xs btn-info']);
    },
    'update_xs' => function ($url, $model) use ($wat) {
        return Html::a('<span class="green"><i class="ace-icon fa fa-pencil bigger-120"></i></span>', ['work-accident-detail/update', '_ppId' => $model->workAccident->powerPlant->id, 'id' => $model->id, 'waId' => $model->work_accident_id, 'wat' => $wat], ['class' => 'tooltip-success', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_UPDATE]);
    },
    'delete' => function ($url, $model) use ($wat) {
        return Html::a('<i class="ace-icon fa fa-trash-o bigger-120"></i> ' . AppLabels::BTN_DELETE, ['work-accident-detail/delete', 'id' => $model->id, 'wat' => $wat], ['class' => 'btn btn-xs btn-danger', 'data' => ['method' => 'post', 'confirm' => AppLabels::ALERT_CONFIRM_DELETE]]);
    },
    'delete_xs' => function ($url, $model) use ($wat) {
        return Html::a('<span class="red"><i class="ace-icon fa fa-trash-o bigger-120"></i></span>', ['delete', 'id' => $model->id, 'wat' => $wat], ['class' => 'tooltip-error', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_DELETE, 'data' => ['method' => 'post', 'confirm' => AppLabels::ALERT_CONFIRM_DELETE]]);
    },
]);
?>
<div class="work-accident-detail-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', '_ppId' => $powerPlantModel->id, 'waId' => $waId, 'wat' => $wat], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>

    <hr/>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'wad_date',
            'wad_event',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => $buttons,
            ],
        ],
    ]); ?>
</div>
