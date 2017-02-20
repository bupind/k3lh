<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuParameterObligationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppu-parameter-obligation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ppu_emission_source_id') ?>

    <?= $form->field($model, 'ppupo_parameter_code') ?>

    <?= $form->field($model, 'ppupo_parameter_unit_code') ?>

    <?= $form->field($model, 'ppupo_qs') ?>

    <?php // echo $form->field($model, 'ppupo_qs_unit_code') ?>

    <?php // echo $form->field($model, 'ppupo_qs_ref') ?>

    <?php // echo $form->field($model, 'ppupo_qs_max_pollution_load') ?>

    <?php // echo $form->field($model, 'ppupo_qs_load_unit_code') ?>

    <?php // echo $form->field($model, 'ppupo_qs_max_pollution_load_ref') ?>

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
