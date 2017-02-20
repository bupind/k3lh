<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use backend\models\Codeset;
use app\components\ViewButton;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuCompulsoryMonitoredEmissionSource */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->ppucmes_name);
$this->params['breadcrumbs'][] = ['label' => AppLabels::ADHERENCE_POINT, 'url' => ['index', 'ppuId' => $model->ppu_id]];
$this->params['breadcrumbs'][] = ['label' => $model->ppucmes_name];
?>
<div class="ppu-compulsory-monitored-emission-source-view">

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
            <h3 class="header smaller lighter green"><?= AppLabels::EMISSION_SOURCE; ?></h3>
            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'excluded' => ['ppu_id'],
                    'converter' => [
                        'ppucmes_freq_monitoring_obligation_code' => [AppConstants::FORMAT_TYPE_VARIABLE, Codeset::getCodesetValue(AppConstants::CODESET_NAME_FREQ_MONITORING_OBLIGATION_CODE, $model->ppucmes_freq_monitoring_obligation_code)]
                    ]
                ]
            ]); ?>
        </div>

        <div class="col-xs-12 col-md-6">
            <h3 class="header smaller lighter green"><?= AppLabels::OPERATION_TIME; ?></h3>
            <?php foreach ($model->ppucmesMonths as $ppuMonth): ?>
                <div class="col-xs-12 col-sm-4">
                    <label><strong><?= $ppuMonth->month_label; ?></strong></label>
                    <p><?= $ppuMonth->ppucmesm_operation_time; ?></p>
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
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', 'ppuId' => $model->ppu_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', 'ppuId' => $model->ppu_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
