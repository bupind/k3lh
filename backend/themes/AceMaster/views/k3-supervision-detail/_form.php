<?php

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use kartik\date\DatePicker;
use app\components\SubmitButton;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\K3SupervisionDetail */
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

<div class="k3-supervision-detail-form">

    <div class="row">
    <div class="col-xs-12 col-md-8 col-md-offset-2">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"> <?= AppLabels::FORM_K3_SUPERVISION_DETAIL ?> </h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php

                        echo $form->field($model, 'k3_supervision_id')->hiddenInput()->error(false)->label(false);

                        echo $form->field($model, 'ksd_date', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                            ->widget(
                                DatePicker::className(), [
                                    'model' => $model,
                                    'attribute' => 'ksd_date',
                                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => 'dd MM yyyy',
                                        'todayHighlight' => true
                                    ]
                                ]
                            )
                            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                        echo $form->field($model, "ksd_finding", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                        echo $form->field($model, "ksd_officer_action", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                        echo $form->field($model, "ksd_response", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);


                        echo $form->field($model, 'ksd_finding_desc', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                            ->textarea(['class' => AppConstants::ACTIVE_FORM_CLASS_TEXTAREA])
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
