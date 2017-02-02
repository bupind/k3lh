<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use backend\models\Sector;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BudgetMonitoringSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = sprintf('%s %s', AppLabels::BUDGET_MONITORING, $title);
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge([
    'realization' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-fire bigger-120"></i> ' . AppLabels::REALIZATION, $url, ['class' => 'btn btn-xs btn-warning', 'data' => ['method' => 'post']]);
    },
    'realization_xs' => function ($url, $model) {
        return Html::a('<span class="orange"><i class="ace-icon fa fa-fire bigger-120"></i></span>', $url, ['class' => 'tooltip-warning', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::REALIZATION, 'data' => ['method' => 'post']]);
    },
], $actionColumn->buttons);
$template = Yii::t('app', \common\vendor\AppConstants::GRID_TEMPLATE_DEFAULT_EXTRA, ['additional_buttons' => '{realization}', 'additional_buttons_xs' => '<li>{realization_xs}</li>']);
?>
<div class="budget-monitoring-index">

    <div class="page-header">
         <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', 'bmt' => $bmt], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
    <hr/>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'sector_id',
                    'value' => 'sector.sector_name',
                    'filter' => Html::activeDropDownList($searchModel, 'sector_id', Sector::map(new Sector(), 'sector_name'), ['class' => 'chosen-select form-control'])
                ],
                [
                    'attribute' => 'power_plant_id',
                    'value' => 'powerPlant.pp_name'
                ],
                'k3l_year',

                [   'class' => 'yii\grid\ActionColumn',
                    'headerOptions' => ['style' => 'width: 30%;'],
                    'template' => $template,
                    'buttons' => $buttons,
                ]

            ],
            ]
        ); ?>
    </div>
</div>
