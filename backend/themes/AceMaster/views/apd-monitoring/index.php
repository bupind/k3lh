<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ApdMonitoringSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf("Form %s %s", AppLabels::FORM_APD_MONITORING, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge($actionColumn->buttons, [
    'update' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['apd-monitoring/update', '_ppId' => $model->powerPlant->id, 'id' => $model->id], ['class' => 'btn btn-xs btn-info']);
    },
    'update_xs' => function ($url, $model) {
        return Html::a('<span class="green"><i class="ace-icon fa fa-pencil bigger-120"></i></span>', ['apd-monitoring/update', '_ppId' => $model->powerPlant->id, 'id' => $model->id], ['class' => 'tooltip-success', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_UPDATE]);
    },

]);
?>
<div class="apd-monitoring-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', '_ppId' => $powerPlantModel->id], ['class' => 'btn btn-sm btn-success']) ?>
            <?= Html::a(AppLabels::BTN_DOWNLOAD_EXCEL, ['export', '_ppId' => $powerPlantModel->id], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>

    <hr/>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'am_name',
            [
                'attribute' => 'am_type',
                'value' => 'am_type_desc'
            ],
            [
                'attribute' => 'am_brand',
                'value' => 'am_brand_desc'
            ],
            'am_amount',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => $buttons,
            ],
        ],
    ]); ?>
</div>
