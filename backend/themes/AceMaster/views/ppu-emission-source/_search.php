<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuEmissionSourceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppu-emission-source-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ppu_id') ?>

    <?= $form->field($model, 'ppues_name') ?>

    <?= $form->field($model, 'ppues_chimney_name') ?>

    <?= $form->field($model, 'ppues_capacity') ?>

    <?php // echo $form->field($model, 'ppues_control_device') ?>

    <?php // echo $form->field($model, 'ppues_fuel_name_code') ?>

    <?php // echo $form->field($model, 'ppues_total_fuel') ?>

    <?php // echo $form->field($model, 'ppues_fuel_unit_code') ?>

    <?php // echo $form->field($model, 'ppues_operation_time') ?>

    <?php // echo $form->field($model, 'ppues_location') ?>

    <?php // echo $form->field($model, 'ppues_coord_ls') ?>

    <?php // echo $form->field($model, 'ppues_coord_bt') ?>

    <?php // echo $form->field($model, 'ppues_chimney_shape_code') ?>

    <?php // echo $form->field($model, 'ppues_chimney_height') ?>

    <?php // echo $form->field($model, 'ppues_chimney_diameter') ?>

    <?php // echo $form->field($model, 'ppues_hole_position') ?>

    <?php // echo $form->field($model, 'ppues_monitoring_data_status_code') ?>

    <?php // echo $form->field($model, 'ppues_freq_monitoring_obligation_code') ?>

    <?php // echo $form->field($model, 'ppues_ref') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
