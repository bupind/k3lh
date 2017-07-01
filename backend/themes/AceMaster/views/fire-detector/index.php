<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use backend\models\Codeset;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FireDetectorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf("Form %s %s", AppLabels::FORM_FIRE_DETECTOR, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge($actionColumn->buttons, [
    'update' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['fire-detector/update', '_ppId' => $model->powerPlant->id,  'id' => $model->id], ['class' => 'btn btn-xs btn-info']);
    },
    'update_xs' => function ($url, $model) {
        return Html::a('<span class="green"><i class="ace-icon fa fa-pencil bigger-120"></i></span>', ['fire-detector/update', '_ppId' => $model->powerPlant->id, 'id' => $model->id], ['class' => 'tooltip-success', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_UPDATE]);
    },

]);
?>
<div class="fire-detector-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', '_ppId' => $powerPlantModel->id], ['class' => 'btn btn-sm btn-success']) ?>
            <?= Html::a(sprintf("%s %s",AppLabels::BTN_UPDATE, AppLabels::FDD_DATE), ['date', 'ppId' => $powerPlantModel->id, '_ppId' => $powerPlantModel->id], ['class' => 'btn btn-sm btn-primary']) ?>
            <?= Html::a(AppLabels::BTN_DOWNLOAD_EXCEL, ['export', '_ppId' => $powerPlantModel->id], ['class' => 'btn btn-sm btn-primary']) ?>
        </div>
    </div>


    <hr/>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fd_location',
            [
                'attribute' => 'fd_detector_type_code',
                'value' => 'fd_detector_type_code_desc',
                'filter' => Html::activeDropDownList($searchModel, 'fd_detector_type_code', Codeset::customMap(AppConstants::CODESET_FD_DETECT_TYPE), ['class' => 'chosen-select form-control'])
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => $buttons,
            ],
        ],
    ]); ?>
</div>
