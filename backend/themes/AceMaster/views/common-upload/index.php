<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use kartik\widgets\DatePicker;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AttachmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $powerPlantModel \backend\models\PowerPlant */
/* @var $codesetModel \backend\models\Codeset */

$this->title = sprintf('%s %s %s', AppLabels::UPLOAD, $codesetModel->cset_value, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="common-upload-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', 'utc' => $codesetModel->cset_code, '_ppId' => $powerPlantModel->id], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
    <hr />

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            
                [
                    'attribute' => 'atf_filename',
                    'value' => function ($model, $key, $index, $column) {
                        return Converter::attachment($model->attachmentOwner);
                    },
                    'format' => 'html'
                ],
                'atf_filetype',
                [
                    'attribute' => 'created_at',
                    'value' => 'created_at',
                    'format' => ['date', 'php:d-m-Y [H:i:s]'],
                    'filter' => DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'created_at',
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'options' => ['placeholder' => AppLabels::DATE],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => AppConstants::FORMAT_DATE_DATEPICKER,
                            'todayHighlight' => true
                        ]
                    ])
                ],
            ],
        ]); ?>
    </div>
</div>
