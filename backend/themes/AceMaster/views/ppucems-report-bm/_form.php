<?php

use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\Codeset;
use backend\models\PpuEmissionSource;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\PpucemsReportBm */
/* @var $form yii\widgets\ActiveForm */
/* @var $ppuModel backend\models\Ppu */
/* @var $ppucemsrbQuarter backend\models\PpucemsrbQuarter */
/* @var $startDate DateTime */
/* @var $cemsConstant [] */
?>

<?php $form = ActiveForm::begin([
    'id' => 'ppucems_report-bm-form',
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

<div class="ppucems-report-bm-form">
    <div class="col-xs-12 col-md-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><?= AppLabels::REPORT_BM_AND_CEMS; ?></h4>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php
                        echo $form->field($model, 'ppu_emission_source_id', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(PpuEmissionSource::map(new PpuEmissionSource(), 'ppues_name'), ['class' => 'chosen-select form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppucemsrb_parameter_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPUCEMS_RBM_PARAM_CODE), ['class' => 'chosen-select form-control param-list'])
                            ->label(null, ['class' => '']);
                        ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xs-12 col-md-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><?= AppLabels::PPUCEMSRB_LONG_CONST_1; ?></h4>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php

                        $count = 3;
                        foreach ($ppucemsrbQuarter as $key => $rbQuarter) {
                            if (!$rbQuarter->getIsNewRecord()) {
                                echo $form->field($rbQuarter, "[$key]id")->hiddenInput()->label(false);
                            }
                            echo $form->field($rbQuarter, "[$key]ppucemsrbq_quarter")->hiddenInput(['value' => Converter::toRoman($count)])->label(false);
                            echo $form->field($rbQuarter, "[$key]ppucemsrbq_year")->hiddenInput(['value' => $startDate->format('Y')])->label(false);
                            echo $form->field($rbQuarter, "[$key]ppucemsrbq_value", [
                                'template' => Yii::t('app', AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE_INPUT_GROUP,[
                                    'separator' => '<i class="fa fa-map"></i>',
                                    'input2' => $form->field($rbQuarter, 'ppucemsrbq_value_percent_display', ['template' => '{input}'])
                                        ->textInput(['maxlength' => true, 'data-format' => '0%', 'data-cell' => "B$key", 'data-formula' => "A$key/$cemsConstant[$key]", 'class' => 'form-control', 'disabled' => true])
                                        ->label(false)
                                ]),
                                'options' => ['class' => 'col-xs-12 col-sm-3'],
                            ])
                                ->textInput(['maxlength' => true, 'data-cell' => "A$key", 'class' => 'form-control numbersOnly'])
                                ->label(sprintf("%s %s-%s", AppLabels::QUARTER, Converter::toRoman($count), $startDate->format('Y')), ['class' => '']);
                            if ($count == 4) {
                                $count = 1;
                                $startDate->add(new \DateInterval('P1Y'));
                            } else {
                                $count++;
                            }
                        }

                        echo $form->field($model, 'ppucemsrb_ref', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

                        ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><?= AppLabels::PPUCEMSRB_LONG_CONST_2; ?></h4>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php
                        $startDate->setDate($ppuModel->ppu_year - 1, 7, 1);
                        $count = 3;
                        foreach ($ppucemsrbQuarter as $key => $rbQuarter) {
                            if (!$rbQuarter->getIsNewRecord()) {
                                echo $form->field($rbQuarter, "[$key]id")->hiddenInput()->label(false);
                            }
                            echo $form->field($rbQuarter, "[$key]ppucemsrbq_quarter")->hiddenInput(['value' => Converter::toRoman($count)])->label(false);
                            echo $form->field($rbQuarter, "[$key]ppucemsrbq_year")->hiddenInput(['value' => $startDate->format('Y')])->label(false);
                            echo $form->field($rbQuarter, "[$key]ppucemsrbq_qs_value", [
                                'template' => Yii::t('app', AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE_INPUT_GROUP, [
                                        'separator' => '<i class="fa fa-map"></i>',
                                        'input2' => $form->field($rbQuarter, 'ppucemsrbq_qs_value_percent_display', ['template' => '{input}'])
                                            ->textInput(['maxlength' => true, 'data-format' => '0%', 'data-cell' => "D$key", 'data-formula' => "C$key/A$key", 'class' => 'form-control', 'disabled' => true])
                                            ->label(false)
                                    ]),
                                'options' => ['class' => 'col-xs-12 col-sm-3'],

                            ])
                                ->textInput(['maxlength' => true, 'data-cell' => "C$key", 'class' => 'form-control numbersOnly'])
                                ->label(sprintf("%s %s-%s", AppLabels::QUARTER, Converter::toRoman($count), $startDate->format('Y')), ['class' => '']);
                            if ($count == 4) {
                                $count = 1;
                                $startDate->add(new \DateInterval('P1Y'));
                            } else {
                                $count++;
                            }
                        }

                        echo $form->field($model, 'ppucemsrb_sec_ref', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

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
