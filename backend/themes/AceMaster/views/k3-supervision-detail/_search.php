<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\K3SupervisionDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="k3-supervision-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'k3_supervision_id') ?>

    <?= $form->field($model, 'ksd_date') ?>

    <?= $form->field($model, 'ksd_finding') ?>

    <?= $form->field($model, 'ksd_officer_action') ?>

    <?php // echo $form->field($model, 'ksd_response') ?>

    <?php // echo $form->field($model, 'ksd_finding_desc') ?>

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
