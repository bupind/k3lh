<?php

use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\Codeset */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row codeset-form">
    <div class="col-xs-12">                
        <?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'form-horizontal',
                'role' => 'form'
            ]
        ]); ?>
        
        <?php 
        
            echo $form->field($model, 'cset_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_UPPERCASE])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]); 
            
            echo $form->field($model, 'cset_code', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_UPPERCASE])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]); 
            
            echo $form->field($model, 'cset_value', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]); 
            
            echo $form->field($model, 'cset_description', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                ->textarea(['rows' => 6, 'class' => AppConstants::ACTIVE_FORM_CLASS_TEXTAREA])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]); 
            
            echo $form->field($model, 'cset_parent_pk', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]); 
            
            echo $form->field($model, 'cset_order', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]); 
        
        ?>

        <?= SubmitButton::widget(['backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>
