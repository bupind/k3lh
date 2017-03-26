<?php

use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaBaReportBm */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::BM_REPORT_PARAMETER);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::PPA_BA, $model->ppaBaMonitoringPoint->ppaBa->getSummary()), 'url' => ['/ppa-ba/update', 'id' => $model->ppaBaMonitoringPoint->ppaBa->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::BM_REPORT_PARAMETER, 'url' => ['index', 'ppaBaId' => $model->ppaBaMonitoringPoint->ppaBa->id]];
$this->params['subtitle'] = $model->ppabar_param_code_desc;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-ba-report-bm-view">

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
        <div class="col-xs-12 col-md-6">
            <h3 class="header smaller lighter green"><?= AppLabels::QUALITY_STANDARD; ?></h3>
            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'excluded' => ['ppabar_qs_2'],
                    'converter' => [
                        'ppa_ba_monitoring_point_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppaBaMonitoringPoint->ppabamp_monitoring_point_name],
                        'ppabar_param_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppabar_param_code_desc],
                        'ppabar_param_unit_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppabar_param_unit_code_desc],
                        'ppabar_qs_1' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppabar_param_code == AppConstants::PPA_RBM_PARAM_PH ? sprintf('%s | %s', $model->ppabar_qs_1, $model->ppabar_qs_2) : $model->ppabar_qs_1],
                        'ppabar_qs_unit_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppabar_qs_unit_code_desc],
                    ]
                ]
            ]); ?>
        </div>
        <div class="col-xs-12 col-md-6 calx">
            <h3 class="header smaller lighter green"><?= AppLabels::PPA_BA_CONCENTRATION_TITLE; ?></h3>
            <?php foreach ($model->ppaBaConcentrations as $ppaBaConcentration): ?>
                <div class="col-xs-12 col-sm-4">
                    <label><strong><?= $ppaBaConcentration->month_label; ?></strong></label>
                    <p data-format="0,0[.]000000000000"><?= $ppaBaConcentration->ppabac_value; ?></p>
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
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', 'ppaBaId' => $model->ppaBaMonitoringPoint->ppa_ba_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', 'ppaBaId' => $model->ppaBaMonitoringPoint->ppa_ba_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
