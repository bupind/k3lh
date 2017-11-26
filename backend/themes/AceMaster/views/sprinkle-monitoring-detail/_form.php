<?php

use yii\widgets\ActiveForm;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use backend\models\Codeset;
use app\components\SubmitButton;

/* @var $this yii\web\View */
/* @var $model backend\models\SprinkleMonitoringDetail */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel backend\models\PowerPlant */
?>
<?php
$form = ActiveForm::begin([
    'id' => 'k3-supervision-detail-form',
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

<div class="sprinkle-monitoring-detail-form">

    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"> <?= AppLabels::FORM_SPRINKLE_MONITORING_DETAIL ?> </h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <fieldset>
                            <?php
                            echo $form->field($model, 'sprinkle_monitoring_id')->hiddenInput()->error(false)->label(false);

                            echo $form->field($model, "sm_location", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo $form->field($model, 'sm_notes', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->textarea(['class' => AppConstants::ACTIVE_FORM_CLASS_TEXTAREA])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                            ?>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"> Pengecekan Visual </h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <fieldset>
                            <?php
                            echo $form->field($model, 'sm_sprinkle_head', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->dropDownList(Codeset::customMap(AppConstants::CODESET_SM_SPRINKLE_HEAD), ['class' => 'chosen-select form-control'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo $form->field($model, 'sm_detector', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->dropDownList(Codeset::customMap(AppConstants::CODESET_SM_DETECTOR), ['class' => 'chosen-select form-control'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo $form->field($model, 'sm_piping_condition', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->dropDownList(Codeset::customMap(AppConstants::CODESET_SM_PIPING_CONDITION), ['class' => 'chosen-select form-control'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                            ?>
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
