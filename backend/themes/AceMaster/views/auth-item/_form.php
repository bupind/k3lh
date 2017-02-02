<?php

use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row auth-item-form">

    <div class="col-xs-12">                
        <?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'form-horizontal',
                'role' => 'form'
            ]
        ]); ?>
        
        <?php 
        
            echo $form->field($model, 'name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT, 'autofocus' => 'autofocus'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]); 
            
            echo $form->field($model, 'description', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                ->textarea(['rows' => 6, 'class' => AppConstants::ACTIVE_FORM_CLASS_TEXTAREA])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, 'type', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
                ->dropDownList([1 => 1, 2 => 2, 3 => 3], ['class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        
        ?>

        <?= SubmitButton::widget(['backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>

        <?php ActiveForm::end(); ?>
    </div>

</div>
