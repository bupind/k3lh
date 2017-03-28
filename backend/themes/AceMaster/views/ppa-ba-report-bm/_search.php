<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaBaReportBmSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppa-ba-report-bm-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ppa_ba_monitoring_point_id') ?>

    <?= $form->field($model, 'ppabar_param_code') ?>

    <?= $form->field($model, 'ppabar_param_unit_code') ?>

    <?= $form->field($model, 'ppabar_qs_1') ?>

    <?php // echo $form->field($model, 'ppabar_qs_2') ?>

    <?php // echo $form->field($model, 'ppabar_qs_unit_code') ?>

    <?php // echo $form->field($model, 'ppabar_qs_ref') ?>

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
