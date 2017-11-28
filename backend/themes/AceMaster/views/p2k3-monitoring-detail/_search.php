<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\P2k3MonitoringDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2k3-monitoring-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'p2k3_monitoring_id') ?>

    <?= $form->field($model, 'pmd_finding') ?>

    <?= $form->field($model, 'pmd_action') ?>

    <?= $form->field($model, 'pmd_deadline') ?>

    <?php // echo $form->field($model, 'pmd_status') ?>

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
