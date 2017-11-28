
<?php
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\Codeset;
use app\components\SubmitButton;


/* @var $this yii\web\View */
/* @var $model backend\models\WorkingHourMonitoring */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $whmMonths backend\models\WhmMonth */
?>
<?php
$form = ActiveForm::begin([
    'id' => 'working-hour-monitoring-form',
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
<div class="working-hour-monitoring-form">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"> <?= AppLabels::FORM_WORK_HOUR_MONITORING ?> </h4>
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

                            echo $form->field($model, 'worker_type', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->dropDownList(Codeset::customMap(AppConstants::CODESET_WHM_WORKER_TYPE), ['class' => 'chosen-select form-control'])
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
        <?php foreach($whmMonths as $key => $value) : ?>
            <div class="col-xs-12 col-md-4">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title"> <?= AppConstants::$monthsList[$key+1] ?> </h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <fieldset>
                                <?php
                                echo $form->field($value, "[$key]whmm_month")->hiddenInput(['value' => ($key+1)])->label(false);

                                echo $form->field($value, "[$key]whmm_quantity_display", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'data-cell' => "AA$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                                echo $form->field($value, "[$key]whmm_quantity")->hiddenInput(['data-cell' => "A$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC, 'data-formula' => "AA$key"])->label(false);

                                echo $form->field($value, "[$key]whmm_manhours", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control text-right', 'readOnly' => true, 'data-cell' => "B$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'data-formula' => "A$key*8"])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                $previousKey = $key-1;
                                if($key!=0) {
                                    echo $form->field($value, "[$key]whmm_manhours_accu", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                        ->textInput(['maxlength' => true, 'class' => 'form-control  text-right', 'readOnly' => true, 'data-cell' => "C$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'data-formula' => "B$key+C$previousKey"])
                                        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                                }else{
                                    echo $form->field($value, "[$key]whmm_manhours_accu", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                        ->textInput(['maxlength' => true, 'class' => 'form-control  text-right', 'readOnly' => true, 'data-cell' => "C$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'data-formula' => "B$key"])
                                        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                                }

                                if (!$model->getIsNewRecord()) {
                                    echo $form->field($value, "[$key]id")->hiddenInput()->label(false);
                                }
                                ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="col-xs-12">
            <?= SubmitButton::widget(['backAction' => ['index', '_ppId' => $powerPlantModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>