<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;
use backend\models\Codeset;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\PpuCompulsoryMonitoredEmissionSource */
/* @var $form yii\widgets\ActiveForm */
/* @var $ppuModel \backend\models\Ppu */
/* @var $startDate DateTime */
/* @var $endDate DateTime */
/* @var $ppuMonthModels \backend\models\PpucmesMonth[] */
?>

<?php $form = ActiveForm::begin([
    'id' => 'ppu-compulsory-monitored-emission-source-form',
    'options' => [
        'class' => 'form-horizontal',
        'role' => 'form',
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div',
        ]
    ]
]); ?>

<div class="ppu-compulsory-monitored-emission-source-form">
    <div class="col-xs-12 col-sm-6">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"> <?= AppLabels::EMISSION_SOURCE ?> </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php
                        if($model->getIsNewRecord()){
                            echo Html::hiddenInput('ppu_id', $ppuModel->id);
                        }else {
                            echo $form->field($model, 'ppu_id', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->hiddenInput([])->label(false);
                        }

                        echo $form->field($model, 'ppucmes_name', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppucmes_chimney_name', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppucmes_operation_time', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppucmes_freq_monitoring_obligation_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPU_AP_FREQ_MONITORING_OBLIGATION_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                            ->label(null, ['class' => '']);
                        ?>
                    </fieldset>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"> <?= AppLabels::OPERATION_TIME ?> </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php

                        foreach ($ppuMonthModels as $key => $ppuMonth) {
                            if (!$model->getIsNewRecord()) {
                                echo $form->field($ppuMonth, "[$key]id")->hiddenInput()->label(false);
                            }
                            echo $form->field($ppuMonth, "[$key]ppucmesm_month")->hiddenInput(['value' => $startDate->format('m')])->label(false);
                            echo $form->field($ppuMonth, "[$key]ppucmesm_year")->hiddenInput(['value' => $startDate->format('Y')])->label(false);
                            echo $form->field($ppuMonth, "[$key]ppucmesm_operation_time", [
                                'template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE,
                                'options' => ['class' => 'col-xs-12 col-sm-4']
                            ])
                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
                                ->label($startDate->format('M Y'), ['class' => '']);

                            $startDate->add(new \DateInterval('P1M'));
                        }

                        ?>
                    </fieldset>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12">
    <?= SubmitButton::widget(['backAction' => ['index', 'ppuId' => $ppuModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
</div>

<?php ActiveForm::end(); ?>
