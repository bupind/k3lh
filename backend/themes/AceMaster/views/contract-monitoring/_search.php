<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ContractMonitoringSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contract-monitoring-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sector_id') ?>

    <?= $form->field($model, 'power_plant_id') ?>

    <?= $form->field($model, 'cm_name') ?>

    <?= $form->field($model, 'cm_prk') ?>

    <?php // echo $form->field($model, 'cm_pagu') ?>

    <?php // echo $form->field($model, 'cm_aoai') ?>

    <?php // echo $form->field($model, 'cm_prog_status') ?>

    <?php // echo $form->field($model, 'cm_tor_rab_status') ?>

    <?php // echo $form->field($model, 'cm_tor_rab_date') ?>

    <?php // echo $form->field($model, 'cm_nd_number') ?>

    <?php // echo $form->field($model, 'cm_nd_date') ?>

    <?php // echo $form->field($model, 'cm_gm_status') ?>

    <?php // echo $form->field($model, 'cm_gm_date') ?>

    <?php // echo $form->field($model, 'cm_procure_receiver') ?>

    <?php // echo $form->field($model, 'cm_date') ?>

    <?php // echo $form->field($model, 'cm_method') ?>

    <?php // echo $form->field($model, 'cm_contr_number') ?>

    <?php // echo $form->field($model, 'cm_contr_start_date') ?>

    <?php // echo $form->field($model, 'cm_contr_end_date') ?>

    <?php // echo $form->field($model, 'cm_contr_value') ?>

    <?php // echo $form->field($model, 'cm_ref') ?>

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
