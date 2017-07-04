<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitButton;
use backend\models\Codeset;
use backend\assets\BeyondObedienceProgramAsset;
use yii\helpers\Url;
use common\components\helpers\Converter;
use backend\assets\FileUploadAsset;

/* @var $this yii\web\View */
/* @var $model backend\models\BeyondObedienceProgram */
/* @var $form yii\widgets\ActiveForm */
/* @var $bopt string */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $title string */
/* @var $detailModels backend\models\BopDetail[] */

BeyondObedienceProgramAsset::register($this);
FileUploadAsset::register($this);
$baseUrl = Url::base();

?>

<?php
echo Html::hiddenInput('baseUrl', $baseUrl, ['id' => 'baseUrl']);
$form = ActiveForm::begin([
    'id' => 'beyond-obedience-program-form',
    'options' => [
        'class' => 'calx form-horizontal',
        'role' => 'form',
        'enctype' => 'multipart/form-data',
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div'
        ]
    ]
]);
$index = 0;
?>
<div class="beyond-obedience-program-form">

    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <?php

            echo $form->field($model, 'bop_form_type_code')->hiddenInput(['value' => $bopt])->error(false)->label(false);
            echo $form->field($model, 'sector_id')->hiddenInput(['value' => $powerPlantModel->sector_id])->error(false)->label(false);
            echo $form->field($model, 'power_plant_id')->hiddenInput(['value' => $powerPlantModel->id])->error(false)->label(false);

            echo $form->field($powerPlantModel->sector, 'sector_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput([ 'class' => 'form-control text-center', 'disabled' => true])
                ->label(AppLabels::SECTOR, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($powerPlantModel, 'pp_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput([ 'class' =>  'form-control text-center', 'disabled' => true])
                ->label(AppLabels::POWER_PLANT, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, 'bop_year', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, 'bop_production_display', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'data-cell' => 'AA1', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, 'bop_production')->hiddenInput(['data-cell' => 'A1', 'data-formula' => 'AA1', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN])->label(false);
            ?>
            <label class="col-md-3 control-label no-padding-right"><?= $model->getAttributeLabel('files'); ?></label>
            <div class="col-md-9">
                <?= Converter::attachments($model->attachmentOwners, [
                    'show_file_upload' => true,
                    'show_delete_file' => true
                ]); ?>
                <span class="help-inline col-xs-12 col-md-7">
                        <span class="middle">
                            <div class="hint-block"><?= AppConstants::HINT_UPLOAD_FILES; ?></div>
                        </span>
                    </span>
            </div>
        </div>
    </div>

    <hr/>

    <div class="row">
        <table id="table-bop" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
                <tr>
                    <th class="center" width="2%">
                        <?= AppLabels::NUMBER_SHORT ?>
                    </th>
                    <th class="center" width="55%">
                        <?= sprintf("%s %s", AppLabels::PROGRAM, $title) ?>
                    </th>
                    <th class="center" width="15%">
                        <?= sprintf("%s %s %s", AppLabels::RESULT, AppLabels::ABSOLUTE, $title) ?>
                    </th>
                    <th class="center" width="10%">
                        <?= AppLabels::UNIT ?>
                    </th>
                    <th width="1%">

                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($detailModels as $keyD => $detail) : ?>
                    <tr>
                        <td class="center">
                            <?= $index + 1 ?>
                            <?php if (!$model->getIsNewRecord()) { ?>
                                <?= $form->field($detail, "[$keyD]id")->hiddenInput([])->label(false); ?>
                                <?= $form->field($detail, "[$keyD]beyond_obedience_program_id")->hiddenInput([])->label(false); ?>
                            <?php } ?>
                        </td>
                        <td>
                            <?= $form->field($detail, "[$keyD]bopd_program", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_PLAIN_NO_LABEL])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(false); ?>
                        </td>
                        <td>
                            <?= $form->field($detail, "[$keyD]bopd_result_display", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_PLAIN_NO_LABEL])
                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'data-cell' => "BB$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO])
                                ->label(false); ?>

                            <?=  $form->field($detail, "[$keyD]bopd_result")->hiddenInput(['data-cell' => "B$keyD", 'data-formula' => "BB$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN])->label(false); ?>
                        </td>
                        <td>
                            <?= $form->field($detail, "[$keyD]bopd_unit_code", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_PLAIN_NO_LABEL])
                                ->dropDownList(Codeset::customMap(AppConstants::CODESET_BOP_UNIT_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                                ->label(false); ?>
                        </td>

                        <?php if (!$model->getIsNewRecord()) { ?>
                            <td>
                                <?= Html::button(AppLabels::BTN_DELETE, ['class' => 'btn btn-xs btn-pink btn-remove-ajax', 'data-id' => $detail->id, 'data-controller' => 'bop-detail']); ?>
                            </td>
                        <?php } ?>
                    </tr>
                    <?php $index++; ?>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="center">
                        <?= sprintf("%s %s", AppLabels::TOTAL, $title) ?>
                    </td>
                    <td>
                        <?= Html::textInput("totalResult",null,[ "data-cell" => "Z1", "data-formula" => "SUM(B0:B999)", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO,'class' => 'form-control text-right', 'disabled' => true]) ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-4 col-sm-offset-8">
            <label for="test" class="col-sm-3 control-label"><?= AppLabels::BTN_ADD ?></label>
            <?= Html::textInput('attr_text', null, ['id' => 'add', 'class' => 'col-sm-4']); ?>
            <?= Html::button('Go',['id' => 'addButton', 'class' => 'btn btn-info btn-sm col-sm-2']); ?>
        </div>
    </div>

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', '_ppId' => $powerPlantModel->id, 'bopt' => $bopt], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>

</div>


<?php ActiveForm::end(); ?>
