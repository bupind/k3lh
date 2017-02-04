<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Smk3 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="smk3-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sector_id')->textInput() ?>

    <?= $form->field($model, 'power_plant_id')->textInput() ?>

    <?= $form->field($model, 'smk3_year')->textInput() ?>

    <?= $form->field($model, 'smk3_semester')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
