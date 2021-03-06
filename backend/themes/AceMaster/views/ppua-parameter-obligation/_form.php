<?php

use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\PpuaMonitoringPoint;
use backend\models\Codeset;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuaParameterObligation */
/* @var $form yii\widgets\ActiveForm */
/* @var $ppuaModel backend\models\PpuAmbient */
/* @var $startDate DateTime */
/* @var $ppuapoMonth \backend\models\PpuapoMonth[] */
?>

<?php $form = ActiveForm::begin([
    'id' => 'ppua-parameter-obligation-form',
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

<div class="ppua-parameter-obligation-form">

    <div class="col-xs-12 col-md-6">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><?= AppLabels::QUALITY_STANDARD; ?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php
                        echo $form->field($model, 'ppua_monitoring_point_id', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(PpuaMonitoringPoint::map(new PpuaMonitoringPoint(), 'ppua_monitoring_location',null,false, [
                                'where' => [
                                    [ 'ppu_ambient_id' => $ppuaModel->id]
                                ]
                            ]), ['class' => 'chosen-select form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppuapo_parameter_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPUA_RBM_PARAM_CODE), ['class' => 'chosen-select form-control param-list'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppuapo_qs_display', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'CC1', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppuapo_qs')->hiddenInput(['data-cell' => 'C1', 'data-formula' => 'CC1', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);

                        echo $form->field($model, 'ppuapo_qs_unit_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPUA_RBM_QS_UNIT_CODE), ['class' => 'chosen-select form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppuapo_qs_ref', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppuapo_qs_max_pollution_load_display', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'DD1', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppuapo_qs_max_pollution_load')->hiddenInput(['data-cell' => 'D1', 'data-formula' => 'DD1', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);


                        echo $form->field($model, 'ppuapo_qs_load_unit_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPUA_RBM_QS_LOAD_UNIT_CODE), ['class' => 'chosen-select form-control'])
                            ->label(null, ['class' => '']);
                        echo $form->field($model, 'ppuapo_qs_max_pollution_load_ref', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
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
                        <h4 class="widget-title"><?= AppLabels::CONCENTRATE_TEST_RESULT; ?></h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <fieldset>
                                <?php

                                foreach ($ppuapoMonth as $key => $poMonth) {
                                    if (!$poMonth->getIsNewRecord()) {
                                        echo $form->field($poMonth, "[$key]id")->hiddenInput()->label(false);
                                    }
                                    echo $form->field($poMonth, "[$key]ppuapom_month")->hiddenInput(['value' => $startDate->format('m')])->label(false);
                                    echo $form->field($poMonth, "[$key]ppuapom_year")->hiddenInput(['value' => $startDate->format('Y')])->label(false);
                                    echo $form->field($poMonth, "[$key]ppuapom_value_display", [
                                        'template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE,
                                        'options' => ['class' => 'col-xs-12 col-sm-4']
                                    ])
                                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => "AA$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                                        ->label($startDate->format('M Y'), ['class' => '']);
                                    echo $form->field($poMonth, "[$key]ppuapom_value")->hiddenInput(['data-cell' => "A$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC, 'data-formula' => "AA$key"])->label(false);

                                    $startDate->add(new \DateInterval('P1M'));
                                }

                                ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="col-xs-12">
    <?= SubmitButton::widget(['backAction' => ['index', 'ppuaId' => $ppuaModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
</div>
<?php ActiveForm::end(); ?>
