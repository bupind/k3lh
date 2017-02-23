<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\PpuEmissionSource;
use backend\models\Codeset;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuEmissionLoadGrk */
/* @var $form yii\widgets\ActiveForm */
/* @var $ppuModel backend\models\Ppu */
/* @var $startDate DateTime */
/* @var $ppuCalc backend\models\PpuEmissionLoadGrkCalc */
?>

<?php $form = ActiveForm::begin([
    'id' => 'ppu-emission-load-grk-form',
    'options' => [
        'class' => 'form-horizontal calx',
        'role' => 'form',
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div',
        ]
    ]
]); ?>

<div class="col-xs-12 col-md-4 col-md-offset-4">
    <div class="widget-box">
        <div class="widget-header">
            <h4 class="widget-title"><?= sprintf("%s %s", AppLabels::EMISSION_LOAD_CALCULATION, AppLabels::GRK); ?></h4>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <fieldset>
                    <?php
                        echo $form->field($model, "ppu_emission_source_id", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(PpuEmissionSource::map(new PpuEmissionSource(), 'ppues_name'), ['class' => 'chosen-select form-control', 'data-cell' => 'Z1'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, "ppuelg_parameter", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);
                    ?>
                </fieldset>
            </div>
        </div>
    </div>
</div>

<?php

foreach ($ppuCalc as $key => $pCalc) { ?>
    <div class="col-xs-12 col-md-6">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><?= sprintf("%s %s %s %s", AppLabels::EMISSION_LOAD_CALCULATION, AppLabels::GRK, AppLabels::YEAR, $startDate->format('Y')); ?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php
                        if (!$pCalc->isNewRecord) {
                            echo $form->field($pCalc, "[$key]id")->hiddenInput()->label(false);
                        }

                        echo $form->field($pCalc, "[$key]ppueglc_year")
                            ->hiddenInput(['value' => $startDate->format('Y')])
                            ->label(false);

                        echo $form->field($pCalc, "[$key]ppueglc_coal_usage", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => "A$key"])
                            ->label(null, ['class' => '']);

                        echo $form->field($pCalc, "[$key]ppueglc_carbon_content", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => "B$key"])
                            ->label(null, ['class' => '']);

                        echo $form->field($pCalc, "[$key]ppueglc_carbon_actual_content", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => "C$key"])
                            ->label(null, ['class' => '']);

                        echo $form->field($pCalc, "[$key]ppueglc_mw_carbondioxyde", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => "D$key"])
                            ->label(null, ['class' => '']);

                        echo $form->field($pCalc, "[$key]ppueglc_anc", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => "E$key"])
                            ->label(null, ['class' => '']);

                        echo $form->field($pCalc, "[$key]ppueglc_oxidation_factor", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => "F$key"])
                            ->label(null, ['class' => '']);

                        echo Html::label("Beban Emisi (Ton)", null,['class' => 'control-label'] );
                        echo Html::textInput("EMISSION_LOAD", null, ['data-cell' => "G$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC,'data-formula' => "A$key*C$key*F$key*D$key/E$key", 'readOnly' => true, 'class' => 'form-control']);

                        ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
<?php $startDate->add(new \DateInterval('P1Y')); } ?>


<div class="col-xs-12">
    <?= SubmitButton::widget(['backAction' => ['index', 'ppuId' => $ppuModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
</div>
<?php ActiveForm::end(); ?>
