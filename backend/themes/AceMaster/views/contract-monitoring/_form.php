<?php

use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\Codeset;
use kartik\date\DatePicker;
use app\components\SubmitButton;


/* @var $this yii\web\View */
/* @var $model backend\models\ContractMonitoring */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel backend\models\PowerPlant */
?>
<?php
$form = ActiveForm::begin([
    'id' => 'contract-monitoring-form',
    'options' => [
        'class' => 'calx form-horizontal',
        'role' => 'form',
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div'
        ]
    ]
]);
?>
    <div class="contract-monitoring-form">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title"> <?= AppLabels::FORM_CONTRACT_MONITORING ?> </h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <fieldset>
                                <?php

                                echo $form->field($model, 'sector_id')->hiddenInput(['value' => $powerPlantModel->sector_id])->error(false)->label(false);
                                echo $form->field($model, 'power_plant_id')->hiddenInput(['value' => $powerPlantModel->id])->error(false)->label(false);

                                echo $form->field($powerPlantModel->sector, 'sector_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->textInput(['class' => 'form-control text-center', 'disabled' => true])
                                    ->label(AppLabels::SECTOR, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                echo $form->field($powerPlantModel, 'pp_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->textInput(['class' => 'form-control text-center', 'disabled' => true])
                                    ->label(AppLabels::POWER_PLANT, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                echo $form->field($model, "cm_name", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                echo $form->field($model, "cm_prk", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                echo $form->field($model, "cm_pagu_display", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'data-cell' => "AA1", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                                echo $form->field($model, "cm_pagu")->hiddenInput(['data-cell' => "A1", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC, 'data-formula' => "AA1"])->label(false);

                                echo $form->field($model, 'cm_aoai', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->dropDownList(Codeset::customMap(AppConstants::CODESET_CM_AOAI_TYPE), ['class' => 'chosen-select form-control'])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                echo $form->field($model, 'cm_prog_status', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->dropDownList(Codeset::customMap(AppConstants::CODESET_CM_PROG_STATUS_TYPE), ['class' => 'chosen-select form-control'])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                echo $form->field($model, 'cm_ref', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->textarea(['class' => AppConstants::ACTIVE_FORM_CLASS_TEXTAREA])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                                ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <h3 class="header smaller lighter green no-margin-top">Usulan User</h3>
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title"> TOR & RAB </h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <fieldset>
                                <?php

                                echo $form->field($model, 'cm_tor_rab_status', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->dropDownList(Codeset::customMap(AppConstants::CODESET_CM_TOR_RAB_STATUS_TYPE), ['class' => 'chosen-select form-control'])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                echo $form->field($model, 'cm_tor_rab_date', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->widget(
                                        DatePicker::className(), [
                                            'model' => $model,
                                            'attribute' => 'cm_tor_rab_date',
                                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'dd MM yyyy',
                                                'todayHighlight' => true
                                            ]
                                        ]
                                    )
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                                ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title"> ND Usulan </h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <fieldset>
                                <?php

                                echo $form->field($model, "cm_nd_number", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                echo $form->field($model, 'cm_nd_date', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->widget(
                                        DatePicker::className(), [
                                            'model' => $model,
                                            'attribute' => 'cm_nd_date',
                                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'dd MM yyyy',
                                                'todayHighlight' => true
                                            ]
                                        ]
                                    )
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                                ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <hr/>

        <div class="row">
            <div class="col-xs-12 col-md-4">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title"> Persetujuan GM </h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <fieldset>
                                <?php

                                echo $form->field($model, 'cm_gm_status', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->dropDownList(Codeset::customMap(AppConstants::CODESET_CM_GM_STATUS_TYPE), ['class' => 'chosen-select form-control'])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                echo $form->field($model, 'cm_gm_date', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->widget(
                                        DatePicker::className(), [
                                            'model' => $model,
                                            'attribute' => 'cm_gm_date',
                                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'dd MM yyyy',
                                                'todayHighlight' => true
                                            ]
                                        ]
                                    )
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                                ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title"> Proses Pengadaan </h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <fieldset>
                                <?php

                                echo $form->field($model, 'cm_procure_receiver', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->dropDownList(Codeset::customMap(AppConstants::CODESET_CM_PROCURE_RECEIVER_TYPE), ['class' => 'chosen-select form-control'])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                echo $form->field($model, 'cm_date', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->widget(
                                        DatePicker::className(), [
                                            'model' => $model,
                                            'attribute' => 'cm_date',
                                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'dd MM yyyy',
                                                'todayHighlight' => true
                                            ]
                                        ]
                                    )
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                echo $form->field($model, 'cm_method', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->dropDownList(Codeset::customMap(AppConstants::CODESET_CM_METHOD_TYPE), ['class' => 'chosen-select form-control'])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                                ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title"> Kontrak </h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <fieldset>
                                <?php

                                echo $form->field($model, "cm_contr_number", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                echo $form->field($model, 'cm_contr_start_date', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->widget(
                                        DatePicker::className(), [
                                            'model' => $model,
                                            'attribute' => 'cm_contr_start_date',
                                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'dd MM yyyy',
                                                'todayHighlight' => true
                                            ]
                                        ]
                                    )
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                echo $form->field($model, 'cm_contr_end_date', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->widget(
                                        DatePicker::className(), [
                                            'model' => $model,
                                            'attribute' => 'cm_contr_end_date',
                                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'dd MM yyyy',
                                                'todayHighlight' => true
                                            ]
                                        ]
                                    )
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                echo $form->field($model, "cm_contr_value_display", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'data-cell' => "BB1", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                                echo $form->field($model, "cm_contr_value")->hiddenInput(['data-cell' => "B1", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC, 'data-formula' => "BB1"])->label(false);
                                ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <?= SubmitButton::widget(['backAction' => ['index', '_ppId' => $powerPlantModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>