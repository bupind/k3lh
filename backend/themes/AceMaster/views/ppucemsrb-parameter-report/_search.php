<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PpucemsrbParameterReportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppucemsrb-parameter-report-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ppucems_report_bm_id') ?>

    <?= $form->field($model, 'ppucemsrbpr_quarter') ?>

    <?= $form->field($model, 'ppucemsrbpr_calc_date') ?>

    <?= $form->field($model, 'ppucemsrbpr_avg_concentration') ?>

    <?php // echo $form->field($model, 'ppucemsrbpr_calc_result') ?>

    <?php // echo $form->field($model, 'ppucemsrbpr_operation_time') ?>

    <?php // echo $form->field($model, 'ppucemsrbpr_qs') ?>

    <?php // echo $form->field($model, 'ppucemsrbpr_qs_unit_code') ?>

    <?php // echo $form->field($model, 'ppucemsrbpr_ref') ?>

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
