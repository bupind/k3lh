<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuaParameterObligationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppua-parameter-obligation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ppua_monitoring_point') ?>

    <?= $form->field($model, 'ppuapo_parameter_code') ?>

    <?= $form->field($model, 'ppuapo_qs') ?>

    <?= $form->field($model, 'ppuapo_qs_unit_code') ?>

    <?php // echo $form->field($model, 'ppuapo_qs_ref') ?>

    <?php // echo $form->field($model, 'ppuapo_qs_max_pollution_load') ?>

    <?php // echo $form->field($model, 'ppuapo_qs_load_unit_code') ?>

    <?php // echo $form->field($model, 'ppuapo_qs_max_pollution_load_ref') ?>

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
