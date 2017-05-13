<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitButton;

/* @var $this yii\web\View */
/* @var $model backend\models\BeyondObedience */
/* @var $form yii\widgets\ActiveForm */
/* @var $boAspect backend\models\BoAssessmentAspect[] */
/* @var $boAssessment backend\models\BoAssessment[] */
/* @var $bot string */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $title string */
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
$index = 0;
?>

<div class="beyond-obedience-form">

    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <?php

                echo $form->field($model, 'bo_form_type_code')->hiddenInput(['value' => $bot])->error(false)->label(false);
                echo $form->field($model, 'sector_id')->hiddenInput(['value' => $powerPlantModel->sector_id])->error(false)->label(false);
                echo $form->field($model, 'power_plant_id')->hiddenInput(['value' => $powerPlantModel->id])->error(false)->label(false);

                echo $form->field($powerPlantModel->sector, 'sector_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                        ->textInput([ 'class' => 'form-control text-center', 'disabled' => true])
                        ->label(AppLabels::SECTOR, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                echo $form->field($powerPlantModel, 'pp_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                    ->textInput([ 'class' =>  'form-control text-center', 'disabled' => true])
                    ->label(AppLabels::POWER_PLANT, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                echo $form->field($model, 'bo_year', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                    ->textInput(['maxlength' => true, 'class' => 'form-control text-right'])
                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            ?>
        </div>
    </div>

    <hr/>

    <div class="row">
        <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
                <tr>
                    <th rowspan="2" class="text-center" width="20%">
                        <?= AppLabels::ASSESSMENT_ASPECT ?>
                    </th>
                    <th rowspan="2" class="text-center" width="40%">
                        <?= sprintf("Deskripsi %s", AppLabels::CRITERIA) ?>
                    </th>
                    <th rowspan="2" class="text-center" width="10%">
                        <?= sprintf("%s %s", AppLabels::VALUE, AppLabels::CRITERIA) ?>
                    </th>
                    <th colspan="2" class="text-center" width="30%">
                        Assessment
                    </th>
                </tr>
                <tr>
                    <th class="text-center" width="10%">
                        <?= AppLabels::VALUE ?>
                    </th>
                    <th class="text-center">
                        <?= AppLabels::DESCRIPTION ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($boAspect as $keyA => $aspect) : ?>
                    <?php foreach($aspect->boasCriterias as $keyC => $criteria) : ?>
                        <tr>
                            <?php if($keyC == 0) : ?>
                                <td rowspan="<?= count($aspect->boasCriterias)?>">
                                    <?= $aspect->boas_aspect ?>
                                </td>
                            <?php endif; ?>
                            <td>
                                <?= $criteria->boas_description ?>
                            </td>
                            <td class="text-right">
                                <?= $criteria->boas_value ?>
                            </td>
                            <?php if (!$model->getIsNewRecord()) :
                                foreach($boAssessment as $keyA => $assessment) :
                                    if($criteria->id == $assessment->boas_criteria_id) : ?>
                                        <td>
                                            <?php
                                                echo $form->field($assessment, "[$keyA]id")
                                                    ->hiddenInput([])->label(false)->error(false);
                                                echo $form->field($assessment, "[$keyA]boas_criteria_id")->hiddenInput(['value' => $criteria->id])->error(false)->label(false);
                                                echo $form->field($assessment, "[$keyA]boa_value_display")
                                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'data-cell' => "ZZ$keyA", 'data-format' => '0,0[.]00'])
                                                ->label(false)->error(false);
                                                echo $form->field($assessment, "[$keyA]boa_value")->hiddenInput(['data-cell' => "Z$keyA", 'data-formula' => "ZZ$keyA", 'data-format' => '0[.]00'])->label(false)->error(false);
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                echo Html::activeTextInput($assessment, "[$keyA]boa_ref", ['class' => 'form-control']);
                                            ?>
                                        </td>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if ($model->getIsNewRecord()) : ?>
                            <td>
                                    <?= $form->field($boAssessment[$index], "[$index]boas_criteria_id")->hiddenInput(['value' => $criteria->id])->error(false)->label(false); ?>
                                    <?= Html::activeTextInput($boAssessment[$index], "[$index]boa_value_display", ['data-cell' => "ZZ$index" ,'class' => 'form-control text-right']); ?>
                                    <?= $form->field($boAssessment[$index], "[$index]boa_value")->hiddenInput(['data-cell' => "Z$index", 'data-formula' => "ZZ$index", 'data-format' => '0[.]00'])->label(false)->error(false); ?>
                            </td>
                            <td>
                                    <?= Html::activeTextInput($boAssessment[$index], "[$index]boa_ref", ['class' => 'form-control']); ?>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <?php $index++ ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', '_ppId' => $powerPlantModel->id, 'bot' => $bot], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>

</div>

<?php ActiveForm::end(); ?>
