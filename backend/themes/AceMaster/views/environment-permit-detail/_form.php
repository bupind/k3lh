<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use kartik\widgets\DatePicker;
use common\components\helpers\Converter;
use app\components\SubmitButton;

/* @var $this yii\web\View */
/* @var $model backend\models\EnvironmentPermitDetail */
/* @var $form yii\widgets\ActiveForm */
/* @var $epModel backend\models\EnvironmentPermit */


$index = 0;
?>

<?php
$form = ActiveForm::begin([
    'id' => 'environment-permit-detail-form',
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
                        <td>
                            <?php
                            if ($model->getIsNewRecord()) {
                                echo $form->field($model, "environment_permit_id", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                    ->hiddenInput(['value' => $epModel->id])->label(false);
                            } else {
                                echo Html::activeHiddenInput($model, "id");
                                echo $form->field($model, "environment_permit_id", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                    ->hiddenInput([])->label(false);
                            }
                            ?>

                            <?= $index+1; ?>
                        </td>
                        <td>
                            <?= $form->field($model, "ep_document_name", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(false); ?>
                        </td>
                        <td>
                            <?= $form->field($model, "ep_institution", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(false); ?>
                        </td>
                        <td>
                            <?= DatePicker::widget([
                                'model' => $model,
                                'attribute' => "ep_date",
                                'type' => DatePicker::TYPE_INPUT,
                                'options' => ['placeholder' => AppLabels::DATE],
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => AppConstants::FORMAT_DATE_DATEPICKER,
                                    'todayHighlight' => 'true'
                                ],
                            ])
                            ?>
                        </td>
                        <td>
                            <?= $form->field($model, "ep_limit_capacity_display")
                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'data-cell' => "A1", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO])
                                ->label(false)->error(false) ?>

                            <?= $form->field($model, "ep_limit_capacity")->hiddenInput(['data-cell' => 'AA1', 'data-formula' => 'A1'])->label(false)->error(false); ?>
                        </td>
                        <td>
                            <?= $form->field($model, "ep_realization_capacity_display")
                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'data-cell' => "B1", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO])
                                ->label(false)->error(false) ?>

                            <?= $form->field($model, "ep_realization_capacity")->hiddenInput(['data-cell' => 'BB1', 'data-formula' => 'B1'])->label(false)->error(false); ?>
                        </td>
                        <td><?= Converter::attachment($model->attachmentOwner, ['show_file_upload' => true]); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12">
            <?= SubmitButton::widget(['backAction' => ['index', 'epId' => $epModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>