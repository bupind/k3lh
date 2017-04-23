<?php

use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use kartik\date\DatePicker;
USE backend\models\Codeset;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaBaMonitoringPoint */
/* @var $form yii\widgets\ActiveForm */
/* @var $ppaBaModel \backend\models\PpaBa */
/* @var $startDate DateTime */
/* @var $ppaBaMonthModels \backend\models\PpaBaMonth[] */
?>

<div class="row ppa-ba-monitoring-point-form">
    <?php
    $form = ActiveForm::begin([
        'options' => [
            'class' => 'form-horizontal',
            'role' => 'form'
        ],
        'fieldConfig' => [
            'options' => [
                'tag' => 'div'
            ]
        ]
    ]);
    ?>

    <div class="col-xs-12 col-md-4">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><?= AppLabels::WASTE_WATER ?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php

                        echo $form->field($model, 'ppa_ba_id')->hiddenInput(['value' => $ppaBaModel->id])->label(false)->error(false);
                        echo $form->field($model, 'ppabamp_wastewater_source', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control uppercase'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppabamp_monitoring_point_name', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control uppercase'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppabamp_coord_lat', [
                            'template' => Yii::t('app', AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE_INPUT_GROUP, [
                                'separator' => '<i class="fa fa-map"></i>',
                                'input2' => $form->field($model, 'ppabamp_coord_long', ['template' => '{input}'])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => "Long (Cth: 05&deg; 31' 20,6)"])
                                    ->label(false)
                            ])
                        ])
                            ->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => "Lat (Cth: 05&deg; 31' 20,6)"])
                            ->label(AppLabels::COORDINATE, ['class' => '']);

                        echo $form->field($model, 'ppabamp_monitoring_frequency_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPABA_MONITORING_FREQUENCY), ['class' => 'chosen-select form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppabamp_monitoring_status_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPABA_MONITORING_STATUS_PERIOD), ['class' => 'chosen-select form-control'])
                            ->label(null, ['class' => '']);
                        
                        ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-3">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><?= AppLabels::PERMIT; ?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php
                        
                        echo $form->field($model, 'ppabamp_document_name', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);
                        
                        echo $form->field($model, 'ppabamp_permit_publisher', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);
                        
                        echo $form->field($model, 'ppabamp_validation_date', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->widget(
                                DatePicker::className(), [
                                    'model' => $model,
                                    'attribute' => 'ppabamp_validation_date',
                                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => 'dd-mm-yyyy',
                                        'todayHighlight' => true
                                    ]
                                ]
                            )
                            ->label(null, ['class' => '']);
                        
                        ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-5">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><?= AppLabels::CERTIFIED_NUMBER_TEST_RESULT; ?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php
                        
                        foreach ($ppaBaMonthModels as $key => $ppaBaMonth) {
                            if (!$ppaBaMonth->isNewRecord) {
                                echo $form->field($ppaBaMonth, "[$key]id")->hiddenInput()->label(false);
                            }
                            echo $form->field($ppaBaMonth, "[$key]ppabam_month")->hiddenInput(['value' => $startDate->format('m')])->label(false);
                            echo $form->field($ppaBaMonth, "[$key]ppabam_year")->hiddenInput(['value' => $startDate->format('Y')])->label(false);
                            echo $form->field($ppaBaMonth, "[$key]ppabam_cert_number", [
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

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', 'ppaBaId' => $ppaBaModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
