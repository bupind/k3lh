<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use kartik\widgets\DatePicker;
use common\vendor\AppLabels;
use backend\models\Plb3Question;
use app\components\SubmitButton;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3ChecklistDetail */
/* @var $form yii\widgets\ActiveForm */
/* @var $questionGroups backend\models\Codeset[] */
/* @var $answerModels backend\models\Plb3ChecklistAnswer[] */
/* @var $pct string */
/* @var $plb3c_model backend\models\Plb3Checklist */
/* @var $question backend\models\Plb3Question */
?>

<?php
$form = ActiveForm::begin([
    'id' => 'plb3-checklist-detail-form',
    'options' => [
        'class' => 'form-horizontal',
        'role' => 'form',
        'enctype' => 'multipart/form-data',
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div'
        ]
    ]
]);

$no = 1;
$index = 0;
?>

<div class="plb3-checklist-detail-form">

    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <?php
             if ($model->getIsNewRecord()) {
                echo Html::hiddenInput('Plb3ChecklistDetail[plb3_checklist_id]', $plb3c_model->id);
            } else {
                echo $form->field($model, 'plb3_checklist_id')
                    ->hiddenInput([])->label(false)->error(false);
            }

            echo $form->field($model, 'plb3cd_company_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            echo $form->field($model, 'plb3cd_industrial_sector', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            echo $form->field($model, 'plb3cd_location', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            echo $form->field($model, 'plb3cd_assessment_team', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        ?>
        <div>
            <label class="col-md-3 control-label no-padding-right"><?= AppLabels::ASSESSMENT_DATE ?></label>
            <div class="col-md-9">

                <?php
                echo DatePicker::widget([
                    'model' => $model,
                    'attribute' => "plb3cd_assessment_date",
                    'id' => 'date1',
                    'type' => DatePicker::TYPE_INPUT,
                    'options' => ['class' => 'form-control'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => 'true'
                    ],
                ])
                ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?php foreach ($questionGroups as $qKey => $qGroup): ?>
                <h4 class="header lighter green"><?= $qGroup->cset_value; ?></h4>
                <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                    <thead>
                    <tr>
                        <th rowspan="2" class="text-center" width="1%"><?= AppLabels::NUMBER_SHORT; ?>.</th>
                        <th rowspan="2" class="text-center"><?= AppLabels::TERMS; ?></th>
                        <th rowspan="1" colspan="2" class="text-center" width="10%"><?= AppLabels::ANSWER; ?></th>
                        <th rowspan="2" class="text-center" width="20%"><?= AppLabels::DESCRIPTION ?> </th>
                    </tr>
                    <tr>
                        <th class="text-center" width="5%">Ya</th>
                        <th class="text-center" width="5%">Tidak</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach (Plb3Question::map(new Plb3Question(), 'plb3_question', null, false, [
                            'where' => [
                                ['plb3_question_type_code' => $qGroup->cset_code, 'plb3_form_type_code' => $pct ]
                            ],
                            'empty' => false
                        ]) as $plb3QuestionId => $plb3Question): ?>
                            <tr>
                                <td class="text-right"> <?= $no++ ?> </td>
                                <td> <?= $plb3Question ?> </td>
                                <?php if ($model->getIsNewRecord()) { ?>
                                    <td colspan="1" class="text-center">
                                        <?= Html::hiddenInput("Plb3ChecklistAnswer[$index][plb3_question_id]", $plb3QuestionId); ?>
                                        <?= Html::radio("Plb3ChecklistAnswer[$index][plb3ca_answer]", false, ['value' => '1', 'class' => 'radio-inline']) ?>
                                    </td>
                                    <td colspan="1" class="text-center">
                                        <?= Html::radio("Plb3ChecklistAnswer[$index][plb3ca_answer]", true, ['value' => '0', 'class' => 'radio-inline']) ?>
                                    </td>
                                    <td class="text-center">
                                        <?= Converter::attachment($answerModels[$index]->attachmentOwner, ['show_file_upload' => true, 'show_delete_file' => true, 'index' => $index]); ?>
                                    </td>
                                <?php } else { ?>
                                        <td colspan="1" class="text-center">
                                            <?= Html::activeHiddenInput($answerModels[$plb3QuestionId], "[$index]id"); ?>
                                            <?= Html::activeHiddenInput($answerModels[$plb3QuestionId], "[$index]plb3_question_id"); ?>
                                            <?= Html::activeHiddenInput($answerModels[$plb3QuestionId], "[$index]plb3_checklist_detail_id"); ?>
                                            <?= Html::activeRadio($answerModels[$plb3QuestionId], "[$index]plb3ca_answer", ['label' => '', 'value' => 1, 'uncheck' => null]); ?>
                                        </td>
                                        <td colspan="1" class="text-center">
                                            <?= Html::activeRadio($answerModels[$plb3QuestionId], "[$index]plb3ca_answer", ['label' => '', 'value' => 0, 'uncheck' => null]); ?>
                                        </td>
                                        <td class="text-center">
                                            <?= Converter::attachment($answerModels[$plb3QuestionId]->attachmentOwner, ['show_file_upload' => true, 'show_delete_file' => true, 'index' => $index]); ?>
                                        </td>
                                <?php } ?>
                                <?php $index++; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', 'plb3cId' => $plb3c_model->id, 'pct' => $pct], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>

</div>

<?php ActiveForm::end(); ?>
