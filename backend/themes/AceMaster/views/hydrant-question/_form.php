<?php

use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use app\components\SubmitLinkButton;
use yii\redactor\widgets\Redactor;
/* @var $this yii\web\View */
/* @var $model backend\models\HydrantQuestion */
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

<div class="hydrant-question-form">

    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
        <?php
        /*echo $form->field($model, 'ppuq_question_type_code', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPU_QUESTION_TYPE_CODE), ['class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]); */
        echo $form->field($model, 'hq_question', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
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
        <?= SubmitLinkButton::widget(['formId' => 'hq-question-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
