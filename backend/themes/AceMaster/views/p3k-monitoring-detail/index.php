<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\P3kMonitoringDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $pmId int */
/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf("Form %s %s", AppLabels::FORM_P3K_MONITORING_DETAIL, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = ['label' => AppLabels::FORM_P3K_MONITORING, 'url' => ['p3k-monitoring/index', '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge($actionColumn->buttons, [
    'update' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['p3k-monitoring-detail/update', '_ppId' => $model->p3kMonitoring->powerPlant->id, 'id' => $model->id, 'pmId' => $model->p3k_monitoring_id], ['class' => 'btn btn-xs btn-info']);
    },
    'update_xs' => function ($url, $model) {
        return Html::a('<span class="green"><i class="ace-icon fa fa-pencil bigger-120"></i></span>', ['p3k-monitoring-detail/update', '_ppId' => $model->p3kMonitoring->powerPlant->id, 'id' => $model->id, 'pmId' => $model->p3k_monitoring_id], ['class' => 'tooltip-success', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_UPDATE]);
    },
]);
?>
<div class="p3k-monitoring-detail-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', '_ppId' => $powerPlantModel->id, 'pmId' => $pmId], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>

    <hr/>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pmd_value',
            'pmd_standard_amount',
            'pmd_ref:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => $buttons,
            ],
        ],
    ]); ?>
</div>
