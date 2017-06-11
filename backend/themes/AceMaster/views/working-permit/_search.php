<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\WorkingPermitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="working-permit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sector_id') ?>

    <?= $form->field($model, 'power_plant_id') ?>

    <?= $form->field($model, 'wp_registration_number') ?>

    <?= $form->field($model, 'wp_submit_date') ?>

    <?php // echo $form->field($model, 'wp_revision_number') ?>

    <?php // echo $form->field($model, 'wp_page') ?>

    <?php // echo $form->field($model, 'wp_work_type') ?>

    <?php // echo $form->field($model, 'wp_work_details') ?>

    <?php // echo $form->field($model, 'wp_work_location') ?>

    <?php // echo $form->field($model, 'wp_company_department') ?>

    <?php // echo $form->field($model, 'wp_leader_name') ?>

    <?php // echo $form->field($model, 'wp_leader_phone') ?>

    <?php // echo $form->field($model, 'wp_supervisor_name') ?>

    <?php // echo $form->field($model, 'wp_supervisor_phone') ?>

    <?php // echo $form->field($model, 'wp_start_date') ?>

    <?php // echo $form->field($model, 'wp_end_date') ?>

    <?php // echo $form->field($model, 'wp_pln_noe') ?>

    <?php // echo $form->field($model, 'wp_outsource_noe') ?>

    <?php // echo $form->field($model, 'wp_job_classification') ?>

    <?php // echo $form->field($model, 'wp_k3_rules') ?>

    <?php // echo $form->field($model, 'wp_self_protection') ?>

    <?php // echo $form->field($model, 'wp_dangerous_work_type') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
