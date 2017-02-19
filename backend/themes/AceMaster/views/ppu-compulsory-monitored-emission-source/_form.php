<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuCompulsoryMonitoredEmissionSource */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppu-compulsory-monitored-emission-source-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ppu_id')->textInput() ?>

    <?= $form->field($model, 'ppucmes_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppucmes_operation_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppucmes_freq_monitoring_obligation_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
