<?php

use yii\helpers\Html;
use app\components\ViewButton;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use app\components\DetailView;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\PpucemsReportBm */

$this->title = sprintf("%s %s %s %s", AppLabels::BTN_VIEW, AppLabels::ADHERENCE, AppLabels::BM_REPORT_PARAMETER, AppLabels::CEMS);
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s %s", AppLabels::ADHERENCE, AppLabels::BM_REPORT_PARAMETER, AppLabels::CEMS), 'url' => ['index', 'ppuId' => $model->ppuEmissionSource->ppu_id]];
$this->params['breadcrumbs'][] = ['label' => $model->ppuEmissionSource->ppues_name];
?>
<div class="ppucems-report-bm-view">

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
    <div class="col-xs-12 col-md-4 col-md-offset-4">
        <h3 class="header smaller lighter green"><?= AppLabels::PARAMETER_OBLIGATION; ?></h3>
        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'excluded' => ['ppucemsrb_ref', 'ppucemsrb_sec_ref'],
                'converter' => [
                    'ppu_emission_source_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppuEmissionSource->ppues_name],
                    'ppucemsrb_parameter_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppucemsrb_parameter_code_desc],
                ]
            ]
        ]); ?>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="col-xs-12 col-md-6">
                <h3 class="header smaller lighter green"><?= AppLabels::PPUCEMSRB_LONG_CONST_1; ?></h3>
                <?php foreach ($model->ppucemsrbQuarters as $rbQuarter): ?>
                    <div class="col-xs-12 col-sm-3">
                        <label><strong><?= $rbQuarter->quarter_label; ?></strong></label>
                        <p><?= $rbQuarter->ppucemsrbq_value ?></p>
                        <p><?= sprintf("%s%%", $rbQuarter->ppucemsrbq_value_percent_view); ?></p>
                    </div>
                <?php endforeach; ?>
                <?= DetailView::widget([
                    'model' => $model,
                    'options' => [
                        'excluded' => ['ppu_emission_source_id', 'ppucemsrb_parameter_code', 'ppucemsrb_sec_ref'],
                    ]
                ]); ?>
            </div>

            <div class="col-xs-12 col-md-6">
                <h3 class="header smaller lighter green"><?= AppLabels::PPUCEMSRB_LONG_CONST_2; ?></h3>
                <?php foreach ($model->ppucemsrbQuarters as $rbQuarter): ?>
                    <div class="col-xs-12 col-sm-3">
                        <label><strong><?= $rbQuarter->quarter_label; ?></strong></label>
                        <p><?= $rbQuarter->ppucemsrbq_qs_value ?></p>
                        <p><?= sprintf("%s%%", $rbQuarter->ppucemsrbq_qs_value_percent_view); ?></p>
                    </div>
                <?php endforeach; ?>
                <?= DetailView::widget([
                    'model' => $model,
                    'options' => [
                        'extraAttributes' => ['ppucmes_report_bm_attachment_owner' => Converter::attachment($model->attachmentOwner, [])],
                        'excluded' => ['ppu_emission_source_id', 'ppucemsrb_parameter_code', 'ppucemsrb_ref', 'ppucemsrb_sec_ref'],
                    ]
                ]); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'buttons' => [
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', 'ppuId' => $model->ppuEmissionSource->ppu_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', 'ppuId' => $model->ppuEmissionSource->ppu_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
