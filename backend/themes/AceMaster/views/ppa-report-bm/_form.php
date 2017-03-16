<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaReportBm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppa-report-bm-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ppa_setup_permit_id')->textInput() ?>

    <?= $form->field($model, 'ppar_param_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppar_param_unit_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppar_qs_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppar_qs_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppar_qs_unit_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppar_qs_ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppar_qs_max_pollution_load')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppar_qs_load_unit_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppar_qs_max_pollution_load_ref')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
