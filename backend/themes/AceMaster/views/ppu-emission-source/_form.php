<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitLinkButton;
use common\vendor\AppConstants;
use backend\models\Codeset;
use common\vendor\AppLabels;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuEmissionSource */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'id' => 'ppu-form',
    'options' => [
        'class' => 'form-horizontal',
        'role' => 'form',
        'enctype' => 'multipart/form-data'
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div',
        ]
    ]
]); ?>

<div class="col-xs-12 col-sm-6">
    <div class="widget-box">
        <div class="widget-header">
            <h4 class="widget-title"> <?= AppLabels::EMISSION_SOURCE ?> </h4>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <fieldset>
                    <?php
                    if($model->getIsNewRecord()){
                        echo Html::hiddenInput('ppu_id]', $ppuId);
                    }else {
                        echo $form->field($model, 'ppu_id', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->hiddenInput([])->label(false);
                    }

                    echo $form->field($model, 'ppues_name', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->textInput(['maxlength' => true, 'class' => 'form-control'])
                        ->label(null, ['class' => '']);

                    echo $form->field($model, 'ppues_capacity', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
                        ->label(null, ['class' => '']);

                    echo $form->field($model, 'ppues_control_device', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->textInput(['maxlength' => true, 'class' => 'form-control'])
                        ->label(null, ['class' => '']);

                    echo $form->field($model, 'ppues_operation_time', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
                        ->label(null, ['class' => '']);

                    echo $form->field($model, 'ppues_monitoring_data_status_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->dropDownList(Codeset::customMap(AppConstants::CODESET_NAME_MONITORING_DATA_STATUS_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                        ->label(null, ['class' => '']);

                    echo $form->field($model, 'ppues_freq_monitoring_obligation_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->dropDownList(Codeset::customMap(AppConstants::CODESET_NAME_FREQ_MONITORING_OBLIGATION_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                        ->label(null, ['class' => '']);

                    echo $form->field($model, 'ppues_ref', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->textarea(['class' => 'form-control'])
                        ->label(null, ['class' => '']);
                    ?>




                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="control-label">Bukti Pendukung Tidak Dipantau</label>
                                <?= Converter::attachment($model->attachmentOwner, ['show_file_upload' => true, 'show_delete_file' => true]); ?>
                        </div>
                    </div>

                </fieldset>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-6">
    <div class="widget-box">
        <div class="widget-header">
            <h4 class="widget-title"> <?= AppLabels::CHIMNEY ?> </h4>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <fieldset>
                    <div class="col-xs-12 col-sm-6">
                        <?php

                        echo $form->field($model, 'ppues_chimney_name', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppues_chimney_shape_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_NAME_CHIMNEY_SHAPE_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppues_chimney_height', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
                            ->label(null, ['class' => '']);
                        ?>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                    <?php
                    echo $form->field($model, 'ppues_chimney_diameter', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
                        ->label(null, ['class' => '']);

                    echo $form->field($model, 'ppues_hole_position', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
                        ->label(null, ['class' => '']);
                    ?>
                    </div>
                </fieldset>

            </div>
        </div>
    </div>
    <hr/>
</div>



<div class="col-xs-12 col-sm-3">
    <div class="widget-box">
        <div class="widget-header">
            <h4 class="widget-title"> <?= AppLabels::FUEL ?> </h4>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <fieldset>
                    <?php


                    echo $form->field($model, 'ppues_fuel_name_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->dropDownList(Codeset::customMap(AppConstants::CODESET_NAME_FUEL_NAME_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                        ->label(null, ['class' => '']);

                    echo $form->field($model, 'ppues_total_fuel', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
                        ->label(null, ['class' => '']);

                    echo $form->field($model, 'ppues_fuel_unit_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->dropDownList(Codeset::customMap(AppConstants::CODESET_NAME_FUEL_UNIT_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                        ->label(null, ['class' => '']);

                    ?>
                </fieldset>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-3">
    <div class="widget-box">
        <div class="widget-header">
            <h4 class="widget-title"> <?= AppLabels::LOCATION ?> </h4>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <fieldset>
                    <?php

                    echo $form->field($model, 'ppues_location', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->textInput(['maxlength' => true, 'class' => 'form-control uppercase'])
                        ->label(null, ['class' => '']);

                    echo $form->field($model, 'ppues_coord_ls', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->textInput(['maxlength' => true, 'class' => 'form-control uppercase'])
                        ->label(null, ['class' => '']);

                    echo $form->field($model, 'ppues_coord_bt', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->textInput(['maxlength' => true, 'class' => 'form-control uppercase'])
                        ->label(null, ['class' => '']);

                    ?>
                </fieldset>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 form-actions text-center">
        <?= SubmitLinkButton::widget(['formId' => 'smk3-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
