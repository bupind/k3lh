<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;
use backend\models\Codeset;
use common\vendor\AppLabels;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuaMonitoringPoint */
/* @var $form yii\widgets\ActiveForm */
/* @var $ppuaModel backend\models\PpuAmbient */

?>

<?php $form = ActiveForm::begin([
    'id' => 'ppu-monitoring-point-form',
    'options' => [
        'class' => 'form-horizontal',
        'role' => 'form',
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div',
        ]
    ]
]); ?>

<div class="ppua-monitoring-point-form">

    <div class="col-xs-12 col-sm-6 col-md-offset-3">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"> <?= AppLabels::MONITORING_POINT ?> </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php
                        if($model->getIsNewRecord()){
                            echo Html::hiddenInput('PpuaMonitoringPoint[ppu_ambient_id]', $ppuaModel->id);
                        }else {
                            echo $form->field($model, 'ppu_ambient_id', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                                ->hiddenInput([])->label(false);
                        }

                        echo $form->field($model, 'ppua_monitoring_location', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppua_code_location', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppua_coord_latitude', [
                            'template' => Yii::t('app', AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE_INPUT_GROUP, [
                                'separator' => '<i class="fa fa-map"></i>',
                                'input2' => $form->field($model, 'ppua_coord_longitude', ['template' => '{input}'])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => $model->getAttributeLabel('ppua_coord_longitude')])
                                    ->label(false)
                            ])
                        ])
                            ->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => $model->getAttributeLabel('ppua_coord_latitude')])
                            ->label(AppLabels::COORDINAT, ['class' => '']);


                        echo $form->field($model, 'ppua_env_doc_name', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppua_institution', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppua_confirm_date', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->widget(
                                DatePicker::className(), [
                                    'model' => $model,
                                    'attribute' => 'ppua_confirm_date',
                                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => 'dd-mm-yyyy',
                                        'todayHighlight' => true
                                    ]
                                ]
                            )
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppua_monitoring_data_status_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPUA_MP_MONITORING_DATA_STATUS_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppua_freq_monitoring_obligation_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPUA_MP_FREQ_MONITORING_OBLIGATION_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppua_ref', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
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

    <?= SubmitButton::widget(['backAction' => ['index', 'ppuaId' => $ppuaModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
</div>
<?php ActiveForm::end(); ?>
