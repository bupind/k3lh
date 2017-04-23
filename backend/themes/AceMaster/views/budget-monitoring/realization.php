<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use backend\assets\BudgetmonitoringAsset;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitLinkButton;
use app\components\DetailView;

/* @var $model backend\models\BudgetMonitoring */
/* @var $this yii\web\View */

BudgetmonitoringAsset::register($this);
$baseUrl = Url::base();

$this->title = sprintf('%s %s', AppLabels::BTN_UPDATE, AppLabels::CODESET);
$this->title = sprintf('%s %s %s', AppLabels::BTN_UPDATE, AppLabels::REALIZATION, $model->form_type_code_desc);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::BUDGET_MONITORING, $model->form_type_code_desc), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', $model->sector->sector_name, $model->powerPlant->pp_name), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::REALIZATION;

/* @var $this yii\web\View */
/* @var $model backend\models\BudgetMonitoring */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-header">
    <h1><?= Html::encode($this->title) ?></h1>
</div>

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
        echo Html::activeHiddenInput($model, 'id');
        ?>
        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'excluded' => ['form_type_code'],
                'converter' => [
                    'sector_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sector->sector_name],
                    'power_plant_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->powerPlant->pp_name],
                ]
            ]
        ]); ?>

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
                <th colspan="12" class="center"><?= AppLabels::REALIZATION; ?></th>
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

            <?php foreach ($model->budgetMonitoringDetails as $key => $detail): ?>
                <tr>
                    <?= Html::activeHiddenInput($detail, "[$key]id"); ?>
                    <td class="text-center"><?= Html::label("$detail->bmd_no_prk",  null, [ 'class' => 'control-label']); ?></td>
                    <td class="text-center"><?= Html::label("$detail->bmd_program", null, [ 'class' => 'control-label']); ?></td>

                    <td class="text-right">
                        <?= Html::label($detail->bmd_value, null, ['data-cell' => "A$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'class' => 'control-label']); ?>
                    </td>
                    <?php
                    foreach($detail->budgetMonitoringMonths as $key1 => $month): $key1+=1;$alphabet = $model->toAlphabet($key1); ?>
                        <?= Html::activeHiddenInput($month, "[$key][$key1]id"); ?>
                        <?php if( !is_null($month->bmv_plan_value)){ ?>
                            <td>
                                <?= Html::activeHiddenInput($month, "[$key][$key1]bmv_realization_value", ['data-cell' => "$alphabet$key", 'data-format' => '0', 'data-formula' => "$alphabet$alphabet$key"]); ?>
                                <?= Html::activeTextInput($month, "[$key][$key1]bmv_realization_value_display", ['data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'data-rel' => 'tooltip', 'data-placement' => 'top', 'title' => $month->bmv_plan_value, 'data-cell' => "$alphabet$alphabet$key", 'class' => 'text-right tooltip-info form-control numbersOnly']); ?>
                            </td>
                        <?php } else{ ?>
                            <td>
                                <?= Html::activeHiddenInput($month, "[$key][$key1]bmv_realization_value", ['data-cell' => "$alphabet$key", 'data-format' => '0', 'data-formula' => "$alphabet$alphabet$key"]); ?>
                                <?= Html::activeTextInput($month, "[$key][$key1]bmv_realization_value_display", ['data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'data-rel' => 'tooltip', 'data-placement' => 'top', 'title' => '0', 'data-cell' => "$alphabet$alphabet$key", 'class' => 'text-right tooltip-info form-control numbersOnly']); ?>
                            </td>
                        <?php } ?>
                    <?php  endforeach; ?>

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
            </tr>
            </tfoot>
        </table>
    </div>

    <hr/>



    <div class="row">
        <div class="col-xs-12 form-actions text-right">
            <?= SubmitLinkButton::widget(['formId' => 'budget-monitoring-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>


