<?php

use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitButton;
use yii\redactor\widgets\Redactor;
use kartik\date\DatePicker;
use backend\models\Codeset;

/* @var $this yii\web\View */
/* @var $model backend\models\K3lProblem */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel backend\models\PowerPlant */
?>

<?php
$form = ActiveForm::begin([
    'id' => 'k3l-problem-form',
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
?>

<div class="k3l-problem-form">

    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <?php

            echo $form->field($model, 'sector_id')->hiddenInput(['value' => $powerPlantModel->sector_id])->error(false)->label(false);
            echo $form->field($model, 'power_plant_id')->hiddenInput(['value' => $powerPlantModel->id])->error(false)->label(false);

            echo $form->field($powerPlantModel->sector, 'sector_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput([ 'class' => 'form-control text-center', 'disabled' => true])
                ->label(AppLabels::SECTOR, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($powerPlantModel, 'pp_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput([ 'class' =>  'form-control text-center', 'disabled' => true])
                ->label(AppLabels::POWER_PLANT, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "kp_problem_number", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, 'kp_date', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->widget(
                    DatePicker::className(), [
                        'model' => $model,
                        'attribute' => 'kp_date',
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'dd MM yyyy',
                            'todayHighlight' => true
                        ]
                    ]
                )
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, 'kp_problem_description', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
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

            echo $form->field($model, 'kp_mitigation_plan', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
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

            echo $form->field($model, 'kp_mitigation_dateline_date', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->widget(
                    DatePicker::className(), [
                        'model' => $model,
                        'attribute' => 'kp_mitigation_dateline_date',
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'dd MM yyyy',
                            'todayHighlight' => true
                        ]
                    ]
                )
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo$form->field($model, "kp_status_code", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->dropDownList(Codeset::customMap(AppConstants::CODESET_KP_STATUS_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "kp_progress", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "kp_description", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            ?>
        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-2">
            <table id="table-kp-problem" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL ?>">
                <thead>
                    <tr>
                        <th colspan="2" class="center">
                            <?= AppLabels::KP_ENVIRONMENT_PROBLEM ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            E0
                        </td>
                        <td>
                            <?= AppLabels::KP_E_CONSTANT_1 ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            E1
                        </td>
                        <td>
                            <?= AppLabels::KP_E_CONSTANT_2 ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            E2
                        </td>
                        <td>
                            <?= AppLabels::KP_E_CONSTANT_3 ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            E3
                        </td>
                        <td>
                            <?= AppLabels::KP_E_CONSTANT_4 ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            E4
                        </td>
                        <td>
                            <?= AppLabels::KP_E_CONSTANT_5 ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            E5
                        </td>
                        <td>
                            <?= AppLabels::KP_E_CONSTANT_6 ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            E6
                        </td>
                        <td>
                            <?= AppLabels::KP_E_CONSTANT_7 ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            E7
                        </td>
                        <td>
                            <?= AppLabels::KP_E_CONSTANT_8 ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            E8
                        </td>
                        <td>
                            <?= AppLabels::KP_E_CONSTANT_9 ?>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>

        <div class="col-xs-12 col-md-4">
            <table id="table-kp-problem" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL ?>">
                <thead>
                    <tr>
                        <th colspan="2" class="center">
                            <?= AppLabels::FORM_K3L_PROBLEM ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            S0
                        </td>
                        <td>
                            <?= AppLabels::KP_S_CONSTANT_1 ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            S1
                        </td>
                        <td>
                            <?= AppLabels::KP_S_CONSTANT_2 ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            S2
                        </td>
                        <td>
                            <?= AppLabels::KP_S_CONSTANT_3 ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            S3
                        </td>
                        <td>
                            <?= AppLabels::KP_S_CONSTANT_4 ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            S4
                        </td>
                        <td>
                            <?= AppLabels::KP_S_CONSTANT_5 ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            S5
                        </td>
                        <td>
                            <?= AppLabels::KP_S_CONSTANT_6 ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            S6
                        </td>
                        <td>
                            <?= AppLabels::KP_S_CONSTANT_7 ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            S7
                        </td>
                        <td>
                            <?= AppLabels::KP_S_CONSTANT_8 ?>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', '_ppId' => $powerPlantModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>

</div>

<?php ActiveForm::end(); ?>
