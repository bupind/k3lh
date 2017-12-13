<?php

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitButton;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HydrantTestingDetail */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $htdMonthsElectrical backend\models\HtdMonth */
/* @var $htdMonthsDiesel backend\models\HtdMonth */

?>
<?php
$form = ActiveForm::begin([
    'id' => 'hydrant-testing-detail-form',
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
?>

    <div class="hydrant-testing-detail-form">

        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title"> <?= AppLabels::FORM_HYDRANT_TESTING_DETAIL ?> </h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <fieldset>
                                <?php

                                echo $form->field($model, 'hydrant_testing_id')->hiddenInput()->error(false)->label(false);

                                echo $form->field($model, "htd_number", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                echo $form->field($model, "htd_location", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control'])
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
            <div class="col-xs-12">
                <div class="tabbable">
                    <ul id="myTab" class="nav nav-tabs">
                        <li class="active">
                            <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . 'Electrical Pump', '#electrical', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                        </li>
                        <li>
                            <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . 'Diesel Pump', '#diesel', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="electrical" class="tab-pane fade active in">
                            <div class="row">
                                <?php foreach($htdMonthsElectrical as $key => $value) : ?>
                                    <div class="col-xs-12 col-md-4">
                                        <div class="widget-box">
                                            <div class="widget-header">
                                                <h4 class="widget-title"> <?= AppConstants::$monthsList[$key+1] ?> </h4>
                                            </div>
                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <fieldset>
                                                        <?php
                                                        echo $form->field($value, "[0][$key]htdm_month")->hiddenInput(['value' => ($key+1)])->label(false);

                                                        echo $form->field($value, "[0][$key]htdm_date", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                                            ->widget(
                                                                DatePicker::className(), [
                                                                    'model' => $value,
                                                                    'attribute' => "[0][$key]htdm_date",
                                                                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                                                    'pluginOptions' => [
                                                                        'autoclose' => true,
                                                                        'format' => 'dd MM yyyy',
                                                                        'todayHighlight' => true
                                                                    ]
                                                                ]
                                                            )
                                                            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                                        echo $form->field($value, "[0][$key]htdm_pressure", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right'])
                                                            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                                        echo $form->field($value, "[0][$key]htdm_flow_rate", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right'])
                                                            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                                        echo $form->field($value, "[0][$key]htdm_vertical", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right'])
                                                            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                                        echo $form->field($value, "[0][$key]htdm_horizontal", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right'])
                                                            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                                        if (!$model->getIsNewRecord()) {
                                                            echo $form->field($value, "[0][$key]id")->hiddenInput()->label(false);
                                                            echo $form->field($value, "[0][$key]htdm_pump_type")->hiddenInput()->label(false);
                                                        }else{
                                                            echo Html::hiddenInput("HtdMonth[0][$key][htdm_pump_type]", AppConstants::HT_ELECTRICAL_PUMP);
                                                        }
                                                        ?>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div id="diesel" class="tab-pane fade">
                            <div class="row">
                                <?php foreach($htdMonthsDiesel as $key => $value) : ?>
                                    <div class="col-xs-12 col-md-4">
                                        <div class="widget-box">
                                            <div class="widget-header">
                                                <h4 class="widget-title"> <?= AppConstants::$monthsList[$key+1] ?> </h4>
                                            </div>
                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <fieldset>
                                                        <?php
                                                        echo $form->field($value, "[1][$key]htdm_month")->hiddenInput(['value' => ($key+1)])->label(false);

                                                        echo $form->field($value, "[1][$key]htdm_date", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                                            ->widget(
                                                                DatePicker::className(), [
                                                                    'model' => $value,
                                                                    'attribute' => "[1][$key]htdm_date",
                                                                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                                                    'pluginOptions' => [
                                                                        'autoclose' => true,
                                                                        'format' => 'dd MM yyyy',
                                                                        'todayHighlight' => true
                                                                    ]
                                                                ]
                                                            )
                                                            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                                        echo $form->field($value, "[1][$key]htdm_pressure", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right'])
                                                            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                                        echo $form->field($value, "[1][$key]htdm_flow_rate", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right'])
                                                            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                                        echo $form->field($value, "[1][$key]htdm_vertical", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right'])
                                                            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                                        echo $form->field($value, "[1][$key]htdm_horizontal", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right'])
                                                            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                                        if (!$model->getIsNewRecord()) {
                                                            echo $form->field($value, "[1][$key]id")->hiddenInput()->label(false);
                                                            echo $form->field($value, "[1][$key]htdm_pump_type")->hiddenInput()->label(false);
                                                        }else{
                                                            echo Html::hiddenInput("HtdMonth[1][$key][htdm_pump_type]", AppConstants::HT_DIESEL_PUMP);
                                                        }


                                                        ?>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <?= SubmitButton::widget(['backAction' => ['index', '_ppId' => $powerPlantModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
            </div>
        </div>

    </div>

<?php ActiveForm::end(); ?>