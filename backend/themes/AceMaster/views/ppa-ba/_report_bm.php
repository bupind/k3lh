<?php

use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model \backend\models\PpaBa */
/* @var $startDate DateTime */

?>
<div class="ppa-report-bm-view">
    <div class="table-responsive">
        <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?> calx">
            <thead>
            <tr>
                <th rowspan="2" class="text-center"><?= AppLabels::NUMBER_SHORT; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::MONITORING_POINT_NAME; ?></th>
                <th rowspan="2" colspan="2" class="text-center"><?= AppLabels::BM_REPORT_PARAMETER; ?></th>
                <th colspan="12" class="text-center"><?= AppLabels::PPA_BA_CONCENTRATION_TITLE; ?></th>
                <th rowspan="2" colspan="2" class="text-center"><?= AppLabels::QS_CONCENTRATE; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::QS_UNIT; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::QS_REFERRED_RULE; ?></th>
            </tr>
            <tr>
                <?php for ($i=0; $i<12; $i++): ?>
                    <th class="text-right"><?= $startDate->format('M Y'); ?></th>
                <?php $startDate->add(new \DateInterval('P1M')); endfor; ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($model->ppaBaMonitoringPoints as $key => $monitoringPoint): ?>
                <?php foreach ($monitoringPoint->ppaBaReportBmsNoFooterParams as $keyBM => $ppaBaReportBm): ?>
                    <tr>
                        <?php if ($keyBM == 0): $count = count($monitoringPoint->ppaBaReportBms); ?>
                            <td rowspan="<?= $count; ?>" class="text-right"><?= $key + 1; ?></td>
                            <td rowspan="<?= $count; ?>" class="text-center"><?= $monitoringPoint->ppabamp_monitoring_point_name; ?></td>
                        <?php endif; ?>
                        
                        <td class="text-center" colspan="2"><?= $ppaBaReportBm->ppabar_param_code_desc; ?></td>
                        
                        <?php foreach ($ppaBaReportBm->ppaBaConcentrations as $keyCon => $concentration): ?>
                            <td class="text-right" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $concentration->ppabac_value; ?></td>
                        <?php endforeach; ?>
                        
                        <?php if ($ppaBaReportBm->ppabar_param_code == AppConstants::PPA_RBM_PARAM_PH): ?>
                            <td class="text-right" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $ppaBaReportBm->ppabar_qs_1; ?></td>
                            <td class="text-right" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $ppaBaReportBm->ppabar_qs_2; ?></td>
                        <?php else: ?>
                            <td class="text-right" colspan="2" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $ppaBaReportBm->ppabar_qs_1; ?></td>
                        <?php endif; ?>
                        
                        <td class="text-center"><?= $ppaBaReportBm->ppabar_qs_unit_code_desc; ?></td>
                        <td class="text-center"><?= $ppaBaReportBm->ppabar_qs_ref; ?></td>
                    </tr>
                <?php endforeach; ?>
                
                <?php if (!is_null($monitoringPoint->ppaBaReportBmDebit)): ?>
                <tr>
                    <td class="text-center"><?= $monitoringPoint->ppaBaReportBmDebit->ppabar_param_code_desc; ?></td>
                    <td class="text-center"><?= $monitoringPoint->ppaBaReportBmDebit->ppabar_param_unit_code_desc; ?></td>
        
                    <?php foreach ($monitoringPoint->ppaBaReportBmDebit->ppaBaConcentrations as $keyCon => $concentration): ?>
                        <td class="text-right" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $concentration->ppabac_value; ?></td>
                    <?php endforeach; ?>
        
                    <?php if ($monitoringPoint->ppaBaReportBmDebit->ppabar_param_code == AppConstants::PPA_RBM_PARAM_PH): ?>
                        <td class="text-right" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $monitoringPoint->ppaBaReportBmDebit->ppabar_qs_1; ?></td>
                        <td class="text-right" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $monitoringPoint->ppaBaReportBmDebit->ppabar_qs_2; ?></td>
                    <?php else: ?>
                        <td class="text-right" colspan="2" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $monitoringPoint->ppaBaReportBmDebit->ppabar_qs_1; ?></td>
                    <?php endif; ?>

                    <td class="text-center"><?= $monitoringPoint->ppaBaReportBmDebit->ppabar_qs_unit_code_desc; ?></td>
                    <td class="text-center"><?= $monitoringPoint->ppaBaReportBmDebit->ppabar_qs_ref; ?></td>
                </tr>
                <?php endif; ?>

                <?php if (!is_null($monitoringPoint->ppaBaReportBmProduction)): ?>
                <tr>
                    <td class="text-center"><?= $monitoringPoint->ppaBaReportBmProduction->ppabar_param_code_desc; ?></td>
                    <td class="text-center"><?= $monitoringPoint->ppaBaReportBmProduction->ppabar_param_unit_code_desc; ?></td>
        
                    <?php foreach ($monitoringPoint->ppaBaReportBmProduction->ppaBaConcentrations as $keyCon => $concentration): ?>
                        <td class="text-right" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $concentration->ppabac_value; ?></td>
                    <?php endforeach; ?>
        
                    <?php if ($monitoringPoint->ppaBaReportBmProduction->ppabar_param_code == AppConstants::PPA_RBM_PARAM_PH): ?>
                        <td class="text-right" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $monitoringPoint->ppaBaReportBmProduction->ppabar_qs_1; ?></td>
                        <td class="text-right" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $monitoringPoint->ppaBaReportBmProduction->ppabar_qs_2; ?></td>
                    <?php else: ?>
                        <td class="text-right" colspan="2" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $monitoringPoint->ppaBaReportBmProduction->ppabar_qs_1; ?></td>
                    <?php endif; ?>

                    <td class="text-center"><?= $monitoringPoint->ppaBaReportBmProduction->ppabar_qs_unit_code_desc; ?></td>
                    <td class="text-center"><?= $monitoringPoint->ppaBaReportBmProduction->ppabar_qs_ref; ?></td>
                </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
