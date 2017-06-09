<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SloToolsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slo-tools-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sector_id') ?>

    <?= $form->field($model, 'power_plant_id') ?>

    <?= $form->field($model, 'st_generator_unit') ?>

    <?= $form->field($model, 'st_generator_location') ?>

    <?php // echo $form->field($model, 'st_generator_status') ?>

    <?php // echo $form->field($model, 'st_category') ?>

    <?php // echo $form->field($model, 'st_type') ?>

    <?php // echo $form->field($model, 'st_location') ?>

    <?php // echo $form->field($model, 'st_validation_number') ?>

    <?php // echo $form->field($model, 'st_published') ?>

    <?php // echo $form->field($model, 'st_check1') ?>

    <?php // echo $form->field($model, 'st_check2') ?>

    <?php // echo $form->field($model, 'st_next_check') ?>

    <?php // echo $form->field($model, 'st_certificate_publisher') ?>

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
