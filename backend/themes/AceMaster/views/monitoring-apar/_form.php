<?php

use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitButton;
use yii\redactor\widgets\Redactor;
use backend\models\Codeset;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\MonitoringApar */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $monthModel backend\models\MaMonth */
?>

<?php
$form = ActiveForm::begin([
    'id' => 'monitoring-apar-form',
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
$startDate = new \DateTime();
$startDate->setDate(2000, 1, 1);
?>

<div class="monitoring-apar-form">

    <div class="row">
        <div class="col-xs-12 col-md-5">
            <?php

            echo $form->field($model, 'sector_id')->hiddenInput(['value' => $powerPlantModel->sector_id])->error(false)->label(false);
            echo $form->field($model, 'power_plant_id')->hiddenInput(['value' => $powerPlantModel->id])->error(false)->label(false);

            echo $form->field($powerPlantModel->sector, 'sector_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput([ 'class' => 'form-control text-center', 'disabled' => true])
                ->label(AppLabels::SECTOR, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($powerPlantModel, 'pp_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput([ 'class' =>  'form-control text-center', 'disabled' => true])
                ->label(AppLabels::POWER_PLANT, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "ma_year", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo$form->field($model, "ma_form_month_type_code", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->dropDownList(Codeset::customMap(AppConstants::CODESET_FORM_MONTH_TYPE_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "ma_location", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "ma_extinguish_media", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "ma_fire_rating", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo$form->field($model, "ma_fire_class", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->dropDownList(Codeset::customMap(AppConstants::CODESET_M_APAR_FIRE_CLASS, 'cset_value'), ['class' => 'input-big form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            ?>
        </div>

        <div class="col-xs-12 col-md-4">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"><?= "Kondisi APAR/APAB" ?></h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <fieldset>
                            <?php
                            echo$form->field($model, "ma_tube_condition_code", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->dropDownList(Codeset::customMap(AppConstants::CODESET_M_APAR_CONDITION, 'cset_value'), ['class' => 'input-big form-control'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo$form->field($model, "ma_nozzle_condition_code", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->dropDownList(Codeset::customMap(AppConstants::CODESET_M_APAR_CONDITION, 'cset_value'), ['class' => 'input-big form-control'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo$form->field($model, "ma_pin_condition_code", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->dropDownList(Codeset::customMap(AppConstants::CODESET_M_APAR_CONDITION, 'cset_value'), ['class' => 'input-big form-control'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo$form->field($model, "ma_handle_condition_code", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->dropDownList(Codeset::customMap(AppConstants::CODESET_M_APAR_CONDITION, 'cset_value'), ['class' => 'input-big form-control'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            ?>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-3">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"><?= "Spesifikasi APAR/APAB" ?></h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <fieldset>
                            <?php
                            echo $form->field($model, "ma_weight", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo $form->field($model, "ma_working_pressure", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right'])
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
                    <h4 class="widget-title"><?= "Ketentuan Teknis" ?></h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <fieldset>
                            <?php
                            echo$form->field($model, "ma_technical_triangle", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->dropDownList(Codeset::customMap(AppConstants::CODESET_M_APAR_TECH_PROVI, 'cset_value'), ['class' => 'input-big form-control'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo$form->field($model, "ma_technical_ik", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->dropDownList(Codeset::customMap(AppConstants::CODESET_M_APAR_TECH_PROVI, 'cset_value'), ['class' => 'input-big form-control'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo$form->field($model, "ma_technical_card", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->dropDownList(Codeset::customMap(AppConstants::CODESET_M_APAR_TECH_PROVI, 'cset_value'), ['class' => 'input-big form-control'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo$form->field($model, "ma_technical_height", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->dropDownList(Codeset::customMap(AppConstants::CODESET_M_APAR_TECH_PROVI, 'cset_value'), ['class' => 'input-big form-control'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo$form->field($model, "ma_technical_dis", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->dropDownList(Codeset::customMap(AppConstants::CODESET_M_APAR_TECH_PROVI, 'cset_value'), ['class' => 'input-big form-control'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            ?>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-3">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"><?= "Catatan Pengisian APAR" ?></h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <fieldset>
                            <?php
                            echo $form->field($model, 'ma_noting_date', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->widget(
                                    DatePicker::className(), [
                                        'model' => $model,
                                        'attribute' => 'ma_noting_date',
                                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd MM yyyy',
                                            'todayHighlight' => true
                                        ]
                                    ]
                                )
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo $form->field($model, "ma_officer", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                            ?>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-5">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"><?= "Catatan Penggunaan APAR" ?></h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <fieldset>
                            <?php

                            echo $form->field($model, 'ma_using_date', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->widget(
                                    DatePicker::className(), [
                                        'model' => $model,
                                        'attribute' => 'ma_using_date',
                                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd MM yyyy',
                                            'todayHighlight' => true
                                        ]
                                    ]
                                )
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo $form->field($model, 'ma_activity', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->widget(Redactor::className(), [
                                    'clientOptions' => [
                                        'imageUpload' => ['/redactor/upload/image'],
                                        'imageUploadCallback' => new \yii\web\JsExpression("
                                            function(image, json) {
                                            image.addClass('img-responsive')
                                            }
                                           "),
                                        'plugins' => ['imagemanager']
                                    ]
                                ])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                            ?>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-7">
            <div class="col-xs-12">
                <div class="widget-box">
                    <div class="widget-header text-center">
                        <h4 class="widget-title"><?= "Pengecekan Bulanan vs Tekanan (KG/BAR)" ?></h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <fieldset>
                                <?php

                                foreach ($monthModel as $keyM => $month) {
                                    if (!$model->getIsNewRecord()) {
                                        echo $form->field($month, "[$keyM]id")->hiddenInput()->label(false);
                                    }

                                    echo $form->field($month, "[$keyM]mam_value", [
                                        'template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE,
                                        'options' => ['class' => 'col-xs-12 col-sm-4']
                                    ])
                                        ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                        ->label($startDate->format('M'), ['class' => '']);

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

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', '_ppId' => $powerPlantModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>

</div>

<?php ActiveForm::end(); ?>
