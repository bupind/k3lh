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
    <h1><?= Html::encode(sprintf("%s %s dan %s", AppLabels::BTN_VIEW, AppLabels::BM_REPORT_PARAMETER, AppLabels::CEMS)) ?></h1>
</div>


<div class="ppu-report-bm-cems-view">
    <div class="table-responsive">
        <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
                <tr>
                    <th class="text-center"><?= AppLabels::CEMS_MONITORED_OBLIGATION ?> </th>
                    <th class="text-center"><?= sprintf("%s III-%s", AppLabels::QUARTER, $startDate->format('Y')); ?> </th>
                    <th class="text-center"><?= sprintf("%s IV-%s", AppLabels::QUARTER, $startDate->format('Y')); ?> </th>
                    <?php $startDate->add(new \DateInterval('P1Y')); ?>
                    <th class="text-center"><?= sprintf("%s I-%s", AppLabels::QUARTER, $startDate->format('Y')); ?> </th>
                    <th class="text-center"><?= sprintf("%s II-%s", AppLabels::QUARTER, $startDate->format('Y')); ?> </th>
                    <th class="text-center"> <?= AppLabels::DESCRIPTION ?> </th>
                    <?php $startDate->setDate($model->ppu_year - 1, 7, 1); ?>
                    <th class="text-center"><?= sprintf("%s %s III-%s", AppLabels::SHORT_PERCENT, AppLabels::QUARTER, $startDate->format('Y')); ?> </th>
                    <th class="text-center"><?= sprintf("%s %s IV-%s", AppLabels::SHORT_PERCENT, AppLabels::QUARTER, $startDate->format('Y')); ?> </th>
                    <?php $startDate->add(new \DateInterval('P1Y')); ?>
                    <th class="text-center"><?= sprintf("%s %s I-%s", AppLabels::SHORT_PERCENT, AppLabels::QUARTER, $startDate->format('Y')); ?> </th>
                    <th class="text-center"><?= sprintf("%s %s II-%s", AppLabels::SHORT_PERCENT, AppLabels::QUARTER, $startDate->format('Y')); ?> </th>
                    <th class="text-center"> <?= AppLabels::DESCRIPTION ?> </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center"><?= AppLabels::PPUCEMSRB_LONG_CONST_1 ?> </td>
                    <?php for($i=0; $i<10; $i++){ ?>
                        <td></td>
                    <?php } ?>
                </tr>
                <?php foreach ($model->ppuEmissionSources as $keyES => $emissionSource) : ?>
                    <tr>
                        <td> <?= $emissionSource->ppues_name ?> </td>
                        <?php for ($i = 0; $i < 10; $i++) { ?>
                            <td></td>
                        <?php } ?>
                    </tr>
                    <?php foreach ($emissionSource->ppucemsReportBms as $keyRB => $ppucemsReportBm) : ?>
                        <tr>
                            <td class="text-center"><?= $ppucemsReportBm->ppucemsrb_parameter_code_desc ?></td>
                            <?php foreach($ppucemsReportBm->ppucemsrbQuarters as $keyQ => $ppucemsrbQuarter) : ?>
                                <td class="text-right"><?= $ppucemsrbQuarter->ppucemsrbq_value ?> </td>
                            <?php endforeach; ?>
                            <td class="text-center"><?= $ppucemsReportBm->ppucemsrb_ref ?> </td>
                            <?php foreach($ppucemsReportBm->ppucemsrbQuarters as $keyQ => $ppucemsrbQuarter) : ?>
                                <td class="text-right"><?= sprintf("%s %%", $ppucemsrbQuarter->ppucemsrbq_value_percent_view); ?> </td>
                            <?php endforeach; ?>
                            <td><?= Converter::attachment($ppucemsReportBm->attachmentOwner, []); ?> </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>

                <tr>
                    <td class="text-center"><?= AppLabels::PPUCEMSRB_LONG_CONST_2 ?> </td>
                    <?php for($i=0; $i<10; $i++){ ?>
                        <td></td>
                    <?php } ?>
                </tr>
                <?php foreach ($model->ppuEmissionSources as $keyES => $emissionSource) : ?>
                    <tr>
                        <td> <?= $emissionSource->ppues_name ?> </td>
                        <?php for ($i = 0; $i < 10; $i++) { ?>
                            <td></td>
                        <?php } ?>
                    </tr>
                    <?php foreach ($emissionSource->ppucemsReportBms as $keyRB => $ppucemsReportBm) : ?>
                        <tr>
                            <td class="text-center"><?= $ppucemsReportBm->ppucemsrb_parameter_code_desc ?></td>
                            <?php foreach($ppucemsReportBm->ppucemsrbQuarters as $keyQ => $ppucemsrbQuarter) : ?>
                                <td class="text-right"><?= $ppucemsrbQuarter->ppucemsrbq_qs_value ?> </td>
                            <?php endforeach; ?>
                            <td class="text-center"><?= $ppucemsReportBm->ppucemsrb_ref ?> </td>
                            <?php foreach($ppucemsReportBm->ppucemsrbQuarters as $keyQ => $ppucemsrbQuarter) : ?>
                                <td class="text-right"><?= sprintf("%s %%", $ppucemsrbQuarter->ppucemsrbq_qs_value_percent_view); ?> </td>
                            <?php endforeach; ?>
                            <td><?= Converter::attachment($ppucemsReportBm->attachmentOwner, []); ?> </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
