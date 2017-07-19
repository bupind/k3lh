<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EnvironmentPermitCompanyProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="environment-permit-company-profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sector_id') ?>

    <?= $form->field($model, 'power_plant_id') ?>

    <?= $form->field($model, 'ep_profile_name') ?>

    <?= $form->field($model, 'ep_profile_activity_loc_address') ?>

    <?php // echo $form->field($model, 'ep_profile_phone_fax') ?>

    <?php // echo $form->field($model, 'ep_profile_main_office_address') ?>

    <?php // echo $form->field($model, 'ep_profile_holding_name') ?>

    <?php // echo $form->field($model, 'ep_profile_holding_office_address') ?>

    <?php // echo $form->field($model, 'ep_profile_holding_phone_fax') ?>

    <?php // echo $form->field($model, 'ep_profile_company_established_year') ?>

    <?php // echo $form->field($model, 'ep_profile_industry_field') ?>

    <?php // echo $form->field($model, 'ep_profile_capital_status') ?>

    <?php // echo $form->field($model, 'ep_profile_area_factory') ?>

    <?php // echo $form->field($model, 'ep_profile_number_of_employees') ?>

    <?php // echo $form->field($model, 'ep_profile_production_capacity_installed') ?>

    <?php // echo $form->field($model, 'ep_profile_production_capacity_realization') ?>

    <?php // echo $form->field($model, 'ep_profile_raw_material') ?>

    <?php // echo $form->field($model, 'ep_profile_adjuvant_material') ?>

    <?php // echo $form->field($model, 'ep_profile_production_process') ?>

    <?php // echo $form->field($model, 'ep_profile_export_marketing_percentage') ?>

    <?php // echo $form->field($model, 'ep_profile_local_marketing_percentage') ?>

    <?php // echo $form->field($model, 'ep_profile_environment_document') ?>

    <?php // echo $form->field($model, 'ep_profile_contacts_name') ?>

    <?php // echo $form->field($model, 'ep_profile_contacts_mobile_phone') ?>

    <?php // echo $form->field($model, 'ep_profile_contacts_email') ?>

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
