<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">
    
    <div class="col-xs-12">           
        <?php 
        
            $form = ActiveForm::begin([
                'options' => [
                    'class' => 'form-horizontal',
                    'role' => 'form'
                ]
            ]);
            
            echo $form->field($model, 'name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            
            echo $form->field($model, 'address', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            
            echo $form->field($model, 'phone', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            
            echo $form->field($model, 'salary', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            
            echo $form->field($model, 'commission', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            
            echo $form->field($model, 'joined_date', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_DATEPICKER, 'data-date-format' => AppConstants::FORMAT_DATE_DATEPICKER])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            
            echo SubmitButton::widget(['backAction' => 'index', 'isNewRecord' => $model->isNewRecord]);
            
            ActiveForm::end();
        
        ?>
    </div>

</div>
