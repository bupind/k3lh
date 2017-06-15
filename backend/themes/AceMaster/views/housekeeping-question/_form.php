<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use app\components\SubmitButton;
use yii\redactor\widgets\Redactor;
use common\vendor\AppLabels;
use yii\helpers\Url;
use backend\assets\HqDetailAsset;

/* @var $this yii\web\View */
/* @var $model backend\models\HousekeepingQuestion */
/* @var $form yii\widgets\ActiveForm */
/* @var $detailModel backend\models\HqDetail[] */
HqDetailAsset::register($this);
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
$index = 0;
?>

<div class="housekeeping-question-form">

    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
        <?= $form->field($model, "hq_title", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
        ->textInput(['maxlength' => true, 'class' => 'form-control'])
        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]); ?>

        <hr/>

        <div id="subtitleDiv">
            <?php
            foreach ($detailModel as $key => $detail) : ?>
                <div class="sDiv">
                    <?php

                    if(!$model->getIsNewRecord()){
                        echo Html::activeHiddenInput($detail, "[$key]id");
                    }

                    echo $form->field($detail, "[$key]hqd_subtitle", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                        ->textInput(['maxlength' => true, 'class' => 'form-control'])
                        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                    echo $form->field($detail, "[$key]hqd_criteria_1", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
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

                    echo $form->field($detail, "[$key]hqd_criteria_2", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
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

                    echo $form->field($detail, "[$key]hqd_criteria_3", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
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

                    echo $form->field($detail, "[$key]hqd_criteria_4", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
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

                    echo $form->field($detail, "[$key]hqd_criteria_5", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
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

                    <?php if (!$model->getIsNewRecord()) : ?>
                        <div class="form-group" style="margin-left: 195px;">
                            <?= Html::button(AppLabels::BTN_DELETE . " " . AppLabels::SMK3_SUBTITLE, ['class' => 'btn btn-xs btn-pink btn-remove-ajax-subtitle', 'data-id' => $detail->id, 'data-controller' => 'hq-detail']); ?>
                        </div>
                    <?php endif; $index++; ?>

                    <hr/>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-4 col-sm-offset-8">
                <?= Html::button(sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::SUBTITLE),['id' => "subtitle" . ($index), 'class' => 'addSubtitleButton btn btn-info btn-sm col-sm-12']); ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index'], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
