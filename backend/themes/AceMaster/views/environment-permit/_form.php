<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EnvironmentPermit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="environment-permit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sector_id')->textInput() ?>

    <?= $form->field($model, 'power_plant_id')->textInput() ?>

    <?= $form->field($model, 'ep_year')->textInput() ?>

    <?= $form->field($model, 'ep_quarter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
