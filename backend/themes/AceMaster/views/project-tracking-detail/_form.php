<?php

use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use kartik\widgets\DatePicker;
use common\vendor\AppConstants;
use backend\models\Codeset;
use backend\assets\FileUploadAsset;
use common\components\helpers\Converter;

FileUploadAsset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectTrackingDetail */
/* @var $form yii\widgets\ActiveForm */
/* @var $projectTrackingModel \backend\models\ProjectTracking */

?>

<div class="project-tracking-detail-form">
    <div class="col-xs-12">
        <?php
        
        $form = ActiveForm::begin([
            'options' => [
                'id' => 'project-tracking-detail',
                'class' => 'form-horizontal calx',
                'role' => 'form',
                'enctype' => 'multipart/form-data'
            ]
        ]);

        echo $form->field($model, 'ptd_step', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'ptd_pic_code', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PROJECT_TRACKING_LIST), ['class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'ptd_status', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
            ->dropDownList(AppConstants::$openCloseList, ['class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'ptd_duration', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY . ' input-small'])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'ptd_start_date', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
            ->widget(
                DatePicker::className(), [
                    'model' => $model,
                    'attribute' => 'ptd_start_date',
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => AppConstants::FORMAT_DATE_DATEPICKER
                    ]
                ]
            )
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'ptd_progress_percentage')->hiddenInput(['data-cell' => 'A1', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC, 'data-formula' => 'A2'])->label(false)->error(false);
        echo $form->field($model, 'ptd_progress_percentage_display', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput([
                'maxlength' => true,
                'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY . ' input-small',
                'data-cell' => 'A2',
                'data-format' => AppConstants::CALX_DATA_FORMAT_DEC
            ])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'ptd_information', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        ?>
        
        <div class="form-group">
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
        
        <?php
        echo SubmitButton::widget(['backAction' => ['index', 'ptId' => $projectTrackingModel->id], 'isNewRecord' => $model->isNewRecord]);

        ActiveForm::end();
        ?>
    </div>

    

</div>
