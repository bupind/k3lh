<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HousekeepingImplementationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf("Form %s %s", AppLabels::FORM_HOUSEKEEPING_IMPLEMENTATION, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge($actionColumn->buttons, [
    'update' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['housekeeping-implementation/update', '_ppId' => $model->powerPlant->id,  'id' => $model->id], ['class' => 'btn btn-xs btn-info']);
    },
    'update_xs' => function ($url, $model) {
        return Html::a('<span class="green"><i class="ace-icon fa fa-pencil bigger-120"></i></span>', ['housekeeping-implementation/update', '_ppId' => $model->powerPlant->id, 'id' => $model->id], ['class' => 'tooltip-success', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_UPDATE]);
    },

]);
?>
<div class="housekeeping-implementation-index">

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

            'hi_unit',
            'hi_date',
            'hi_auditor',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => $buttons,
            ],
        ],
    ]); ?>
</div>