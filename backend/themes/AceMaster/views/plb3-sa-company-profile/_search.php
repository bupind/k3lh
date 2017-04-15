<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3SaCompanyProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plb3-sa-company-profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'plb3_self_assessment_id') ?>

    <?= $form->field($model, 'profile_name') ?>

    <?= $form->field($model, 'profile_activity_loc_address') ?>

    <?= $form->field($model, 'profile_phone_fax') ?>

    <?php // echo $form->field($model, 'profile_main_office_address') ?>

    <?php // echo $form->field($model, 'profile_holding_name') ?>

    <?php // echo $form->field($model, 'profile_holding_office_address') ?>

    <?php // echo $form->field($model, 'profile_holding_phone_fax') ?>

    <?php // echo $form->field($model, 'profile_company_established_year') ?>

    <?php // echo $form->field($model, 'profile_industry_field') ?>

    <?php // echo $form->field($model, 'profile_capital_status') ?>

    <?php // echo $form->field($model, 'profile_area_factory') ?>

    <?php // echo $form->field($model, 'profile_number_of_employees') ?>

    <?php // echo $form->field($model, 'profile_production_capacity_installed') ?>

    <?php // echo $form->field($model, 'profile_production_capacity_realization') ?>

    <?php // echo $form->field($model, 'profile_raw_material') ?>

    <?php // echo $form->field($model, 'profile_adjuvant_material') ?>

    <?php // echo $form->field($model, 'profile_production_process') ?>

    <?php // echo $form->field($model, 'profile_export_marketing_percentage') ?>

    <?php // echo $form->field($model, 'profile_local_marketing_percentage') ?>

    <?php // echo $form->field($model, 'profile_environment_document') ?>

    <?php // echo $form->field($model, 'profile_contacts_name') ?>

    <?php // echo $form->field($model, 'profile_contacts_mobile_phone') ?>

    <?php // echo $form->field($model, 'profile_contacts_email') ?>

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
