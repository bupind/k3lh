<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\K3SupervisionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="k3-supervision-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sector_id') ?>

    <?= $form->field($model, 'power_plant_id') ?>

    <?= $form->field($model, 'ks_name') ?>

    <?= $form->field($model, 'ks_permission_number') ?>

    <?php // echo $form->field($model, 'ks_operator') ?>

    <?php // echo $form->field($model, 'ks_duration_time') ?>

    <?php // echo $form->field($model, 'ks_start_date') ?>

    <?php // echo $form->field($model, 'ks_end_date') ?>

    <?php // echo $form->field($model, 'ks_contr_number') ?>

    <?php // echo $form->field($model, 'ks_fo_name') ?>

    <?php // echo $form->field($model, 'ks_fo_phone') ?>

    <?php // echo $form->field($model, 'ks_supervisor') ?>

    <?php // echo $form->field($model, 'ks_sheet_creator') ?>

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
