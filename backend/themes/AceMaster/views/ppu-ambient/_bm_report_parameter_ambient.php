<?php
use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
/* @var $this yii\web\View */
/* @var $model \backend\models\PpuAmbient */
/* @var $startDate DateTime */
?>

<div class="page-header">
    <h1><?= Html::encode(sprintf("%s %s %s %s", AppLabels::BTN_VIEW, AppLabels::ADHERENCE, AppLabels::BM_REPORT_PARAMETER, AppLabels::AMBIENT)) ?></h1>
</div>


<div class="ppu-bm-report-parameter-ambient-view">
    <div class="table-responsive">
        <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
            <tr>
                <th rowspan="3" class="text-center"><?= AppLabels::NUMBER_SHORT; ?></th>
                <th rowspan="3" class="text-center"><?= sprintf("%s %s", AppLabels::LOCATION, AppLabels::MONITORING); ?></th>
                <th rowspan="3" class="text-center"><?= sprintf("%s %s", AppLabels::CODE, AppLabels::LOCATION); ?></th>
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
            <?php foreach ($model->ppuaMonitoringPoints as $keyMP => $ppuaMonitoringPoint): ?>
                <?php foreach($ppuaMonitoringPoint->ppuaParameterObligations as $keyPO => $parameterObligation): ?>
                    <tr>
                        <?php if ($keyPO == 0): $count = count($ppuaMonitoringPoint->ppuaParameterObligations); ?>
                            <td rowspan="<?= $count; ?>" class="text-right"><?= $keyMP + 1; ?></td>
                            <td rowspan="<?= $count; ?>" class="text-center"><?= $ppuaMonitoringPoint->ppua_monitoring_location; ?></td>
                            <td rowspan="<?= $count; ?>" class="text-center"><?= $ppuaMonitoringPoint->ppua_code_location; ?></td>
                        <?php endif; ?>
                        <td colspan="2" class="text-center"><?= $parameterObligation->ppuapo_parameter_code_desc?></td>
                        <?php foreach ($parameterObligation->ppuapoMonths as $keyMonth => $ppuapoMonth): ?>
                            <td class="text-right"><?= $ppuapoMonth->ppuapom_value; ?></td>
                        <?php endforeach; ?>
                        <td class="text-right"> <?= $parameterObligation->ppuapo_qs ?> </td>
                        <td class="text-center"> <?= $parameterObligation->ppuapo_qs_unit_code_desc ?> </td>
                        <td class="text-center"> <?= $parameterObligation->ppuapo_qs_ref ?> </td>
                        <td class="text-right"> <?= $parameterObligation->ppuapo_qs_max_pollution_load ?> </td>
                        <td class="text-center"> <?= $parameterObligation->ppuapo_qs_load_unit_code_desc ?> </td>
                        <td class="text-center"> <?= $parameterObligation->ppuapo_qs_max_pollution_load_ref ?> </td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
