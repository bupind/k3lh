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
/* @var $model backend\models\SafetyCampaign */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel backend\models\PowerPlant */
?>
<?php
$form = ActiveForm::begin([
    'id' => 'safety-campaign-form',
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

<div class="safety-campaign-form">

    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"><?= AppLabels::FORM_SAFETY_CAMPAIGN; ?></h4>
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


                            echo $form->field($model, 'sc_campaign_name', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(null, ['class' => '']);

                            ?>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"><?= "Pelaksanaan Kampanye"; ?></h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <fieldset>
                            <?php

                            echo $form->field($model, 'sc_description', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
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

                            echo $form->field($model, 'sc_date', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->label(null, ['class' => ''])
                                ->widget(
                                    DatePicker::className(), [
                                        'model' => $model,
                                        'attribute' => 'sc_date',
                                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd MM yyyy',
                                            'todayHighlight' => true
                                        ]
                                    ]
                                );

                            echo $form->field($model, 'sc_location', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(null, ['class' => '']);

                            echo $form->field($model, 'sc_campaigner', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(null, ['class' => '']);


                            ?>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-6">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"><?= "Sasaran Kampanye"; ?></h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <fieldset>
                            <?php

                            echo $form->field($model, 'sc_part', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(null, ['class' => '']);

                            echo $form->field($model, 'sc_amount_display', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'AA1', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                                ->label(null, ['class' => '']);

                            echo $form->field($model, 'sc_amount')->hiddenInput(['data-cell' => 'A1', 'data-formula' => 'AA1', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);


                            ?>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-6">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"><?= "Hasil dan Dokumentasi"; ?></h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <fieldset>
                            <?php
                            echo $form->field($model, 'sc_result', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
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

                            echo Html::label("Dokumentasi",null, null);
                            echo Converter::attachment($model->attachmentOwner, ['show_file_upload' => true, 'show_delete_file' => true]);

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