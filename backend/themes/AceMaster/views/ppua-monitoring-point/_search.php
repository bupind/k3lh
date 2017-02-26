<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuaMonitoringPointSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppua-monitoring-point-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ppu_ambient_id') ?>

    <?= $form->field($model, 'ppua_monitoring_location') ?>

    <?= $form->field($model, 'ppua_code_location') ?>

    <?= $form->field($model, 'ppua_coord_latitude') ?>

    <?php // echo $form->field($model, 'ppua_coord_longitude') ?>

    <?php // echo $form->field($model, 'ppua_env_doc_name') ?>

    <?php // echo $form->field($model, 'ppua_institution') ?>

    <?php // echo $form->field($model, 'ppua_confirm_date') ?>

    <?php // echo $form->field($model, 'ppua_freq_monitoring_obligation_code') ?>

    <?php // echo $form->field($model, 'ppua_monitoring_data_status_code') ?>

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
