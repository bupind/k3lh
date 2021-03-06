<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Ppa */
/* @var $startDate DateTime */
/* @var $questionGroups \backend\models\Codeset[] */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::WATER_POLLUTION_CONTROL);
$this->params['subtitle'] = $model->getSummary();
$this->params['breadcrumbs'][] = ['label' => AppLabels::WATER_POLLUTION_CONTROL, 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-view">

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
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active">
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::SETUP_POINT_PERMIT, '#setup-permit', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::BM_REPORT_PARAMETER, '#report-bm', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::TECHNICAL_PROVISION, '#technical-prov', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::POLLUTION_LOAD_DECREASE, '#poll-load', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::POLLUTION_LOAD_BM, '#poll-load-bm', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::POLLUTION_LOAD_ACTUAL, '#poll-load-actual', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="setup-permit" class="tab-pane fade active in">
                        <?= $this->render('_setup_permit', ['model' => $model, 'startDate' => clone $startDate]); ?>
                    </div>
                    <div id="report-bm" class="tab-pane fade">
                        <?= $this->render('_report_bm', ['model' => $model, 'startDate' => clone $startDate, 'startDateOutlet' => clone $startDate]); ?>
                    </div>
                    <div id="technical-prov" class="tab-pane fade">
                        <?= $this->render('_technical_provision', ['model' => $model, 'startDate' => clone $startDate, 'questionGroups' => $questionGroups]); ?>
                    </div>
                    <div id="poll-load" class="tab-pane fade">
                        <?= $this->render('_pollution_load_decrease', ['model' => $model, 'startDate' => clone $startDate]); ?>
                    </div>
                    <div id="poll-load-bm" class="tab-pane fade">
                        <?= $this->render('_pollution_load_bm', ['model' => $model, 'startDate' => clone $startDate]); ?>
                    </div>
                    <div id="poll-load-actual" class="tab-pane fade">
                        <?= $this->render('_pollution_load_actual', ['model' => $model, 'startDate' => clone $startDate]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'template' => AppConstants::VIEW_BUTTON_TEMPLATE_EXCEL,
                    'backAction' => sprintf('index?_ppId=%s', $model->power_plant_id)
                ]
            ]); ?>
        </div>
    </div>

</div>
