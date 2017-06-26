<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectTrackingDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-tracking-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'project_tracking_id') ?>

    <?= $form->field($model, 'ptd_step') ?>

    <?= $form->field($model, 'ptd_pic_code') ?>

    <?= $form->field($model, 'ptd_status') ?>

    <?php // echo $form->field($model, 'ptd_duration') ?>

    <?php // echo $form->field($model, 'ptd_start_date') ?>

    <?php // echo $form->field($model, 'ptd_progress_percentage') ?>

    <?php // echo $form->field($model, 'ptd_information') ?>

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
