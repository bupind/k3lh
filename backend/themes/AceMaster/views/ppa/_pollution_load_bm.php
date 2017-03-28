<?php

use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model \backend\models\Ppa */
/* @var $startDate DateTime */

$dataSet = $model->getPollutionLoadBMDataSet();
?>
<div class="ppa-pollution-load-decrease-view">
    <div class="table-responsive">
        <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
            <tr>
                <th colspan="3" rowspan="2">&nbsp;</th>
                <th colspan="12" class="text-center"><?= AppLabels::POLLUTION_LOAD_BM_CALC_RESULT_TITLE; ?></th>
                <th rowspan="2"><?= AppLabels::QS_MAX_POLLUTION_LOAD; ?></th>
                <th rowspan="2"><?= AppLabels::QS_LOAD_UNIT_CODE; ?></th>
                <th rowspan="2"><?= AppLabels::DATA_COUNT; ?></th>
            </tr>
            <tr>
                <?php for ($i=0; $i<12; $i++): ?>
                    <th class="text-right"><?= $startDate->format('M Y'); ?></th>
                    <?php $startDate->add(new \DateInterval('P1M')); endfor; ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($dataSet as $key => $data): ?>
                <tr>
                    <td><?= $data[0]; ?></td>
                    <td><?= $data[1]; ?></td>
                    <td><?= $data[2]; ?></td>
        
                    <?php for ($i=3; $i<15; $i++): ?>
                        <td class="text-right" data-format="0,0[.]000000000"><?= isset($data[$i]) ? $data[$i] : ''; ?></td>
                    <?php endfor; ?>

                    <td><?= $data[15]; ?></td>
                    <td><?= $data[16]; ?></td>
                    <td><?= $data[17]; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
