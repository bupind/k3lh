<?php

use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use app\components\SubmitButton;

/* @var $this yii\web\View */
/* @var $model backend\models\MaturityLevelK3lTitle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row maturity-level-k3l-title-form">
    <div class="col-xs-12">
        <?php
        $form = ActiveForm::begin([
            'options' => [
                'class' => 'form-horizontal',
                'role' => 'form'
            ]
        ]);

        echo $form->field($model, 'title_text', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_UPPERCASE])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo SubmitButton::widget(['backAction' => 'index', 'isNewRecord' => $model->isNewRecord]);

        ActiveForm::end();

        ?>
    </div>
</div>
