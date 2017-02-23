<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitLinkButton;

/* @var $this yii\web\View */
/* @var $model backend\models\Ppu */
/* @var $form yii\widgets\ActiveForm */
/* @var $startDate DateTime */
?>

<?php
$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::POLLUTION_LOAD);
$this->params['breadcrumbs'][] = ['label' => AppLabels::BTN_UPDATE, 'url' => ['/ppu/update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="ppu-pollution-load">

        <div class="page-header">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>

    </div>

<?php
$form = ActiveForm::begin([
    'id' => 'ppu-pollution-load-form',
    'options' => [
        'class' => 'calx form-horizontal',
        'role' => 'form'
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div'
        ]
    ]
]);
?>

    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table id="table-pollution-load" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                    <thead>
                        <tr>
                            <th rowspan="2"><?= AppLabels::NUMBER_SHORT ?></th>
                            <th rowspan="2"><?= sprintf("%s %s", AppLabels::NUMBER_SHORT, "Param"); ?></th>
                            <th rowspan="2"><?= sprintf("%s %s", AppLabels::NAME, AppLabels::EMISSION_SOURCE); ?></th>
                            <th colspan="12" class="center"><?= AppLabels::ACTUAL_LOAD_POLLUTION_CALCULATION_RESULT?></th>
                            <th rowspan="2"><?= AppLabels::OPERATION_TIME ?></th>
                            <th rowspan="2"><?= sprintf("%s %s", AppLabels::AMOUNT, AppLabels::DATA); ?></th>
                            <th rowspan="2"><?= sprintf("%s %s/%s", AppLabels::TOTAL, AppLabels::KG, AppLabels::YEAR); ?></th>
                            <th rowspan="2"><?= sprintf("%s %s/%s", AppLabels::TOTAL, AppLabels::TON, AppLabels::YEAR); ?></th>
                        </tr>
                        <tr>
                            <?php for($i=0; $i<12; $i++){ ?>
                                <th><?= $startDate->format('M-Y') ?></th>
                            <?php $startDate->add(new \DateInterval('P1M')); } ?>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $count1 = 0; $count2 = 0; $count3 = 0; ?>
                    <?php $count4 = 0; $count5 = 0; $count6 = 0; ?>
                    <?php foreach ($model->ppuCompulsoryMonitoredEmissionSources as $key5 => $ppuCmes) : ; ?>
                        <?= $form->field($ppuCmes, "[$key5]ppucmes_operation_time")
                            ->hiddenInput(['data-cell' => "X$count1"])
                            ->label(false); ?>
                        <?php $count4 = $count1; $count1++;  ?>
                    <?php endforeach; ?>
                    <?php foreach ($model->ppuEmissionSources as $key1 => $ppuEmissionSource) : $keyES=$key1+1; ?>
                        <tr>
                            <td>
                                <?= $keyES ?>
                            </td>
                            <td>0</td>
                            <td>
                                <?= $ppuEmissionSource->ppues_chimney_name ?>
                            </td>
                        </tr>
                        <tr>
                            <?php $monthCount = 0 ?>
                            <?php foreach ($ppuEmissionSource->ppuParameterObligations as $key2 => $ppuParameterObligation) : $noParam = 1; ?>
                                <?php if ($ppuParameterObligation->ppupo_parameter_code == "LAJUALIR") { ?>
                                    <?php foreach ($ppuParameterObligation->ppupoMonths as $key3 => $ppupoMonth) : ?>
                                        <?= $form->field($ppupoMonth, "[$key3]ppupom_value")
                                            ->hiddenInput(['data-cell' => "Z$count2"])
                                            ->label(false); ?>
                                        <?php $count5 = $count2; $count2++; ?>
                                    <?php endforeach; ?>
                                <?php } else { ?>
                                    <td></td>
                                    <td> <?= $noParam ?> </td>
                                    <td> <?= $ppuParameterObligation->ppupo_parameter_code_desc ?> </td>
                                    <?php foreach ($ppuParameterObligation->ppupoMonths as $key4 => $ppupoMonth) : ?>
                                        <td>
                                            <?php if (!is_null($ppupoMonth->ppupom_value)) {
                                                $monthCount++;
                                            } ?>
                                            <?= $form->field($ppupoMonth, "[$key4]ppupom_value")
                                                ->hiddenInput(['data-cell' => "Y$count3"])
                                                ->label(false); ?>
                                            <?php $count6 = $count3; $count3++ ?>
                                            <?= Html::label("", null, ['data-cell' => "V$key4", 'data-format' => '0,0[.]000', 'data-formula' => "Z$count5*Y$count6*X$count4*0.0036", 'class' => 'control-label']); ?>
                                           </td>
                                    <?php endforeach; ?>
                                <?php } ?>
                            <?php endforeach; ?>
                            <td> <?= Html::label("", null, ['data-cell' => "", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC, 'data-formula' => "X$key1", 'class' => 'control-label']); ?> </td>
                            <td> <?= Html::label($monthCount, null, ['class' => 'control-label']); ?> </td>
                            <td><?= Html::label("", null, ['data-cell' => "A$key1", 'data-format' => '0,0[.]000', 'data-formula' => "SUM(V0:V$monthCount)/$monthCount", 'class' => 'control-label']); ?></td>
                            <td><?= Html::label("", null, ['data-cell' => "B$key1", 'data-format' => '0,0[.]000', 'data-formula' => "A$key1/1000", 'class' => 'control-label']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



<?php ActiveForm::end(); ?>