<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MonitoringAparSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="monitoring-apar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sector_id') ?>

    <?= $form->field($model, 'power_plant_id') ?>

    <?= $form->field($model, 'ma_form_month_type_code') ?>

    <?= $form->field($model, 'ma_year') ?>

    <?php // echo $form->field($model, 'ma_location') ?>

    <?php // echo $form->field($model, 'ma_extinguish_media') ?>

    <?php // echo $form->field($model, 'ma_fire_rating') ?>

    <?php // echo $form->field($model, 'ma_weight') ?>

    <?php // echo $form->field($model, 'ma_working_pressure') ?>

    <?php // echo $form->field($model, 'ma_tube_condition_code') ?>

    <?php // echo $form->field($model, 'ma_nozzle_condition_code') ?>

    <?php // echo $form->field($model, 'ma_handle_condition_code') ?>

    <?php // echo $form->field($model, 'ma_pin_condition_code') ?>

    <?php // echo $form->field($model, 'ma_technical_triangle') ?>

    <?php // echo $form->field($model, 'ma_technical_ik') ?>

    <?php // echo $form->field($model, 'ma_technical_card') ?>

    <?php // echo $form->field($model, 'ma_technical_height') ?>

    <?php // echo $form->field($model, 'ma_technical_dis') ?>

    <?php // echo $form->field($model, 'ma_noting_date') ?>

    <?php // echo $form->field($model, 'ma_officer') ?>

    <?php // echo $form->field($model, 'ma_using_date') ?>

    <?php // echo $form->field($model, 'ma_activity') ?>

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
