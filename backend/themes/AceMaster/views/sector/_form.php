<?php

use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\Sector */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row sector-form">
    <div class="col-xs-12">
        <?php
        $form = ActiveForm::begin([
            'options' => [
                'class' => 'form-horizontal',
                'role' => 'form'
            ]
        ]);

        echo $form->field($model, 'sector_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT, 'autofocus' => true])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        echo $form->field($model, 'sector_code', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT, 'autofocus' => true])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        
        echo SubmitButton::widget(['backAction' => 'index', 'isNewRecord' => $model->isNewRecord]);
        
        ActiveForm::end();
        
        ?>
    
    </div>
</div>
