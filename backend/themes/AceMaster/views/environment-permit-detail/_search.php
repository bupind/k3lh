<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EnvironmentPermitDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="environment-permit-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'environment_permit_id') ?>

    <?= $form->field($model, 'ep_document_name') ?>

    <?= $form->field($model, 'ep_institution') ?>

    <?= $form->field($model, 'ep_date') ?>

    <?php // echo $form->field($model, 'ep_limit_capacity') ?>

    <?php // echo $form->field($model, 'ep_realization_capacity') ?>

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
