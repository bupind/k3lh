<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;
use backend\models\Codeset;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectTracking */
/* @var $projectTrackingDetailModel backend\models\ProjectTrackingDetail */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::PROJECT_TRACKING);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::PROJECT_TRACKING, $model->powerPlant->getSummary()), 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['subtitle'] = $model->pt_name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-tracking-view">

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
        <div class="col-xs-12 calx">
            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'excluded' => [
                        'sector_id',
                        'power_plant_id'
                    ],
                    'extraAttributes' => [
                        'start_date' => $model->start_date,
                        'end_date' => $model->end_date
                    ],
                    'order' => [
                        'pt_name',
                        'pt_goal',
                        'pt_description',
                        'start_date',
                        'end_date',
                        'pt_owner_code',
                        'pt_report_period',
                        'pt_controller_code',
                        'pt_report_to_code',
                        'pt_estimated_project_value',
                        'pt_ao_no',
                        'pt_easy_impact',
                        'pt_support',
                    ],
                    'converter' => [
                        'pt_description' => [AppConstants::FORMAT_TYPE_VARIABLE, Yii::$app->formatter->asNtext($model->pt_description)],
                        'pt_owner_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->pt_owner_code_desc],
                        'pt_controller_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->pt_controller_code_desc],
                        'pt_report_to_code' => [AppConstants::FORMAT_TYPE_VARIABLE, Converter::toHtmlList(AppConstants::HTML_ORDERED_LIST, $model->pt_report_to_code_view)],
                        'pt_easy_impact' => [AppConstants::FORMAT_TYPE_VARIABLE, Converter::format($model->pt_easy_impact, AppConstants::FORMAT_TYPE_HIGH_LOW)],
                        'pt_estimated_project_value' => [AppConstants::FORMAT_TYPE_VARIABLE, Converter::calx($model->pt_estimated_project_value, 'label', ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY])],
                    ]
                ]
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table class="<?= AppConstants::TABLE_CLASS_DEFAULT; ?> calx">
                <thead>
                <tr>
                    <th rowspan="2"><?= $projectTrackingDetailModel->getAttributeLabel('ptd_step'); ?></th>
                    <th rowspan="2"><?= $projectTrackingDetailModel->getAttributeLabel('ptd_pic_code'); ?></th>
                    <th rowspan="2"><?= $projectTrackingDetailModel->getAttributeLabel('ptd_status'); ?></th>
                    <th colspan="3" class="text-center"><?= AppLabels::DATE; ?></th>
                    <th colspan="2" class="text-center"><?= AppLabels::PROGRESS; ?></th>
                    <th rowspan="2"><?= $projectTrackingDetailModel->getAttributeLabel('ptd_information'); ?></th>
                    <th rowspan="2"><?= AppLabels::DOCUMENTS; ?></th>
                </tr>
                <tr>
                    <th class="text-right"><?= $projectTrackingDetailModel->getAttributeLabel('ptd_duration'); ?></th>
                    <th><?= $projectTrackingDetailModel->getAttributeLabel('ptd_start_date'); ?></th>
                    <th><?= AppLabels::END_DATE; ?></th>
                    <th class="text-right">%</th>
                    <th class="text-right">% Acc.</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($model->projectTrackingDetails as $key => $projectTrackingDetail): ?>
                
                    <tr>
                        <td><?= $projectTrackingDetail->ptd_step; ?></td>
                        <td><?= $projectTrackingDetail->ptd_pic_code_desc; ?></td>
                        <td><?= $projectTrackingDetail->ptd_status_desc; ?></td>
                        <td class="text-right"><?= $projectTrackingDetail->ptd_duration; ?></td>
                        <td><?= $projectTrackingDetail->ptd_start_date; ?></td>
                        <td><?= $projectTrackingDetail->end_date; ?></td>
                        <td class="text-right" data-cell="A<?= $key; ?>"><?= $projectTrackingDetail->ptd_progress_percentage; ?></td>
                        <td class="text-right" data-cell="B<?= $key; ?>" data-formula="<?= $key > 0 ? sprintf('A%s+B%s', $key, --$key) : 'A' . $key; ?>"><?= $projectTrackingDetail->progress_accumulation; ?></td>
                        <td><?= $projectTrackingDetail->ptd_information; ?></td>
                        <td><?= Converter::attachments($projectTrackingDetail->attachmentOwners); ?></td>
                    </tr>
                
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="7" class="text-center"><?= AppLabels::PT_RESUME; ?></td>
                    <td class="text-right" data-cell="C0" data-format="<?= AppConstants::CALX_DATA_FORMAT_DEC; ?>" data-formula="<?= sprintf('B%s', count($model->projectTrackingDetails) - 1); ?>"></td>
                    <td colspan="2"></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'buttons' => [
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', '_ppId' => $model->power_plant_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', '_ppId' => $model->power_plant_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
