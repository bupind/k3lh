<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MaturityLevelK3lQuestionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maturity-level-k3l-question-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'maturity_level_k3l_title_id') ?>

    <?= $form->field($model, 'q_action_plan') ?>

    <?= $form->field($model, 'q_criteria') ?>

    <?= $form->field($model, 'q_eviden') ?>

    <?php // echo $form->field($model, 'q_unit_code') ?>

    <?php // echo $form->field($model, 'q_weight') ?>

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
