<?php

use yii\helpers\Html;
use app\components\ViewButton;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use app\components\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuaParameterObligation */

$this->title = sprintf("%s %s %s", AppLabels::BTN_VIEW, AppLabels::PARAMETER_OBLIGATION, $model->ppuaMonitoringPoint->ppua_monitoring_location);
$this->params['breadcrumbs'][] = ['label' => AppLabels::PARAMETER_OBLIGATION, 'url' => ['index', 'ppuaId' => $model->ppuaMonitoringPoint->ppu_ambient_id]];
$this->params['breadcrumbs'][] = ['label' => $model->ppuaMonitoringPoint->ppua_monitoring_location];
?>
<div class="ppua-parameter-obligation-view">

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
            <h3 class="header smaller lighter green"><?= AppLabels::PARAMETER_OBLIGATION; ?></h3>
            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'converter' => [
                        'ppua_monitoring_point_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppuaMonitoringPoint->ppua_monitoring_location],
                        'ppuapo_parameter_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppuapo_parameter_code_desc],
                        'ppuapo_qs_unit_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppuapo_qs_unit_code_desc],
                        'ppuapo_qs_load_unit_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppuapo_qs_load_unit_code_desc],
                    ]
                ]
            ]); ?>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="header smaller lighter green"><?= AppLabels::CONCENTRATE_TEST_RESULT; ?></h3>
                    <?php foreach ($model->ppuapoMonths as $poMonth): ?>
                        <div class="col-xs-12 col-sm-4">
                            <label><strong><?= $poMonth->month_label; ?></strong></label>
                            <p><?= $poMonth->ppuapom_value; ?></p>
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
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', 'ppuaId' => $model->ppuaMonitoringPoint->ppu_ambient_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', 'ppuaId' => $model->ppuaMonitoringPoint->ppu_ambient_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
