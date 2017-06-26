<?php

use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use kartik\widgets\DatePicker;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\Codeset;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectTracking */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel \backend\models\PowerPlant */
?>

<div class="project-tracking-form">
    <div class="col-xs-12">
        <?php
        
        $form = ActiveForm::begin([
            'options' => [
                'class' => 'form-horizontal calx',
                'role' => 'form'
            ]
        ]);
        
        echo $form->field($model, 'pt_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        
        echo $form->field($model, 'pt_goal', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'pt_description', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textarea(['class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'pt_owner_code', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PROJECT_TRACKING_LIST), ['class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'pt_report_period', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
            ->widget(
                DatePicker::className(), [
                    'model' => $model,
                    'attribute' => 'pt_report_period',
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'startView' => 'year',
                        'minViewMode' => 'months',
                        'format' => 'mm-yyyy'
                    ]
                ]
            )
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'pt_controller_code', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PROJECT_TRACKING_LIST), ['class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'pt_report_to_code_array', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PROJECT_TRACKING_LIST), [
                'class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN,
                'multiple' => true,
                'data-placeholder' => AppLabels::PLEASE_SELECT
            ])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'pt_estimated_project_value')->hiddenInput(['data-cell' => 'A1', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN, 'data-formula' => 'A2'])->label(false)->error(false);
        echo $form->field($model, 'pt_estimated_project_value_display', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput([
                'maxlength' => true,
                'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY,
                'data-cell' => 'A2',
                'data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY
            ])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'pt_ao_no', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'pt_easy_impact', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
            ->dropDownList(AppConstants::$lowHighList, ['class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'pt_support', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        
        echo SubmitButton::widget(['backAction' => 'index', 'isNewRecord' => $model->isNewRecord]);
        
        ActiveForm::end();
        
        ?>
    </div>

</div>
