<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;
use backend\models\Codeset;
use common\vendor\AppLabels;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuEmissionSource */
/* @var $form yii\widgets\ActiveForm */
/* @var $ppuModel backend\models\Ppu */
/* @var $startDate DateTime */
/* @var $ppuMonthModels \backend\models\PpuesMonth[] */
?>

<?php $form = ActiveForm::begin([
    'id' => 'ppu-emission-source-form',
    'options' => [
        'class' => 'form-horizontal calx',
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
                        echo Html::hiddenInput('PpuEmissionSource[ppu_id]', $ppuModel->id);
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

                    echo $form->field($model, 'ppues_operation_time_display', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly','disabled' => true ,'data-cell' => 'AA1', 'data-formula' => "SUM(B0:B11)",'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                        ->label(null, ['class' => '']);

                    echo $form->field($model, 'ppues_operation_time')->hiddenInput(['data-cell' => 'A1', 'data-formula' => 'AA1', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);

                    echo $form->field($model, 'ppues_monitoring_data_status_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPU_ES_MONITORING_DATA_STATUS_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                        ->label(null, ['class' => '']);

                    echo $form->field($model, 'ppues_freq_monitoring_obligation_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPU_ES_FREQ_MONITORING_OBLIGATION_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                        ->label(null, ['class' => '']);

                    echo $form->field($model, 'ppues_ref', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->textarea(['class' => 'form-control'])
                        ->label(null, ['class' => '']);
                    ?>




                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="control-label"><?= AppLabels::UNMONITORED_EVIDENCE ?></label>
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
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPU_ES_CHIMNEY_SHAPE_CODE, 'cset_value'), ['class' => 'input-big form-control'])
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
                        ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPU_ES_FUEL_NAME_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                        ->label(null, ['class' => '']);

                    echo $form->field($model, 'ppues_total_fuel', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
                        ->label(null, ['class' => '']);

                    echo $form->field($model, 'ppues_fuel_unit_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                        ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPU_ES_FUEL_UNIT_CODE, 'cset_value'), ['class' => 'input-big form-control'])
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

<div class="col-xs-12 col-sm-12">
    <div class="widget-box">
        <div class="widget-header">
            <h4 class="widget-title"> <?= sprintf("%s %s", AppLabels::OPERATION_TIME, "(Kosongkan jika Status Data Pemantauan pada periode PROPER Tidak Dipantau)"); ?> </h4>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <fieldset>
                    <?php

                    foreach ($ppuMonthModels as $key => $ppuMonth) {

                        echo $form->field($ppuMonth, "[$key]ppuesm_month")->hiddenInput(['value' => $startDate->format('m')])->label(false);
                        echo $form->field($ppuMonth, "[$key]ppuesm_year")->hiddenInput(['value' => $startDate->format('Y')])->label(false);
                        if (!$model->getIsNewRecord()) {
                            echo $form->field($ppuMonth, "[$key]id")->hiddenInput()->label(false);
                            echo $form->field($ppuMonth, "[$key]ppuesm_operation_time", [
                                'template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE,
                                'options' => ['class' => 'col-xs-12 col-sm-4']
                            ])
                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => "B$key"])
                                ->label($startDate->format('M Y'), ['class' => '']);
                        }else {
                            echo $form->field($ppuMonth, "[$key]ppuesm_operation_time", [
                                'template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE,
                                'options' => ['class' => 'col-xs-12 col-sm-4']
                            ])
                                ->textInput(['maxlength' => true, 'value' => 0, 'class' => 'form-control numbersOnly', 'data-cell' => "B$key"])
                                ->label($startDate->format('M Y'), ['class' => '']);
                        }

                        $startDate->add(new \DateInterval('P1M'));
                    }

                    ?>
                </fieldset>

            </div>
        </div>
    </div>
</div>


<div class="col-xs-12">

    <?= SubmitButton::widget(['backAction' => ['index', 'ppuId' => $ppuModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
</div>
<?php ActiveForm::end(); ?>
