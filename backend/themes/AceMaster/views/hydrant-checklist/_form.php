<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitButton;
use yii\redactor\widgets\Redactor;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\HydrantChecklist */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $questionList backend\models\HydrantQuestion[] */
/* @var $answerList backend\models\HcDetail[] */
?>

<?php
$form = ActiveForm::begin([
    'id' => 'important-phone-number-form',
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
$index = 0;
?>

<div class="hydrant-checklist-form">

    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <?php

            echo $form->field($model, 'sector_id')->hiddenInput(['value' => $powerPlantModel->sector_id])->error(false)->label(false);
            echo $form->field($model, 'power_plant_id')->hiddenInput(['value' => $powerPlantModel->id])->error(false)->label(false);

            echo $form->field($powerPlantModel->sector, 'sector_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput([ 'class' => 'form-control text-center', 'disabled' => true])
                ->label(AppLabels::SECTOR, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($powerPlantModel, 'pp_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput([ 'class' =>  'form-control text-center', 'disabled' => true])
                ->label(AppLabels::POWER_PLANT, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "hc_number", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "hc_location", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, 'hc_date', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->widget(
                    DatePicker::className(), [
                        'model' => $model,
                        'attribute' => 'hc_date',
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'dd MM yyyy',
                            'todayHighlight' => true
                        ]
                    ]
                )
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            ?>



        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="col-xs-12">
            <table id="table-work-env-data" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL ?>">
                <thead>
                <tr>
                    <th class="center" colspan="5">
                        Ikuti rekomendasi pembuat, Seluruh informasi yang diperlukan harus didokumentasi dan ditandatangani
                    </th>
                </tr>
                <tr>
                    <th rowspan="2" class="center">
                        <?= sprintf("%s %s", AppLabels::ITEM, AppLabels::INSPECTION);  ?>
                    </th>
                    <th class="center" rowspan="1" colspan="3">
                        <?= AppLabels::CONDITION ?>
                    </th>
                    <th class="center" rowspan="2">
                        <?= AppLabels::DESCRIPTION ?>
                    </th>
                </tr>
                <tr>
                    <th class="center">
                        <?= AppLabels::GOOD ?>
                    </th>
                    <th class="center">
                        <?= AppLabels::ENOUGH ?>
                    </th>
                    <th class="center">
                        <?= AppLabels::BAD ?>
                    </th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($questionList as $key => $question): ?>
                        <tr>


                            <?php if ($model->getIsNewRecord()) { ?>
                                <td class="center">
                                    <?= $question->hq_question ?>
                                </td>
                                <td colspan="1" class="text-center">
                                    <?= Html::hiddenInput("HcDetail[$index][hydrant_question_id]", $question->id); ?>
                                    <?= Html::radio("HcDetail[$index][hcd_answer]", false, ['value' => '0', 'class' => 'radio-inline']) ?>
                                </td>
                                <td colspan="1" class="text-center">
                                    <?= Html::radio("HcDetail[$index][hcd_answer]", true, ['value' => '1', 'class' => 'radio-inline']) ?>
                                </td>
                                <td colspan="1" class="text-center">
                                    <?= Html::radio("HcDetail[$index][hcd_answer]", true, ['value' => '2', 'class' => 'radio-inline']) ?>
                                </td>

                            <?php } else { ?>
                                <td class="center">
                                    <?= $answerList[$question->id]->hydrantQuestion->hq_question ?>
                                </td>
                                <td colspan="1" class="text-center">
                                    <?= Html::activeHiddenInput($answerList[$question->id], "[$index]id"); ?>
                                    <?= Html::activeHiddenInput($answerList[$question->id], "[$index]hydrant_question_id"); ?>
                                    <?= Html::activeHiddenInput($answerList[$question->id], "[$index]hydrant_checklist_id"); ?>
                                    <?= Html::activeRadio($answerList[$question->id], "[$index]hcd_answer", ['label' => '', 'value' => 0, 'uncheck' => null]); ?>
                                </td>
                                <td colspan="1" class="text-center">
                                    <?= Html::activeRadio($answerList[$question->id], "[$index]hcd_answer", ['label' => '', 'value' => 1, 'uncheck' => null]); ?>
                                </td>
                                <td colspan="1" class="text-center">
                                    <?= Html::activeRadio($answerList[$question->id], "[$index]hcd_answer", ['label' => '', 'value' => 2, 'uncheck' => null]); ?>
                                </td>
                            <?php } ?>
                            <?php $index++; ?>
                            <?php if($index == 1) : ?>
                                <td rowspan="<?= count($questionList) ?>" class="center" width="15%">
                                    Isi pada kolom: Baik; Cukup; Kurang, sesuai dengan kondisi sebenarnya.
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <?php
            echo $form->field($model, 'hc_note', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->widget(Redactor::className(), [
                    'clientOptions' => [
                        'imageUpload' => ['/redactor/upload/image'],
                        'imageUploadCallback' => new \yii\web\JsExpression("
                                            function(image, json) {
                                            image.addClass('img-responsive')
                                            }
                                           "),
                        'plugins' => ['imagemanager']
                    ]
                ])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            ?>
        </div>
    </div>

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', '_ppId' => $powerPlantModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>

</div>

<?php ActiveForm::end(); ?>