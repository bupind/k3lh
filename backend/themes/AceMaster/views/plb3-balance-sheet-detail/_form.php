<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;
use backend\models\Codeset;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3BalanceSheetDetail */
/* @var $form yii\widgets\ActiveForm */
/* @var $plb3bs_model backend\models\Plb3BalanceSheet */
/* @var $bst String */
/* @var $startDate DateTime */
/* @var $plb3bsdMonth backend\models\Plb3bsdMonth[] */
/* @var $plb3BalanceSheetTreatment backend\models\Plb3BalanceSheetTreatment[] */
?>

<?php
$form = ActiveForm::begin([
    'id' => 'plb3-balance-sheet-detail-form',
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

<div class="plb3-balance-sheet-detail-form">

    <div class="col-xs-8 col-xs-offset-2" >
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"> <?= AppLabels::WASTE ?>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php if ($model->getIsNewRecord()) {
                            echo Html::hiddenInput('Plb3BalanceSheetDetail[plb3_balance_sheet_id]', $plb3bs_model->id);
                        } else {
                            echo $form->field($model, 'plb3_balance_sheet_id')
                                ->hiddenInput([])->label(false)->error(false);
                        } ?>
                        <?= Html::activeHiddenInput($model, 'form_type_code') ?>
                        <?= $form->field($model, 'plb3_waste_type')
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']); ?>
                        <?= $form->field($model, 'plb3_waste_source_code')
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PLB3_BS_WASTE_TYPE_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                            ->label(null, ['class' => '']); ?>
                        <?= $form->field($model, 'plb3_waste_unit_code')
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PLB3_BS_WASTE_UNIT_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                            ->label(null, ['class' => '']); ?>
                    </fieldset>
                </div>
            </div>
        </div>
        <hr/>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table id="table-pollution-load" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center"><?= AppLabels::TREATMENT ?> </th>
                            <th rowspan="2" class="text-center" width="5%"><?= sprintf("%s %s", AppLabels::WASTE, AppLabels::LAST_PERIOD) ?></th>
                            <th rowspan="1" colspan="6" class="text-center"><?= sprintf("%s %s", AppLabels::YEAR, $startDate->format('Y')); ?> </th>
                            <?php $startDate->add(new \DateInterval('P1Y')); ?>
                            <th rowspan="1" colspan="6" class="text-center"><?= sprintf("%s %s", AppLabels::YEAR, $startDate->format('Y')); ?> </th>
                            <?php  $startDate->setDate($plb3bs_model->plb3_year - 1, 7, 1); ?>
                            <th rowspan="2" class="text-center"><?= sprintf("%s %s", AppLabels::AMOUNT, AppLabels::WASTE) ?></th>
                            <th rowspan="2" class="text-center"><?= sprintf("%s %s", AppLabels::PERCENTAGE, AppLabels::SETUP); ?></th>
                            <th rowspan="2" class="text-center"><?= AppLabels::DESCRIPTION ?> </th>
                            <th rowspan="2"><?= AppLabels::MANIFEST_CODE ?> </th>
                        </tr>
                        <tr>
                            <?php for($i=0;$i<12;$i++) : ?>
                                <th rowspan="1" colspan="1"><?= $startDate->format('M'); ?></th>
                                <?php $startDate->add(new \DateInterval('P1M')); ?>
                            <?php endfor; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($plb3BalanceSheetTreatment as $keyBST => $plb3Treatment) : $startDate->setDate($plb3bs_model->plb3_year - 1, 7, 1); ?>
                            <tr>
                                <?php if($keyBST == 1) { ?>
                                    <td class="text-center">
                                        <?= AppLabels::TPS_STORED ?>
                                        <?php if(!$model->getIsNewRecord()) { ?>
                                            <?= $form->field($plb3Treatment, "[$keyBST]id")->hiddenInput()->label(false); ?>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?= $form->field($model, 'plb3_previous_waste_display')
                                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'data-cell' => "ZZ0", 'data-format' => '0,0[.]0000'])
                                            ->label(false)->error(false) ?>

                                        <?= $form->field($model, 'plb3_previous_waste')->hiddenInput(['data-cell' => 'Z0', 'data-formula' => 'ZZ0', 'data-format' => '0[.]000000'])->label(false)->error(false
                                        ); ?>
                                    </td>
                                        <?php foreach($plb3bsdMonth as $keyPLM => $plbMonth) : $keyT = $keyPLM+1 ?>
                                            <td>
                                                <?= Html::textInput("[$keyPLM]tps_stored", null, ['class' => 'text-right', 'disabled' => true, 'data-cell' => "Z$keyT", 'data-formula' => "Z$keyPLM+A$keyPLM-C$keyPLM-D$keyPLM-E$keyPLM-F$keyPLM-G$keyPLM", 'data-format' => '0,0[.]000'] ) ?>
                                            </td>
                                        <?php endforeach; ?>
                                    <td>
                                        <?= Html::textInput("total_waste", null, ['class' => 'text-right', 'disabled' => true, 'data-cell' => "X1", 'data-formula' => "Z12", 'data-format' => '0,0[.]000'] ) ?>
                                    </td>
                                    <td>
                                        <?= Html::textInput("waste_percentage", null, ['class' => 'text-right', 'disabled' => true, 'data-cell' => "Y$keyBST", 'data-formula' => "(X$keyBST/X0)", 'data-format' => '0[.]00%'] ) ?>
                                    </td>
                                <?php }else{ ?>
                                    <td class="text-center"> <?= Codeset::getCodesetValue(AppConstants::CODESET_PLB3_BS_TREATMENT_TYPE_CODE, $plb3Treatment->getTreatmentType($keyBST)) ?></td>
                                    <td>
                                        <?php if(!$model->getIsNewRecord()) { ?>
                                            <?= $form->field($plb3Treatment, "[$keyBST]id")->hiddenInput()->label(false); ?>
                                        <?php } ?>
                                    </td>
                                    <?php if($model->getIsNewRecord()){ ?>
                                        <?php foreach($plb3bsdMonth as $keyPLM => $plbMonth) : $alphabet = $plb3Treatment->toAlphabet($keyBST);?>
                                            <td>
                                                <?= $form->field($plbMonth, "[$keyBST][$keyPLM]plb3bsdm_value_display")
                                                    ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'data-cell' => "$alphabet$alphabet$keyPLM", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                                                    ->label(false); ?>

                                                <?= $form->field($plbMonth, "[$keyBST][$keyPLM]plb3bsdm_value")->hiddenInput(['data-cell' => "$alphabet$keyPLM", 'data-formula' => "$alphabet$alphabet$keyPLM", 'data-format' => '0[.]000000'])->label(false); ?>
                                                <?= $form->field($plbMonth, "[$keyBST][$keyPLM]plb3bsdm_month")->hiddenInput(['value' => $startDate->format('m')])->label(false); ?>
                                                <?= $form->field($plbMonth, "[$keyBST][$keyPLM]plb3bsdm_year")->hiddenInput(['value' => $startDate->format('Y')])->label(false); ?>
                                                <?php $startDate->add(new \DateInterval('P1M')); ?>
                                            </td>

                                        <?php endforeach; ?>
                                    <?php }else{ ?>
                                        <?php foreach($plb3Treatment->plb3bsdMonths as $keyPLM => $plbMonth) : $alphabet = $plb3Treatment->toAlphabet($keyBST);?>
                                            <td>
                                                <?php if(!$model->getIsNewRecord()) { ?>
                                                    <?= $form->field($plbMonth, "[$keyBST][$keyPLM]id")->hiddenInput()->label(false); ?>
                                                <?php } ?>
                                                <?= $form->field($plbMonth, "[$keyBST][$keyPLM]plb3bsdm_value_display")
                                                    ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'data-cell' => "$alphabet$alphabet$keyPLM", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                                                    ->label(false); ?>

                                                <?= $form->field($plbMonth, "[$keyBST][$keyPLM]plb3bsdm_value")->hiddenInput(['data-cell' => "$alphabet$keyPLM", 'data-formula' => "$alphabet$alphabet$keyPLM", 'data-format' => '0[.]000000'])->label(false); ?>
                                                <?= $form->field($plbMonth, "[$keyBST][$keyPLM]plb3bsdm_month")->hiddenInput(['value' => $startDate->format('m')])->label(false); ?>
                                                <?= $form->field($plbMonth, "[$keyBST][$keyPLM]plb3bsdm_year")->hiddenInput(['value' => $startDate->format('Y')])->label(false); ?>
                                                <?php $startDate->add(new \DateInterval('P1M')); ?>
                                            </td>

                                        <?php endforeach; ?>
                                    <?php } ?>

                                    <?php $alphabet = $plb3Treatment->toAlphabet($keyBST); $alphabet0 = sprintf("%s0", $alphabet); $alphabet11 = sprintf("%s11", $alphabet); ?>
                                    <?php if($keyBST == 0) { ?>
                                        <td>
                                            <?= Html::textInput("total_waste", null, ['class' => 'text-right', 'disabled' => true, 'data-cell' => "X$keyBST", 'data-formula' => "SUM($alphabet0:$alphabet11)+ZZ0", 'data-format' => '0,0[.]000'] ) ?>
                                        </td>
                                        <td></td>
                                    <?php }else{ ?>
                                        <td>
                                            <?= Html::textInput("total_waste", null, ['class' => 'text-right', 'disabled' => true, 'data-cell' => "X$keyBST", 'data-formula' => "SUM($alphabet0:$alphabet11)", 'data-format' => '0,0[.]000'] ) ?>
                                        </td>
                                        <td>
                                            <?= Html::textInput("waste_percentage", null, ['class' => 'text-right', 'disabled' => true, 'data-cell' => "Y$keyBST", 'data-formula' => "(X$keyBST/X0)", 'data-format' => '0[.]00%'] ) ?>
                                        </td>
                                    <?php } ?>
                                <?php } ?>

                                <td>
                                    <?= $form->field($plb3Treatment, "[$keyBST]plb3bst_treatment_type_code")->hiddenInput(['value' => $plb3Treatment->getTreatmentType($keyBST)])->label(false); ?>
                                    <?= $form->field($plb3Treatment, "[$keyBST]plb3bst_ref")
                                        ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                        ->label(false); ?>
                                </td>
                                <td>
                                    <?= $form->field($plb3Treatment, "[$keyBST]plb3bst_manifest_code")
                                        ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                        ->label(false); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', 'plb3bsId' => $plb3bs_model->id, 'bst' => $bst], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>

</div>

<?php ActiveForm::end(); ?>