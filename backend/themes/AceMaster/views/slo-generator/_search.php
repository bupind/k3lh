<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SloGeneratorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slo-generator-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sector_id') ?>

    <?= $form->field($model, 'power_plant_id') ?>

    <?= $form->field($model, 'generator_unit') ?>

    <?= $form->field($model, 'power_installed') ?>

    <?php // echo $form->field($model, 'sg_year') ?>

    <?php // echo $form->field($model, 'generator_status') ?>

    <?php // echo $form->field($model, 'sg_number') ?>

    <?php // echo $form->field($model, 'sg_published') ?>

    <?php // echo $form->field($model, 'sg_end') ?>

    <?php // echo $form->field($model, 'sg_max_extension') ?>

    <?php // echo $form->field($model, 'sg_publisher') ?>

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
