<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitButton;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaPollutionLoadDecrease */
/* @var $form yii\widgets\ActiveForm */
/* @var $ppaModel \backend\models\Ppa */
/* @var $startYear DateTime */
/* @var $ppaLDYearModels \backend\models\PpaPollutionLoadDecreaseYear[] */
?>

<div class="row ppa-pollution-load-decrease-form">
    <?php
    $form = ActiveForm::begin([
        'options' => [
            'class' => 'form-horizontal calx',
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

    <div class="col-xs-12 col-md-6">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><?= AppLabels::POLLUTION_LOAD_DECREASE; ?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php

                        echo $form->field($model, 'ppa_id')->hiddenInput(['value' => $ppaModel->id])->label(false)->error(false);
                        echo $form->field($model, 'ppapld_activity', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);
                        echo $form->field($model, 'ppapld_parameter', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);
                        echo $form->field($model, 'ppapld_unit', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);
                        
                        ?>
                        
                        <div class="field-ppapollutionloaddecrease-attachment">
                            <label><?= AppLabels::PPA_POLL_LOAD_CALC_EVIDENCE_TITLE; ?></label>
                            <?= Converter::attachment($model->attachmentOwner, ['show_file_upload' => true, 'show_delete_file' => true]); ?>
                        </div>
                        
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-6">
        <div class="row">
            <div class="col-xs-12">
                <div class="widget-box">
                    <div class="widget-header text-center">
                        <h4 class="widget-title"><?= AppLabels::YEAR; ?></h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <fieldset>
                                <?php
    
                                foreach ($ppaLDYearModels as $key => $ppaLDYearModel) {
                                    if (!$ppaLDYearModel->isNewRecord) {
                                        echo $form->field($ppaLDYearModel, "[$key]id")->hiddenInput()->label(false);
                                    }
        
                                    echo $form->field($ppaLDYearModel, "[$key]ppapldy_year")->hiddenInput(['value' => $startYear->format('Y')])->label(false);
                                    echo $form->field($ppaLDYearModel, "[$key]ppapldy_value_display", [
                                        'template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE,
                                        'options' => ['class' => 'col-xs-12 col-sm-3']
                                    ])
                                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => "AA$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                                        ->label($startYear->format('Y'), ['class' => '']);
                                    echo $form->field($ppaLDYearModel, "[$key]ppapldy_value")->hiddenInput(['data-cell' => "A$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC, 'data-formula' => "AA$key"])->label(false);
        
                                    $startYear->add(new \DateInterval('P1Y'));
                                }
    
                                ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', 'ppaId' => $ppaModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
