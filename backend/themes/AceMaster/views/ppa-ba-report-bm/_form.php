<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\Codeset;
use backend\models\PpaBaMonitoringPoint;
use backend\assets\PpaBaReportBMAsset;

PpaBaReportBMAsset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\models\PpaBaReportBm */
/* @var $form yii\widgets\ActiveForm */
/* @var $ppaBaModel \backend\models\PpaBa */
/* @var $startDate DateTime */
/* @var $ppaBaConcentrationModels \backend\models\PpaBaConcentration[] */
?>

<div class="row ppa-ba-report-bm-form">
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

                        echo $form->field($model, 'ppa_ba_monitoring_point_id', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(PpaBaMonitoringPoint::map(new PpaBaMonitoringPoint(), 'ppabamp_monitoring_point_name'), ['class' => 'chosen-select form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppabar_param_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPA_RBM_PARAM_CODE), ['class' => 'chosen-select form-control param-list'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppabar_param_unit_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPA_RBM_PARAM_UNIT_CODE), ['class' => 'chosen-select form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppabar_qs_1_display', [
                            'template' => Yii::t('app', AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE_INPUT_GROUP, [
                                'separator' => '<i class="fa fa-bars"></i>',
                                'input2' => $form->field($model, 'ppabar_qs_2_display', ['template' => '{input}'])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'BB1', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                                    ->label(false)
                            ])
                        ])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'AA1', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                            ->label($model->getAttributeLabel('ppabar_qs_1_display'), ['class' => '']);
                        echo $form->field($model, 'ppabar_qs_1')->hiddenInput(['data-cell' => 'A1', 'data-formula' => 'AA1', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);
                        echo $form->field($model, 'ppabar_qs_2')->hiddenInput(['data-cell' => 'B1', 'data-formula' => 'BB1', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);

                        echo $form->field($model, 'ppabar_qs_unit_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_QS_UNIT_CODE), ['class' => 'chosen-select form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppabar_qs_ref', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);
                        
                        ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-6">
        <div class="widget-box">
            <div class="widget-header text-center">
                <h4 class="widget-title"><?= AppLabels::PPA_BA_CONCENTRATION_TITLE; ?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php
                    
                        foreach ($ppaBaConcentrationModels as $key => $ppaBaConcentration) {
                            if (!$ppaBaConcentration->isNewRecord) {
                                echo $form->field($ppaBaConcentration, "[$key]id")->hiddenInput()->label(false);
                            }
                            echo $form->field($ppaBaConcentration, "[$key]ppabac_month")->hiddenInput(['value' => $startDate->format('m')])->label(false);
                            echo $form->field($ppaBaConcentration, "[$key]ppabac_year")->hiddenInput(['value' => $startDate->format('Y')])->label(false);
                            echo $form->field($ppaBaConcentration, "[$key]ppabac_value_display", [
                                'template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE,
                                'options' => ['class' => 'col-xs-12 col-sm-4']
                            ])
                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => "AA$key", 'data-format' => '0,0[.]000000000000'])
                                ->label($startDate->format('M Y'), ['class' => '']);
                            echo $form->field($ppaBaConcentration, "[$key]ppabac_value")->hiddenInput(['data-cell' => "A$key", 'data-format' => '0[.]000000000000', 'data-formula' => "AA$key"])->label(false);
                        
                            $startDate->add(new \DateInterval('P1M'));
                        }
                    
                        ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', 'ppaBaId' => $ppaBaModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
