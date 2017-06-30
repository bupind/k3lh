<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitButton;
use yii\redactor\widgets\Redactor;
use kartik\date\DatePicker;
use common\components\helpers\Converter;
use backend\assets\FileUploadAsset;

/* @var $this yii\web\View */
/* @var $model backend\models\HousekeepingImplementation */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $questionList backend\models\HousekeepingQuestion[] */
/* @var $answerList backend\models\HiDetail[] */
FileUploadAsset::register($this);
?>

<?php
$form = ActiveForm::begin([
    'id' => 'housekeeping-implementation-form',
    'options' => [
        'class' => 'calx form-horizontal',
        'role' => 'form',
        'enctype' => 'multipart/form-data',
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div'
        ]
    ]
]);
$index = 0;
$alphabet = range('A', 'Z');
$alphabetLower = range('a', 'z');
$totalCriteria = 0;
$totalQuality = 0;
?>

<div class="housekeeping-implementation-form">

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

            echo $form->field($model, "hi_unit", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, 'hi_date', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->widget(
                    DatePicker::className(), [
                        'model' => $model,
                        'attribute' => 'hi_date',
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'dd MM yyyy',
                            'todayHighlight' => true
                        ]
                    ]
                )
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                echo $form->field($model, "hi_auditor", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                    ->textInput(['maxlength' => true, 'class' => 'form-control'])
                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            ?>
            <label class="col-md-3 control-label no-padding-right"><?= $model->getAttributeLabel('files'); ?></label>
            <div class="col-md-9">
                <?= Converter::attachments($model->attachmentOwners, [
                    'show_file_upload' => true,
                    'show_delete_file' => true
                ]); ?>
                <span class="help-inline col-xs-12 col-md-7">
                        <span class="middle">
                            <div class="hint-block"><?= AppConstants::HINT_UPLOAD_FILES; ?></div>
                        </span>
                    </span>
            </div>
        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="col-xs-12">
            <table id="table-housekeeping-implementation" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL ?>">
                <thead>
                <tr>
                    <th> <?= AppLabels::NUMBER_SHORT ?> </th>
                    <th class="center" width="35%">
                        <?= sprintf("%s Implementasi 5S", AppLabels::CRITERIA);  ?>
                    </th>
                    <th class="center" colspan="2" width="3%">
                        <?= sprintf("%s Nilai", AppLabels::CRITERIA);  ?>
                    </th>
                    <th class="center" colspan="2" width="5%">
                        <?= sprintf("%% %s", AppLabels::QUALITY);  ?>
                    </th>
                    <th class="center">
                        <?= sprintf("%s", AppLabels::RECOMMENDATION);  ?>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($questionList as $key => $question): ?>
                    <tr>
                        <td class="center">
                            <?= sprintf("%s.", $alphabet[$key]); ?>
                        </td>
                        <td colspan="6">
                            <?= $question->hq_title ?>
                        </td>
                    </tr>
                    <?php foreach ($question->hqDetails as $keyD => $detail): ?>
                        <tr>
                            <td class="center">
                                <?= $keyD + 1 ?>
                            </td>
                            <td colspan="6">
                                <?= $detail->hqd_subtitle ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                a.
                            </td>
                            <td>
                                <?= $detail->hqd_criteria_1 ?>
                            </td>
                            <td class="center">
                                5
                            </td>
                            <?php if (!$model->getIsNewRecord()) { ?>
                                <td rowspan="5">
                                    <?= Html::activeHiddenInput($answerList[$detail->id], "[$index]id"); ?>
                                    <?= Html::activeHiddenInput($answerList[$detail->id], "[$index]housekeeping_implementation_id"); ?>
                                    <?= Html::activeHiddenInput($answerList[$detail->id], "[$index]hq_detail_id"); ?>
                                    <?= Html::activeTextInput($answerList[$detail->id], "[$index]hi_criteria_value", ['maxlength' => true, 'class' => 'form-control numbersOnly text-right']); ?>
                                </td>
                                <td class="center">
                                    90-100
                                </td>
                                <td rowspan="5">
                                    <?= Html::activeTextInput($answerList[$detail->id], "[$index]hi_quality_value", ['maxlength' => true, 'class' => 'form-control numbersOnly text-right']); ?>
                                </td>
                                <td rowspan="5">
                                    <?= $form->field($answerList[$detail->id], "[$index]hi_recommendation", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_PLAIN_NO_LABEL])
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
                                        ->label(false); ?>
                                </td>
                            <?php } else { ?>
                                <td rowspan="5">
                                    <?= Html::hiddenInput("HiDetail[$index][hq_detail_id]", $detail->id); ?>
                                    <?= Html::textInput("HiDetail[$index][hi_criteria_value]", null, ['maxlength' => '1','class' => 'form-control numbersOnly text-right']); ?>
                                </td>
                                <td class="center">
                                    90-100
                                </td>
                                <td rowspan="5">
                                    <?= Html::textInput("HiDetail[$index][hi_quality_value]", null, ['maxlength' => '3', 'class' => 'form-control numbersOnly text-right']); ?>
                                </td>
                                <td rowspan="5">
                                    <?= \yii\redactor\widgets\Redactor::widget([
                                        'name' => "HiDetail[$index][hi_recommendation]",
                                    ]) ?>
                                </td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td class="center">
                                b.
                            </td>
                            <td>
                                <?= $detail->hqd_criteria_2 ?>
                            </td>
                            <td class="center">
                                4
                            </td>
                            <td class="center">
                                76-90
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                c.
                            </td>
                            <td>
                                <?= $detail->hqd_criteria_3 ?>
                            </td>
                            <td class="center">
                                3
                            </td>
                            <td class="center">
                                56-75
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                d.
                            </td>
                            <td>
                                <?= $detail->hqd_criteria_4 ?>
                            </td>
                            <td class="center">
                                2
                            </td>
                            <td class="center">
                                31-55
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                e.
                            </td>
                            <td>
                                <?= $detail->hqd_criteria_5 ?>
                            </td>
                            <td class="center">
                                1
                            </td>
                            <td class="center">
                                10-30
                            </td>
                        </tr>
                        <?php $index++; endforeach; ?>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', '_ppId' => $powerPlantModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>

</div>

<?php ActiveForm::end(); ?>