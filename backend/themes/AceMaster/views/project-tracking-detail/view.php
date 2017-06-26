<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;
use backend\models\Codeset;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectTrackingDetail */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::ACTIVITY);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::ACTIVITY, $model->projectTracking->pt_name), 'url' => ['index', 'ptId' => $model->projectTracking->id]];
$this->params['subtitle'] = $model->ptd_step;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-tracking-detail-view">

    <div class="page-header">
        <h1>
            <?= Html::encode($this->title) ?>
            <?php if (isset($this->params['subtitle'])): ?>
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <?= $this->params['subtitle']; ?>
                </small>
            <?php endif; ?>
        </h1>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'excluded' => ['project_tracking_id'],
                    'extraAttributes' => [
                        'end_date' => $model->end_date,
                        'files' => Converter::attachments($model->attachmentOwners)
                    ],
                    'order' => [
                        'ptd_step',
                        'ptd_pic_code',
                        'ptd_status',
                        'ptd_duration',
                        'ptd_start_date',
                        'end_date',
                        'ptd_progress_percentage',
                        'ptd_information',
                        'files'
                    ],
                    'converter' => [
                        'ptd_status' => [AppConstants::FORMAT_TYPE_VARIABLE, Converter::format($model->ptd_status, AppConstants::FORMAT_TYPE_OPEN_CLOSE)],
                        'ptd_pic_code' => [AppConstants::FORMAT_TYPE_VARIABLE, Codeset::getCodesetValue(AppConstants::CODESET_PROJECT_TRACKING_LIST, $model->ptd_pic_code)]
                    ]
                ]
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'buttons' => [
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', 'ptId' => $model->project_tracking_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', 'ptId' => $model->project_tracking_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>
    
</div>
