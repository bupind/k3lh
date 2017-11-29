<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\WorkAccidentDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $waId int */
/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf("Form %s %s", AppLabels::FORM_WORK_ACCIDENT_DETAIL, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = ['label' => AppLabels::FORM_WORK_ACCIDENT, 'url' => ['work-accident/index', '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge($actionColumn->buttons, [
    'update' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['work-accident-detail/update', '_ppId' => $model->workAccident->powerPlant->id, 'id' => $model->id, 'waId' => $model->work_accident_id], ['class' => 'btn btn-xs btn-info']);
    },
    'update_xs' => function ($url, $model) {
        return Html::a('<span class="green"><i class="ace-icon fa fa-pencil bigger-120"></i></span>', ['work-accident-detail/update', '_ppId' => $model->workAccident->powerPlant->id, 'id' => $model->id, 'waId' => $model->work_accident_id], ['class' => 'tooltip-success', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_UPDATE]);
    },
]);
?>
<div class="work-accident-detail-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', '_ppId' => $powerPlantModel->id, 'waId' => $waId], ['class' => 'btn btn-sm btn-success']) ?>
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
                'attribute' => 'wad_type',
                'value' => 'wad_type_desc'
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => $buttons,
            ],
        ],
    ]); ?>
</div>
