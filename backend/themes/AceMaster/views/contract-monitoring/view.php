<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use app\components\ViewButton;
use common\vendor\AppConstants;


/* @var $this yii\web\View */
/* @var $model backend\models\ContractMonitoring */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->cm_name);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_CONTRACT_MONITORING), 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-monitoring-view">

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
                        'sector_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sector->sector_name],
                        'power_plant_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->powerPlant->pp_name],
                        'cm_aoai' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->cm_aoai_desc],
                        'cm_prog_status' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->cm_prog_status_desc],
                        'cm_tor_rab_status' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->cm_tor_rab_status_desc],
                        'cm_gm_status' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->cm_gm_status_desc],
                        'cm_procure_receiver' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->cm_procure_receiver_desc],
                        'cm_method' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->cm_method_desc],
                        'cm_pagu' => [AppConstants::FORMAT_TYPE_VARIABLE, !empty($model->cm_pagu) ? number_format($model->cm_pagu) : ""],
                        'cm_contr_value' => [AppConstants::FORMAT_TYPE_VARIABLE, !empty($model->cm_contr_value) ? number_format($model->cm_contr_value) : ""],
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
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', '_ppId' => $model->power_plant_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', '_ppId' => $model->power_plant_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                        'edit' => Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['update', '_ppId' => $model->power_plant_id, 'id' => $model->id], ['class' => 'btn btn-white btn-info btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
