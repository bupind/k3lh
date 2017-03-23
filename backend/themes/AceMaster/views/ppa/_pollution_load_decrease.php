<?php

use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model \backend\models\Ppa */
/* @var $startDate DateTime */

?>
<div class="ppa-pollution-load-decrease-view">
    <div class="table-responsive">
        <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
            <tr>
                <th rowspan="2" class="text-center"><?= AppLabels::NUMBER_SHORT; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::PPA_POLL_LOAD_ACTIVITY_TITLE; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::PARAM; ?></th>
                <th colspan="4" class="text-center"><?= AppLabels::YEAR; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::UNIT; ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::PPA_POLL_LOAD_CALC_EVIDENCE_TITLE; ?></th>
            </tr>
            <tr>
                <?php for ($i=0; $i<4; $i++): ?>
                    <th class="text-center"><?= $startDate->format('Y'); ?></th>
                <?php $startDate->add(new \DateInterval('P1Y')); endfor; ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($model->pollutionLoadDecreases as $key => $pollutionLoadDecrease): ?>
                <tr>
                    <td class="text-right"><?= $key + 1; ?></td>
                    <td><?= $pollutionLoadDecrease->ppapld_activity; ?></td>
                    <td><?= $pollutionLoadDecrease->ppapld_parameter; ?></td>
                    
                    <?php foreach ($pollutionLoadDecrease->ppaPollutionLoadDecreaseYears as $keyYear => $pollutionLoadDecreaseYear): ?>
                        <td class="text-right"><?= $pollutionLoadDecreaseYear->ppapldy_value; ?></td>
                    <?php endforeach; ?>

                    <td><?= $pollutionLoadDecrease->ppapld_unit; ?></td>
                    <td><?= Converter::attachment($pollutionLoadDecrease->attachmentOwner); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
