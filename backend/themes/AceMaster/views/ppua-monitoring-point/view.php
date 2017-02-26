<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use app\components\ViewButton;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuaMonitoringPoint */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->ppua_monitoring_location);
$this->params['breadcrumbs'][] = ['label' => AppLabels::MONITORING_POINT, 'url' => ['index', 'ppuaId' => $model->ppu_ambient_id]];
$this->params['breadcrumbs'][] = ['label' => $model->ppua_monitoring_location];
?>
<div class="ppua-monitoring-point-view">

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

    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"> <?= AppLabels::EMISSION_SOURCE ?> </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => [
                            'excluded' => ['ppu_ambient_id'],
                            'converter' => [
                                'ppua_freq_monitoring_obligation_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppua_freq_monitoring_obligation_code_desc],
                                'ppua_monitoring_data_status_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppua_monitoring_data_status_code_desc],
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
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', 'ppuaId' => $model->ppu_ambient_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', 'ppuaId' => $model->ppu_ambient_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
