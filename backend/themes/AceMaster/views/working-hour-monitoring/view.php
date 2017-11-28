<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use app\components\ViewButton;
use common\vendor\AppConstants;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\WorkingHourMonitoring */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->worker_type_desc);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_WORK_HOUR_MONITORING), 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="working-hour-monitoring-view">

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
                        'worker_type' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->worker_type_desc],
                    ],
                ]
            ]);
            ?>
        </div>
    </div>

    <?php $form = ActiveForm::begin(['options' => [
        'class' => 'calx',
        'role' => 'form',
    ],]); ?>

    <div class="row">
        <?php foreach ($model->whmMonths as $key => $value) : ?>
            <div class="col-xs-12 col-md-4">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title"> <?= AppConstants::$monthsList[$key + 1] ?> </h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <fieldset>
                                <?php
                                echo $form->field($value, "[$key]whmm_month")->hiddenInput(['value' => ($key + 1)])->label(false);

                                echo $form->field($value, "[$key]whmm_quantity_display", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'readOnly' => true, 'data-cell' => "AA$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                                echo $form->field($value, "[$key]whmm_quantity")->hiddenInput(['data-cell' => "A$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC, 'data-formula' => "AA$key"])->label(false);

                                echo $form->field($value, "[$key]whmm_manhours", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control text-right', 'readOnly' => true, 'data-cell' => "B$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'data-formula' => "A$key*8"])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                $previousKey = $key - 1;
                                if ($key != 0) {
                                    echo $form->field($value, "[$key]whmm_manhours_accu", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                        ->textInput(['maxlength' => true, 'class' => 'form-control  text-right', 'readOnly' => true, 'data-cell' => "C$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'data-formula' => "B$key+C$previousKey"])
                                        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                                } else {
                                    echo $form->field($value, "[$key]whmm_manhours_accu", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                        ->textInput(['maxlength' => true, 'class' => 'form-control  text-right', 'readOnly' => true, 'data-cell' => "C$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'data-formula' => "B$key"])
                                        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                                }
                                ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php ActiveForm::end(); ?>

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
