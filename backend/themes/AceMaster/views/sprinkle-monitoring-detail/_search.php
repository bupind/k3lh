<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SprinkleMonitoringDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sprinkle-monitoring-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sprinkle_monitoring_id') ?>

    <?= $form->field($model, 'sm_location') ?>

    <?= $form->field($model, 'sm_sprinkle_head') ?>

    <?= $form->field($model, 'sm_detector') ?>

    <?php // echo $form->field($model, 'sm_piping_condition') ?>

    <?php // echo $form->field($model, 'sm_notes') ?>

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
