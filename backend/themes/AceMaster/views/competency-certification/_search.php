<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CompetencyCertificationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="competency-certification-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sector_id') ?>

    <?= $form->field($model, 'power_plant_id') ?>

    <?= $form->field($model, 'cc_name') ?>

    <?= $form->field($model, 'cc_position') ?>

    <?php // echo $form->field($model, 'cc_work_unit') ?>

    <?php // echo $form->field($model, 'cc_type') ?>

    <?php // echo $form->field($model, 'cc_number') ?>

    <?php // echo $form->field($model, 'cc_date') ?>

    <?php // echo $form->field($model, 'cc_certificate_publisher') ?>

    <?php // echo $form->field($model, 'cc_pjk3') ?>

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
