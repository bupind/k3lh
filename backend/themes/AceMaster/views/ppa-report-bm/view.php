<?php

use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaReportBm */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::BM_REPORT_PARAMETER);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::PPA, $model->ppaSetupPermit->ppa->getSummary()), 'url' => ['/ppa/update', 'id' => $model->ppaSetupPermit->ppa->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::BM_REPORT_PARAMETER, 'url' => ['index', 'ppaId' => $model->ppaSetupPermit->ppa->id]];
$this->params['subtitle'] = $model->ppar_param_code_desc;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-report-bm-view">

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
                    'excluded' => ['ppar_qs_2'],
                    'converter' => [
                        'ppa_setup_permit_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppaSetupPermit->ppasp_setup_point_name],
                        'ppar_param_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppar_param_code_desc],
                        'ppar_param_unit_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppar_param_unit_code_desc],
                        'ppar_qs_1' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppar_param_code == AppConstants::PPA_RBM_PARAM_PH ? sprintf('%s | %s', $model->ppar_qs_1, $model->ppar_qs_2) : $model->ppar_qs_1],
                        'ppar_qs_unit_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppar_qs_unit_code_desc],
                        'ppar_qs_load_unit_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppar_qs_load_unit_code_desc],
                    ]
                ]
            ]); ?>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="header smaller lighter green"><?= AppLabels::INLET_CONCENTRATE_TITLE; ?></h3>
                    <?php foreach ($model->ppaInletOutlets as $ppaInlet): ?>
                        <div class="col-xs-12 col-sm-4">
                            <label><strong><?= $ppaInlet->month_label; ?></strong></label>
                            <p><?= $ppaInlet->ppaio_inlet_value; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="header smaller lighter green"><?= AppLabels::OUTLET_CONCENTRATE_TITLE; ?></h3>
                    <?php foreach ($model->ppaInletOutlets as $ppaOutlet): ?>
                        <div class="col-xs-12 col-sm-4">
                            <label><strong><?= $ppaOutlet->month_label; ?></strong></label>
                            <p><?= $ppaOutlet->ppaio_outlet_value; ?></p>
                        </div>
                    <?php endforeach; ?>
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
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', 'ppaId' => $model->ppaSetupPermit->ppa_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', 'ppaId' => $model->ppaSetupPermit->ppa_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
