<?php
use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\Codeset;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model \backend\models\Plb3BalanceSheet */
/* @var $startDate DateTime */
/* @var $bst string */
/* @var $plb3bsdMonth backend\models\Plb3bsdMonth */
?>

<?php
$form = ActiveForm::begin([
    'id' => 'ppu-emission-load-calc',
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
$countPW = -1;
$countPW2 = 0;
$countTW = 0;
$countT = 0;
$countT2 = 0;
$countP = 0;
$countM = 0;
$countM2 = 0;
$shortNumber = 0;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table id="table-pollution-load" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                <thead>
                <tr>
                    <th rowspan="2" class="text-center"><?= AppLabels::NUMBER_SHORT ?></th>
                    <th rowspan="2" class="text-center"><?= sprintf("%s %s", AppLabels::WASTE_TYPE, AppLabels::B3 ); ?></th>
                    <th rowspan="2" class="text-center"><?= AppLabels::WASTE_SOURCE ?></th>
                    <th rowspan="2" class="text-center"><?= AppLabels::UNIT ?></th>
                    <th rowspan="2" class="text-center"><?= AppLabels::TREATMENT ?> </th>
                    <th rowspan="2" class="text-center" width="5%"><?= sprintf("%s %s", AppLabels::WASTE, AppLabels::LAST_PERIOD) ?></th>
                    <th rowspan="1" colspan="6" class="text-center"><?= sprintf("%s %s", AppLabels::YEAR, $startDate->format('Y')); ?> </th>
                    <?php $startDate->add(new \DateInterval('P1Y')); ?>
                    <th rowspan="1" colspan="6" class="text-center"><?= sprintf("%s %s", AppLabels::YEAR, $startDate->format('Y')); ?> </th>
                    <?php  $startDate->setDate($model->plb3_year - 1, 7, 1); ?>
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
                <?php foreach ($model->plb3BalanceSheetDetails as $keyBSD => $plb3Detail) :  ?>
                    <?php if ($plb3Detail->form_type_code == $bst) : ?>
                        <tr>
                            <td rowspan="8" class="text-center"><?= $shortNumber+1 ?></td>
                            <td rowspan="8"> <?= $plb3Detail->plb3_waste_type ?></td>
                            <td rowspan="8"> <?= $plb3Detail->plb3_waste_source_code_desc ?></td>
                            <td rowspan="8"> <?= $plb3Detail->plb3_waste_unit_code_desc ?></td>
                        </tr>
                        <?php $shortNumber++ ?>
                        <?php foreach ($plb3Detail->plb3BalanceSheetTreatments as $keyBST => $plb3Treatment) : $startDate->setDate($model->plb3_year - 1, 7, 1); ?>
                            <tr>
                                <?php if ($keyBST == 1) { ?>
                                    <td class="text-center">
                                        <?= AppLabels::TPS_STORED ?>
                                    </td>
                                    <td class="text-right">
                                        <?php $countPW++; ?>
                                        <?= $form->field($plb3Detail, 'plb3_previous_waste')->hiddenInput(['data-cell' => "Z$countPW", 'data-format' => '0[.]000000'])->label(false)->error(false); ?>
                                        <span class="text-right" data-cell="<?= "ZZ$countPW" ?>"
                                              data-format="<?= '0,0[.]0000' ?>"
                                              data-formula="<?= "Z$countPW" ?>"></span>
                                        <?php $countPW2++; ?>
                                    </td>
                                    <?php foreach ($plb3bsdMonth as $keyPLM => $plbMonth) : if($keyPLM == 0) {$count6 = sprintf("Z%s", $countPW); }else{$count6 = sprintf("J%s", $countTW-1);}  ?>
                                        <td class="text-right">

                                        <span class="text-right" data-cell="<?= "J$countTW" ?>"
                                              data-format="<?= '0,0[.]000' ?>"
                                              data-formula="<?= "$count6+A$countTW-C$countTW-D$countTW-E$countTW-F$countTW-G$countTW" ?>"></span>
                                        </td>
                                        <?php $countTW++; ?>
                                    <?php endforeach; ?>
                                    <td class="text-right">
                                        <?php $count2 = $countTW-1; ?>
                                        <span class="text-right" data-cell="<?= "X$countT" ?>" data-format="<?= '0,0[.]000' ?>"
                                              data-formula="<?= "J$count2" ?>"></span>
                                        <?php $countT++ ?>
                                    </td>
                                    <td class="text-right">
                                        <?php $count3 = $countT - 1; $count4 = $count3 - 1; ?>
                                        <span class="text-right" data-cell="<?= "Y$countP" ?>"
                                              data-format="<?= '0[.]00%' ?>" data-formula="<?= "(X$count3/X$count4)" ?>"></span>
                                        <?php $countP++ ?>
                                    </td>
                                <?php } else { ?>
                                    <td class="text-center"> <?= Codeset::getCodesetValue(AppConstants::CODESET_PLB3_BS_TREATMENT_TYPE_CODE, $plb3Treatment->getTreatmentType($keyBST)) ?></td>
                                    <td>
                                    </td>
                                    <?php foreach ($plb3Treatment->plb3bsdMonths as $keyPLM => $plbMonth) : $alphabet = $plb3Treatment->toAlphabet($keyBST); ?>
                                        <td class="text-right">
                                            <?= $form->field($plbMonth, "[$keyBST][$keyPLM]plb3bsdm_value")->hiddenInput(['data-cell' => "$alphabet$countM2", 'data-format' => '0[.]000000'])->label(false); ?>
                                            <span class="text-right" data-cell="<?= "$alphabet$alphabet$countM2" ?>"
                                                  data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC ?>"
                                                  data-formula="<?= "$alphabet$countM2" ?>"></span>
                                            <?php $startDate->add(new \DateInterval('P1M')); $countM2++; ?>
                                        </td>

                                    <?php endforeach; ?>


                                    <?php
                                    $countM2 = $countM;
                                    $count5 = $countT2 + 11;
                                    $alphabet = $plb3Treatment->toAlphabet($keyBST);
                                    $alphabet0 = sprintf("%s$countT2", $alphabet);
                                    $alphabet11 = sprintf("%s$count5", $alphabet); ?>
                                    <?php if ($keyBST == 0) { ?>
                                        <td class="text-right">
                                            <span class="text-right" data-cell="<?= "X$countT" ?>"
                                                  data-format="<?= '0,0[.]000' ?>"
                                                  data-formula="<?= "SUM($alphabet0:$alphabet11)+ZZ$countPW2" ?>"></span>
                                            <?php $countT++ ?>
                                        </td>
                                        <td> <?php $countP++; ?> </td>
                                    <?php } else { ?>
                                        <td class="text-right">
                                            <span class="text-right" data-cell="<?= "X$countT" ?>"
                                                  data-format="<?= '0,0[.]000' ?>"
                                                  data-formula="<?= "SUM($alphabet0:$alphabet11)" ?>"></span>
                                            <?php $countT++ ?>

                                        </td>
                                        <td class="text-right">
                                            <?php $count3 = $countT - 1; $count4 = $count3 - $keyBST; ?>
                                            <span class="text-right" data-cell="<?= "Y$countP" ?>"
                                                  data-format="<?= '0[.]00%' ?>"
                                                  data-formula="<?= "(X$count3/X$count4)" ?>"></span>
                                            <?php $countP++; ?>
                                        </td>
                                    <?php } ?>
                                <?php } ?>

                                <td>
                                    <?= $plb3Treatment->plb3bst_ref ?>
                                </td>
                                <td>
                                    <?= $plb3Treatment->plb3bst_manifest_code ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php $countM = $countM + 12; $countM2 = $countM; $countT2 = $count5 + 1; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php ActiveForm::end(); ?>