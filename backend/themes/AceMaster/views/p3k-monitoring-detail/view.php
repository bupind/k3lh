<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use app\components\ViewButton;


/* @var $this yii\web\View */
/* @var $model backend\models\P3kMonitoringDetail */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->pmd_value);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_P3K_MONITORING_DETAIL), 'url' => ['index', '_ppId' => $model->p3kMonitoring->power_plant_id, 'pmId' => $model->p3k_monitoring_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p3k-monitoring-detail-view">

    <div class="page-header">
        <h1>
            <?= Html::encode(sprintf("%s", $this->title)) ?>
            <?php if (isset($this->params['subtitle'])): ?>
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <?= $this->params['subtitle']; ?>
                </small>
            <?php endif; ?>
        </h1>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">

            <?= DetailView::widget([
                'model' => $model,
            ]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'buttons' => [
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', '_ppId' => $model->p3kMonitoring->power_plant_id, 'pmId' => $model->p3k_monitoring_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', '_ppId' => $model->p3kMonitoring->power_plant_id, 'pmId' => $model->p3k_monitoring_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                        'edit' => Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['update', '_ppId' => $model->p3kMonitoring->power_plant_id, 'pmId' => $model->p3k_monitoring_id, 'id' => $model->id], ['class' => 'btn btn-white btn-info btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
