<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use backend\assets\EnvironmentPermitAsset;
use backend\models\Sector;
use common\vendor\AppConstants;
use app\components\SubmitLinkButton;
use common\vendor\AppLabels;
use yii\jui\DatePicker;
use common\components\helpers\Converter;
use backend\models\AttachmentOwner;

/* @var $this yii\web\View */
/* @var $model backend\models\EnvironmentPermit */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantList [backend\models\PowerPlant] */
/* @var $firstDetail backend\models\EnvironmentPermitDetail */

EnvironmentPermitAsset::register($this);
$baseUrl = Url::base();


?>

<?php
echo Html::hiddenInput('baseUrl', $baseUrl, ['id' => 'baseUrl']);
$form = ActiveForm::begin([
    'id' => 'environment-permit-form',
    'options' => [
        'class' => 'form-horizontal',
        'role' => 'form',
        'enctype' => 'multipart/form-data'
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div'
        ]
    ]
]);

?>

<div class="row environment-permit-form">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <?php

        echo $form->field($model, 'sector_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->dropDownList(Sector::map(new Sector(), 'sector_name'), ['class' => 'sector-list ' . AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'power_plant_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->dropDownList($powerPlantList, ['id' => 'power-plant-list', 'class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'ep_year', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'ep_quarter', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        ?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <table id="table-environment-permit" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">

            <thead>
                <tr>
                    <th><?= AppLabels::NUMBER_SHORT ?></th>
                    <th><?= sprintf("%s %s %s", AppLabels::NAME, AppLabels::DOCUMENTS, AppLabels::ENVIRONMENT_PERMIT) ?></th>
                    <th><?= sprintf("%s %s %s", AppLabels::INSTITUTION, AppLabels::VERIFICATION, AppLabels::ENVIRONMENT_PERMIT) ?></th>
                    <th><?= sprintf("%s %s %s %s", AppLabels::DATE, AppLabels::VERIFICATION, AppLabels::DOCUMENTS, AppLabels::ENVIRONMENT_PERMIT) ?></th>
                    <th><?= sprintf("%s %s", AppLabels::CAPACITY_LIMIT, AppLabels::PRODUCTION) ?></th>
                    <th><?= sprintf("%s %s", AppLabels::CAPACITY_REALIZATION, AppLabels::PRODUCTION) ?></th>
                    <th>Dampak penting yang dikelola</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td><?= Html::textInput("EnvironmentPermitDetail[0][ep_document_name]", null, [  'class' => 'form-control']); ?></td>
                    <td><?= Html::textInput("EnvironmentPermitDetail[0][ep_institution]", null, [  'class' => 'form-control']); ?></td>
                    <td>
                        <?= DatePicker::widget([
                            'name' => 'EnvironmentPermitDetail[0][ep_date]',
                            'clientOptions' => [
                                'format' => 'dd-mm-yyyy',
                                'autoclose' => 'true'
                            ],
                        ])
                        ?>
                    </td>
                    <td><?= Html::textInput("EnvironmentPermitDetail[0][ep_limit_capacity]", null, [  'class' => 'form-control']); ?></td>
                    <td><?= Html::textInput("EnvironmentPermitDetail[0][ep_realization_capacity]", null, [  'class' => 'form-control']); ?></td>
                    <td><?= Converter::attachment($firstDetail->attachmentOwner, ['show_file_upload' => true, 'show_delete_file' => true, 'index' => 0]); ?></td>
                </tr>
            </tbody>

        </table>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 form-actions text-center">
        <?= SubmitLinkButton::widget(['formId' => 'environment-permit-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

