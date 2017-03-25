<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaBaMonitoringPointSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppa-ba-monitoring-point-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ppa_ba_id') ?>

    <?= $form->field($model, 'ppabamp_wastewater_source') ?>

    <?= $form->field($model, 'ppabamp_monitoring_point_name') ?>

    <?= $form->field($model, 'ppabamp_coord_lat') ?>

    <?php // echo $form->field($model, 'ppabamp_coord_long') ?>

    <?php // echo $form->field($model, 'ppabamp_document_name') ?>

    <?php // echo $form->field($model, 'ppabamp_permit_publisher') ?>

    <?php // echo $form->field($model, 'ppabamp_validation_date') ?>

    <?php // echo $form->field($model, 'ppabamp_monitoring_frequency_code') ?>

    <?php // echo $form->field($model, 'ppabamp_monitoring_status_code') ?>

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
