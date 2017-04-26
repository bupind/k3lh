<?php

use yii\helpers\Html;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use app\components\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\EnvironmentPermit */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::ENVIRONMENT_PERMIT);
$this->params['subtitle'] = $model->getSummary();
$this->params['breadcrumbs'][] = ['label' => AppLabels::ENVIRONMENT_PERMIT, 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="environment-permit-view">

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
                <h3 class="header smaller lighter green"><?= AppLabels::ENVIRONMENT_PERMIT ?></h3>
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active">
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::DOCUMENT_VALIDATION, '#environment-permit-detail', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::REPORTING, '#environment-permit-report', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="environment-permit-detail" class="tab-pane fade active in">
                        <?= $this->render('_environment_permit_detail', ['model' => $model]); ?>
                    </div>
                    <div id="environment-permit-report" class="tab-pane fade">
                        <?= $this->render('_environment_permit_report', ['model' => $model]); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

