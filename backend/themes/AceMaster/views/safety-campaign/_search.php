<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SafetyCampaignSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="safety-campaign-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sector_id') ?>

    <?= $form->field($model, 'power_plant_id') ?>

    <?= $form->field($model, 'sc_campaign_name') ?>

    <?= $form->field($model, 'sc_description') ?>

    <?php // echo $form->field($model, 'sc_date') ?>

    <?php // echo $form->field($model, 'sc_location') ?>

    <?php // echo $form->field($model, 'sc_campaigner') ?>

    <?php // echo $form->field($model, 'sc_part') ?>

    <?php // echo $form->field($model, 'sc_amount') ?>

    <?php // echo $form->field($model, 'sc_result') ?>

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
