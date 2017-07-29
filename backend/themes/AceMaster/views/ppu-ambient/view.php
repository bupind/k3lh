<?php


use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuAmbient */
/* @var $startDate DateTime */

$this->title = sprintf('%s %s %s', AppLabels::BTN_VIEW, AppLabels::AIR_POLLUTION_CONTROL, AppLabels::AMBIENT);
$this->params['subtitle'] = $model->getSummary();
$this->params['breadcrumbs'][] = ['label' => AppLabels::AIR_POLLUTION_CONTROL, 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-ambient-view">

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
                <h3 class="header smaller lighter green"><?= sprintf("%s %s", AppLabels::PPU, AppLabels::AMBIENT); ?></h3>
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active">
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::MONITORING_POINT, '#monitoring-point', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::ADHERENCE ." ". AppLabels::BM_REPORT_PARAMETER, '#bm-report-parameter', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="monitoring-point" class="tab-pane fade active in">
                        <?= $this->render('_monitoring_point_ambient', ['model' => $model, 'startDate' => clone $startDate]); ?>
                    </div>
                    <div id="bm-report-parameter" class="tab-pane fade">
                        <?= $this->render('_bm_report_parameter_ambient', ['model' => $model, 'startDate' => clone $startDate]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
