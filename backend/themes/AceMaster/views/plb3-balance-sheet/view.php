<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3BalanceSheet */
/* @var $startDate DateTime */
/* @var $plb3bsdMonth backend\models\Plb3bsdMonth */

$this->title = sprintf('%s %s %s', AppLabels::BTN_VIEW, AppLabels::PERCENTAGE, AppLabels::BALANCE_SHEET);
$this->params['subtitle'] = $model->getSummary();
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s", AppLabels::PERCENTAGE, AppLabels::BALANCE_SHEET), 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plb3-balance-sheet-view">

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
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::LB3 . " " . AppLabels::DOMINANT . " di " . AppLabels::ASH_DISPOSAL, '#dominant-ash-disposal', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::LB3 ." ". AppLabels::NON ." ". AppLabels::DOMINANT ." ". AppLabels::WAREHOUSE ." ". AppLabels::LB3, '#non-dominant-warehouse', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="dominant-ash-disposal" class="tab-pane fade active in">
                        <?= $this->render('_balance_sheet_detail_view', ['plb3bsdMonth' => $plb3bsdMonth, 'bst' => AppConstants::FORM_TYPE_AD, 'model' => $model, 'startDate' => clone $startDate]); ?>
                    </div>
                    <div id="non-dominant-warehouse" class="tab-pane fade">
                        <?= $this->render('_balance_sheet_detail_view', ['plb3bsdMonth' => $plb3bsdMonth,'bst' => AppConstants::FORM_TYPE_GD, 'model' => $model, 'startDate' => clone $startDate]); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
