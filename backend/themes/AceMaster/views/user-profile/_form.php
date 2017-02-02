<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppLabels;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
    <div class="col-xs-12">
        <?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'form-horizontal',
                'role' => 'form'
            ],
        ]); ?>
    
        <?php
    
        echo Html::activeHiddenInput($model, 'employee_id');
    
        echo $form->field($employeeMdl, 'name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT, 'autofocus' => 'autofocus'])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
    
        echo $form->field($employeeMdl, 'address', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
    
        echo $form->field($employeeMdl, 'email', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
    
        echo $form->field($employeeMdl, 'phone', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
    
        echo $form->field($model, 'username', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'readonly' => !$model->isNewRecord, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
    
        echo $form->field($model, 'password', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3])
            ->hint(!$model->isNewRecord ? AppConstants::HINT_LEAVE_EMPTY : '');
    
        ?>

        <?= SubmitButton::widget(['backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>
