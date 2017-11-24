<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use kartik\date\DatePicker;
use app\components\SubmitButton;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\K3lActivity */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel backend\models\PowerPlant */
?>
<?php
$form = ActiveForm::begin([
    'id' => 'k3l-activity-form',
    'options' => [
        'class' => 'calx form-horizontal',
        'role' => 'form',
        'enctype' => 'multipart/form-data'
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div'
        ]
    ]
]);
?>
    <div class="k3l-activity-form">

        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title"> <?= AppLabels::FORM_K3L_ACTIVITY ?> </h4>
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

                                echo $form->field($model, "ka_name", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                echo $form->field($model, 'ka_description', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->textarea(['class' => AppConstants::ACTIVE_FORM_CLASS_TEXTAREA])
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                echo $form->field($model, 'ka_date', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                    ->widget(
                                        DatePicker::className(), [
                                            'model' => $model,
                                            'attribute' => 'ka_date',
                                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'dd MM yyyy',
                                                'todayHighlight' => true
                                            ]
                                        ]
                                    )
                                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                                echo Html::label("Upload Laporan", null, ['class' => 'col-md-3 control-label no-padding-right']);
                                ?>
                                <div class="col-md-9">
                                    <?php
                                    echo Converter::attachment($model->attachmentOwner, ['show_file_upload' => true, 'show_delete_file' => true]);
                                    ?>
                                </div>
                            </fieldset>
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