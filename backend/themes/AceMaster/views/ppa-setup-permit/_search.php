<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaSetupPermitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppa-setup-permit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ppa_id') ?>

    <?= $form->field($model, 'ppasp_wastewater_source') ?>

    <?= $form->field($model, 'ppasp_setup_point_name') ?>

    <?= $form->field($model, 'ppasp_coord_ls') ?>

    <?php // echo $form->field($model, 'ppasp_coord_bt') ?>

    <?php // echo $form->field($model, 'ppasp_wastewater_tech_code') ?>

    <?php // echo $form->field($model, 'ppasp_permit_number') ?>

    <?php // echo $form->field($model, 'ppasp_permit_publisher') ?>

    <?php // echo $form->field($model, 'ppasp_permit_publish_date') ?>

    <?php // echo $form->field($model, 'ppasp_permit_end_date') ?>

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
