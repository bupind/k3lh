<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use backend\assets\BudgetmonitoringAsset;
use backend\models\Sector;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitLinkButton;


BudgetmonitoringAsset::register($this);
$baseUrl = Url::base();

/* @var $this yii\web\View */
/* @var $model backend\models\BudgetMonitoring */
/* @var $form yii\widgets\ActiveForm */
/* @var $model backend\models\BudgetMonitoring */
?>

<?php
echo Html::hiddenInput('baseUrl', $baseUrl, ['id' => 'baseUrl']);
$form = ActiveForm::begin([
    'id' => 'budget-monitoring-form',
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

?>

<div class="row budget-monitoring-LH-form">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <?php
        echo Html::activeHiddenInput($model, 'form_type_code');

        echo $form->field($model, 'sector_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->dropDownList(Sector::map(new Sector(), 'sector_name'), ['class' => 'sector-list ' . AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'power_plant_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->dropDownList($powerPlantList, ['id' => 'power-plant-list', 'class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'k3l_year', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        ?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <table id="table-monitor" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
            <tr>
                <th rowspan="2" width="10%" class="center"><?= AppLabels::PRK_NUMBER; ?></th>
                <th rowspan="2" width="10%" class="center"><?= AppLabels::PROGRAM; ?></th>
                <th rowspan="2" width="10%" class="center"><?= AppLabels::VALUE; ?></th>
                <th colspan="12" class="center"><?= AppLabels::PLAN; ?></th>
                <th rowspan="2" class="center"><?= AppLabels::ACTION; ?></th>
            </tr>

            <tr>
                <th rowspan="1" colspan="1" class="center"><?=AppLabels::SHORT_JANUARY; ?></th>
                <th rowspan="1" colspan="1" class="center"><?=AppLabels::SHORT_FEBRUARY; ?></th>
                <th rowspan="1" colspan="1" class="center"><?=AppLabels::SHORT_MARCH; ?></th>
                <th rowspan="1" colspan="1" class="center"><?=AppLabels::SHORT_APRIL; ?></th>
                <th rowspan="1" colspan="1" class="center"><?=AppLabels::SHORT_MAY; ?></th>
                <th rowspan="1" colspan="1" class="center"><?=AppLabels::SHORT_JUNE; ?></th>
                <th rowspan="1" colspan="1" class="center"><?=AppLabels::SHORT_JULY; ?></th>
                <th rowspan="1" colspan="1" class="center"><?=AppLabels::SHORT_AUGUST; ?></th>
                <th rowspan="1" colspan="1" class="center"><?=AppLabels::SHORT_SEPTEMBER; ?></th>
                <th rowspan="1" colspan="1" class="center"><?=AppLabels::SHORT_OCTOBER; ?></th>
                <th rowspan="1" colspan="1" class="center"><?=AppLabels::SHORT_NOVEMBER; ?></th>
                <th rowspan="1" colspan="1" class="center"><?=AppLabels::SHORT_DECEMBER; ?></th>
            </tr>
            </thead>
            <tbody>

            <?php if($model->getIsNewRecord()){ ?>
                <td><?= Html::textInput("BudgetMonitoringDetail[0][bmd_no_prk]", null, [  'class' => 'form-control']); ?></td>
                <td><?= Html::textInput("BudgetMonitoringDetail[0][bmd_program]", null, [ 'class' => 'form-control']); ?></td>
                <td><?= Html::textInput("BudgetMonitoringDetail[0][bmd_value_display]", null, ['data-cell' => 'A0', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'class' => 'form-control numbersOnly']); ?></td>
                <?= Html::hiddenInput("BudgetMonitoringDetail[0][bmd_value]", null, ['data-cell' => 'AA0', 'data-formula' => 'A0']); ?>
                <?php
                for($i=1; $i<=12; $i++){
                    $alphabet = $model->toAlphabet($i);$one = 1; ?>
                    <td><?= Html::textInput("BudgetMonitoringMonth[0][$i][bmv_plan_value_display]", null, ['data-cell' => "$alphabet$alphabet" . '0', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'class' => 'form-control numbersOnly']); ?>
                    <?= Html::hiddenInput("BudgetMonitoringMonth[0][$i][bmv_plan_value]", null, ['data-cell' => "$alphabet" . '0', 'data-formula' => "$alphabet$alphabet" . "0"]) ?></td>

                <?php } ?> <td><button type="button" class="btn btn-xs btn-danger btn-remove">Hapus</button></td>
            <?php } ?>

            <?php foreach ($model->budgetMonitoringDetails as $key => $detail): ?>
                <tr>
                    <?= Html::activeHiddenInput($detail, "[$key]id"); ?>
                    <td><?= Html::activeTextInput($detail, "[$key]bmd_no_prk",  [ 'class' => 'form-control']); ?></td>
                    <td><?= Html::activeTextInput($detail, "[$key]bmd_program", [ 'class' => 'form-control']); ?></td>
                    <td>
                        <?= Html::activeHiddenInput($detail, "[$key]bmd_value", ['data-cell' => "A$key", 'data-format' => '0','data-formula' => "AA$key"]); ?>
                        <?= Html::activeTextInput($detail, "[$key]bmd_value_display", ['data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'data-cell' => "AA$key", 'class' => 'form-control numbersOnly']); ?>
                    </td>
                    <?php
                    foreach($detail->budgetMonitoringMonths as $key1 => $month): $key1+=1;$alphabet = $model->toAlphabet($key1); ?>
                        <?= Html::activeHiddenInput($month, "[$key][$key1]id"); ?>
                        <td>
                            <?= Html::activeHiddenInput($month, "[$key][$key1]bmv_plan_value", ['data-cell' => "$alphabet$key", 'data-format' => '0', 'data-formula' => "$alphabet$alphabet$key"]); ?>
                            <?= Html::activeTextInput($month, "[$key][$key1]bmv_plan_value_display", ['data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'data-cell' => "$alphabet$alphabet$key", 'class' => 'form-control numbersOnly']); ?>
                        </td>
                    <?php  endforeach; ?>
                    <td><?= Html::button(AppLabels::BTN_DELETE, ['class' => 'btn btn-xs btn-pink btn-remove-ajax', 'data-id' => $detail->id, 'data-controller' => 'budget-monitoring-detail']); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="2" width="20%" class="center"><?= AppLabels::AMOUNT; ?></td>
                <td width="10%" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'id' => 'bmd_total']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'O1', 'id' => 'bmv_total_jan']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'P1', 'id' => 'bmv_total_feb']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'Q1', 'id' => 'bmv_total_mar']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'R1', 'id' => 'bmv_total_apr']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'S1', 'id' => 'bmv_total_may']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'T1', 'id' => 'bmv_total_jun']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'U1', 'id' => 'bmv_total_jul']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'V1', 'id' => 'bmv_total_aug']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'W1', 'id' => 'bmv_total_sep']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'X1', 'id' => 'bmv_total_oct']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'Y1', 'id' => 'bmv_total_nov']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'Z1', 'id' => 'bmv_total_dec']); ?></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" width="20%" class="center"><?= AppLabels::ACCUMULATION_MONTH; ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'O2', 'id' => 'bmv_total_month_jan']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'P2', 'id' => 'bmv_total_month_feb']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'Q2', 'id' => 'bmv_total_month_mar']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'R2', 'id' => 'bmv_total_month_apr']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'S2', 'id' => 'bmv_total_month_may']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'T2', 'id' => 'bmv_total_month_jun']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'U2', 'id' => 'bmv_total_month_jul']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'V2', 'id' => 'bmv_total_month_aug']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'W2', 'id' => 'bmv_total_month_sep']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'X2', 'id' => 'bmv_total_month_oct']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'Y2', 'id' => 'bmv_total_month_nov']); ?></td>
                <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'Z2', 'id' => 'bmv_total_month_dec']); ?></td>
                <td></td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-4 col-sm-offset-8">
        <label for="test" class="col-sm-3 control-label"><?= AppLabels::BTN_ADD ?></label>
        <?= Html::textInput('attr_text', null, ['id' => 'add', 'class' => 'col-sm-4']); ?>
        <?= Html::button('Go',['id' => 'addButton', 'class' => 'btn btn-info btn-sm col-sm-2']); ?>
    </div>
</div>

<hr/>



<div class="row">
    <div class="col-xs-12 form-actions text-center">
        <?= SubmitLinkButton::widget(['formId' => 'budget-monitoring-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>


