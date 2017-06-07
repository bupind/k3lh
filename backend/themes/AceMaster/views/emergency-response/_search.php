<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EmergencyResponseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emergency-response-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sector_id') ?>

    <?= $form->field($model, 'power_plant_id') ?>

    <?= $form->field($model, 'er_training_name') ?>

    <?= $form->field($model, 'er_participant') ?>

    <?php // echo $form->field($model, 'er_team') ?>

    <?php // echo $form->field($model, 'er_simulation_time') ?>

    <?php // echo $form->field($model, 'er_simulation_victim') ?>

    <?php // echo $form->field($model, 'er_simulation_loss') ?>

    <?php // echo $form->field($model, 'er_location') ?>

    <?php // echo $form->field($model, 'er_date') ?>

    <?php // echo $form->field($model, 'er_evaluation_time') ?>

    <?php // echo $form->field($model, 'er_evaluation_victim') ?>

    <?php // echo $form->field($model, 'er_evaluation_loss') ?>

    <?php // echo $form->field($model, 'er_failure_detail') ?>

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
