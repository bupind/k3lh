<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use backend\assets\EnvironmentPermitAsset;
use common\vendor\AppConstants;
use app\components\SubmitLinkButton;
use common\vendor\AppLabels;
use kartik\widgets\DatePicker;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\EnvironmentPermit */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $firstDetail backend\models\EnvironmentPermitDetail */

EnvironmentPermitAsset::register($this);
$baseUrl = Url::base();


?>

<?php
echo Html::hiddenInput('baseUrl', $baseUrl, ['id' => 'baseUrl']);
$form = ActiveForm::begin([
    'id' => 'environment-permit-form',
    'options' => [
        'class' => 'calx form-horizontal',
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

        echo $form->field($model, 'sector_id')->hiddenInput(['value' => $powerPlantModel->sector_id])->error(false)->label(false);
        echo $form->field($model, 'power_plant_id')->hiddenInput(['value' => $powerPlantModel->id])->error(false)->label(false);

        echo $form->field($model, 'ep_year', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'ep_quarter', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'ep_district', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => 'form-control'])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'ep_province', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => 'form-control'])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'ep_env_ministry', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => 'form-control'])
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
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php if($model->getIsNewRecord()){ ?>
                    <tr>
                        <td>1</td>
                        <td><?= Html::textInput("EnvironmentPermitDetail[1][ep_document_name]", null, [  'class' => 'form-control']); ?></td>
                        <td><?= Html::textInput("EnvironmentPermitDetail[1][ep_institution]", null, [  'class' => 'form-control']); ?></td>
                        <td>
                            <?= DatePicker::widget([
                                'name' => 'EnvironmentPermitDetail[1][ep_date]',
                                'id' => 'date1',
                                'type' => DatePicker::TYPE_INPUT,
                                'options' => ['placeholder' => AppLabels::DATE],
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => 'dd-mm-yyyy',
                                    'todayHighlight' => 'true'
                                ],
                            ])
                            ?>
                        </td>
                        <td>
                            <?= Html::hiddenInput("EnvironmentPermitDetail[1][ep_limit_capacity]", null, ['data-cell' => 'AA1', 'data-formula' => 'A1']); ?>
                            <?= Html::textInput("EnvironmentPermitDetail[1][ep_limit_capacity_display]", null, [ 'data-cell' => 'A1', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'class' => 'form-control']); ?></td>
                        <td>
                            <?= Html::hiddenInput("EnvironmentPermitDetail[1][ep_realization_capacity]", null, ['data-cell' => 'BB1', 'data-formula' => 'B1']); ?>
                            <?= Html::textInput("EnvironmentPermitDetail[1][ep_realization_capacity_display]", null, [ 'data-cell' => 'B1', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'class' => 'form-control']); ?></td>
                        <td><?= Converter::attachment($firstDetail->attachmentOwner, ['show_file_upload' => true, 'index' => 1]); ?></td>
                    </tr>
                <?php } else { ?>
                    <?php foreach ($model->environmentPermitDetails as $key => $detail): ?>
                        <tr>
                            <?= Html::activeHiddenInput($detail, "[$key]id"); ?>
                            <td><?= $key+1 ?></td>
                            <td><?= Html::activeTextInput($detail, "[$key]ep_document_name", [  'class' => 'form-control']); ?></td>
                            <td><?= Html::activeTextInput($detail, "[$key]ep_institution", [  'class' => 'form-control']); ?></td>
                            <td>
                                <?= DatePicker::widget([
                                    'model' => $detail,
                                    'attribute' => "[$key]ep_date",
                                    'id' => 'date1',
                                    'type' => DatePicker::TYPE_INPUT,
                                    'options' => ['placeholder' => AppLabels::DATE],
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => 'dd-mm-yyyy',
                                        'todayHighlight' => 'true'
                                    ],
                                ])
                                ?>
                            </td>
                            <td>
                                <?= Html::activeHiddenInput($detail, "[$key]ep_limit_capacity", ['data-cell' => "AA$key", 'data-format' => '0', 'data-formula' => "A$key"]); ?>
                                <?= Html::activeTextInput($detail, "[$key]ep_limit_capacity_display", ['data-cell' => "A$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'class' => 'form-control']); ?></td>
                            <td>
                                <?= Html::activeHiddenInput($detail, "[$key]ep_realization_capacity", ['data-cell' => "BB$key", 'data-format' => '0', 'data-formula' => "B$key"]); ?>
                                <?= Html::activeTextInput($detail, "[$key]ep_realization_capacity_display", ['data-cell' => "B$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'class' => 'form-control']); ?></td>
                            <td><?= Converter::attachment($detail->attachmentOwner, ['show_file_upload' => true, 'show_delete_file' => true, 'index' => $key]); ?></td>
                            <td><?= Html::button(AppLabels::BTN_DELETE, ['class' => 'btn btn-xs btn-pink btn-remove-ajax', 'data-id' => $detail->id, 'data-controller' => 'environment-permit-detail']); ?></td>
                        </tr>
                    <?php  endforeach; ?>
                <?php } ?>
            </tbody>

        </table>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-4 col-sm-offset-8">
        <label for="test" class="col-sm-3 control-label"><?= AppLabels::BTN_ADD ?></label>
        <?= Html::textInput('attr_text', null, ['id' => 'add', 'class' => 'col-sm-4']); ?>
        <?= Html::button('Go',['id' => 'addButton1', 'class' => 'addButtonClass btn btn-info btn-sm col-sm-2']); ?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 form-actions text-center">
        <?= SubmitLinkButton::widget(['formId' => 'environment-permit-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

