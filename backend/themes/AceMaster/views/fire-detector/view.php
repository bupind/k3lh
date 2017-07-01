<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use app\components\ViewButton;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\FireDetector */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->fd_location);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_FIRE_DETECTOR), 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;

$startDate = new \DateTime();
$startDate->setDate(2000, 1, 1);
?>
<div class="fire-detector-view">

    <div class="page-header">
        <h1>
            <?= Html::encode(sprintf("%s %s", sprintf("Form %s", AppLabels::FORM_FIRE_DETECTOR), $this->title)) ?>
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
                        'fd_form_month_type_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->fd_form_month_type_code_desc],
                        'fd_floor_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->fd_floor_code_desc],
                        'fd_detector_type_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->fd_detector_type_code_desc],
                        'fd_alarm_zone_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->fd_alarm_zone_code_desc],
                        'fd_installation' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->fd_installation_desc],
                        'fd_detector_physic' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->fd_detector_physic_desc],
                        'fd_wiring_condition' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->fd_wiring_condition_desc],
                        'fd_last_check' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->fd_last_check_desc],
                    ]
                ]
            ]);
            ?>
        </div>

        <div class="col-xs-12 col-md-6">
            <div class="col-xs-12">
                <h3 class="header smaller lighter green"><?= "Pengecekan Bulanan Berat vs Tekanan (KG/BAR)" ?></h3>
                <?php foreach ($model->fdDetails as $month): ?>
                    <div class="col-xs-12 col-sm-4">
                        <label><strong><?= $startDate->format('M'); ?></strong></label>
                        <p><?= $month->fdd_monthly_test_code_desc; ?></p>
                    </div>

                <?php $startDate->add(new \DateInterval('P1M')); endforeach; ?>
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
