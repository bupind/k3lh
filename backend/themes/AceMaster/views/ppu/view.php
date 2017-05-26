<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\PpuQuestion;

/* @var $this yii\web\View */
/* @var $model backend\models\Ppu */
/* @var $startDate DateTime */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::AIR_POLLUTION_CONTROL);
$this->params['subtitle'] = $model->getSummary();
$this->params['breadcrumbs'][] = ['label' => AppLabels::AIR_POLLUTION_CONTROL, 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;

$ppuQuestions = PpuQuestion::find()->all();
?>
<div class="ppu-view">

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
        <div class="col-xs-6 col-xs-offset-3">
            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'converter' => [
                        'sector_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sector->sector_name],
                        'power_plant_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->powerPlant->pp_name],
                    ]
                ]
            ]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="tabbable">
                <h3 class="header smaller lighter green"><?= sprintf("%s", AppLabels::PPU); ?></h3>
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active">
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::EMISSION_SOURCE_INVENTORY, '#emission-source-inventory', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::ADHERENCE ." ". AppLabels::BM_REPORT_PARAMETER, '#bm-report-parameter', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::EMISSION_LOAD_CALCULATION ." " . AppLabels::GRK, '#emission-load-calc-grk', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::TECHNICAL_PROVISION, '#technical-provision', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::POLLUTION_LOAD, '#pollution-load', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="emission-source-inventory" class="tab-pane fade active in">
                        <?= $this->render('_emission_source_inventory', ['model' => $model, 'startDate' => clone $startDate]); ?>
                    </div>
                    <div id="bm-report-parameter" class="tab-pane fade">
                        <?= $this->render('_bm_report_parameter', ['model' => $model, 'startDate' => clone $startDate]); ?>
                    </div>
                    <div id="emission-load-calc-grk" class="tab-pane fade">
                        <?= $this->render('_emission_load_calc_grk', ['model' => $model, 'startDate' => clone $startDate]); ?>
                    </div>
                    <div id="technical-provision" class="tab-pane fade">
                        <?= $this->render('_technical_provision', ['ppuQuestions' => $ppuQuestions, 'model' => $model, 'startDate' => clone $startDate]); ?>
                    </div>
                    <div id="pollution-load" class="tab-pane fade">
                        <?= $this->render('_pollution_load', ['model' => $model, 'startDate' => clone $startDate]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="tabbable">
                <h3 class="header smaller lighter green"><?= sprintf("%s %s", AppLabels::PPU, AppLabels::CEMS); ?></h3>
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active">
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::REPORT_BM_AND_CEMS, '#report-bm-cems', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' .  AppLabels::REPORT." ". AppLabels::PARAMETER, '#parameter-report', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' .  AppLabels::EMISSION_LOAD_CALCULATION, '#emission-load-calc', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="report-bm-cems" class="tab-pane fade active in">
                        <?= $this->render('_report_bm_cems', ['model' => $model, 'startDate' => clone $startDate]); ?>
                    </div>
                    <div id="parameter-report" class="tab-pane fade">
                        <?= $this->render('_parameter_report', ['model' => $model, 'startDate' => clone $startDate]); ?>
                    </div>
                    <div id="emission-load-calc" class="tab-pane fade">
                        <?= $this->render('_emission_load_calc', ['model' => $model, 'startDate' => clone $startDate]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget(['model' => $model]); ?>
        </div>
    </div>

</div>
