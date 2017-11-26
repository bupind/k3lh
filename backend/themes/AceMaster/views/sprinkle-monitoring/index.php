<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\SprinkleMonitoringSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf("%s %s", AppLabels::FORM_SPRINKLE_MONITORING, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge($actionColumn->buttons, [
    'update' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['sprinkle-monitoring/update', '_ppId' => $model->powerPlant->id, 'id' => $model->id], ['class' => 'btn btn-xs btn-info']);
    },
    'update_xs' => function ($url, $model) {
        return Html::a('<span class="green"><i class="ace-icon fa fa-pencil bigger-120"></i></span>', ['sprinkle-monitoring/update', '_ppId' => $model->powerPlant->id, 'id' => $model->id], ['class' => 'tooltip-success', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_UPDATE]);
    },
    'export' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-cloud-download bigger-120"></i> ' . AppLabels::BTN_EXPORT, ['sprinkle-monitoring/export', '_ppId' => $model->powerPlant->id,  'id' => $model->id], ['class' => 'btn btn-xs', 'data' => ['method' => 'post']]);
    },
    'export_xs' => function ($url, $model) {
        return Html::a('<span class="blue"><i class="ace-icon fa fa-cloud-download bigger-120"></i></span>', $url, ['class' => 'tooltip-warning', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_EXPORT, 'data' => ['method' => 'post']]);
    },
    'detail' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-circle bigger-120"></i> ' . AppLabels::BTN_DETAIL, ['sprinkle-monitoring-detail/index', '_ppId' => $model->powerPlant->id,  'smId' => $model->id], ['class' => 'btn btn-xs', 'data' => ['method' => 'post']]);
    },
    'detail_xs' => function ($url, $model) {
        return Html::a('<span class="bl0ue"><i class="ace-icon fa fa-circle bigger-120"></i></span>', $url, ['class' => 'tooltip-warning', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_DETAIL, 'data' => ['method' => 'post']]);
    },
]);
$template = Yii::t('app', \common\vendor\AppConstants::GRID_TEMPLATE_DEFAULT_EXTRA, ['additional_buttons' => '{export}{detail}', 'additional_buttons_xs' => '<li>{export_xs}{detail_xs}</li>']);
?>
<div class="sprinkle-monitoring-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', '_ppId' => $powerPlantModel->id], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>

    <hr/>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sm_year',
            [
                'attribute' => 'sm_form_month_type_code',
                'value' => 'sm_form_month_type_code_desc'
            ],

            [
                'headerOptions' => ['style' => 'width: 30%;'],
                'class' => 'yii\grid\ActionColumn',
                'buttons' => $buttons,
                'template' => $template,
            ],
        ],
    ]); ?>
</div>
