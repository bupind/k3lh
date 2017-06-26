<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectTrackingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-tracking-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sector_id') ?>

    <?= $form->field($model, 'power_plant_id') ?>

    <?= $form->field($model, 'pt_name') ?>

    <?= $form->field($model, 'pt_goal') ?>

    <?php // echo $form->field($model, 'pt_description') ?>

    <?php // echo $form->field($model, 'pt_owner_code') ?>

    <?php // echo $form->field($model, 'pt_report_period') ?>

    <?php // echo $form->field($model, 'pt_controller_code') ?>

    <?php // echo $form->field($model, 'pt_report_to_code') ?>

    <?php // echo $form->field($model, 'pt_estimated_project_value') ?>

    <?php // echo $form->field($model, 'pt_ao_no') ?>

    <?php // echo $form->field($model, 'pt_easy_impact') ?>

    <?php // echo $form->field($model, 'pt_support') ?>

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
