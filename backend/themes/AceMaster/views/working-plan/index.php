<?php

use common\vendor\AppLabels;
use yii\grid\GridView;
use yii\helpers\Html;
use backend\models\Sector;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WorkingPlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $wpt string */

$this->title = sprintf('%s %s', AppLabels::WORKING_PLAN, $title);
$this->params['breadcrumbs'][] = $this->title;

$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge([
    'export' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-file-excel-o bigger-120"></i> ' . AppLabels::BTN_EXPORT, ['export', 'id' => $model->id], ['class' => 'btn btn-xs btn-purple']);
    },
    'export_xs' => function ($url, $model) {
        return Html::a('<span class="purple"><i class="ace-icon fa fa-file-excel-o bigger-120"></i></span>', ['export', 'id' => $model->id], ['class' => 'tooltip-purple', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_EXPORT]);
    },
], $actionColumn->buttons);
$template = Yii::t('app', AppConstants::GRID_TEMPLATE_DEFAULT_EXTRA, ['additional_buttons' => '{activity} {export}', 'additional_buttons_xs' => '<li>{activity_xs}</li><li>{export_xs}</li>']);
?>
<div class="working-plan-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', 'wpt' => $wpt], ['class' => 'btn btn-sm btn-success']) ?>
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
                'wp_year',
    
                [   'class' => 'yii\grid\ActionColumn',
                    'headerOptions' => ['style' => 'width: 30%;'],
                    'template' => $template,
                    'buttons' => $buttons,
                ],
            ],
        ]); ?>
    </div>
</div>
