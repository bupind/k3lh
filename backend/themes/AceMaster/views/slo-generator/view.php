<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\SloGenerator */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->generator_unit);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_SLO_GENERATOR), 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slo-generator-view">

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
                        'generator_status' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->generator_status_desc],
                        'sg_form_month_type_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sg_form_month_type_code_desc],
                        'sg_machine_brand' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sg_machine_brand_desc],
                        'sg_generator_brand' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sg_generator_brand_desc],
                        'sg_boiler_brand' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sg_boiler_brand_desc],
                    ],
                    'extraAttributes' => [
                        'files' => Converter::attachments($model->attachmentOwners)
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
