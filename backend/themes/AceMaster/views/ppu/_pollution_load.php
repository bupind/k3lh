<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Ppu */
/* @var $form yii\widgets\ActiveForm */
/* @var $startDate DateTime */
?>
    <div class="ppu-pollution-load">

        <div class="page-header">
            <h1><?= Html::encode(sprintf("%s %s", AppLabels::BTN_VIEW, AppLabels::POLLUTION_LOAD)) ?></h1>
        </div>

    </div>

<?php
$form = ActiveForm::begin([
    'id' => 'ppu-pollution-load-form',
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

    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table id="table-pollution-load" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                    <thead>
                    <tr>
                        <th rowspan="2"><?= AppLabels::NUMBER_SHORT ?></th>
                        <th rowspan="2"><?= sprintf("%s %s", AppLabels::NUMBER_SHORT, "Param"); ?></th>
                        <th rowspan="2"><?= sprintf("%s %s", AppLabels::NAME, AppLabels::EMISSION_SOURCE); ?></th>
                        <th colspan="12" class="center"><?= AppLabels::ACTUAL_LOAD_POLLUTION_CALCULATION_RESULT?></th>
                        <th rowspan="2"><?= AppLabels::OPERATION_TIME ?></th>
                        <th rowspan="2"><?= sprintf("%s %s", AppLabels::AMOUNT, AppLabels::DATA); ?></th>
                        <th rowspan="2"><?= sprintf("%s %s/%s", AppLabels::TOTAL, AppLabels::KG, AppLabels::YEAR); ?></th>
                        <th rowspan="2"><?= sprintf("%s %s/%s", AppLabels::TOTAL, AppLabels::TON, AppLabels::YEAR); ?></th>
                    </tr>
                    <tr>
                        <?php for($i=0; $i<12; $i++){ ?>
                            <th><?= $startDate->format('M-Y') ?></th>
                            <?php $startDate->add(new \DateInterval('P1M')); } ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count1 = 0;
                    $count2 = 0;
                    $count3 = 0;
                    $count4 = 0;
                    $count5 = 0;
                    $otCount = 0; ?>
                    <?php foreach ($model->ppuEmissionSources as $key1 => $ppuEmissionSource) : $keyCMES = $key1 + 1; ?>
                        <tr>
                            <td>
                                <?= $keyCMES ?>
                            </td>
                            <td>0</td>
                            <td>
                                <?= $form->field($ppuEmissionSource, "[$key1]ppues_operation_time")
                                    ->hiddenInput(['data-cell' => "X$count1"])
                                    ->label(false); ?>
                                <?php $count4 = $count1;
                                $count1++; ?>
                                <?= $ppuEmissionSource->ppues_chimney_name ?>
                            </td>
                        </tr>
                        <?php $noParam = 1; ?>
                        <?php foreach ($ppuEmissionSource->ppuParameterObligations as $key2 => $ppuParameterObligation) : ?>
                            <?php $monthCount = 0;
                            $count6 = $key1*12
                            ?>

                            <?php if ($ppuParameterObligation->ppupo_parameter_code == AppConstants::PPU_RBM_PARAM_CODE_LAJUALIR) { ?>
                                <?php foreach ($ppuParameterObligation->ppupoMonths as $key3 => $ppupoMonth) : ?>
                                    <?= $form->field($ppupoMonth, "[$key3]ppupom_value")
                                        ->hiddenInput(['data-cell' => "Z$count2"])
                                        ->label(false); ?>
                                    <?php $count2++; ?>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <tr>
                                    <td></td>
                                    <td> <?php echo $noParam;
                                        $noParam++ ?> </td>
                                    <td> <?= $ppuParameterObligation->ppupo_parameter_code_desc ?> </td>
                                    <?php foreach ($ppuParameterObligation->ppupoMonths as $key4 => $ppupoMonth) : ?>
                                        <?php if (!is_null($ppupoMonth->ppupom_value)) {
                                            $monthCount++;
                                        } ?>
                                        <?= $form->field($ppupoMonth, "[$key4]ppupom_value")
                                            ->hiddenInput(['data-cell' => "Y$count3", 'class' => 'control-label'])
                                            ->label(false); ?>
                                        <?php $count5 = $count3;
                                        $count3++ ?>
                                        <td>
                                            <span class="text-right" data-cell="<?= "V$count5" ?>" data-format="<?= '0,0[.]000' ?>" data-formula="<?= "Z$count6*Y$count5*X$count4*0.0036" ?>"></span>
                                        </td>
                                        <?php $count6++ ?>
                                    <?php endforeach; ?>

                                    <td> <span class="text-right" data-cell="<?= "A$otCount" ?>" data-format="<?= '0,0[.]000000' ?>" data-formula="<?= "X$count4" ?>"></span> </td>
                                    <td> <span class="text-right"><?= $monthCount ?> </span></td>
                                    <?php $startIndex = ($otCount) * 12;
                                    $endIndex = $startIndex + 11; ?>
                                    <td><span class="text-right" data-cell="<?= "B$otCount" ?>" data-format="<?= '0,0[.]00000' ?>" data-formula="<?= "SUM(V$startIndex:V$endIndex)/$monthCount" ?>"></span></td>
                                    <td><span class="text-right" data-cell="<?= "C$otCount" ?>" data-format="<?= '0,0[.]00000000' ?>" data-formula="<?= "B$otCount/1000" ?>"></span></td>
                                    <?php $otCount++; ?>
                                </tr>
                            <?php } ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>