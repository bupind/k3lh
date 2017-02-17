<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuEmissionSource */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppu-emission-source-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ppu_id')->textInput() ?>

    <?= $form->field($model, 'ppues_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppues_chimney_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppues_capacity')->textInput() ?>

    <?= $form->field($model, 'ppues_control_device')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppues_fuel_name_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppues_total_fuel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppues_fuel_unit_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppues_operation_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppues_location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppues_coord_ls')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppues_coord_bt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppues_chimney_shape_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppues_chimney_height')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppues_chimney_diameter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppues_hole_position')->textInput() ?>

    <?= $form->field($model, 'ppues_monitoring_data_status_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppues_freq_monitoring_obligation_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppues_ref')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
