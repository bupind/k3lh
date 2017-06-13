<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\K3lProblemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="k3l-problem-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sector_id') ?>

    <?= $form->field($model, 'power_plant_id') ?>

    <?= $form->field($model, 'kp_problem_number') ?>

    <?= $form->field($model, 'kp_date') ?>

    <?php // echo $form->field($model, 'kp_problem_description') ?>

    <?php // echo $form->field($model, 'kp_mitigation_plan') ?>

    <?php // echo $form->field($model, 'kp_mitigation_dateline_date') ?>

    <?php // echo $form->field($model, 'kp_status_code') ?>

    <?php // echo $form->field($model, 'kp_progress') ?>

    <?php // echo $form->field($model, 'kp_description') ?>

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
