<?php
use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
/* @var $this yii\web\View */
/* @var $model \backend\models\Ppu */
/* @var $startDate DateTime */
?>

<div class="page-header">
    <h1><?= Html::encode(sprintf("%s %s %s", AppLabels::BTN_VIEW, AppLabels::ADHERENCE, AppLabels::BM_REPORT_PARAMETER)) ?></h1>
</div>


<div class="ppu-bm-report-parameter-view">
    <div class="table-responsive">
        <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
            <tr>
                <th rowspan="3" class="text-center"><?= AppLabels::NUMBER_SHORT; ?></th>
                <th rowspan="3" class="text-center"><?= sprintf("%s %s", AppLabels::NAME, AppLabels::EMISSION_SOURCE); ?></th>
                <th rowspan="3" class="text-center"><?= sprintf("%s %s", AppLabels::CODE, AppLabels::CHIMNEY); ?></th>
                <th rowspan="3" colspan="2" class="text-center"><?= AppLabels::MONITORED_PARAMETER ?></th>
                <th rowspan="1" colspan="12" class="text-center"><?= sprintf("%s %s (%s)", AppLabels::CONCENTRATE_TEST_RESULT, AppLabels::SAMPLE, AppLabels::MGNM3_UNIT) ?></th>
                <th rowspan="3" class="text-center"><?= AppLabels::QUALITY_STANDARD ?></th>
                <th rowspan="3" class="text-center"><?= AppLabels::QUALITY_STANDARD_UNIT ?></th>
                <th rowspan="3" class="text-center"><?= AppLabels::QUALITY_STANDARD_REF ?></th>
                <th rowspan="3" class="text-center"><?= AppLabels::MAXIMUM_QS_POLLUTION_LOAD ?></th>
                <th rowspan="3" class="text-center"><?= AppLabels::QS_LOAD_UNIT ?></th>
                <th rowspan="3" class="text-center"><?= AppLabels::MAXIMUM_QS_POLLUTION_LOAD_REF ?></th>
            </tr>
            <tr>
                <th rowspan="1" colspan="6" class="text-center"><?= sprintf("%s %s %s", AppLabels::SEMESTER, "II", $startDate->format('Y')); ?></th>
                <?php $startDate->add(new \DateInterval('P1Y')); ?>
                <th rowspan="1" colspan="6" class="text-center"><?= sprintf("%s %s %s", AppLabels::SEMESTER, "I", $startDate->format('Y')); ?></th>
            </tr>
            <tr>
                <?php for ($i=0; $i<12; $i++): ?>
                    <th colspan="1" class="text-right"><?= $startDate->format('M Y'); ?></th>
                    <?php $startDate->add(new \DateInterval('P1M')); endfor; ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($model->ppuEmissionSources as $key => $emissionSource): ?>
                <?php foreach($emissionSource->ppuParameterObligations as $keyPO => $parameterObligation): ?>
                    <tr>
                        <?php if ($keyPO == 0): $count = count($emissionSource->ppuParameterObligations); ?>
                            <td rowspan="<?= $count; ?>" class="text-right"><?= $key + 1; ?></td>
                            <td rowspan="<?= $count; ?>" class="text-center"><?= $emissionSource->ppues_name; ?></td>
                            <td rowspan="<?= $count; ?>" class="text-center"><?= $emissionSource->ppues_chimney_name; ?></td>
                        <?php endif; ?>
                        <td colspan="<?= $parameterObligation->ppupo_parameter_unit_code != null ? 1 : 2; ?>"><?= $parameterObligation->ppupo_parameter_code_desc ?></td>
                        <?php if(!is_null($parameterObligation->ppupo_parameter_unit_code) && $parameterObligation->ppupo_parameter_unit_code != ''): ?>
                            <td colspan="1" class="text-center"><?= $parameterObligation->ppupo_parameter_unit_code_desc ?></td>
                        <?php endif; ?>
                        <?php foreach ($parameterObligation->ppupoMonths as $keyMonth => $ppupoMonth): ?>
                            <td class="text-right"><?= $ppupoMonth->ppupom_value; ?></td>
                        <?php endforeach; ?>
                        <td class="text-right"> <?= $parameterObligation->ppupo_qs ?> </td>
                        <td class="text-center"> <?= $parameterObligation->ppupo_qs_unit_code_desc ?> </td>
                        <td class="text-center"> <?= $parameterObligation->ppupo_qs_ref ?> </td>
                        <td class="text-right"> <?= $parameterObligation->ppupo_qs_max_pollution_load ?> </td>
                        <td class="text-center"> <?= $parameterObligation->ppupo_qs_load_unit_code_desc ?> </td>
                        <td class="text-center"> <?= $parameterObligation->ppupo_qs_max_pollution_load_ref ?> </td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>