<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LotoMonitoringSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loto-monitoring-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sector_id') ?>

    <?= $form->field($model, 'power_plant_id') ?>

    <?= $form->field($model, 'lm_key_name') ?>

    <?= $form->field($model, 'lm_permission_number') ?>

    <?php // echo $form->field($model, 'lm_tool_description') ?>

    <?php // echo $form->field($model, 'lm_tool_status') ?>

    <?php // echo $form->field($model, 'lm_open_date') ?>

    <?php // echo $form->field($model, 'lm_open_hour') ?>

    <?php // echo $form->field($model, 'lm_open_operation') ?>

    <?php // echo $form->field($model, 'lm_open_k3') ?>

    <?php // echo $form->field($model, 'lm_close_date') ?>

    <?php // echo $form->field($model, 'lm_close_hour') ?>

    <?php // echo $form->field($model, 'lm_close_operation') ?>

    <?php // echo $form->field($model, 'lm_close_k3') ?>

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
