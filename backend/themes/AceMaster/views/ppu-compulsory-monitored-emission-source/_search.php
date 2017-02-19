<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuCompulsoryMonitoredEmissionSourceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppu-compulsory-monitored-emission-source-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ppu_id') ?>

    <?= $form->field($model, 'ppucmes_name') ?>

    <?= $form->field($model, 'ppucmes_operation_time') ?>

    <?= $form->field($model, 'ppucmes_freq_monitoring_obligation_code') ?>

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
