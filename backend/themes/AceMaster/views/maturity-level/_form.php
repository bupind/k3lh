<?php

use app\components\SubmitLinkButton;
use backend\models\Sector;
use common\components\helpers\Converter;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MaturityLevel */
/* @var $form yii\widgets\ActiveForm */
/* @var $detailModels \backend\models\MaturityLevelDetail[] */
/* @var $maturityLevelTitles \backend\models\MaturityLevelTitle[] */

$no = 1;
$index = 0;
?>

<?php
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

<div class="row maturity-level-form">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <?php
        echo $form->field($model, 'sector_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->dropDownList(Sector::map(new Sector(), 'sector_name'), ['class' => 'sector-list ' . AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        
        echo $form->field($model, 'mlvl_quarter', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        
        echo $form->field($model, 'mlvl_year', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        
        ?>
    </div>
</div>

<hr/>

<div class="row">
    <div class="col-xs-12">
        <table id="table-action" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
            <tr>
                <th><?= AppLabels::NUMBER_SHORT; ?></th>
                <th><?= AppLabels::ACTION_PLAN; ?></th>
                <th><?= AppLabels::CRITERIA; ?></th>
                <th><?= AppLabels::UNIT; ?></th>
                <th><?= AppLabels::TARGET; ?></th>
                <th><?= AppLabels::REALIZATION; ?></th>
                <th><?= AppLabels::WEIGHT; ?></th>
                <th><?= AppLabels::VALUE; ?></th>
                <th><?= AppLabels::DOCUMENTS; ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($maturityLevelTitles as $keyTitle => $title): ?>
                <tr>
                    <td><strong><?= Converter::toRoman(++$keyTitle); ?>.</strong></td>
                    <td colspan="8"><strong><?= $title->title_text; ?></strong></td>
                </tr>
                <?php foreach ($title->maturityLevelQuestions as $keyQuestion => $question): ?>
                    <tr>
                        <td>
                            <?= $form->field($detailModels[$index], '[' . $index . ']id')->hiddenInput()->label(false); ?>
                            <?= $form->field($detailModels[$index], '[' . $index . ']maturity_level_question_id')->hiddenInput(['value' => $question->id])->label(false); ?>
                            <?= $no++; ?>.
                        </td>
                        <td><?= $question->q_action_plan; ?></td>
                        <td><?= $question->q_criteria; ?></td>
                        <td><?= $question->q_unit_code_desc; ?></td>
                        <td>
                            <?= $form->field($detailModels[$index], '[' . $index . ']mld_target')->hiddenInput(['data-cell' => "AA$index", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC, 'data-formula' => "A$index"])->label(false); ?>
                            <?= $form->field($detailModels[$index], '[' . $index . ']mld_target_display', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_PLAIN_NO_LABEL])
                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => "A$index", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                                ->label(false, ['class' => '']); ?>
                        </td>
                        <td>
                            <?= $form->field($detailModels[$index], '[' . $index . ']mld_realization')->hiddenInput(['data-cell' => "BB$index", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC, 'data-formula' => "B$index"])->label(false); ?>
                            <?= $form->field($detailModels[$index], '[' . $index . ']mld_realization_display', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_PLAIN_NO_LABEL])
                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => "B$index", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                                ->label(false, ['class' => '']); ?>
                        </td>
                        <td>
                            <span data-cell="C<?= $index; ?>"
                                  data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $question->q_weight; ?></span>
                        </td>
                        <td>
                            <span data-cell="D<?= $index; ?>"
                                  data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"
                                  data-formula="(BB<?= $index; ?>/AA<?= $index; ?>)*C<?= $index; ?>"></span>
                        </td>
                        <td><?= Converter::attachment($detailModels[$index]->attachmentOwner, ['show_file_upload' => true, 'show_delete_file' => true, 'index' => $index]); ?></td>
                    </tr>
                    <?php $index++; endforeach; ?>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="6" class="text-center"><strong><?= AppLabels::TOTAL_MATURITY; ?></strong></th>
                <th><strong><span data-cell="E1" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"
                                  data-formula="SUM(C0:C<?= $index; ?>)"></span></strong></th>
                <th><strong><span data-cell="F1" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"
                                  data-formula="SUM(D0:D<?= $index; ?>)"></span></strong></th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 form-actions text-center">
        <?= SubmitLinkButton::widget(['formId' => 'working-plan-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
