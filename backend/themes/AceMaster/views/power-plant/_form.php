<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;
use backend\models\Sector;

/* @var $this yii\web\View */
/* @var $model backend\models\PowerPlant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row power-plant-form">
    <div class="col-xs-12">
        <?php
        $form = ActiveForm::begin([
            'options' => [
                'class' => 'form-horizontal',
                'role' => 'form'
            ]
        ]);
        
        echo $form->field($model, 'sector_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
            ->dropDownList(Sector::map(new Sector(), 'sector_name'), ['class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'pp_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        
        echo SubmitButton::widget(['backAction' => 'index', 'isNewRecord' => $model->isNewRecord]);
        
        ActiveForm::end();
        
        ?>
    
    </div>
</div>
