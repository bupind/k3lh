<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitButton;
use backend\models\Codeset;
use backend\assets\BeyondObedienceComdevAsset;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\BeyondObedienceComdev */
/* @var $form yii\widgets\ActiveForm */
/* @var $boct string */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $title string */
/* @var $detailModels backend\models\BocDetail[] */

BeyondObedienceComdevAsset::register($this);
$baseUrl = Url::base();
?>
<?php
echo Html::hiddenInput('baseUrl', $baseUrl, ['id' => 'baseUrl']);
$form = ActiveForm::begin([
    'id' => 'beyond-obedience-comdev-form',
    'options' => [
        'class' => 'calx form-horizontal',
        'role' => 'form'
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div'
        ]
    ]
]);
$index = 0;
?>

<div class="beyond-obedience-comdev-form">

    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <?php

            echo $form->field($model, 'boc_form_type_code')->hiddenInput(['value' => $boct])->error(false)->label(false);
            echo $form->field($model, 'sector_id')->hiddenInput(['value' => $powerPlantModel->sector_id])->error(false)->label(false);
            echo $form->field($model, 'power_plant_id')->hiddenInput(['value' => $powerPlantModel->id])->error(false)->label(false);

            echo $form->field($powerPlantModel->sector, 'sector_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput([ 'class' => 'form-control text-center', 'disabled' => true])
                ->label(AppLabels::SECTOR, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($powerPlantModel, 'pp_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput([ 'class' =>  'form-control text-center', 'disabled' => true])
                ->label(AppLabels::POWER_PLANT, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, 'boc_year', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, 'boc_production_display', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'data-cell' => 'AA1', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, 'boc_production')->hiddenInput(['data-cell' => 'A1', 'data-formula' => 'AA1', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN])->label(false);
            ?>
        </div>
    </div>

    <hr/>

    <div class="row">
        <table id="table-boc" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
            <tr>
                <th class="center" >
                    <?= AppLabels::NUMBER_SHORT ?>
                </th>
                <th class="center" >
                    <?= sprintf("%s %s", AppLabels::PROGRAM, $title) ?>
                </th>

                <th class="center" >
                    <?= AppLabels::PUBLIC_INCOME ?>
                </th>
                <th class="center" >
                    <?= AppLabels::BOC_IMPACT ?>
                </th>
                <th class="center" >
                    <?= AppLabels::BOC_EFFORT ?>
                </th>
                <th class="center" >
                    <?= AppLabels::BOC_BUDGET ?>
                </th>

                <th class="center" >
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
                            <?= $form->field($detail, "[$keyD]beyond_obedience_comdev_id")->hiddenInput([])->label(false); ?>
                        <?php } ?>
                    </td>
                    <td>
                        <?= $form->field($detail, "[$keyD]bocd_program", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_PLAIN_NO_LABEL])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(false); ?>
                    </td>
                    <td>
                        <?= $form->field($detail, "[$keyD]bocd_public_income_display", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_PLAIN_NO_LABEL])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'data-cell' => "BB$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO])
                            ->label(false); ?>

                        <?=  $form->field($detail, "[$keyD]bocd_public_income")->hiddenInput(['data-cell' => "B$keyD", 'data-formula' => "BB$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN])->label(false); ?>
                    </td>
                    <td>
                        <?= $form->field($detail, "[$keyD]bocd_impact_display", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_PLAIN_NO_LABEL])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'data-cell' => "CC$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO])
                            ->label(false); ?>

                        <?=  $form->field($detail, "[$keyD]bocd_impact")->hiddenInput(['data-cell' => "C$keyD", 'data-formula' => "CC$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN])->label(false); ?>
                    </td>
                    <td>
                        <?= $form->field($detail, "[$keyD]bocd_effort_display", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_PLAIN_NO_LABEL])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'data-cell' => "DD$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO])
                            ->label(false); ?>

                        <?=  $form->field($detail, "[$keyD]bocd_effort")->hiddenInput(['data-cell' => "D$keyD", 'data-formula' => "DD$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN])->label(false); ?>
                    </td>
                    <td>
                        <?= $form->field($detail, "[$keyD]bocd_budget_display", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_PLAIN_NO_LABEL])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'data-cell' => "EE$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO])
                            ->label(false); ?>

                        <?=  $form->field($detail, "[$keyD]bocd_budget")->hiddenInput(['data-cell' => "E$keyD", 'data-formula' => "EE$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN])->label(false); ?>
                    </td>
                    <td>
                        <?= $form->field($detail, "[$keyD]bocd_unit_code", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_PLAIN_NO_LABEL])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_BOP_UNIT_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                            ->label(false); ?>
                    </td>

                    <?php if (!$model->getIsNewRecord()) { ?>
                        <td>
                            <?= Html::button(AppLabels::BTN_DELETE, ['class' => 'btn btn-xs btn-pink btn-remove-ajax', 'data-id' => $detail->id, 'data-controller' => 'boc-detail']); ?>
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
                    <?= Html::textInput("totalResultB",null,[ "data-cell" => "Z1", "data-formula" => "SUM(B0:B999)", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO,'class' => 'form-control text-right', 'disabled' => true]) ?>
                </td>
                <td>
                    <?= Html::textInput("totalResultC",null,[ "data-cell" => "Z2", "data-formula" => "SUM(C0:C999)", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO,'class' => 'form-control text-right', 'disabled' => true]) ?>
                </td>
                <td>
                    <?= Html::textInput("totalResultD",null,[ "data-cell" => "Z3", "data-formula" => "SUM(D0:D999)", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO,'class' => 'form-control text-right', 'disabled' => true]) ?>
                </td>
                <td>
                    <?= Html::textInput("totalResultE",null,[ "data-cell" => "Z4", "data-formula" => "SUM(E0:E999)", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO,'class' => 'form-control text-right', 'disabled' => true]) ?>
                </td>
                <td></td>
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
        <?= SubmitButton::widget(['backAction' => ['index', '_ppId' => $powerPlantModel->id, 'boct' => $boct], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>

</div>

<?php ActiveForm::end(); ?>
