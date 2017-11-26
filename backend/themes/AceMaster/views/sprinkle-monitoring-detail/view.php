<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use app\components\ViewButton;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\SprinkleMonitoringDetail */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->sm_location);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_K3_SUPERVISION_DETAIL), 'url' => ['index', '_ppId' => $model->sprinkleMonitoring->power_plant_id, 'smId' => $model->sprinkle_monitoring_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sprinkle-monitoring-detail-view">

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
                'options' => [
                    'converter' => [
                        'sm_sprinkle_head' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sm_sprinkle_head_desc],
                        'sm_detector' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sm_detector_desc],
                        'sm_piping_condition' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sm_piping_condition_desc],
                    ],
                ]
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
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', '_ppId' => $model->sprinkleMonitoring->power_plant_id, 'smId' => $model->sprinkle_monitoring_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', '_ppId' => $model->sprinkleMonitoring->power_plant_id, 'smId' => $model->sprinkle_monitoring_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                        'edit' => Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['update', '_ppId' => $model->sprinkleMonitoring->power_plant_id, 'id' => $model->id, 'smId' => $model->sprinkle_monitoring_id], ['class' => 'btn btn-white btn-info btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
