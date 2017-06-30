<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use kartik\widgets\DatePicker;
use kartik\widgets\DateTimePicker;
use backend\models\Codeset;
use common\components\helpers\Converter;
use backend\assets\FileUploadAsset;


/* @var $this yii\web\View */
/* @var $model backend\models\WorkingPermit */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel \backend\models\PowerPlant */
FileUploadAsset::register($this);
?>

<div class="row working-permit-form">
    <?php
    $form = ActiveForm::begin([
        'options' => [
            'class' => 'form-horizontal calx',
            'role' => 'form',
            'enctype' => 'multipart/form-data',
        ],
        'fieldConfig' => [
            'options' => [
                'tag' => 'div'
            ]
        ]
    ]);
    ?>

    <div class="col-xs-12 col-md-4">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><?= sprintf('%s %s', AppLabels::INFORMATION, AppLabels::WORKING_PERMIT); ?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php

                        echo $form->field($model, 'sector_id')->hiddenInput()->label(false)->error(false);
                        echo $form->field($model, 'power_plant_id')->hiddenInput()->label(false)->error(false);
                        echo $form->field($model, 'wp_registration_number', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'wp_submit_date', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->widget(
                                DatePicker::className(), [
                                    'model' => $model,
                                    'attribute' => 'wp_submit_date',
                                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => AppConstants::FORMAT_DATE_DATEPICKER,
                                        'todayHighlight' => true
                                    ]
                                ]
                            )
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'wp_revision_number', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'wp_page', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'wp_work_type', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'wp_work_details', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textarea(['class' => 'form-control'])
                            ->hint(AppConstants::HINT_ONE_PER_ROW)
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'wp_work_location', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'wp_company_department', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'wp_leader_name', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'wp_leader_phone', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'wp_supervisor_name', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'wp_supervisor_phone', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'wp_start_date', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->widget(
                                DateTimePicker::className(), [
                                    'model' => $model,
                                    'attribute' => 'wp_start_date',
                                    'options' => ['placeholder' => AppLabels::START_DATE],
                                    'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'maxView' => 'day',
                                        'startView' => 'month',
                                        'format' => 'dd-mm-yyyy hh:ii'
                                    ]
                                ]
                            )
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'wp_end_date', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->widget(
                                DateTimePicker::className(), [
                                    'model' => $model,
                                    'attribute' => 'wp_end_date',
                                    'options' => ['placeholder' => AppLabels::END_DATE],
                                    'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'maxView' => 'day',
                                        'startView' => 'month',
                                        'format' => 'dd-mm-yyyy hh:ii'
                                    ]
                                ]
                            )
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'wp_pln_noe', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'wp_outsource_noe', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
                            ->label(null, ['class' => '']);
                        
                        ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xs-12 col-md-8">
        <div class="row">
            <div class="col-xs-12">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title"><?= AppLabels::WP_JOB_CLASSIFICATION; ?></h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="form-group">
                                <?= Html::checkboxList('wp_job_classifications', null, Codeset::customMap(AppConstants::CODESET_WORKING_PERMIT_JOB_CLASSIFICATION, 'cset_value', [
                                    'empty' => false
                                ]), [
                                    'class' => 'control-group row',
                                    'item' => function ($index, $label, $name, $checked, $value) use ($model) {
                                        $checkbox = Html::checkbox($name, in_array($value, $model->job_classification_array), [
                                            'value' => $value,
                                            'class' => 'ace ace-checkbox-2',
                                            'label' => '<span class="lbl" for="' . $label . '"> ' . $label . '</span>',
                                        ]);
                                        
                                        if ($value == AppConstants::WP_JOB_CLASSIFICATION_OTHER) {
                                            $checkbox .= Html::textInput('wp_job_classifications[' . $value . ']', isset($model->job_classification_array[$value]) ? $model->job_classification_array[$value] : '', [
                                                'id' => $value,
                                                'class' => 'col-xs-10 col-xs-offset-1'
                                            ]);
                                        }
                                        
                                        return sprintf('<div class="checkbox col-sm-4">%s</div>', $checkbox);
                                    }
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        
        <div class="row">
            <div class="col-xs-12">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title"><?= AppLabels::WP_K3_RULES; ?></h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="form-group">
                                <?= Html::checkboxList('wp_k3_rules', null, Codeset::customMap(AppConstants::CODESET_WORKING_PERMIT_K3_RULES, 'cset_value', [
                                    'empty' => false
                                ]), [
                                    'class' => 'control-group row',
                                    'item' => function ($index, $label, $name, $checked, $value) use ($model) {
                                        $checkbox = Html::checkbox($name, in_array($value, $model->k3_rules_array), [
                                            'value' => $value,
                                            'class' => 'ace ace-checkbox-2',
                                            'label' => '<span class="lbl" for="' . $label . '"> ' . $label . '</span>',
                                        ]);
    
                                        if ($value == AppConstants::WP_K3_RULES_OTHER) {
                                            $checkbox .= Html::textInput('wp_k3_rules[' . $value . ']', isset($model->k3_rules_array[$value]) ? $model->k3_rules_array[$value] : '', [
                                                'id' => $value,
                                                'class' => 'col-xs-10 col-xs-offset-1'
                                            ]);
                                        }
                                        
                                        return sprintf('<div class="checkbox col-sm-6">%s</div>', $checkbox);
                                    }
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-xs-12">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title"><?= AppLabels::WP_SELF_PROTECTION; ?></h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="form-group">
                                <?= Html::checkboxList('wp_self_protections', null, Codeset::customMap(AppConstants::CODESET_WORKING_PERMIT_SELF_PROTECTION, 'cset_value', [
                                    'empty' => false
                                ]), [
                                    'class' => 'control-group row',
                                    'item' => function ($index, $label, $name, $checked, $value) use ($model) {
                                        $checkbox = Html::checkbox($name, in_array($value, $model->self_protection_array), [
                                            'value' => $value,
                                            'class' => 'ace ace-checkbox-2',
                                            'label' => '<span class="lbl" for="' . $label . '"> ' . $label . '</span>',
                                        ]);
                                    
                                        if (in_array($value, [AppConstants::WP_SELF_PROTECTION_OTHER, AppConstants::WP_SELF_PROTECTION_FIRE_TYPE])) {
                                            $checkbox .= Html::textInput('wp_self_protections[' . $value . ']', isset($model->self_protection_array[$value]) ? $model->self_protection_array[$value] : '', [
                                                'id' => $value,
                                                'class' => 'col-xs-10 col-xs-offset-1'
                                            ]);
                                        }
                                    
                                        return sprintf('<div class="checkbox col-sm-4">%s</div>', $checkbox);
                                    }
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-xs-12">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title"><?= AppLabels::WP_DANGEROUS_WORK_TYPE; ?></h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="form-group">
                                <?= Html::checkboxList('wp_dangerous_works', null, Codeset::customMap(AppConstants::CODESET_WORKING_PERMIT_DANGEROUS_WORK, 'cset_value', [
                                    'empty' => false
                                ]), [
                                    'class' => 'control-group row',
                                    'item' => function ($index, $label, $name, $checked, $value) use ($model) {
                                        $checkbox = Html::checkbox($name, in_array($value, $model->dangerous_work_array), [
                                            'value' => $value,
                                            'class' => 'ace ace-checkbox-2',
                                            'label' => '<span class="lbl" for="' . $label . '"> ' . $label . '</span>',
                                        ]);
                                    
                                        if (in_array($value, [AppConstants::WP_DANGEROUS_WORK_CRITICAL_AREA, AppConstants::WP_DANGEROUS_WORK_OHTER])) {
                                            $checkbox .= Html::textInput('wp_dangerous_works[' . $value . ']', isset($model->dangerous_work_array[$value]) ? $model->dangerous_work_array[$value] : '', [
                                                'id' => $value,
                                                'class' => 'col-xs-10 col-xs-offset-1'
                                            ]);
                                        }
                                    
                                        return sprintf('<div class="checkbox col-xs-6">%s</div>', $checkbox);
                                    }
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title"><?= AppLabels::FILES; ?></h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="form-group">
                                <div class="col-md-12">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', '_ppId' => $powerPlantModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
