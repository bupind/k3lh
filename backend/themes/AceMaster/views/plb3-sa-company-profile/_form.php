<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3SaCompanyProfile */
/* @var $form yii\widgets\ActiveForm */
/* @var $plb3SAModel \backend\models\Plb3SelfAssessment */
?>

<div class="row plb3-sa-company-profile-form">
    <div class="col-xs-12">
        <?php

        $form = ActiveForm::begin([
            'options' => [
                'class' => 'form-horizontal',
                'role' => 'form'
            ]
        ]);
        
        echo $form->field($model, 'plb3_self_assessment_id')->hiddenInput(['value' => $plb3SAModel->id])->label(false)->error(false);
        echo $form->field($model, 'profile_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_activity_loc_address', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textarea(['class' => AppConstants::ACTIVE_FORM_CLASS_TEXTAREA])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_phone_fax', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_main_office_address', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textarea(['class' => AppConstants::ACTIVE_FORM_CLASS_TEXTAREA])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_main_office_phone_fax', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_holding_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_holding_office_address', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textarea(['class' => AppConstants::ACTIVE_FORM_CLASS_TEXTAREA])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_holding_phone_fax', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_company_established_year', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_industry_field', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_capital_status', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_area_factory', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_number_of_employees', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_production_capacity_installed', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_production_capacity_realization', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_raw_material', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_adjuvant_material', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_production_process', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textarea(['class' => AppConstants::ACTIVE_FORM_CLASS_TEXTAREA])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_export_marketing_percentage', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_local_marketing_percentage', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_environment_document', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_contacts_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textarea(['class' => AppConstants::ACTIVE_FORM_CLASS_TEXTAREA])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_contacts_mobile_phone', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textarea(['class' => AppConstants::ACTIVE_FORM_CLASS_TEXTAREA])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'profile_contacts_email', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textarea(['class' => AppConstants::ACTIVE_FORM_CLASS_TEXTAREA])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        
        
        echo SubmitButton::widget(['backAction' => ['index', 'plb3SAId' => $plb3SAModel->id], 'isNewRecord' => $model->isNewRecord]);

        ActiveForm::end();
        
        ?>
    </div>
</div>
