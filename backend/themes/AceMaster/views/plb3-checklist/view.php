<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3Checklist */

$this->title = sprintf('%s %s %s', AppLabels::BTN_VIEW, AppLabels::CHECKLIST, AppLabels::WASTE);
$this->params['subtitle'] = $model->getSummary();
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s", AppLabels::CHECKLIST, AppLabels::WASTE), 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plb3-checklist-view">

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
                <h3 class="header smaller lighter green"><?= AppLabels::BALANCE_SHEET ?></h3>
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active">
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::CHECKLIST . " " . AppLabels::TPS . " di " . AppLabels::ASH_DISPOSAL, '#checklist-tps', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::CHECKLIST ." ". AppLabels::LANDFILL , '#checklist-landfill', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::CHECKLIST ." ". AppLabels::THIRDPARTY , '#checklist-pihak-ketiga', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="checklist-tps" class="tab-pane fade active in">
                        <?= $this->render('_checklist_detail_view', [ 'pct' => AppConstants::FORM_TYPE_TPS, 'model' => $model]); ?>
                    </div>
                    <div id="checklist-landfill" class="tab-pane fade">
                        <?= $this->render('_checklist_detail_view', [ 'pct' => AppConstants::FORM_TYPE_LF, 'model' => $model]); ?>
                    </div>
                    <div id="checklist-pihak-ketiga" class="tab-pane fade">
                        <?= $this->render('_checklist_detail_view', [ 'pct' => AppConstants::FORM_TYPE_PK, 'model' => $model]); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
