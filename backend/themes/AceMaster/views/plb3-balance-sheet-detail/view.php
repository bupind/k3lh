<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use backend\models\Codeset;
use common\vendor\AppConstants;
use yii\widgets\ActiveForm;
use app\components\ViewButton;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3BalanceSheetDetail */
/* @var $startDate DateTime */
/* @var $plb3bs_model backend\models\Plb3BalanceSheet */
/* @var $plb3bsdMonth backend\models\Plb3bsdMonth[] */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->plb3_waste_type);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::BALANCE_SHEET, $title), 'url' => ['index', 'plb3bsId' => $model->plb3BalanceSheet->id, 'bst' => $model->form_type_code]];
$this->params['breadcrumbs'][] = ['label' => $model->plb3_waste_type];
$plb3BalanceSheetTreatment = $model->plb3BalanceSheetTreatments;
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

<div class="plb3-balance-sheet-detail-view">

    <div class="page-header">
        <h1>
            <?= Html::encode($this->title) ?>
            <?php if (isset($this->params['subtitle'])): ?>
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <?= $this->params['subtitle']; ?>
                </small>
            <?php endif; ?>
        </h1>
    </div>

    <div class="col-xs-12 col-md-4 col-md-offset-4 ">
        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'excluded' => ['form_type_code', 'plb3_balance_sheet_id', 'plb3_previous_waste'],
                'converter' => [
                    'plb3_waste_source_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->plb3_waste_source_code_desc],
                    'plb3_waste_unit_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->plb3_waste_unit_code_desc],
                ]
            ]
        ]); ?>
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
                                    <?= $form->field($model, 'plb3_previous_waste')->hiddenInput(['data-cell' => 'Z0', 'data-format' => '0[.]000000'])->label(false)->error(false); ?>
                                    <span class="text-right" data-cell="<?= "ZZ0" ?>" data-format="<?= '0,0[.]0000' ?>" data-formula="<?= "Z0" ?>"></span>
                                </td>
                                <?php foreach($plb3bsdMonth as $keyPLM => $plbMonth) : $keyT = $keyPLM+1 ?>
                                    <td>
                                        <span class="text-right" data-cell="<?= "Z$keyT" ?>" data-format="<?= '0,0[.]000' ?>" data-formula="<?= "Z$keyPLM+A$keyPLM-C$keyPLM-D$keyPLM-E$keyPLM-F$keyPLM-G$keyPLM" ?>"></span>
                                    </td>
                                <?php endforeach; ?>
                                <td>
                                    <span class="text-right" data-cell="<?= "X1" ?>" data-format="<?= '0,0[.]000' ?>" data-formula="<?= "Z12" ?>"></span>
                                </td>
                                <td>
                                    <span class="text-right" data-cell="<?= "Y$keyBST" ?>" data-format="<?= '0[.]00%' ?>" data-formula="<?= "(X$keyBST/X0)" ?>"></span>
                                </td>
                            <?php }else{ ?>
                                <td class="text-center"> <?= Codeset::getCodesetValue(AppConstants::CODESET_PLB3_BS_TREATMENT_TYPE_CODE, $plb3Treatment->getTreatmentType($keyBST)) ?></td>
                                <td>
                                    <?php if(!$model->getIsNewRecord()) { ?>
                                        <?= $form->field($plb3Treatment, "[$keyBST]id")->hiddenInput()->label(false); ?>
                                    <?php } ?>
                                </td>
                                <?php foreach ($plb3Treatment->plb3bsdMonths as $keyPLM => $plbMonth) : $alphabet = $plb3Treatment->toAlphabet($keyBST); ?>
                                    <td>
                                        <?php if (!$model->getIsNewRecord()) { ?>
                                            <?= $form->field($plbMonth, "[$keyBST][$keyPLM]id")->hiddenInput()->label(false); ?>
                                        <?php } ?>
                                            <?= $form->field($plbMonth, "[$keyBST][$keyPLM]plb3bsdm_value")->hiddenInput(['data-cell' => "$alphabet$keyPLM", 'data-format' => '0[.]000000'])->label(false); ?>
                                            <span class="text-right" data-cell="<?= "$alphabet$alphabet$keyPLM" ?>" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC ?>" data-formula="<?= "$alphabet$keyPLM" ?>"></span>
                                        <?php $startDate->add(new \DateInterval('P1M')); ?>
                                    </td>

                                <?php endforeach; ?>

                                <?php $alphabet = $plb3Treatment->toAlphabet($keyBST); $alphabet0 = sprintf("%s0", $alphabet); $alphabet11 = sprintf("%s11", $alphabet); ?>
                                <?php if($keyBST == 0) { ?>
                                    <td>
                                        <span class="text-right" data-cell="<?= "X$keyBST" ?>" data-format="<?= '0,0[.]000' ?>" data-formula="<?= "SUM($alphabet0:$alphabet11)+ZZ0" ?>"></span>
                                    </td>
                                    <td></td>
                                <?php }else{ ?>
                                    <td>
                                        <span class="text-right" data-cell="<?= "X$keyBST" ?>" data-format="<?= '0,0[.]000' ?>" data-formula="<?= "SUM($alphabet0:$alphabet11)" ?>"></span>
                                    </td>
                                    <td>
                                        <span class="text-right" data-cell="<?= "Y$keyBST" ?>" data-format="<?= '0[.]00%' ?>" data-formula="<?= "(X$keyBST/X0)" ?>"></span>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'buttons' => [
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', 'plb3bsId' => $model->plb3BalanceSheet->id, 'bst' => $model->form_type_code], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', 'plb3bsId' => $model->plb3BalanceSheet->id, 'bst' => $model->form_type_code], ['class' => 'btn btn-white btn-danger btn-bold']),
                        'edit' => Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['update', 'plb3bsId' => $model->plb3BalanceSheet->id, 'bst' => $model->form_type_code, 'id' => $model->id], ['class' => 'btn btn-white btn-info btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
