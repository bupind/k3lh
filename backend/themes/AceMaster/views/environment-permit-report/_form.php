<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;
use app\components\SubmitButton;

/* @var $this yii\web\View */
/* @var $model backend\models\EnvironmentPermitReport */
/* @var $form yii\widgets\ActiveForm */
/* @var $epModel backend\models\EnvironmentPermit */
/* @var $districtModel backend\models\EnvironmentPermitDistrict[] */
/* @var $provinceModel backend\models\EnvironmentPermitProvince[] */
/* @var $ministryModel backend\models\EnvironmentPermitMinistry[] */


$index = 0;
?>

<?php
$form = ActiveForm::begin([
    'id' => 'environment-permit-report-form',
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
                    <th><?= AppLabels::QUARTER ?></th>
                    <th><?= AppLabels::DISTRICT?></th>
                    <th><?= AppLabels::PROVINCE?></th>
                    <th><?= AppLabels::ENVIRONMENT_MINISTRY ?></th>
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
                        <?= $form->field($model, "ep_quarter", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(false); ?>
                    </td>
                    <td>
                        <?php foreach ($districtModel as $keyD => $district) : ?>
                            <?= Html::hiddenInput("EnvironmentPermitDistrict[$keyD][index]", $index); ?>
                            <?php if (!$model->getIsNewRecord()) { ?>
                                <?= Html::activeHiddenInput($district, "[$keyD]id"); ?>
                                <?= $form->field($district, "[$keyD]environment_permit_report_id", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                    ->hiddenInput([])->label(false); ?>
                            <?php } ?>
                            <?= $form->field($district, "[$keyD]ep_district", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(false); ?>
                            <?= Converter::attachment($district->attachmentOwner, ['show_file_upload' => true, 'show_delete_file' => true, 'index' => $index]); ?>
                            <?php $index++; ?>
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <?php foreach ($provinceModel as $keyP => $province) : ?>
                            <?= Html::hiddenInput("EnvironmentPermitProvince[$keyP][index]", $index); ?>
                            <?php if (!$model->getIsNewRecord()) { ?>
                                <?= Html::activeHiddenInput($province, "[$keyP]id"); ?>
                                <?= $form->field($province, "[$keyP]environment_permit_report_id", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                    ->hiddenInput([])->label(false); ?>
                            <?php } ?>
                            <?= $form->field($province, "[$keyP]ep_province", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(false); ?>
                            <?= Converter::attachment($province->attachmentOwner, ['show_file_upload' => true, 'show_delete_file' => true, 'index' => $index]); ?>
                            <?php $index++; ?>
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <?php foreach ($ministryModel as $keyM => $ministry) : ?>
                            <?= Html::hiddenInput("EnvironmentPermitMinistry[$keyM][index]", $index); ?>
                            <?php if (!$model->getIsNewRecord()) { ?>
                                <?= Html::activeHiddenInput($ministry, "[$keyM]id"); ?>
                                <?= $form->field($ministry, "[$keyM]environment_permit_report_id", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                    ->hiddenInput([])->label(false); ?>
                            <?php } ?>
                            <?= $form->field($ministry, "[$keyM]ep_ministry", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(false); ?>
                            <?= Converter::attachment($ministry->attachmentOwner, ['show_file_upload' => true, 'show_delete_file' => true, 'index' => $index]); ?>
                            <?php $index++ ?>
                        <?php endforeach; ?>


                    </td>
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