<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use kartik\widgets\DatePicker;
use backend\models\Codeset;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectTrackingDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $projectTrackingModel \backend\models\ProjectTracking */

$this->title = AppLabels::ACTIVITY;
$this->params['breadcrumbs'][] = ['label' => $projectTrackingModel->pt_name, 'url' => ['/project-tracking/index', '_ppId' => $projectTrackingModel->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;

$sum = 0;
?>
<div class="project-tracking-detail-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', 'ptId' => $projectTrackingModel->id], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
    <hr />

    <div class="table-responsive calx">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            
                'ptd_step',
                [
                    'attribute' => 'ptd_pic_code',
                    'value' => 'ptd_pic_code_desc',
                    'filter' => Html::activeDropDownList($searchModel, 'ptd_pic_code', Codeset::customMap(AppConstants::CODESET_PROJECT_TRACKING_LIST), ['class' => 'chosen-select form-control'])
                ],
                [
                    'attribute' => 'ptd_status',
                    'value' => 'ptd_status_desc',
                    'filter' => Html::activeDropDownList($searchModel, 'ptd_status', AppConstants::$openCloseList, ['class' => 'chosen-select form-control'])
                ],
                [
                    'attribute' => 'ptd_duration',
                    'headerOptions' => ['class' => 'text-right'],
                    'contentOptions' => ['class' => 'text-right'],
                ],
                [
                    'attribute' => 'ptd_start_date',
                    'format' => ['date', AppConstants::FORMAT_DATE_PHP],
                    'filter' => DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'ptd_start_date',
                        'type' => DatePicker::TYPE_INPUT,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => AppConstants::FORMAT_DATE_DATEPICKER,
                            'todayHighlight' => true
                        ]
                    ])
                ],
                'end_date',
                [
                    'attribute' => 'ptd_progress_percentage',
                    'headerOptions' => ['class' => 'text-right'],
                    'contentOptions' => function ($model, $key, $index, $column) {
                        return [
                            'data-cell' => 'A' . $index,
                            'data-format' => AppConstants::CALX_DATA_FORMAT_DEC,
                            'class' => 'text-right'
                        ];
                    }
                ],
                [
                    'attribute' => 'progress_accumulation',
                    'headerOptions' => ['class' => 'text-right'],
                    'contentOptions' => function ($model, $key, $index, $column) {
                        return [
                            'data-cell' => 'B' . $index,
                            'data-formula' => $index > 0 ? sprintf('A%s+B%s', $index, --$index) : 'A' . $index,
                            'data-format' => AppConstants::CALX_DATA_FORMAT_DEC,
                            'class' => 'text-right'
                        ];
                    }
                ],
            
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
    
</div>
