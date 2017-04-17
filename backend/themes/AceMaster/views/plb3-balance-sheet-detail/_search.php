<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3BalanceSheetDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plb3-balance-sheet-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'form_type_code') ?>

    <?= $form->field($model, 'plb3_balance_sheet_id') ?>

    <?= $form->field($model, 'plb3_waste_type') ?>

    <?= $form->field($model, 'plb3_waste_source') ?>

    <?php // echo $form->field($model, 'plb3_waste_unit') ?>

    <?php // echo $form->field($model, 'plb3_previous_waste') ?>

    <?php // echo $form->field($model, 'plb3_ref') ?>

    <?php // echo $form->field($model, 'plb3_manifest_code') ?>

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
