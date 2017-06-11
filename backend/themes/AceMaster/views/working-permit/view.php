<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\WorkingPermit */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::WORKING_PERMIT);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::FORM_WORKING_PERMIT, $model->powerPlant->getSummary()), 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['subtitle'] = $model->wp_registration_number;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="working-permit-view">

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
                    'order' => [
                        'wp_registration_number',
                        'wp_submit_date',
                        'wp_revision_number',
                        'wp_page',
                        'wp_work_type',
                        'wp_work_details',
                        'wp_work_location',
                        'wp_company_department',
                        'wp_leader_name',
                        'wp_leader_phone',
                        'wp_supervisor_name',
                        'wp_supervisor_phone',
                        'wp_start_date',
                        'wp_end_date',
                        'work_duration',
                        'wp_pln_noe',
                        'wp_outsource_noe',
                        'wp_job_classification',
                        'wp_k3_rules',
                        'wp_self_protection',
                        'wp_dangerous_work_type',
                    ],
                    'excluded' => [
                        'sector_id',
                        'power_plant_id'
                    ],
                    'extraAttributes' => [
                        'work_duration' => $model->work_duration
                    ],
                    'converter' => [
                        'wp_work_details' => [AppConstants::FORMAT_TYPE_VARIABLE, Yii::$app->formatter->asNtext($model->wp_work_details)],
                        'wp_pln_noe' => [AppConstants::FORMAT_TYPE_VARIABLE, !empty($model->wp_pln_noe) ? sprintf('%s %s', $model->wp_pln_noe, AppLabels::PERSONNEL) : ''],
                        'wp_outsource_noe' => [AppConstants::FORMAT_TYPE_VARIABLE, !empty($model->wp_outsource_noe) ? sprintf('%s %s', $model->wp_outsource_noe, AppLabels::PERSONNEL) : ''],
                        'wp_job_classification' => [AppConstants::FORMAT_TYPE_VARIABLE, Yii::$app->formatter->asHtml(join("<br />", $model->job_classification_text))],
                        'wp_k3_rules' => [AppConstants::FORMAT_TYPE_VARIABLE, Yii::$app->formatter->asHtml(join("<br />", $model->k3_rules_text))],
                        'wp_self_protection' => [AppConstants::FORMAT_TYPE_VARIABLE, Yii::$app->formatter->asHtml(join("<br />", $model->self_protection_text))],
                        'wp_dangerous_work_type' => [AppConstants::FORMAT_TYPE_VARIABLE, Yii::$app->formatter->asHtml(join("<br />", $model->dangerous_work_text))],
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
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', '_ppId' => $model->power_plant_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', '_ppId' => $model->power_plant_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
