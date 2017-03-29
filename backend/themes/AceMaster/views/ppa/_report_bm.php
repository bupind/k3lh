<?php

use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model \backend\models\Ppa */
/* @var $startDate DateTime */
/* @var $startDateOutlet DateTime */

?>
<div class="ppa-report-bm-view">
    <div class="table-responsive">
        <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?> calx">
            <thead>
            <tr>
                <th rowspan="2" class="text-center"><?= AppLabels::NUMBER_SHORT; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::SETUP_POINT_PERMIT; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::BM_REPORT_PARAMETER; ?></th>
                <th colspan="12" class="text-center"><?= AppLabels::INLET_CONCENTRATE_TITLE; ?></th>
                <th colspan="12" class="text-center"><?= AppLabels::OUTLET_CONCENTRATE_TITLE; ?></th>
                <th rowspan="2" colspan="2" class="text-center"><?= AppLabels::QS_CONCENTRATE; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::QS_UNIT; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::QS_REFERRED_RULE; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::QS_MAX_POLLUTION_LOAD; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::QS_LOAD_UNIT_CODE; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::QS_REFERRED_MAX_POLLUTION_LOAD_RULE; ?></th>
            </tr>
            <tr>
                <?php for ($i=0; $i<12; $i++): ?>
                    <th class="text-right"><?= $startDate->format('M Y'); ?></th>
                <?php $startDate->add(new \DateInterval('P1M')); endfor; ?>
    
                <?php for ($i=0; $i<12; $i++): ?>
                    <th class="text-right"><?= $startDateOutlet->format('M Y'); ?></th>
                <?php $startDateOutlet->add(new \DateInterval('P1M')); endfor; ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($model->setupPermits as $key => $setupPermit): ?>
                <?php foreach ($setupPermit->ppaReportBmsNoFooterParams as $keyBM => $ppaReportBm): ?>
                    <tr>
                        <?php if ($keyBM == 0): $count = count($setupPermit->ppaReportBms); ?>
                            <td rowspan="<?= $count; ?>" class="text-right"><?= $key + 1; ?></td>
                            <td rowspan="<?= $count; ?>" class="text-center"><?= $setupPermit->ppasp_setup_point_name; ?></td>
                        <?php endif; ?>
                        
                        <td class="text-center"><?= $ppaReportBm->ppar_param_code_desc; ?></td>
                        
                        <?php foreach ($ppaReportBm->ppaInletOutlets as $keyInlet => $inlet): ?>
                            <td class="text-right" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $inlet->ppaio_inlet_value; ?></td>
                        <?php endforeach; ?>
    
                        <?php foreach ($ppaReportBm->ppaInletOutlets as $keyOutlet=> $outlet): ?>
                            <td class="text-right" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $outlet->ppaio_outlet_value; ?></td>
                        <?php endforeach; ?>
                        
                        <?php if ($ppaReportBm->ppar_param_code == AppConstants::PPA_RBM_PARAM_PH): ?>
                            <td class="text-right" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $ppaReportBm->ppar_qs_1; ?></td>
                            <td class="text-right" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $ppaReportBm->ppar_qs_2; ?></td>
                        <?php else: ?>
                            <td class="text-right" colspan="2" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $ppaReportBm->ppar_qs_1; ?></td>
                        <?php endif; ?>
                        
                        <td class="text-center"><?= $ppaReportBm->ppar_qs_unit_code_desc; ?></td>
                        <td class="text-center"><?= $ppaReportBm->ppar_qs_ref; ?></td>
                        <td class="text-center"><?= $ppaReportBm->ppar_qs_max_pollution_load; ?></td>
                        <td class="text-center"><?= $ppaReportBm->ppar_qs_load_unit_code_desc; ?></td>
                        <td class="text-center"><?= $ppaReportBm->ppar_qs_max_pollution_load_ref; ?></td>
                    </tr>
                <?php endforeach; ?>

                <?php if (!is_null($setupPermit->ppaReportBmDebit)): ?>
                <tr>
                    <td class="text-center"><?= $setupPermit->ppaReportBmDebit->ppar_param_code_desc; ?></td>
        
                    <?php foreach ($setupPermit->ppaReportBmDebit->ppaInletOutlets as $keyInlet => $inlet): ?>
                        <td class="text-right" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $inlet->ppaio_inlet_value; ?></td>
                    <?php endforeach; ?>
        
                    <?php foreach ($setupPermit->ppaReportBmDebit->ppaInletOutlets as $keyOutlet=> $outlet): ?>
                        <td class="text-right" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $outlet->ppaio_outlet_value; ?></td>
                    <?php endforeach; ?>

                    <td class="text-right" colspan="2" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $setupPermit->ppaReportBmDebit->ppar_qs_1; ?></td>
                    <td class="text-center"><?= $setupPermit->ppaReportBmDebit->ppar_qs_unit_code_desc; ?></td>
                    <td class="text-center"><?= $setupPermit->ppaReportBmDebit->ppar_qs_ref; ?></td>
                    <td class="text-center"><?= $setupPermit->ppaReportBmDebit->ppar_qs_max_pollution_load; ?></td>
                    <td class="text-center"><?= $setupPermit->ppaReportBmDebit->ppar_qs_load_unit_code_desc; ?></td>
                    <td class="text-center"><?= $setupPermit->ppaReportBmDebit->ppar_qs_max_pollution_load_ref; ?></td>
                </tr>
                <?php endif; ?>

                <?php if (!is_null($setupPermit->ppaReportBmProduction)): ?>
                <tr>
                    <td class="text-center"><?= $setupPermit->ppaReportBmProduction->ppar_param_code_desc; ?></td>
        
                    <?php foreach ($setupPermit->ppaReportBmProduction->ppaInletOutlets as $keyInlet => $inlet): ?>
                        <td class="text-right" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $inlet->ppaio_inlet_value; ?></td>
                    <?php endforeach; ?>
        
                    <?php foreach ($setupPermit->ppaReportBmProduction->ppaInletOutlets as $keyOutlet=> $outlet): ?>
                        <td class="text-right" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $outlet->ppaio_outlet_value; ?></td>
                    <?php endforeach; ?>

                    <td class="text-right" colspan="2" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $setupPermit->ppaReportBmProduction->ppar_qs_1; ?></td>
                    <td class="text-center"><?= $setupPermit->ppaReportBmProduction->ppar_qs_unit_code_desc; ?></td>
                    <td class="text-center"><?= $setupPermit->ppaReportBmProduction->ppar_qs_ref; ?></td>
                    <td class="text-center"><?= $setupPermit->ppaReportBmProduction->ppar_qs_max_pollution_load; ?></td>
                    <td class="text-center"><?= $setupPermit->ppaReportBmProduction->ppar_qs_load_unit_code_desc; ?></td>
                    <td class="text-center"><?= $setupPermit->ppaReportBmProduction->ppar_qs_max_pollution_load_ref; ?></td>
                </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
