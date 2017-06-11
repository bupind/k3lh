<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use app\components\ViewButton;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\MonitoringApar */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->ma_location);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_MONITORING_APAR), 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monitoring-apar-view">

    <div class="page-header">
        <h1>
            <?= Html::encode(sprintf("%s %s", sprintf("Form %s", AppLabels::FORM_IPN), $this->title)) ?>
            <?php if (isset($this->params['subtitle'])): ?>
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <?= $this->params['subtitle']; ?>
                </small>
            <?php endif; ?>
        </h1>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-6">

            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'converter' => [
                        'sector_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sector->sector_name],
                        'power_plant_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->powerPlant->pp_name],
                        'ma_form_month_type_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ma_form_month_type_code_desc],
                        'ma_tube_condition_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ma_tube_condition_desc],
                        'ma_handle_condition_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ma_handle_condition_desc],
                        'ma_nozzle_condition_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ma_nozzle_condition_desc],
                        'ma_pin_condition_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ma_pin_condition_desc],
                        'ma_technical_triangle' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ma_technical_triangle_desc],
                        'ma_technical_ik' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ma_technical_ik_desc],
                        'ma_technical_card' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ma_technical_card_desc],
                        'ma_technical_height' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ma_technical_height_desc],
                        'ma_technical_dis' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ma_technical_dis_desc],
                        'ma_fire_class' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ma_fire_class_desc],
                    ]
                ]
            ]);
            ?>
        </div>

        <div class="col-xs-12 col-md-6">
            <div class="col-xs-12">
                <h3 class="header smaller lighter green"><?= "Pengecekan Bulanan Berat vs Tekanan (KG/BAR)" ?></h3>
                <?php foreach ($model->maMonths as $month): ?>
                    <div class="col-xs-12 col-sm-4">
                        <label><strong><?= $month->month_label; ?></strong></label>
                        <p><?= $month->mam_value; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
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
                        'edit' => Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['update', '_ppId' => $model->power_plant_id, 'id' => $model->id], ['class' => 'btn btn-white btn-info btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
