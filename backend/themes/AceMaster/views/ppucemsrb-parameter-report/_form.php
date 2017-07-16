<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\PpuEmissionSource;
use backend\models\Codeset;
use backend\assets\PpucemsrbParRepAsset;
use kartik\date\DatePicker;

PpucemsrbParRepAsset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\models\PpucemsrbParameterReport */
/* @var $form yii\widgets\ActiveForm */
/* @var $ppuModel backend\models\Ppu */
/* @var $parameterList backend\models\PpucemsReportBm[] */
?>

<?php $form = ActiveForm::begin([
    'id' => 'ppucemsrb-parameter-report-form',
    'options' => [
        'class' => 'form-horizontal calx',
        'role' => 'form',
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div',
        ]
    ]
]); ?>

<div class="ppucemsrb-parameter-report-form">
    <div class="col-xs-12 col-md-4 col-md-offset-4">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><?= AppLabels::QUALITY_STANDARD; ?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php
                            echo $form->field($model, 'ppu_emission_source_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->dropDownList(PpuEmissionSource::map(new PpuEmissionSource(), 'ppues_name',null,false, [
                                        'where' => [
                                                [ 'ppu_id' => $ppuModel->id]
                                        ]
                                ]), ['class' => 'ppu-emission-source-list ' . AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo $form->field($model, 'ppucems_report_bm_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->dropDownList($parameterList, ['id' => 'parameter-list', 'class' => 'ppucemsrb-parameter-list ' . AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                        ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-6">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><?= AppLabels::CONCENTRATE_TEST_RESULT; ?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <?php
                        echo $form->field($model, 'ppucemsrbpr_calc_date', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->widget(
                                DatePicker::className(), [
                                    'model' => $model,
                                    'attribute' => 'ppucemsrbpr_calc_date',
                                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => AppConstants::FORMAT_DATE_DATEPICKER,
                                        'todayHighlight' => true
                                    ]
                                ]
                            )
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppucemsrbpr_avg_concentration_display', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'AA1' , 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                            ->label(null, ['class' => '']);
                        echo $form->field($model, 'ppucemsrbpr_avg_concentration')->hiddenInput(['data-cell' => 'A1', 'data-formula' => 'AA1', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);

                        echo $form->field($model, 'ppucemsrbpr_calc_result_display', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'BB1' , 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                            ->label(null, ['class' => '']);
                        echo $form->field($model, 'ppucemsrbpr_calc_result')->hiddenInput(['data-cell' => 'B1', 'data-formula' => 'BB1', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);

                        echo $form->field($model, 'ppucemsrbpr_operation_time', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppucemsrbpr_qs_display', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'CC1' , 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                            ->label(null, ['class' => '']);
                        echo $form->field($model, 'ppucemsrbpr_qs')->hiddenInput(['data-cell' => 'C1', 'data-formula' => 'CC1', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);

                        echo $form->field($model, 'ppucemsrbpr_qs_unit_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPUCEMS_RBM_PARAM_REPORT_QS_UNIT_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppucemsrbpr_ref', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

                        ?>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-6">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><?= AppLabels::EMISSION_SOURCE; ?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name info-large"><?= sprintf("%s %s", AppLabels::CODE, AppLabels::CHIMNEY)?></div>
                            <div class="profile-info-value"><?= Html::label(null, null, ['id' => 'ppues_chimney_name', 'data-cell' => "D1", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC, 'data-formula' => "", 'class' => 'control-label'] ); ?></div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name info-large"><?= sprintf("%s %s (%s)", AppLabels::DIAMETER, AppLabels::CHIMNEY, AppLabels::M)?></div>
                            <div class="profile-info-value"><?= Html::label(null, null, ['id' => 'ppues_chimney_diameter', 'data-cell' => "D2", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC, 'data-formula' => "", 'class' => 'control-label'] ); ?></div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name info-large"><?= sprintf("%s (%s/%s) %s", AppLabels::POSITION, AppLabels::HEIGHT, AppLabels::LENGTH, AppLabels::SAMPLING_HOLE)?></div>
                            <div class="profile-info-value"><?= Html::label(null, null, ['id' => 'ppues_hole_position', 'data-cell' => "D3", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC, 'data-formula' => "", 'class' => 'control-label'] ); ?></div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name info-large"><?= sprintf("%s/%s %s (%s)", AppLabels::HEIGHT, AppLabels::LENGTH, AppLabels::CHIMNEY, AppLabels::M)?></div>
                            <div class="profile-info-value"><?= Html::label(null, null, ['id' => 'ppues_chimney_height', 'data-cell' => "D4", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC, 'data-formula' => "", 'class' => 'control-label'] ); ?></div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name info-large"><?= AppLabels::FUEL_NAME?></div>
                            <div class="profile-info-value"><?= Html::label(null, null, ['id' => 'ppues_fuel_name_code', 'data-cell' => "D4", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC, 'data-formula' => "", 'class' => 'control-label'] ); ?></div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name info-large"><?= sprintf("%s %s (%s)", AppLabels::CAPACITY, AppLabels::EMISSION_SOURCE, AppLabels::MW)?></div>
                            <div class="profile-info-value"><?= Html::label(null, null, ['id' => 'ppues_capacity', 'data-cell' => "D5", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC, 'data-formula' => "", 'class' => 'control-label'] ); ?></div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name info-large"><?= sprintf("%s (%s/%s)", AppLabels::OPERATION_TIME, AppLabels::HOUR, AppLabels::YEAR)?></div>
                            <div class="profile-info-value"><?= Html::label(null, null, ['id' => 'ppues_operation_time', 'data-cell' => "D6", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC, 'data-formula' => "", 'class' => 'control-label'] ); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', 'ppuId' => $ppuModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>


