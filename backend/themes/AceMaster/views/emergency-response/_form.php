<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitButton;
use yii\redactor\widgets\Redactor;
use common\components\helpers\Converter;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\EmergencyResponse */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel backend\models\PowerPlant */

?>

<?php
$form = ActiveForm::begin([
    'id' => 'emergency-response-form',
    'options' => [
        'class' => 'calx form-horizontal',
        'role' => 'form',
        'enctype' => 'multipart/form-data',
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div'
        ]
    ]
]);
$index = 0;
?>

<div class="emergency-response-form">

    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"><?= AppLabels::FORM_EMERGENCY_RESPONSE; ?></h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <fieldset>
                            <?php
                                echo $form->field($model, 'sector_id')->hiddenInput(['value' => $powerPlantModel->sector_id])->error(false)->label(false);
                                echo $form->field($model, 'power_plant_id')->hiddenInput(['value' => $powerPlantModel->id])->error(false)->label(false);

                                echo $form->field($powerPlantModel->sector, 'sector_name', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                    ->textInput(['class' => 'form-control text-center', 'disabled' => true])
                                    ->label(AppLabels::SECTOR, ['class' => '']);

                                echo $form->field($powerPlantModel, 'pp_name', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                    ->textInput(['class' => 'form-control text-center', 'disabled' => true])
                                    ->label(AppLabels::POWER_PLANT, ['class' => '']);


                                echo $form->field($model, 'er_training_name', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                    ->label(null, ['class' => '']);

                                echo $form->field($model, 'er_participant', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'AA1', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                                    ->label(null, ['class' => '']);

                                echo $form->field($model, 'er_participant_display')->hiddenInput(['data-cell' => 'A1', 'data-formula' => 'AA1', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);

                                echo $form->field($model, 'er_team', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                    ->label(null, ['class' => '']);


                            ?>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"><?= "Target Simulasi"; ?></h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <fieldset>
                            <?php

                            echo $form->field($model, 'er_simulation_time_display', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'AA2', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                                ->label(null, ['class' => '']);

                            echo $form->field($model, 'er_simulation_time')->hiddenInput(['data-cell' => 'A2', 'data-formula' => 'AA2', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);

                            echo $form->field($model, 'er_simulation_victim_display', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'AA3', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                                ->label(null, ['class' => '']);

                            echo $form->field($model, 'er_simulation_victim')->hiddenInput(['data-cell' => 'A3', 'data-formula' => 'AA3', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);

                            echo $form->field($model, 'er_simulation_loss_display', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'AA4', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                                ->label(null, ['class' => '']);

                            echo $form->field($model, 'er_simulation_loss')->hiddenInput(['data-cell' => 'A4', 'data-formula' => 'AA4', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);


                            ?>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-4">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"><?= "Pelaksanaan"; ?></h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <fieldset>
                            <?php
                            echo $form->field($model, 'er_location', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(null, ['class' => '']);

                            echo $form->field($model, 'er_date', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->label(null, ['class' => ''])
                                ->widget(
                                    DatePicker::className(), [
                                        'model' => $model,
                                        'attribute' => 'er_date',
                                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd MM yyyy',
                                            'todayHighlight' => true
                                        ]
                                    ]
                                );

                            echo Html::label("Upload Skenario",null, null);
                            echo Converter::attachment($model->attachmentOwner, ['show_file_upload' => true, 'show_delete_file' => true]);

                            ?>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-4">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"><?= "Evaluasi"; ?></h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <fieldset>
                            <?php

                            echo $form->field($model, 'er_evaluation_time_display', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'AA5', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                                ->label(null, ['class' => '']);

                            echo $form->field($model, 'er_evaluation_time')->hiddenInput(['data-cell' => 'A5', 'data-formula' => 'AA5', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);

                            echo $form->field($model, 'er_evaluation_victim_display', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'AA6', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                                ->label(null, ['class' => '']);

                            echo $form->field($model, 'er_evaluation_victim')->hiddenInput(['data-cell' => 'A6', 'data-formula' => 'AA6', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);

                            echo $form->field($model, 'er_evaluation_loss_display', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'AA7', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                                ->label(null, ['class' => '']);

                            echo $form->field($model, 'er_evaluation_loss')->hiddenInput(['data-cell' => 'A7', 'data-formula' => 'AA7', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);

                            echo $form->field($model, 'er_failure_detail', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->widget(Redactor::className(), [
                                    'clientOptions' => [
                                        'imageUpload' => ['/redactor/upload/image'],
                                        'imageUploadCallback' => new \yii\web\JsExpression("
                                         function(image, json) {
                                            image.addClass('img-responsive')
                                           }
                                       "),
                                        'plugins' => ['imagemanager']
                                    ]
                                ])
                                ->label(null, ['class' => ""]);

                            ?>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', '_ppId' => $powerPlantModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>

</div>

<?php ActiveForm::end(); ?>
