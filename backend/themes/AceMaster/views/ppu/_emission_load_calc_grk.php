<?php
use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\widgets\ActiveForm;
use common\components\helpers\Converter;
/* @var $this yii\web\View */
/* @var $model \backend\models\Ppu */
/* @var $startDate DateTime */

$startDate->setDate($model->ppu_year - 2, 7, 1);
?>

<?php $form = ActiveForm::begin([
    'id' => 'ppu-emission-load-grk-form',
    'options' => [
        'class' => 'form-horizontal calx',
        'role' => 'form',
        'enctype' => 'multipart/form-data',
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div',
        ]
    ]
]); ?>

<div class="page-header">
    <h1><?= Html::encode(sprintf("%s %s %s", AppLabels::BTN_VIEW, AppLabels::EMISSION_LOAD_CALCULATION, AppLabels::GRK)) ?></h1>
</div>


<div class="ppu-emission-load-calc-view">
    <div class="table-responsive">
        <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
            <tr>
                <th rowspan="2" class="text-center"><?= AppLabels::NUMBER_SHORT; ?></th>
                <th rowspan="2" class="text-center"><?= sprintf("%s %s", AppLabels::NAME, AppLabels::EMISSION_SOURCE); ?></th>
                <th rowspan="2" class="text-center"><?= AppLabels::PARAMETER; ?></th>
                <th rowspan="1" class="text-center"><?= sprintf("%s %s %s", AppLabels::EMISSION_LOAD, AppLabels::YEAR, $startDate->format('Y')); ?></th>
                <?php $startDate->add(new \DateInterval('P1Y')); ?>
                <th rowspan="2" class="text-center"><?= AppLabels::ATTACHMENT_SUPPORTING_EVIDENCE; ?></th>
                <th rowspan="1" class="text-center"><?= sprintf("%s %s %s", AppLabels::EMISSION_LOAD, AppLabels::YEAR, $startDate->format('Y')); ?></th>
                <?php $startDate->setDate($model->ppu_year - 2, 7, 1); ?>
                <th rowspan="2" class="text-center"><?= AppLabels::ATTACHMENT_SUPPORTING_EVIDENCE; ?></th>
            </tr>
            <tr>
                <th rowspan="1" class="text-center"><?= sprintf("%s (%s)",AppLabels::EMISSION_LOAD, AppLabels::TON); ?></th>
                <th rowspan="1" class="text-center"><?= sprintf("%s (%s)",AppLabels::EMISSION_LOAD, AppLabels::TON); ?></th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($model->ppuEmissionSources as $key => $emissionSource): ?>
                    <?php foreach($emissionSource->ppuEmissionLoadGrks as $keyELG => $emissionLoadGrk): ?>
                        <tr>
                            <td class="text-right"><?= $key + 1; ?></td>
                            <td class="text-center"><?= $emissionSource->ppues_name; ?></td>
                            <td class="text-center"><?= $emissionLoadGrk->ppuelg_parameter; ?></td>
                            <?php foreach($emissionLoadGrk->ppuEmissionLoadGrkCalcs as $keyELGC => $emissionLoadGrkCalc): ?>
                                <td data-format="0,000[.]00" class="text-right"><?= $emissionLoadGrkCalc->ppuelg_emission_load_total ?></td>
                                <td class="text-center"><?= Converter::attachment($emissionLoadGrkCalc->attachmentOwner, []); ?></td>
                            <?php endforeach; ?>

                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="table-responsive">
        <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <?php foreach ($model->ppuEmissionSources as $key => $emissionSource): ?>
                    <th colspan="2" class="text-center"> <?= $emissionSource->ppues_name ?> </th>
                <?php endforeach; ?>
            </tr>
            <tr>
                <th></th>
                <th><?= AppLabels::DESCRIPTION ?> </th>
                <th><?= AppLabels::UNIT ?></th>
                <?php foreach ($model->ppuEmissionSources as $key => $emissionSource): ?>
                    <th colspan="1" class="text-center"><?= $startDate->format('Y') ?></th>
                    <?php $startDate->add(new \DateInterval('P1Y')); ?>
                    <th colspan="1" class="text-center"><?= $startDate->format('Y')?></th>
                    <?php $startDate->setDate($model->ppu_year - 2, 7, 1); ?>
                <?php endforeach; ?>

            </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td><?= AppLabels::COAL_USAGE ?></td>
                    <td>KTon</td>
                    <?php foreach ($model->ppuEmissionSources as $key => $emissionSource): ?>
                        <?php foreach($emissionSource->ppuEmissionLoadGrks as $keyELG => $emissionLoadGrk): ?>
                            <?php foreach($emissionLoadGrk->ppuEmissionLoadGrkCalcs as $keyELGC => $emissionLoadGrkCalc): ?>
                                <td class="text-right" data-format="0.000[.]00"><?= $emissionLoadGrkCalc->ppueglc_coal_usage ?></td>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </tr>

                <tr>
                    <td></td>
                    <td><?= AppLabels::CARBON_CONTENT ?></td>
                    <td>% Ave</td>
                    <?php foreach ($model->ppuEmissionSources as $key => $emissionSource): ?>
                        <?php foreach($emissionSource->ppuEmissionLoadGrks as $keyELG => $emissionLoadGrk): ?>
                            <?php foreach($emissionLoadGrk->ppuEmissionLoadGrkCalcs as $keyELGC => $emissionLoadGrkCalc): ?>
                                <td class="text-right" data-format="0.000[.]00"><?= $emissionLoadGrkCalc->ppueglc_carbon_content ?></td>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </tr>

                <tr>
                    <td></td>
                    <td><?= AppLabels::ACTUAL_CARBON_CONTENT ?></td>
                    <td>Ton C/Kton</td>
                    <?php foreach ($model->ppuEmissionSources as $key => $emissionSource): ?>
                        <?php foreach($emissionSource->ppuEmissionLoadGrks as $keyELG => $emissionLoadGrk): ?>
                            <?php foreach($emissionLoadGrk->ppuEmissionLoadGrkCalcs as $keyELGC => $emissionLoadGrkCalc): ?>
                                <td class="text-right" data-format="0.000[.]00"><?= $emissionLoadGrkCalc->ppueglc_carbon_actual_content ?></td>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </tr>

                <tr>
                    <td></td>
                    <td><?= sprintf("%s %s", AppLabels::MW, AppLabels::CO2) ?></td>
                    <td>44</td>
                    <?php foreach ($model->ppuEmissionSources as $key => $emissionSource): ?>
                        <?php foreach($emissionSource->ppuEmissionLoadGrks as $keyELG => $emissionLoadGrk): ?>
                            <?php foreach($emissionLoadGrk->ppuEmissionLoadGrkCalcs as $keyELGC => $emissionLoadGrkCalc): ?>
                                <td class="text-right" data-format="0.000[.]00"><?= $emissionLoadGrkCalc->ppueglc_mw_carbondioxyde ?></td>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </tr>

                <tr>
                    <td></td>
                    <td><?= AppLabels::ANC ?></td>
                    <td>12</td>
                    <?php foreach ($model->ppuEmissionSources as $key => $emissionSource): ?>
                        <?php foreach($emissionSource->ppuEmissionLoadGrks as $keyELG => $emissionLoadGrk): ?>
                            <?php foreach($emissionLoadGrk->ppuEmissionLoadGrkCalcs as $keyELGC => $emissionLoadGrkCalc): ?>
                                <td class="text-right" data-format="0.000[.]00"><?= $emissionLoadGrkCalc->ppueglc_anc ?></td>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </tr>

                <tr>
                    <td></td>
                    <td><?= AppLabels::OXIDATION_FACTOR ?></td>
                    <td>0.98</td>
                    <?php foreach ($model->ppuEmissionSources as $key => $emissionSource): ?>
                        <?php foreach($emissionSource->ppuEmissionLoadGrks as $keyELG => $emissionLoadGrk): ?>
                            <?php foreach($emissionLoadGrk->ppuEmissionLoadGrkCalcs as $keyELGC => $emissionLoadGrkCalc): ?>
                                <td class="text-right" data-format="0.000[.]00"><?= $emissionLoadGrkCalc->ppueglc_oxidation_factor ?></td>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </tr>

            </tbody>
        </table>
    </div>
</div>

<?php ActiveForm::end(); ?>
