<?php

use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model \backend\models\Ppa */
/* @var $startDate DateTime */

?>
<div class="ppa-setup-permit-view">
    <div class="table-responsive">
        <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
            <tr>
                <th rowspan="2" class="text-center"><?= AppLabels::NUMBER_SHORT; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::WASTE_WATER_SOURCE; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::SETUP_POINT_NAME; ?></th>
                <th colspan="2" class="text-center"><?= AppLabels::COORDINATE; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::WASTE_WATER_TECHNOLOGY; ?></th>
                <th colspan="4" class="text-center"><?= AppLabels::PERMIT_STATUS; ?></th>
                <th colspan="12" class="text-center"><?= AppLabels::CERTIFIED_NUMBER_TEST_RESULT; ?></th>
            </tr>
            <tr>
                <th class="text-center"><?= AppLabels::LS; ?></th>
                <th class="text-center"><?= AppLabels::BT; ?></th>
                <th><?= AppLabels::PERMIT_NUMBER; ?></th>
                <th><?= AppLabels::PERMIT_PUBLISHER; ?></th>
                <th><?= AppLabels::PERMIT_PUBLISH_DATE; ?></th>
                <th><?= AppLabels::PERMIT_END_DATE; ?></th>
                <?php for ($i=0; $i<12; $i++): ?>
                    <th class="text-right"><?= $startDate->format('M Y'); ?></th>
                <?php $startDate->add(new \DateInterval('P1M')); endfor; ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($model->setupPermits as $key => $setupPermit): ?>
                <tr>
                    <td class="text-right"><?= $key + 1; ?></td>
                    <td><?= $setupPermit->ppasp_wastewater_source; ?></td>
                    <td><?= $setupPermit->ppasp_setup_point_name; ?></td>
                    <td><?= $setupPermit->ppasp_coord_ls; ?></td>
                    <td><?= $setupPermit->ppasp_coord_bt; ?></td>
                    <td class="text-center"><?= $setupPermit->ppasp_wastewater_tech_code_desc; ?></td>
                    <td><?= $setupPermit->ppasp_permit_number; ?></td>
                    <td><?= $setupPermit->ppasp_permit_publisher; ?></td>
                    <td><?= $setupPermit->ppasp_permit_publish_date; ?></td>
                    <td><?= $setupPermit->ppasp_permit_end_date; ?></td>
                    
                    <?php foreach ($setupPermit->ppaMonths as $keyMonth => $ppaMonth): ?>
                        <td class="text-right"><?= $ppaMonth->ppam_cert_number; ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
