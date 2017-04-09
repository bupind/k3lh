<?php

use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model \backend\models\PpaBa */
/* @var $startDate DateTime */

?>
<div class="ppa-setup-permit-view">
    <div class="table-responsive">
        <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
            <tr>
                <th rowspan="2" class="text-center"><?= AppLabels::NUMBER_SHORT; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::WASTE_WATER_SOURCE; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::MONITORING_POINT_NAME; ?></th>
                <th colspan="2" class="text-center"><?= AppLabels::COORDINATE; ?></th>
                <th colspan="3"  class="text-center"><?= AppLabels::PPA_ENVIRONMENT_DOCUMENT_TITLE; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::MONITORING_FREQUENCY; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::MONITORING_STATUS_PERIOD; ?></th>
                <th colspan="12" class="text-center"><?= AppLabels::CERTIFIED_NUMBER_TEST_RESULT; ?></th>
            </tr>
            <tr>
                <th class="text-center"><?= AppLabels::LATITUDE; ?></th>
                <th class="text-center"><?= AppLabels::LONGITUDE; ?></th>
                <th><?= AppLabels::ENVIRONMENT_DOCUMENT_NAME; ?></th>
                <th><?= AppLabels::ENVIRONMENT_DOCUMENT_VALIDATOR; ?></th>
                <th><?= AppLabels::VALIDATE_DATE; ?></th>
                <?php for ($i=0; $i<12; $i++): ?>
                    <th class="text-right"><?= $startDate->format('M Y'); ?></th>
                <?php $startDate->add(new \DateInterval('P1M')); endfor; ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($model->ppaBaMonitoringPoints as $key => $monitoringPoint): ?>
                <tr>
                    <td class="text-right"><?= $key + 1; ?></td>
                    <td><?= $monitoringPoint->ppabamp_wastewater_source; ?></td>
                    <td><?= $monitoringPoint->ppabamp_monitoring_point_name; ?></td>
                    <td><?= $monitoringPoint->ppabamp_coord_lat; ?></td>
                    <td><?= $monitoringPoint->ppabamp_coord_long; ?></td>
                    <td><?= $monitoringPoint->ppabamp_document_name; ?></td>
                    <td><?= $monitoringPoint->ppabamp_permit_publisher; ?></td>
                    <td><?= $monitoringPoint->ppabamp_validation_date; ?></td>
                    <td><?= $monitoringPoint->ppabamp_monitoring_frequency_code_desc; ?></td>
                    <td><?= $monitoringPoint->ppabamp_monitoring_status_code_desc; ?></td>
                    
                    <?php foreach ($monitoringPoint->ppaBaMonths as $keyMonth => $ppaBaMonth): ?>
                        <td class="text-right"><?= $ppaBaMonth->ppabam_cert_number; ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
