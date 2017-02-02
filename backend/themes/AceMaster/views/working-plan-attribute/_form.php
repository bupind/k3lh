<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\WorkingPlanAttribute */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="working-plan-attribute-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'attr_type_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attr_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attr_parent_id')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
