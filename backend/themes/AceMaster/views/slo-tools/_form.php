<?php

use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitButton;
use backend\models\Codeset;
use kartik\date\DatePicker;
use common\components\helpers\Converter;
use backend\assets\FileUploadAsset;
/* @var $this yii\web\View */
/* @var $model backend\models\SloTools */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel backend\models\PowerPlant */
FileUploadAsset::register($this);
?>
<?php
$form = ActiveForm::begin([
    'id' => 'slo-tools-form',
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

<div class="slo-tools-form">

    <div class="row">
        <div class="col-xs-12 col-md-8">
            <?php

            echo $form->field($model, 'sector_id')->hiddenInput(['value' => $powerPlantModel->sector_id])->error(false)->label(false);
            echo $form->field($model, 'power_plant_id')->hiddenInput(['value' => $powerPlantModel->id])->error(false)->label(false);

            echo $form->field($powerPlantModel->sector, 'sector_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['class' => 'form-control text-center', 'disabled' => true])
                ->label(AppLabels::SECTOR, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($powerPlantModel, 'pp_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['class' => 'form-control text-center', 'disabled' => true])
                ->label(AppLabels::POWER_PLANT, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "st_year", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "st_form_month_type_code", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->dropDownList(Codeset::customMap(AppConstants::CODESET_FORM_MONTH_TYPE_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "st_generator_unit", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "st_generator_location", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "st_generator_status", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->dropDownList(Codeset::customMap(AppConstants::CODESET_SLOT_GEN_STATUS_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "st_category", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->dropDownList(Codeset::customMap(AppConstants::CODESET_SLOT_CATEGORY_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "st_type", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "st_location", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "st_validation_number", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "st_certificate_publisher", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            ?>
            <label class="col-md-3 control-label no-padding-right"><?= $model->getAttributeLabel('files'); ?></label>
            <div class="col-md-9">
                <?= Converter::attachments($model->attachmentOwners, [
                    'show_file_upload' => true,
                    'show_delete_file' => true
                ]); ?>
                <span class="help-inline col-xs-12 col-md-7">
                        <span class="middle">
                            <div class="hint-block"><?= AppConstants::HINT_UPLOAD_FILES; ?></div>
                        </span>
                    </span>
            </div>
        </div>

        <div class="col-xs-12 col-md-4">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"><?= AppLabels::DATE; ?></h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <fieldset>
                            <?php

                            echo $form->field($model, 'st_published', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->widget(
                                    DatePicker::className(), [
                                        'model' => $model,
                                        'attribute' => 'st_published',
                                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd MM yyyy',
                                            'todayHighlight' => true
                                        ]
                                    ]
                                )
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo $form->field($model, 'st_check1', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->widget(
                                    DatePicker::className(), [
                                        'model' => $model,
                                        'attribute' => 'st_check1',
                                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd MM yyyy',
                                            'todayHighlight' => true
                                        ]
                                    ]
                                )
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo $form->field($model, 'st_check2', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->widget(
                                    DatePicker::className(), [
                                        'model' => $model,
                                        'attribute' => 'st_check2',
                                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd MM yyyy',
                                            'todayHighlight' => true
                                        ]
                                    ]
                                )
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo$form->field($model, "st_next_check", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->dropDownList(Codeset::customMap(AppConstants::CODESET_SLOT_NEXT_CHECK_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                            ?>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr/>

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', '_ppId' => $powerPlantModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>

</div>

<?php ActiveForm::end(); ?>
