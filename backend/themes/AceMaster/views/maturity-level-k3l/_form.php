<?php

use yii\widgets\ActiveForm;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use common\components\helpers\Converter;
use app\components\SubmitLinkButton;

/* @var $this yii\web\View */
/* @var $model backend\models\MaturityLevelK3l */
/* @var $form yii\widgets\ActiveForm */
/* @var $detailModels \backend\models\MaturityLevelK3lDetail[] */
/* @var $maturityLevelK3lTitles \backend\models\MaturityLevelK3lTitle[] */
/* @var $powerPlantModel backend\models\PowerPlant */

$no = 1;
$index = 0;
?>

<?php
$form = ActiveForm::begin([
    'id' => 'maturity-level-k3l-form',
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

<div class="row maturity-level-k3l-form">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <?php
        echo $form->field($model, 'sector_id')->hiddenInput(['value' => $powerPlantModel->sector_id])->error(false)->label(false);
        echo $form->field($model, 'power_plant_id')->hiddenInput(['value' => $powerPlantModel->id])->error(false)->label(false);

        echo $form->field($powerPlantModel->sector, 'sector_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['class' => 'form-control text-center', 'disabled' => true])
            ->label(AppLabels::SECTOR, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($powerPlantModel, 'pp_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['class' => 'form-control text-center', 'disabled' => true])
            ->label(AppLabels::POWER_PLANT, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);


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
                <th><?= AppLabels::EVIDEN; ?></th>
                <th><?= AppLabels::UNIT; ?></th>
                <th><?= AppLabels::TARGET; ?></th>
                <th><?= AppLabels::REALIZATION; ?></th>
                <th><?= AppLabels::WEIGHT; ?></th>
                <th><?= AppLabels::VALUE; ?></th>
                <th><?= AppLabels::DOCUMENTS; ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($maturityLevelK3lTitles as $keyTitle => $title): ?>
                <tr>
                    <td><strong><?= Converter::toRoman(++$keyTitle); ?>.</strong></td>
                    <td colspan="8"><strong><?= $title->title_text; ?></strong></td>
                </tr>
                <?php foreach ($title->maturityLevelK3lQuestions as $keyQuestion => $question): ?>
                    <tr>
                        <td>
                            <?php if(isset($detailModels[$index]['id'])) { ?>
                                <?= $form->field($detailModels[$index], '[' . $index . ']id')->hiddenInput()->label(false); ?>
                            <?php } ?>
                            <?= $form->field($detailModels[$index], '[' . $index . ']maturity_level_k3l_question_id')->hiddenInput(['value' => $question->id])->label(false); ?>
                            <?= $no++; ?>.
                        </td>
                        <td><?= $question->q_action_plan; ?></td>
                        <td><?= $question->q_criteria; ?></td>
                        <td><?= $question->q_eviden; ?></td>
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

