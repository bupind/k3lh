<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WorkingPermitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $powerPlantModel \backend\models\PowerPlant */

$this->title = sprintf('%s %s', AppLabels::FORM_WORKING_PERMIT, $powerPlantModel->getSummary());
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
$template = Yii::t('app', AppConstants::GRID_TEMPLATE_DEFAULT_EXTRA, ['additional_buttons' => '{export}', 'additional_buttons_xs' => '<li>{export_xs}</li>']);

?>
<div class="working-permit-index">

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
            
                'wp_registration_number',
                'wp_submit_date',
                'wp_work_type',
                'wp_work_location',
                'wp_company_department',
    
                [   'class' => 'yii\grid\ActionColumn',
                    'headerOptions' => ['style' => 'width: 30%;'],
                    'template' => $template,
                    'buttons' => $buttons,
                ],
            ],
        ]); ?>
    </div>
</div>
