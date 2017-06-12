<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FireDetectorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fire-detector-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sector_id') ?>

    <?= $form->field($model, 'power_plant_id') ?>

    <?= $form->field($model, 'fd_year') ?>

    <?= $form->field($model, 'fd_form_month_type_code') ?>

    <?php // echo $form->field($model, 'fd_floor_code') ?>

    <?php // echo $form->field($model, 'fd_location') ?>

    <?php // echo $form->field($model, 'fd_detector_type_code') ?>

    <?php // echo $form->field($model, 'fd_alarm_zone_code') ?>

    <?php // echo $form->field($model, 'fd_installation') ?>

    <?php // echo $form->field($model, 'fd_detector_physic') ?>

    <?php // echo $form->field($model, 'fd_wiring_condition') ?>

    <?php // echo $form->field($model, 'fd_last_check') ?>

    <?php // echo $form->field($model, 'fd_test_result_record') ?>

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
