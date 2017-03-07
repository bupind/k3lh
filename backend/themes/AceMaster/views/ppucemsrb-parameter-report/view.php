<?php

use yii\helpers\Html;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use app\components\DetailView;
use app\components\ViewButton;
/* @var $this yii\web\View */
/* @var $model backend\models\PpucemsrbParameterReport */
/* @var $emissionSourceModel backend\models\PpuEmissionSource */

$this->title = sprintf('%s %s %s', AppLabels::BTN_VIEW, AppLabels::REPORT, AppLabels::PARAMETER);
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s", AppLabels::REPORT, AppLabels::PARAMETER), 'url' => ['index', 'ppuId' => $model->ppuEmissionSource->ppu_id]];
$this->params['breadcrumbs'][] = ['label' => $model->ppucemsReportBm->ppucemsrb_parameter_code_desc];
?>
<div class="ppucemsrb-parameter-report-view">

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



    <div class="col-xs-12 col-sm-6">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"> <?= sprintf("%s %s", AppLabels::REPORT, AppLabels::PARAMETER) ?> </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => [
                            'excluded' => ['ppucemsrbpr_month'],
                            'converter' => [
                                'ppu_emission_source_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppuEmissionSource->ppues_name],
                                'ppucems_report_bm_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppucemsReportBm->ppucemsrb_parameter_code_desc],
                                'ppucemsrbpr_qs_unit_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppucemsrbpr_qs_unit_code_desc],
                            ]
                        ]
                    ]); ?>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"> <?= sprintf("%s %s", AppLabels::REPORT, AppLabels::PARAMETER) ?> </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <?= DetailView::widget([
                        'model' => $emissionSourceModel,
                        'options' => [
                            'excluded' => ['ppu_id', 'ppues_control_device', 'ppues_total_fuel', 'ppues_fuel_unit_code', 'ppues_location', 'ppues_coord_ls', 'ppues_coord_bt', 'ppues_chimney_shape_code', 'ppues_monitoring_data_status_code', 'ppues_freq_monitoring_obligation_code', 'ppues_ref'],
                            'converter' => [
                                'ppues_fuel_name_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $emissionSourceModel->ppues_fuel_name_code_desc],
                            ]
                        ]
                    ]); ?>

                </div>
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
