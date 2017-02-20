<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuParameterObligation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppu-parameter-obligation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ppu_emission_source_id')->textInput() ?>

    <?= $form->field($model, 'ppupo_parameter_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppupo_parameter_unit_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppupo_qs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppupo_qs_unit_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppupo_qs_ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppupo_qs_max_pollution_load')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppupo_qs_load_unit_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppupo_qs_max_pollution_load_ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
