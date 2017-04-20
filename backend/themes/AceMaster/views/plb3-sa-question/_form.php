<?php

use app\components\SubmitLinkButton;
use backend\models\Codeset;
use common\vendor\AppConstants;
use yii\widgets\ActiveForm;
use yii\redactor\widgets\Redactor;
use backend\models\Plb3SaQuestion;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3SaQuestion */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$form = ActiveForm::begin([
    'options' => [
        'class' => 'form-horizontal',
        'role' => 'form'
    ],
]);
?>

    <div class="row plb3-sa-question-form">
        <div class="col-xs-12">
            <?php
            
            echo $form->field($model, 'category_code', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
                ->dropDownList(Codeset::customMap(AppConstants::CODESET_PLB3_SA_QUESTION_CATEGORY_CODE), ['class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            
            echo $form->field($model, 'input_type_code', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
                ->dropDownList(Codeset::customMap(AppConstants::CODESET_PLB3_SA_QUESTION_INPUT_TYPE_CODE), ['class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            
            echo $form->field($model, 'is_question', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
                ->dropDownList(AppConstants::$yesNoList, ['class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, 'parent_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
                ->dropDownList(Plb3SaQuestion::map(new Plb3SaQuestion(), 'label_clean', null, 'label'), ['class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, 'label', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
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

    <div class="row">
        <div class="col-xs-12 form-actions text-center">
            <?= SubmitLinkButton::widget(['formId' => 'working-plan-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>