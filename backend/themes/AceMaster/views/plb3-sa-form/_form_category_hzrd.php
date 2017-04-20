<?php

use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\Plb3SaQuestion;
use common\components\helpers\Converter;
use common\components\helpers\PLB3Helper;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3SaForm */
/* @var $form yii\widgets\ActiveForm */
/* @var $codeset \backend\models\Codeset */
/* @var $startDate DateTime */
/* @var $plb3SAModel \backend\models\Plb3SelfAssessment */
/* @var $plb3SaFormDetailModels \backend\models\Plb3SaFormDetail[] */
/* @var $plb3SaFormDetailStaticModel \backend\models\Plb3SaFormDetailStatic */
/* @var $plb3SaFormDetailStaticQuarterModels \backend\models\Plb3SaFormDetailStaticQuarter[] */
/* @var $index int */

$no = 1;
?>

<h4 class="header lighter green"><?= $codeset->cset_value; ?></h4>
<table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
    <thead>
    <tr>
        <th><?= AppLabels::NUMBER_SHORT; ?>.</th>
        <th><?= AppLabels::IMPLEMENTATION_OF_B3_WASTE_MANAGEMENT; ?></th>
        <th class="text-center" width="40%"><?= AppLabels::PERFORMANCE; ?></th>
        <th><?= AppLabels::DOCUMENTS; ?></th>
    </tr>
    </thead>
    <tbody>
    
    <tr>
        <td><?= $no++; ?></td>
        <td><strong><?= AppLabels::PLB3_STATIC_QUESTION_HEADER; ?></strong></td>
        <td><strong><?= AppLabels::YES_NO; ?></strong></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td><?= $plb3SaFormDetailStaticModel->getAttributeLabel('plb3safds_ans_1'); ?></td>
        <td>
            <?= Html::hiddenInput('Plb3SaFormDetailStatic[index]', $index); ?>
            <?php
            if (!$plb3SaFormDetailStaticModel->isNewRecord) {
                echo Html::activeHiddenInput($plb3SaFormDetailStaticModel, "id");
            }
            ?>
            <?= Html::activeDropDownList($plb3SaFormDetailStaticModel, 'plb3safds_ans_1', AppConstants::$yesNoList, ['class' => 'form-control']); ?>
        </td>
        <td rowspan="3">
            <?= Converter::attachments($plb3SaFormDetailStaticModel->attachmentOwners, [
                    'show_file_upload' => true,
                    'show_delete_file' => true,
                    'index' => $index
                ]); $index++; ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?= $plb3SaFormDetailStaticModel->getAttributeLabel('plb3safds_ans_2'); ?></td>
        <td><?= Html::activeDropDownList($plb3SaFormDetailStaticModel, 'plb3safds_ans_2', AppConstants::$yesNoList, ['class' => 'form-control']); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?= $plb3SaFormDetailStaticModel->getAttributeLabel('plb3safds_ans_3'); ?></td>
        <td><?= Html::activeDropDownList($plb3SaFormDetailStaticModel, 'plb3safds_ans_3', AppConstants::$yesNoList, ['class' => 'form-control']); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><strong><?= AppLabels::PLB3_STATIC_QUESTION_QUARTER_HEADER; ?></strong></td>
        <td>
            <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                <tr>
                    <td><strong><?= sprintf('%s 3 %s %s', AppLabels::QUARTER, AppLabels::YEAR, $startDate->format('Y')); ?></strong></td>
                    <td><strong><?= sprintf('%s 4 %s %s', AppLabels::QUARTER, AppLabels::YEAR, $startDate->format('Y')); ?></strong></td>
                    <td><strong><?= sprintf('%s 1 %s %s', AppLabels::QUARTER, AppLabels::YEAR, $plb3SAModel->plb3_year); ?></strong></td>
                    <td><strong><?= sprintf('%s 2 %s %s', AppLabels::QUARTER, AppLabels::YEAR, $plb3SAModel->plb3_year); ?></strong></td>
                </tr>
            </table>
            <?php
            
            echo Html::hiddenInput('Plb3SaFormDetailStaticQuarter[0][index]', $index);
            echo Html::activeHiddenInput($plb3SaFormDetailStaticQuarterModels[0], '[0]plb3safdsq_quarter', ['value' => 3]);
            echo Html::activeHiddenInput($plb3SaFormDetailStaticQuarterModels[1], '[1]plb3safdsq_quarter', ['value' => 4]);
            echo Html::activeHiddenInput($plb3SaFormDetailStaticQuarterModels[2], '[2]plb3safdsq_quarter', ['value' => 1]);
            echo Html::activeHiddenInput($plb3SaFormDetailStaticQuarterModels[3], '[3]plb3safdsq_quarter', ['value' => 2]);

            if (!$plb3SaFormDetailStaticQuarterModels[0]->isNewRecord) {
                echo Html::activeHiddenInput($plb3SaFormDetailStaticQuarterModels[0], "[0]id");
                echo Html::activeHiddenInput($plb3SaFormDetailStaticQuarterModels[1], "[1]id");
                echo Html::activeHiddenInput($plb3SaFormDetailStaticQuarterModels[2], "[2]id");
                echo Html::activeHiddenInput($plb3SaFormDetailStaticQuarterModels[3], "[3]id");
            }
            ?>
        </td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td><?= $plb3SaFormDetailStaticQuarterModels[0]->getAttributeLabel('plb3safdsq_ans_1'); ?></td>
        <td>
            <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                <tr>
                    <td><?= Html::activeDropDownList($plb3SaFormDetailStaticQuarterModels[0], '[0]plb3safdsq_ans_1', AppConstants::$yesNoList, ['class' => 'form-control']); ?></td>
                    <td><?= Html::activeDropDownList($plb3SaFormDetailStaticQuarterModels[1], '[1]plb3safdsq_ans_1', AppConstants::$yesNoList, ['class' => 'form-control']); ?></td>
                    <td><?= Html::activeDropDownList($plb3SaFormDetailStaticQuarterModels[2], '[2]plb3safdsq_ans_1', AppConstants::$yesNoList, ['class' => 'form-control']); ?></td>
                    <td><?= Html::activeDropDownList($plb3SaFormDetailStaticQuarterModels[3], '[3]plb3safdsq_ans_1', AppConstants::$yesNoList, ['class' => 'form-control']); ?></td>
                </tr>
            </table>
        </td>
        <td rowspan="3">
            <?= Converter::attachments($plb3SaFormDetailStaticQuarterModels[0]->attachmentOwners, [
                'show_file_upload' => true,
                'show_delete_file' => true,
                'index' => $index
            ]); $index++; ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?= $plb3SaFormDetailStaticQuarterModels[0]->getAttributeLabel('plb3safdsq_ans_2'); ?></td>
        <td>
            <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                <tr>
                    <td><?= Html::activeDropDownList($plb3SaFormDetailStaticQuarterModels[0], '[0]plb3safdsq_ans_2', AppConstants::$yesNoList, ['class' => 'form-control']); ?></td>
                    <td><?= Html::activeDropDownList($plb3SaFormDetailStaticQuarterModels[1], '[1]plb3safdsq_ans_2', AppConstants::$yesNoList, ['class' => 'form-control']); ?></td>
                    <td><?= Html::activeDropDownList($plb3SaFormDetailStaticQuarterModels[2], '[2]plb3safdsq_ans_2', AppConstants::$yesNoList, ['class' => 'form-control']); ?></td>
                    <td><?= Html::activeDropDownList($plb3SaFormDetailStaticQuarterModels[3], '[3]plb3safdsq_ans_2', AppConstants::$yesNoList, ['class' => 'form-control']); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?= $plb3SaFormDetailStaticQuarterModels[0]->getAttributeLabel('plb3safdsq_ans_3'); ?></td>
        <td>
            <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                <tr>
                    <td><?= Html::activeDropDownList($plb3SaFormDetailStaticQuarterModels[0], '[0]plb3safdsq_ans_3', AppConstants::$yesNoList, ['class' => 'form-control']); ?></td>
                    <td><?= Html::activeDropDownList($plb3SaFormDetailStaticQuarterModels[1], '[1]plb3safdsq_ans_3', AppConstants::$yesNoList, ['class' => 'form-control']); ?></td>
                    <td><?= Html::activeDropDownList($plb3SaFormDetailStaticQuarterModels[2], '[2]plb3safdsq_ans_3', AppConstants::$yesNoList, ['class' => 'form-control']); ?></td>
                    <td><?= Html::activeDropDownList($plb3SaFormDetailStaticQuarterModels[3], '[3]plb3safdsq_ans_3', AppConstants::$yesNoList, ['class' => 'form-control']); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    
    <?php foreach (Plb3SaQuestion::find()
                       ->where(['category_code' => $codeset->cset_code])
                       ->andWhere(['parent_id' => null])
                       ->all() as $l1Key => $questionL1): ?>
        <tr>
            <td><?= $no++; ?>.</td>
            <td colspan="3"><?= $questionL1->label; ?></td>
        </tr>
        <?php foreach ($questionL1->getChild() as $l2Key => $questionL2): ?>
            <?php if ($questionL2->is_question == AppConstants::STATUS_YES): ?>
                <tr>
                    <td>
                        <?php
                        if (!$plb3SaFormDetailModels[$questionL2->id]->isNewRecord) {
                            echo Html::activeHiddenInput($plb3SaFormDetailModels[$questionL2->id], "[$index]id");
                        }
                        ?>
                    </td>
                    <td>
                        <?= $questionL2->label; ?>
                        <?= $form->field($plb3SaFormDetailModels[$questionL2->id], "[$index]plb3_sa_question_id")->hiddenInput(['value' => $questionL2->id])->label(false)->error(false); ?>
                    </td>
                    <td><?= PLB3Helper::generateSAInput($plb3SaFormDetailModels[$questionL2->id], $questionL2->input_type_code, $index) ?></td>
                    <td>
                        <?= Converter::attachments($plb3SaFormDetailModels[$questionL2->id]->attachmentOwners, [
                            'show_file_upload' => true,
                            'show_delete_file' => true,
                            'index' => $index
                        ]); ?>
                    </td>
                </tr>
                <?php $index++; ?>
            <?php else: ?>
                <tr>
                    <td></td>
                    <td colspan="3"><?= $questionL2->label; ?></td>
                </tr>
            
                <?php foreach ($questionL2->getChild() as $l3Key => $questionL3): ?>
                    <?php if ($questionL3->is_question == AppConstants::STATUS_YES): ?>
                        <tr>
                            <td>
                                <?php
                                if (!$plb3SaFormDetailModels[$questionL3->id]->isNewRecord) {
                                    echo Html::activeHiddenInput($plb3SaFormDetailModels[$questionL3->id], "[$index]id");
                                }
                                ?>
                            </td>
                            <td>
                                <?= $questionL3->label; ?>
                                <?= $form->field($plb3SaFormDetailModels[$questionL3->id], "[$index]plb3_sa_question_id")->hiddenInput(['value' => $questionL3->id])->label(false)->error(false); ?>
                            </td>
                            <td><?= PLB3Helper::generateSAInput($plb3SaFormDetailModels[$questionL3->id], $questionL3->input_type_code, $index) ?></td>
                            <td>
                                <?= Converter::attachments($plb3SaFormDetailModels[$questionL3->id]->attachmentOwners, [
                                    'show_file_upload' => true,
                                    'show_delete_file' => true,
                                    'index' => $index
                                ]); ?>
                            </td>
                        </tr>
                        <?php $index++; ?>
                    <?php else: ?>
                        <tr>
                            <td></td>
                            <td colspan="3"><?= $questionL3->label; ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
    </tbody>
</table>
