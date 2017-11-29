<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\WorkAccidentDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="work-accident-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'work_accident_id') ?>

    <?= $form->field($model, 'wad_date') ?>

    <?= $form->field($model, 'wad_event') ?>

    <?= $form->field($model, 'wad_type') ?>

    <?php // echo $form->field($model, 'wad_work_area') ?>

    <?php // echo $form->field($model, 'wad_address') ?>

    <?php // echo $form->field($model, 'wad_impact_corp') ?>

    <?php // echo $form->field($model, 'wad_impact_indi') ?>

    <?php // echo $form->field($model, 'wad_chronology') ?>

    <?php // echo $form->field($model, 'wad_inv_date') ?>

    <?php // echo $form->field($model, 'wad_inv_team') ?>

    <?php // echo $form->field($model, 'wad_inv_k3_action') ?>

    <?php // echo $form->field($model, 'wad_inv_uns_condition') ?>

    <?php // echo $form->field($model, 'wad_inv_uns_action') ?>

    <?php // echo $form->field($model, 'wad_result') ?>

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
