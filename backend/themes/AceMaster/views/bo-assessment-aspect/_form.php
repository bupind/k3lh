<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitLinkButton;
use common\vendor\AppConstants;
use yii\redactor\widgets\Redactor;
use backend\models\Codeset;
use common\vendor\AppLabels;
use backend\assets\BoAssessmentAspectAsset;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\BoAssessmentAspect */
/* @var $form yii\widgets\ActiveForm */
/* @var $boCriteria backend\models\BoasCriteria[] */

BoAssessmentAspectAsset::register($this);
$baseUrl = Url::base();

?>

<?php
echo Html::hiddenInput('baseUrl', $baseUrl, ['id' => 'baseUrl']);
$form = ActiveForm::begin([
    'options' => [
        'class' => 'form-horizontal',
        'role' => 'form'
    ],
]);
?>

<div class="bo-assessment-aspect-form">

    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
            <?php
            echo $form->field($model, 'bo_form_type_code', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->dropDownList(Codeset::customMap(AppConstants::CODESET_NAME_BO_FORM_TYPE_CODE), ['class' => 'form-type-list ' . AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, 'boas_aspect', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
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
        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
            <div id="criteriaDiv">
                <?php
                foreach ($boCriteria as $key => $criteria) { ?>
                    <div class="cDiv">
                        <?php
                        if (!$model->getIsNewRecord()) {
                            echo $form->field($criteria, "[$key]id")
                                ->hiddenInput([])->label(false)->error(false);
                        }
                        echo $form->field($criteria, "[$key]boas_description", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
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

                        echo $form->field($criteria, "[$key]boas_value", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY . ' text-right'])
                            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                        ?>
                        <div class="col-xs-9 col-xs-offset-3">
                            <?= Html::button(AppLabels::BTN_DELETE ." ". AppLabels::CRITERIA, ['class' => 'btn btn-xs btn-pink btn-remove-ajax-criteria', 'data-id' => $criteria->id, 'data-controller' => 'boas-criteria']); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-sm-offset-8">
                <?= Html::button(sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::CRITERIA), ['id' => 'criteria1', 'class' => 'addCriteriaButton btn btn-info btn-sm col-sm-12']); ?>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 form-actions text-center">
            <?= SubmitLinkButton::widget(['formId' => 'bo-assessment-aspect-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>

