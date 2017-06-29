<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use backend\models\Codeset;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectTrackingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $powerPlantModel \backend\models\PowerPlant */

$this->title = sprintf('%s %s', AppLabels::FORM_PROJECT_TRACKING, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = $this->title;

$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge([
    'activity' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::ACTIVITY, ['/project-tracking-detail', 'ptId' => $model->id], ['class' => 'btn btn-xs btn-warning']);
    },
    'activity_xs' => function ($url, $model) {
        return Html::a('<span class="orange"><i class="ace-icon fa fa-bars bigger-120"></i></span>', ['/project-tracking-detail', 'ptId' => $model->id], ['class' => 'tooltip-warning', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_EXPORT, 'data' => ['method' => 'post']]);
    },
    'export' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-file-excel-o bigger-120"></i> ' . AppLabels::BTN_EXPORT, ['export', 'id' => $model->id], ['class' => 'btn btn-xs btn-purple']);
    },
    'export_xs' => function ($url, $model) {
        return Html::a('<span class="purple"><i class="ace-icon fa fa-file-excel-o bigger-120"></i></span>', ['export', 'id' => $model->id], ['class' => 'tooltip-purple', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_EXPORT]);
    },
], $actionColumn->buttons);
$template = Yii::t('app', AppConstants::GRID_TEMPLATE_DEFAULT_EXTRA, ['additional_buttons' => '{activity} {export}', 'additional_buttons_xs' => '<li>{activity_xs}</li><li>{export_xs}</li>']);

?>
<div class="project-tracking-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', '_ppId' => $powerPlantModel->id], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
    <hr />

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            
                'pt_name',
                'pt_goal',
                [
                    'attribute' => 'pt_owner_code',
                    'value' => 'pt_owner_code_desc',
                    'filter' => Html::activeDropDownList($searchModel, 'pt_owner_code', Codeset::customMap(AppConstants::CODESET_PROJECT_TRACKING_LIST), ['class' => 'chosen-select form-control'])
                ],
                'start_date',
                'end_date',
    
                [   'class' => 'yii\grid\ActionColumn',
                    'headerOptions' => ['style' => 'width: 30%;'],
                    'template' => $template,
                    'buttons' => $buttons,
                ],
            ],
        ]); ?>
    </div>
</div>
