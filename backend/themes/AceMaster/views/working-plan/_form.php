<?php

use app\components\SubmitLinkButton;
use backend\assets\WorkingPlanAsset;
use backend\models\Codeset;
use backend\models\Sector;
use backend\models\WorkingPlanAttribute;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\components\helpers\Converter;

WorkingPlanAsset::register($this);
$baseUrl = Url::base();

/* @var $this yii\web\View */
/* @var $model backend\models\WorkingPlan */
/* @var $form yii\widgets\ActiveForm */
/* @var $legends backend\models\Codeset */
?>

<?php
echo Html::hiddenInput('baseUrl', $baseUrl, ['id' => 'baseUrl']);

$form = ActiveForm::begin([
    'id' => 'working-plan-form',
    'options' => [
        'class' => 'calx form-horizontal',
        'role' => 'form',
        'enctype' => 'multipart/form-data'
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div'
        ]
    ]
]);
?>

<div class="row working-plan-form">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <?php
        echo Html::activeHiddenInput($model, 'form_type_code');
        
        echo $form->field($model, 'sector_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->dropDownList(Sector::map(new Sector(), 'sector_name'), ['class' => 'sector-list ' . AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'wp_year', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        
        ?>
    </div>
</div>

<hr/>

<div class="row">
    <div class="col-xs-12">
        <table id="table-program" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
            <tr>
                <th><?= AppLabels::PROGRAM; ?></th>
                <th><?= AppLabels::RNR; ?></th>
                <th><?= AppLabels::LOCATION; ?></th>
                <th><?= AppLabels::PIC; ?></th>
                <th><?= AppLabels::DOCUMENTS; ?></th>
                <th><?= AppLabels::ACTION; ?></th>
            </tr>
            <tr>
                <th colspan="6" class="text-center">
                    <?= Html::radioList('attr_type_code', AppConstants::ATTRIBUTE_TYPE_PROGRAM_ITEM, Codeset::customMap(AppConstants::CODESET_NAME_ATTRIBUTE_TYPE_CODE, 'cset_value', [
                        'andWhere' => [
                            ['!=', 'cset_code', AppConstants::ATTRIBUTE_TYPE_TARGET]
                        ],
                        'empty' => false
                    ]), ['item' => function ($index, $label, $name, $checked, $value) {
                        return Html::tag('label', Html::radio($name, $checked, ['value' => $value]) . $label, ['class' => 'radio-inline']);
                    }, 'id' => 'program_attr_radio']); ?>
                </th>
            </tr>
            <tr id="row-header" class="hide">
                <th colspan="5">
                    <?= Html::dropDownList('attr_text_header', null, WorkingPlanAttribute::map(new WorkingPlanAttribute(), 'attr_text', null, true, [
                        'where' => [
                            ['attr_type_code' => AppConstants::ATTRIBUTE_TYPE_PROGRAM_HEADER]
                        ]
                    ]), ['id' => 'attr_text_header', 'class' => 'form-control']); ?>
                </th>
                <th>
                    <?= Html::button(AppLabels::BTN_INSERT, ['class' => 'btn btn-xs btn-success btn-insert', 'data-dropdown' => 'attr_text_header']); ?>
                </th>
            </tr>
            <tr id="row-sub-header" class="hide">
                <th colspan="5">
                    <?= Html::dropDownList('attr_text_sub_header', null, WorkingPlanAttribute::map(new WorkingPlanAttribute(), 'attr_text', null, true, [
                        'where' => [
                            ['attr_type_code' => AppConstants::ATTRIBUTE_TYPE_PROGRAM_SUB_HEADER]
                        ]
                    ]), ['id' => 'attr_text_sub_header', 'class' => 'form-control']); ?>
                </th>
                <th>
                    <?= Html::button(AppLabels::BTN_INSERT, ['class' => 'btn btn-xs btn-success btn-insert', 'data-dropdown' => 'attr_text_sub_header']); ?>
                </th>
            </tr>
            <tr id="row-item">
                <th colspan="6">
                    <?= Html::textInput('attr_text', null, ['id' => 'attr_text', 'class' => 'form-control']); ?>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($model->workingPlanDetails as $key => $detail): ?>
                <?php if ($detail->workingPlanAttribute->attr_type_code == AppConstants::ATTRIBUTE_TYPE_PROGRAM_ITEM): ?>
                    <tr>
                        <td>
                            <?= Html::activeHiddenInput($detail, "[$key]id"); ?>
                            <?= $detail->workingPlanAttribute->attr_text; ?>
                        </td>
                        <td>
                            <?= Html::activeRadioList($detail, "[$key]wpd_rnr", AppConstants::$rnrList, [
                                'item' => function ($index, $label, $name, $checked, $value) {
                                    return Html::tag('label', Html::radio($name, $checked, ['value' => $value]) . $label, ['class' => 'radio-inline']);
                                }
                            ]); ?>
                        </td>
                        <td><?= Html::activeTextarea($detail, "[$key]wpd_location", ['class' => 'form-control']); ?></td>
                        <td><?= Html::activeTextarea($detail, "[$key]wpd_pic", ['class' => 'form-control']); ?></td>
                        <td id="attachment_<?= $key; ?>"><?= Converter::attachment($detail->attachmentOwner, ['show_file_upload' => true, 'index' => $key]); ?></td>
                        <td>
                            <?= Html::button('<i class="ace-icon fa fa-table bigger-110 icon-only"></i>', ['class' => 'btn btn-primary btn-xs btn-calendar', 'data-id' => $detail->working_plan_attribute_id]); ?>
                            
                            <?php if (!empty($detail->attachmentOwner)): ?>
                                <?= Html::button('<i class="ace-icon fa fa-file-pdf-o bigger-110 icon-only"></i>', ['class' => 'btn btn-xs btn-pink btn-remove-attachment', 'data-id' => $detail->attachmentOwner->attachment_id, 'data-module-code' => AppConstants::MODULE_CODE_WORKING_PLAN, 'data-index' => $key]); ?>
                            <?php endif; ?>
                            
                            <?= Html::button('<i class="ace-icon fa fa-trash bigger-110 icon-only"></i>', ['class' => 'btn btn-xs btn-pink btn-remove-ajax', 'data-id' => $detail->id]); ?>
                        </td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td colspan="5">
                            <?= Html::activeHiddenInput($detail, "[$key]id"); ?>
                            <strong><?= $detail->workingPlanAttribute->attr_text; ?></strong>
                        </td>
                        <td><?= Html::button(AppLabels::BTN_DELETE, ['class' => 'btn btn-xs btn-pink btn-remove-ajax', 'data-id' => $detail->id, 'data-controller' => 'working-plan-detail']); ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 form-actions text-center">
        <?= SubmitLinkButton::widget(['formId' => 'working-plan-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

<div id="calendar-table" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCalendarTableLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel"><?= AppLabels::PROGRAM_PROGRESS; ?></h4>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin([
                    'action' => ['working-plan/ajax-save-detail'],
                    'id' => 'calendar-form',
                    'options' => [
                        'role' => 'form'
                    ]
                ]); ?>
                <?= Html::hiddenInput('calendar_attribute_id', null, ['id' => 'calendar-attribute-id']); ?>
                <div class="row">
                    <div class="col-sm-4">
                        <label><strong><?= AppLabels::JANUARY; ?></strong></label>
                        <div class="row">
                            <div class="col-xs-12">
                                <?= Html::dropDownList('progress[1][1]', null, ['' => 'M 1', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p11']); ?>
                                <?= Html::dropDownList('progress[1][2]', null, ['' => 'M 2', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p12']); ?>
                                <?= Html::dropDownList('progress[1][3]', null, ['' => 'M 3', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p13']); ?>
                                <?= Html::dropDownList('progress[1][4]', null, ['' => 'M 4', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p14']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label><strong><?= AppLabels::FEBRUARY; ?></strong></label>
                        <div class="row">
                            <div class="col-xs-12">
                                <?= Html::dropDownList('progress[2][1]', null, ['' => 'M 1', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p21']); ?>
                                <?= Html::dropDownList('progress[2][2]', null, ['' => 'M 2', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p22']); ?>
                                <?= Html::dropDownList('progress[2][3]', null, ['' => 'M 3', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p23']); ?>
                                <?= Html::dropDownList('progress[2][4]', null, ['' => 'M 4', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p24']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label><strong><?= AppLabels::MARCH; ?></strong></label>
                        <div class="row">
                            <div class="col-xs-12">
                                <?= Html::dropDownList('progress[3][1]', null, ['' => 'M 1', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p31']); ?>
                                <?= Html::dropDownList('progress[3][2]', null, ['' => 'M 2', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p32']); ?>
                                <?= Html::dropDownList('progress[3][3]', null, ['' => 'M 3', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p33']); ?>
                                <?= Html::dropDownList('progress[3][4]', null, ['' => 'M 4', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p34']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4">
                        <label><strong><?= AppLabels::APRIL; ?></strong></label>
                        <div class="row">
                            <div class="col-xs-12">
                                <?= Html::dropDownList('progress[4][1]', null, ['' => 'M 1', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p41']); ?>
                                <?= Html::dropDownList('progress[4][2]', null, ['' => 'M 2', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p42']); ?>
                                <?= Html::dropDownList('progress[4][3]', null, ['' => 'M 3', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p43']); ?>
                                <?= Html::dropDownList('progress[4][4]', null, ['' => 'M 4', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p44']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label><strong><?= AppLabels::MAY; ?></strong></label>
                        <div class="row">
                            <div class="col-xs-12">
                                <?= Html::dropDownList('progress[5][1]', null, ['' => 'M 1', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p51']); ?>
                                <?= Html::dropDownList('progress[5][2]', null, ['' => 'M 2', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p52']); ?>
                                <?= Html::dropDownList('progress[5][3]', null, ['' => 'M 3', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p53']); ?>
                                <?= Html::dropDownList('progress[5][4]', null, ['' => 'M 4', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p54']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label><strong><?= AppLabels::JUNE; ?></strong></label>
                        <div class="row">
                            <div class="col-xs-12">
                                <?= Html::dropDownList('progress[6][1]', null, ['' => 'M 1', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p61']); ?>
                                <?= Html::dropDownList('progress[6][2]', null, ['' => 'M 2', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p62']); ?>
                                <?= Html::dropDownList('progress[6][3]', null, ['' => 'M 3', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p63']); ?>
                                <?= Html::dropDownList('progress[6][4]', null, ['' => 'M 4', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p64']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4">
                        <label><strong><?= AppLabels::JULY; ?></strong></label>
                        <div class="row">
                            <div class="col-xs-12">
                                <?= Html::dropDownList('progress[7][1]', null, ['' => 'M 1', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p71']); ?>
                                <?= Html::dropDownList('progress[7][2]', null, ['' => 'M 2', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p72']); ?>
                                <?= Html::dropDownList('progress[7][3]', null, ['' => 'M 3', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p73']); ?>
                                <?= Html::dropDownList('progress[7][4]', null, ['' => 'M 4', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p74']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label><strong><?= AppLabels::AUGUST; ?></strong></label>
                        <div class="row">
                            <div class="col-xs-12">
                                <?= Html::dropDownList('progress[8][1]', null, ['' => 'M 1', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p81']); ?>
                                <?= Html::dropDownList('progress[8][2]', null, ['' => 'M 2', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p82']); ?>
                                <?= Html::dropDownList('progress[8][3]', null, ['' => 'M 3', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p83']); ?>
                                <?= Html::dropDownList('progress[8][4]', null, ['' => 'M 4', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p84']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label><strong><?= AppLabels::SEPTEMBER; ?></strong></label>
                        <div class="row">
                            <div class="col-xs-12">
                                <?= Html::dropDownList('progress[9][1]', null, ['' => 'M 1', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p91']); ?>
                                <?= Html::dropDownList('progress[9][2]', null, ['' => 'M 2', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p92']); ?>
                                <?= Html::dropDownList('progress[9][3]', null, ['' => 'M 3', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p93']); ?>
                                <?= Html::dropDownList('progress[9][4]', null, ['' => 'M 4', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p94']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-4">
                        <label><strong><?= AppLabels::OCTOBER; ?></strong></label>
                        <div class="row">
                            <div class="col-xs-12">
                                <?= Html::dropDownList('progress[10][1]', null, ['' => 'M 1', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p101']); ?>
                                <?= Html::dropDownList('progress[10][2]', null, ['' => 'M 2', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p102']); ?>
                                <?= Html::dropDownList('progress[10][3]', null, ['' => 'M 3', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p103']); ?>
                                <?= Html::dropDownList('progress[10][4]', null, ['' => 'M 4', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p104']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label><strong><?= AppLabels::NOVEMBER; ?></strong></label>
                        <div class="row">
                            <div class="col-xs-12">
                                <?= Html::dropDownList('progress[11][1]', null, ['' => 'M 1', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p111']); ?>
                                <?= Html::dropDownList('progress[11][2]', null, ['' => 'M 2', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p112']); ?>
                                <?= Html::dropDownList('progress[11][3]', null, ['' => 'M 3', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p113']); ?>
                                <?= Html::dropDownList('progress[11][4]', null, ['' => 'M 4', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p114']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label><strong><?= AppLabels::DECEMBER; ?></strong></label>
                        <div class="row">
                            <div class="col-xs-12">
                                <?= Html::dropDownList('progress[12][1]', null, ['' => 'M 1', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p121']); ?>
                                <?= Html::dropDownList('progress[12][2]', null, ['' => 'M 2', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p122']); ?>
                                <?= Html::dropDownList('progress[12][3]', null, ['' => 'M 3', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p123']); ?>
                                <?= Html::dropDownList('progress[12][4]', null, ['' => 'M 4', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['id' => 'p124']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-xs-12">
                        <label><strong><?= AppLabels::LEGEND; ?></strong></label>
                        <ul class="list list-unstyled working_plan">
                            <?php foreach ($legends as $legend): ?>
                                <li><label class="progress_<?= $legend->cset_code; ?>"><?= sprintf('%s : %s', $legend->cset_code, $legend->cset_value); ?></label></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?= Html::submitButton('<i class="ace-icon fa fa-check"></i> ' . AppLabels::BTN_SAVE, ['class' => 'btn btn-sm btn-primary']); ?>
                <?= Html::button('<i class="ace-icon fa fa-times"></i> ' . AppLabels::BTN_CANCEL, ['class' => 'btn btn-sm btn-danger close-modal', 'data-dismiss' => 'modal']); ?>
            </div>
    
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
