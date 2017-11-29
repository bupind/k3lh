<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SprinkleMonitoringDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $smId int */
/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf("Form %s %s", AppLabels::FORM_SPRINKLE_MONITORING_DETAIL, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = ['label' => AppLabels::FORM_SPRINKLE_MONITORING, 'url' => ['sprinkle-monitoring/index', '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge($actionColumn->buttons, [
    'update' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['sprinkle-monitoring-detail/update', '_ppId' => $model->sprinkleMonitoring->powerPlant->id, 'id' => $model->id, 'smId' => $model->sprinkle_monitoring_id], ['class' => 'btn btn-xs btn-info']);
    },
    'update_xs' => function ($url, $model) {
        return Html::a('<span class="green"><i class="ace-icon fa fa-pencil bigger-120"></i></span>', ['sprinkle-monitoring-detail/update', '_ppId' => $model->sprinkleMonitoring->powerPlant->id, 'id' => $model->id, 'smId' => $model->sprinkle_monitoring_id], ['class' => 'tooltip-success', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_UPDATE]);
    },
]);
?>
<div class="sprinkle-monitoring-detail-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', '_ppId' => $powerPlantModel->id, 'smId' => $smId], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>

    <hr/>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sm_location',
            [
                'attribute' => 'sm_sprinkle_head',
                'value' => 'sm_sprinkle_head_desc'
            ],
            [
                'attribute' => 'sm_detector',
                'value' => 'sm_detector_desc'
            ],
            [
                'attribute' => 'sm_piping_condition',
                'value' => 'sm_piping_condition_desc'
            ],
            'sm_notes:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => $buttons,
            ],
        ],
    ]); ?>
</div>
