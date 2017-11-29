<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\WorkAccidentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="work-accident-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sector_id') ?>

    <?= $form->field($model, 'power_plant_id') ?>

    <?= $form->field($model, 'wa_date') ?>

    <?= $form->field($model, 'wa_event') ?>

    <?php // echo $form->field($model, 'wa_type') ?>

    <?php // echo $form->field($model, 'wa_work_area') ?>

    <?php // echo $form->field($model, 'wa_address') ?>

    <?php // echo $form->field($model, 'wa_impact_corp') ?>

    <?php // echo $form->field($model, 'wa_impact_indi') ?>

    <?php // echo $form->field($model, 'wa_chronology') ?>

    <?php // echo $form->field($model, 'wa_inv_date') ?>

    <?php // echo $form->field($model, 'wa_inv_team') ?>

    <?php // echo $form->field($model, 'wa_inv_k3_action') ?>

    <?php // echo $form->field($model, 'wa_inv_uns_condition') ?>

    <?php // echo $form->field($model, 'wa_inv_uns_action') ?>

    <?php // echo $form->field($model, 'wa_result') ?>

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
