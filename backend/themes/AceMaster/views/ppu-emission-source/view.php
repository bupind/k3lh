<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use app\components\ViewButton;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuEmissionSource */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->ppues_name);
$this->params['breadcrumbs'][] = ['label' => AppLabels::EMISSION_SOURCE_INVENTORY, 'url' => ['index', 'ppuId' => $model->ppu_id]];
$this->params['breadcrumbs'][] = ['label' => $model->ppues_name];
?>
<div class="ppu-emission-source-view">

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
                <h4 class="widget-title"> <?= AppLabels::EMISSION_SOURCE ?> </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => [
                            'extraAttributes' => ['ppues_attachment_owner' => Converter::attachment($model->attachmentOwner, [])],
                            'excluded' => ['ppu_id','ppues_chimney_name','ppues_chimney_shape_code','ppues_chimney_height','ppues_chimney_diameter','ppues_hole_position','ppues_fuel_name_code','ppues_total_fuel','ppues_fuel_unit_code','ppues_location','ppues_coord_ls', 'ppues_coord_bt'],
                            'converter' => [
                                'ppues_monitoring_data_status_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppues_monitoring_data_status_code_desc],
                                'ppues_freq_monitoring_obligation_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppues_freq_monitoring_obligation_code_desc],
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
                <h4 class="widget-title"> <?= AppLabels::CHIMNEY ?> </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => [
                            'excluded' => ['ppues_name','ppues_capacity','ppues_control_device','ppues_operation_time','ppues_monitoring_data_status_code','ppues_freq_monitoring_obligation_code','ppues_ref','ppu_id','ppues_fuel_name_code','ppues_total_fuel','ppues_fuel_unit_code','ppues_location','ppues_coord_ls', 'ppues_coord_bt'],
                            'converter' => [
                                'ppues_chimney_shape_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppues_chimney_shape_code_desc],
                            ]
                        ]
                    ]); ?>

                </div>
            </div>
        </div>
        <hr/>
    </div>



    <div class="col-xs-12 col-sm-3">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"> <?= AppLabels::FUEL ?> </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => [
                            'excluded' => ['ppues_name','ppues_capacity','ppues_control_device','ppues_operation_time','ppues_monitoring_data_status_code','ppues_freq_monitoring_obligation_code','ppues_ref','ppu_id','ppues_chimney_name','ppues_chimney_shape_code','ppues_chimney_height','ppues_chimney_diameter','ppues_hole_position','ppues_location','ppues_coord_ls', 'ppues_coord_bt'],
                            'converter' => [
                                'ppues_fuel_name_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppues_fuel_name_code_desc],
                                'ppues_fuel_unit_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppues_fuel_unit_code_desc],
                            ]
                        ]
                    ]); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-3">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"> <?= AppLabels::LOCATION ?> </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => [
                            'excluded' => ['ppues_name','ppues_capacity','ppues_control_device','ppues_operation_time','ppues_monitoring_data_status_code','ppues_freq_monitoring_obligation_code','ppues_ref','ppu_id','ppues_chimney_name','ppues_chimney_shape_code','ppues_chimney_height','ppues_chimney_diameter','ppues_hole_position','ppues_fuel_name_code','ppues_total_fuel','ppues_fuel_unit_code'],
                        ]
                    ]); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-12">
        <h3 class="header smaller lighter green"><?= AppLabels::OPERATION_TIME; ?></h3>
        <?php foreach ($model->ppuesMonths as $ppuMonth): ?>
            <div class="col-xs-12 col-sm-4">
                <label><strong><?= $ppuMonth->month_label; ?></strong></label>
                <p><?= $ppuMonth->ppuesm_operation_time; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'buttons' => [
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', 'ppuId' => $model->ppu_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', 'ppuId' => $model->ppu_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>

