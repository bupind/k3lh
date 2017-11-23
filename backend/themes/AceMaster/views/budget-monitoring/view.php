<?php

use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\assets\BudgetmonitoringAsset;

BudgetmonitoringAsset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\models\BudgetMonitoring */

$this->title = sprintf('%s %s %s', AppLabels::BTN_VIEW, AppLabels::BUDGET_MONITORING, $model->form_type_code_desc);
$this->params['subtitle'] = sprintf('%s - %s', $model->sector->sector_name, $model->powerPlant->pp_name);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::BUDGET_MONITORING, $model->form_type_code_desc), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin([
    'id' => 'budget-monitoring-view',
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
<div class="budget-monitoring-view">

    <div class="page-header">
        <h1>
            <?= Html::encode($this->title) ?>
            <?php if (isset($this->params['subtitle'])): ?>
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <?= $this->params['subtitle']; ?>
                </small>
            <?php endif; ?>
        </h1>
    </div>

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

    <hr/>

    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table id="table-monitor" class="table table-bordered small">
                <thead>
                <tr>
                    <th rowspan="2" width="10%" class="center"><?= AppLabels::PRK_NUMBER; ?></th>
                    <th rowspan="2" width="10%" class="center"><?= AppLabels::PROGRAM; ?></th>
                    <th rowspan="2" width="10%" class="center"><?= AppLabels::VALUE; ?></th>
                    <th rowspan="2"></th>
                    <th colspan="12" class="center"><?= AppLabels::PLAN; ?> / <?= AppLabels::REALIZATION?></th>
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
                        <td class="text-center" rowspan="2"><?= Html::label("$detail->bmd_no_prk", null, [ 'class' => 'control-label']); ?></td>
                        <td class="text-center" rowspan="2"><?= Html::label("$detail->bmd_program", null, [ 'class' => 'control-label']); ?></td>
                        <td class="text-right" rowspan="2"><?= Html::label("$detail->bmd_value", null, ['data-cell' => "A$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'class' => 'control-label']); ?></td>
                        <td class="text-center"><?= AppLabels::PLAN ?></td>
                        <?php
                        foreach($detail->budgetMonitoringMonths as $key1 => $month): $key1+=1;$alphabet = $model->toAlphabet($key1); ?>
                            <td class="text-right" rowspan="1">
                                <?= Html::label("$month->bmv_plan_value", null, ['data-cell' => "$alphabet$key",'data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'class' => 'control-label']); ?>
                            </td>

                        <?php  endforeach; ?>
                    </tr>
                    <tr>
                        <td class="text-center"><?= AppLabels::REALIZATION ?></td>
                        <?php
                            foreach($detail->budgetMonitoringMonths as $key1 => $month): $key1+=1;$alphabet = $model->toAlphabet($key1); ?>
                            <td class="text-right" rowspan="1">
                                <?= Html::label("$month->bmv_realization_value", null,  ['data-cell' => "$alphabet$alphabet$alphabet$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'class' => 'control-label']); ?>
                            </td>
                            <?php  endforeach; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <td rowspan="2" colspan="2" width="20%" class="center"><?= AppLabels::AMOUNT; ?></td>
                    <td rowspan="2" width="10%" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'id' => 'bmd_total']); ?></td>
                    <td class="text-center"><?= AppLabels::PLAN ?></td>
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
                    <td class="text-center"><?= AppLabels::REALIZATION ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'OOO1', 'id' => 'bmv_total_jan1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'PPP1', 'id' => 'bmv_total_feb1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'QQQ1', 'id' => 'bmv_total_mar1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'RRR1', 'id' => 'bmv_total_apr1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'SSS1', 'id' => 'bmv_total_may1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'TTT1', 'id' => 'bmv_total_jun1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'UUU1', 'id' => 'bmv_total_jul1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'VVV1', 'id' => 'bmv_total_aug1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'WWW1', 'id' => 'bmv_total_sep1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'XXX1', 'id' => 'bmv_total_oct1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'YYY1', 'id' => 'bmv_total_nov1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'ZZZ1', 'id' => 'bmv_total_dec1']); ?></td>
                </tr>
                <tr>
                    <td rowspan="3" colspan="3" width="20%" class="center"><?= AppLabels::ACCUMULATION_MONTH; ?></td>
                    <td class="text-center"><?= AppLabels::PLAN ?></td>
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
                <tr>
                    <td class="text-center"><?= AppLabels::REALIZATION ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'OOO2', 'id' => 'bmv_total_month_jan1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'PPP2', 'id' => 'bmv_total_month_feb1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'QQQ2', 'id' => 'bmv_total_month_mar1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'RRR2', 'id' => 'bmv_total_month_apr1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'SSS2', 'id' => 'bmv_total_month_may1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'TTT2', 'id' => 'bmv_total_month_jun1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'UUU2', 'id' => 'bmv_total_month_jul1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'VVV2', 'id' => 'bmv_total_month_aug1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'WWW2', 'id' => 'bmv_total_month_sep1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'XXX2', 'id' => 'bmv_total_month_oct1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'YYY2', 'id' => 'bmv_total_month_nov1']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => AppConstants::CALX_DATA_FORMAT_CURRENCY, 'data-cell' => 'ZZZ2', 'id' => 'bmv_total_month_dec1']); ?></td>
                </tr>
                <tr>
                    <td class="text-center"><?= AppLabels::PERCENTAGE ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => '0[.]00%', 'data-cell' => 'OOOO2', 'data-formula' => 'OOO2/O2']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => '0[.]00%', 'data-cell' => 'PPPP2', 'data-formula' => 'PPP2/P2']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => '0[.]00%', 'data-cell' => 'QQQQ2', 'data-formula' => 'QQQ2/Q2']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => '0[.]00%', 'data-cell' => 'RRRR2', 'data-formula' => 'RRR2/R2']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => '0[.]00%', 'data-cell' => 'SSSS2', 'data-formula' => 'SSS2/S2']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => '0[.]00%', 'data-cell' => 'TTTT2', 'data-formula' => 'TTT2/T2']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => '0[.]00%', 'data-cell' => 'UUUU2', 'data-formula' => 'UUU2/U2']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => '0[.]00%', 'data-cell' => 'VVVV2', 'data-formula' => 'VVV2/V2']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => '0[.]00%', 'data-cell' => 'WWWW2', 'data-formula' => 'WWW2/W2']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => '0[.]00%', 'data-cell' => 'XXXX2', 'data-formula' => 'XXX2/X2']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => '0[.]00%', 'data-cell' => 'YYYY2', 'data-formula' => 'YYY2/Y2']); ?></td>
                    <td colspan="1" class="text-right"><?= Html::label('', null, ['data-format' => '0[.]00%', 'data-cell' => 'ZZZZ2', 'data-formula' => 'ZZZ2/Z2']); ?></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <?= ViewButton::widget(['model' => $model]); ?>
</div>
<?php ActiveForm::end(); ?>