<?php
use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;
/* @var $this yii\web\View */
/* @var $model \backend\models\Ppu */
/* @var $startDate DateTime */
?>

<div class="page-header">
    <h1><?= Html::encode(sprintf("%s %s", AppLabels::BTN_VIEW, AppLabels::EMISSION_SOURCE_INVENTORY)) ?></h1>
</div>


<div class="ppu-emission-source-inventory-view">
    <div class="table-responsive">
        <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
            <tr>
                <th rowspan="2" class="text-center"><?= AppLabels::NUMBER_SHORT; ?></th>
                <th rowspan="2" class="text-center"><?= sprintf("%s %s", AppLabels::NAME, AppLabels::EMISSION_SOURCE); ?></th>
                <th rowspan="2" class="text-center"><?= sprintf("%s %s", AppLabels::CODE, AppLabels::CHIMNEY); ?></th>
                <th rowspan="2" class="text-center"><?= sprintf("%s %s", AppLabels::CAPACITY, AppLabels::EMISSION_SOURCE); ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::EMISSION_CONTROL_TOOL; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::FUEL_NAME; ?></th>
                <th rowspan="2" class="text-center"><?= sprintf("%s / %s",AppLabels::TOTAL_FUEL, AppLabels::YEAR); ?></th>
                <th rowspan="2" class="text-center"><?= sprintf("%s %s", AppLabels::UNIT, AppLabels::FUEL); ?></th>
                <th rowspan="2" class="text-center"><?= sprintf("%s %s/%s", AppLabels::OPERATION_TIME, AppLabels::HOUR, AppLabels::YEAR); ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::LOCATION; ?></th>
                <th colspan="2" class="text-center"><?= AppLabels::COORDINAT; ?></th>
                <th rowspan="2" class="text-center"><?= sprintf("%s %s", AppLabels::SHAPE, AppLabels::CHIMNEY); ?></th>
                <th rowspan="2" class="text-center"><?= sprintf("%s/%s %s", AppLabels::HEIGHT, AppLabels::LENGTH, AppLabels::CHIMNEY); ?></th>
                <th rowspan="2" class="text-center"><?= sprintf("%s %s", AppLabels::DIAMETER, AppLabels::CHIMNEY); ?></th>
                <th rowspan="2" class="text-center"><?= sprintf("%s %s", AppLabels::POSITION, AppLabels::SAMPLING_HOLE); ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::PPUES_STATUS_PROPER; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::PPUES_MONITORING_OBLIGATION; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::DESCRIPTION; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::UNMONITORED_EVIDENCE; ?></th>
            </tr>
            <tr>
                <th class="text-center"><?= AppLabels::LS; ?></th>
                <th class="text-center"><?= AppLabels::BT; ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($model->ppuEmissionSources as $key => $emissionSource): ?>
                <tr>
                    <td class="text-right"><?= $key + 1; ?></td>
                    <td><?= $emissionSource->ppues_name; ?></td>
                    <td><?= $emissionSource->ppues_chimney_name; ?></td>
                    <td class="text-right"><?= $emissionSource->ppues_capacity; ?></td>
                    <td><?= $emissionSource->ppues_control_device; ?></td>
                    <td><?= $emissionSource->ppues_fuel_name_code_desc ?></td>
                    <td class="text-right"><?= $emissionSource->ppues_total_fuel ?></td>
                    <td><?= $emissionSource->ppues_fuel_unit_code_desc ?></td>
                    <td class="text-right"><?= $emissionSource->ppues_operation_time ?></td>
                    <td><?= $emissionSource->ppues_location ?></td>
                    <td><?= $emissionSource->ppues_coord_ls ?></td>
                    <td><?= $emissionSource->ppues_coord_bt ?></td>
                    <td><?= $emissionSource->ppues_chimney_shape_code_desc ?></td>
                    <td class="text-right"><?= $emissionSource->ppues_chimney_height ?></td>
                    <td class="text-right"><?= $emissionSource->ppues_chimney_diameter ?></td>
                    <td class="text-right"><?= $emissionSource->ppues_hole_position ?></td>
                    <td><?= $emissionSource->ppues_monitoring_data_status_code_desc ?></td>
                    <td><?= $emissionSource->ppues_freq_monitoring_obligation_code_desc ?></td>
                    <td><?= $emissionSource->ppues_ref ?></td>
                    <td><?= Converter::attachment($emissionSource->attachmentOwner, ['show_file_upload' => false, 'show_delete_file' => false]); ?> </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="table-responsive">
        <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
            <tr>
                <th rowspan="2" class="text-center"><?= AppLabels::NUMBER_SHORT; ?></th>
                <th rowspan="2" class="text-center"><?= sprintf("%s %s", AppLabels::NAME, AppLabels::EMISSION_SOURCE); ?></th>
                <th rowspan="2" class="text-center"><?= sprintf("%s %s", AppLabels::CODE, AppLabels::CHIMNEY); ?></th>
                <th rowspan="2" class="text-center"><?= sprintf("%s %s/%s", AppLabels::OPERATION_TIME, AppLabels::HOUR, AppLabels::YEAR); ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::PPUES_MONITORING_OBLIGATION; ?></th>
                <th colspan="12" class="text-center"><?= AppLabels::OPERATIONAL_TIME ?></th>
            </tr>
            <tr>
                <?php for ($i=0; $i<12; $i++): ?>
                    <th class="text-right"><?= $startDate->format('M Y'); ?></th>
                    <?php $startDate->add(new \DateInterval('P1M')); endfor; ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($model->ppuEmissionSources as $key => $emissionSource): ?>
                <tr>
                    <td class="text-right"><?= $key + 1; ?></td>
                    <td><?= $emissionSource->ppues_name; ?></td>
                    <td><?= $emissionSource->ppues_chimney_name; ?></td>
                    <td><?= $emissionSource->ppues_operation_time ?></td>
                    <td><?= $emissionSource->ppues_freq_monitoring_obligation_code_desc ?></td>
                    <?php foreach ($emissionSource->ppuesMonths as $keyMonth => $ppuesMonth): ?>
                        <td class="text-right"><?= $ppuesMonth->ppuesm_operation_time; ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>