<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ApdMonitoringSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apd-monitoring-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sector_id') ?>

    <?= $form->field($model, 'power_plant_id') ?>

    <?= $form->field($model, 'am_name') ?>

    <?= $form->field($model, 'am_type') ?>

    <?php // echo $form->field($model, 'am_brand') ?>

    <?php // echo $form->field($model, 'am_amount') ?>

    <?php // echo $form->field($model, 'am_location') ?>

    <?php // echo $form->field($model, 'am_good_value') ?>

    <?php // echo $form->field($model, 'am_bad_value') ?>

    <?php // echo $form->field($model, 'am_ref') ?>

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
