<?php
use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
/* @var $this yii\web\View */
/* @var $model \backend\models\PpuAmbient */
/* @var $startDate DateTime */
?>

<div class="page-header">
    <h1><?= Html::encode(sprintf("%s %s", AppLabels::BTN_VIEW, AppLabels::MONITORING_POINT)) ?></h1>
</div>


<div class="ppu-bm-report-parameter-ambient-view">
    <div class="table-responsive">
        <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
            <tr>
                <th rowspan="2" class="text-center"><?= AppLabels::NUMBER_SHORT; ?></th>
                <th rowspan="2" class="text-center"><?= sprintf("%s %s", AppLabels::LOCATION, AppLabels::MONITORING); ?></th>
                <th rowspan="2" class="text-center"><?= sprintf("%s %s", AppLabels::CODE, AppLabels::LOCATION); ?></th>
                <th colspan="2" rowspan="1" class="text-center"><?= AppLabels::COORDINAT; ?></th>
                <th colspan="3" rowspan="1" class="text-center"><?= sprintf("%s %s/%s", AppLabels::DOCUMENTS, AppLabels::ENVIRONMENT, AppLabels::ENVIRONMENT_PERMIT); ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::PPUA_MONITORING_OBLIGATION; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::PPUA_STATUS_PROPER; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::DESCRIPTION; ?></th>
            </tr>
            <tr>
                <th colspan="1" class="text-center"><?= AppLabels::LATITUDE; ?></th>
                <th colspan="1" class="text-center"><?= AppLabels::LONGITUDE; ?></th>
                <th colspan="1" class="text-center"><?= sprintf("%s %s %s", AppLabels::NAME, AppLabels::DOCUMENTS, AppLabels::ENVIRONMENT);?></th>
                <th colspan="1" class="text-center"><?= sprintf("%s Pengesahan %s %s", AppLabels::INSTITUTION, AppLabels::DOCUMENTS, AppLabels::ENVIRONMENT);?></th>
                <th colspan="1" class="text-center"><?= sprintf("%s %s %s", AppLabels::CONFIRM_DATE, AppLabels::DOCUMENTS, AppLabels::ENVIRONMENT);?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($model->ppuaMonitoringPoints as $keyMP => $ppuaMonitoringPoint): ?>
                <tr>
                    <td class="text-right"><?= $keyMP + 1; ?></td>
                    <td><?= $ppuaMonitoringPoint->ppua_monitoring_location; ?></td>
                    <td><?= $ppuaMonitoringPoint->ppua_code_location; ?></td>
                    <td><?= $ppuaMonitoringPoint->ppua_coord_latitude; ?></td>
                    <td><?= $ppuaMonitoringPoint->ppua_coord_longitude; ?></td>
                    <td><?= $ppuaMonitoringPoint->ppua_env_doc_name; ?></td>
                    <td><?= $ppuaMonitoringPoint->ppua_institution; ?></td>
                    <td><?= $ppuaMonitoringPoint->ppua_confirm_date; ?></td>
                    <td><?= $ppuaMonitoringPoint->ppua_freq_monitoring_obligation_code_desc; ?></td>
                    <td><?= $ppuaMonitoringPoint->ppua_monitoring_data_status_code_desc; ?></td>
                    <td><?= $ppuaMonitoringPoint->ppua_ref; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>