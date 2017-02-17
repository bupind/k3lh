<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaSetupPermit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppa-setup-permit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ppa_id')->textInput() ?>

    <?= $form->field($model, 'ppasp_wastewater_source')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppasp_setup_point_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppasp_coord_ls')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppasp_coord_bt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppasp_wastewater_tech_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppasp_permit_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppasp_permit_publisher')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ppasp_permit_publish_date')->textInput() ?>

    <?= $form->field($model, 'ppasp_permit_end_date')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
