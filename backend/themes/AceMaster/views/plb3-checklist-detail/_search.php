<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3ChecklistDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plb3-checklist-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'plb3_checklist_id') ?>

    <?= $form->field($model, 'plb3cd_form_type_code') ?>

    <?= $form->field($model, 'plb3cd_company_name') ?>

    <?= $form->field($model, 'plb3cd_industrial_sector') ?>

    <?php // echo $form->field($model, 'plb3cd_location') ?>

    <?php // echo $form->field($model, 'plb3cd_assessment_team') ?>

    <?php // echo $form->field($model, 'plb3cd_assessment_date') ?>

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
