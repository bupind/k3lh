<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\Codeset;
use backend\models\PpaSetupPermit;
use backend\assets\ReportBMAsset;

ReportBMAsset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\models\PpaReportBm */
/* @var $form yii\widgets\ActiveForm */
/* @var $ppaModel \backend\models\Ppa */
/* @var $startDate DateTime */
/* @var $startDateOutlet DateTime */
/* @var $ppaInletOutletModels \backend\models\PpaInletOutlet[] */

?>

<div class="row ppa-report-bm-form">
    <?php
    $form = ActiveForm::begin([
        'options' => [
            'class' => 'form-horizontal calx',
            'role' => 'form'
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
                <h4 class="widget-title"><?= AppLabels::QUALITY_STANDARD; ?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php

                        echo $form->field($model, 'ppa_setup_permit_id', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(PpaSetupPermit::map(new PpaSetupPermit(), 'ppasp_setup_point_name'), ['class' => 'chosen-select form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppar_param_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPA_RBM_PARAM_CODE), ['class' => 'chosen-select form-control param-list'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppar_param_unit_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPA_RBM_PARAM_UNIT_CODE), ['class' => 'chosen-select form-control'])
                            ->label(null, ['class' => '']);
                        
                        echo $form->field($model, 'ppar_qs_1_display', [
                                'template' => Yii::t('app', AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE_INPUT_GROUP, [
                                    'separator' => '<i class="fa fa-bars"></i>',
                                    'input2' => $form->field($model, 'ppar_qs_2_display', ['template' => '{input}'])
                                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'BB1', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                                        ->label(false)
                                ])
                            ])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'AA1', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                            ->label($model->getAttributeLabel('ppar_qs_1_display'), ['class' => '']);
                        echo $form->field($model, 'ppar_qs_1')->hiddenInput(['data-cell' => 'A1', 'data-formula' => 'AA1', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);
                        echo $form->field($model, 'ppar_qs_2')->hiddenInput(['data-cell' => 'B1', 'data-formula' => 'BB1', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);

                        echo $form->field($model, 'ppar_qs_unit_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_QS_UNIT_CODE), ['class' => 'chosen-select form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppar_qs_ref', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);
                        
                        echo $form->field($model, 'ppar_qs_max_pollution_load_display', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'CC1', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                            ->label(null, ['class' => '']);
                        echo $form->field($model, 'ppar_qs_max_pollution_load')->hiddenInput(['data-cell' => 'C1', 'data-formula' => 'CC1', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);

                        echo $form->field($model, 'ppar_qs_load_unit_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_QS_LOAD_UNIT_CODE), ['class' => 'chosen-select form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppar_qs_max_pollution_load_ref', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);
                        
                        ?>
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
                        <h4 class="widget-title"><?= AppLabels::INLET_CONCENTRATE_TITLE; ?></h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <fieldset>
                                <?php
        
                                foreach ($ppaInletOutletModels as $key => $ppaInlet) {
                                    if (!$ppaInlet->isNewRecord) {
                                        echo $form->field($ppaInlet, "[$key]id")->hiddenInput()->label(false);
                                    }
                                    echo $form->field($ppaInlet, "[$key]ppaio_month")->hiddenInput(['value' => $startDate->format('m')])->label(false);
                                    echo $form->field($ppaInlet, "[$key]ppaio_year")->hiddenInput(['value' => $startDate->format('Y')])->label(false);
                                    echo $form->field($ppaInlet, "[$key]ppaio_inlet_value_display", [
                                        'template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE,
                                        'options' => ['class' => 'col-xs-12 col-sm-4']
                                    ])
                                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => "AA$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                                        ->label($startDate->format('M Y'), ['class' => '']);
                                    echo $form->field($ppaInlet, "[$key]ppaio_inlet_value")->hiddenInput(['data-cell' => "A$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC, 'data-formula' => "AA$key"])->label(false);
            
                                    $startDate->add(new \DateInterval('P1M'));
                                }
        
                                ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="widget-box">
                    <div class="widget-header text-center">
                        <h4 class="widget-title"><?= AppLabels::OUTLET_CONCENTRATE_TITLE; ?></h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <fieldset>
                                <?php
        
                                foreach ($ppaInletOutletModels as $key => $ppaOutlet) {
                                    echo $form->field($ppaOutlet, "[$key]ppaio_outlet_value")->hiddenInput(['data-cell' => "B$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC, 'data-formula' => "BB$key"])->label(false);
                                    echo $form->field($ppaOutlet, "[$key]ppaio_outlet_value_display", [
                                        'template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE,
                                        'options' => ['class' => 'col-xs-12 col-sm-4']
                                    ])
                                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => "BB$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                                        ->label($startDateOutlet->format('M Y'), ['class' => '']);
    
                                    $startDateOutlet->add(new \DateInterval('P1M'));
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
