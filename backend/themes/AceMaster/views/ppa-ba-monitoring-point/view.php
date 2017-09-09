<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaBaMonitoringPoint */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::MONITORING_POINT);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::PPA_BA, $model->ppaBa->getSummary()), 'url' => ['/ppa/update', 'id' => $model->ppaBa->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::MONITORING_POINT, 'url' => ['index', 'ppaBaId' => $model->ppaBa->id]];
$this->params['subtitle'] = $model->ppabamp_wastewater_source;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-ba-monitoring-point-view">

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
        <div class="col-xs-12 col-md-4">
            <h3 class="header smaller lighter green"><?= AppLabels::WASTE_WATER; ?></h3>
            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'order' => [
                        'ppa_ba_id',
                        'ppabamp_wastewater_source',
                        'ppabamp_monitoring_point_name',
                        'ppabamp_coord_lat',
                        'ppabamp_coord_long',
                    ],
                    'converter' => [
                        'ppa_ba_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppaBa->getSummary()],
                    ]
                ]
            ]); ?>
        </div>
        <div class="col-xs-12 col-md-3">
            <h3 class="header smaller lighter green"><?= AppLabels::PERMIT; ?></h3>
            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'order' => [
                        'ppabamp_document_name',
                        'ppabamp_permit_publisher',
                        'ppabamp_validation_date',
                    ]
                ]
            ]); ?>
        </div>
        <div class="col-xs-12 col-md-5">
            <h3 class="header smaller lighter green"><?= AppLabels::CERTIFIED_NUMBER_TEST_RESULT; ?></h3>
            <?php foreach ($model->ppaBaMonths as $ppaBaMonth): ?>
                <div class="col-xs-12 col-sm-4">
                    <div class="col-xs-12">
                        <label><strong><?= $ppaBaMonth->month_label; ?></strong></label>
                    </div>
                    <?= Converter::attachmentExtLink($ppaBaMonth->ppabam_cert_number, $ppaBaMonth->attachmentOwner, ['show_file_upload' => false, 'show_delete_file' => false]); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'buttons' => [
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', 'ppaBaId' => $model->ppa_ba_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', 'ppaBaId' => $model->ppa_ba_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
