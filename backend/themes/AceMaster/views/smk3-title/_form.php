<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\components\SubmitLinkButton;
use common\vendor\AppLabels;
use backend\assets\Smk3TitleAsset;
use yii\redactor\widgets\Redactor;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\Smk3Title */
/* @var $form yii\widgets\ActiveForm */
Smk3TitleAsset::register($this);
$baseUrl = Url::base();

?>
<?php
echo Html::hiddenInput('baseUrl', $baseUrl, ['id' => 'baseUrl']);
$form = ActiveForm::begin([
    'id' => 'smk3-title-form',
    'options' => [
        'class' => 'form-horizontal',
        'role' => 'form'
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div'
        ]
    ]
]);

?>

<?php if($model->getIsNewRecord()){ ?>
    <div id="titleDiv">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label"><?= AppLabels::SMK3_TITLE ?> </label>
                    <div class="col-sm-9">
                        <?= Html::textInput("Smk3Title[sttl_title]", null, [ 'class' => 'form-control']); ?>
                    </div>
                </div>

                <hr/>
                <div id="subtitleDiv">
                    <div id="sDiv1" class="sDiv">
                        <div class="form-group">
                            <label for="subtitle"
                                   class="col-sm-3 control-label"> <?= AppLabels::SMK3_SUBTITLE ?></label>
                            <div class="col-sm-9">
                                <?= Html::textInput("Smk3Subtitle[1][ssub_subtitle]", null, ['class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div id="criteriaDiv1">
                            <div id="cDiv1" class="cDiv">
                                <div class="form-group">
                                    <label for="criteria"
                                           class="col-sm-3 control-label"> <?= AppLabels::CRITERIA ?> </label>
                                    <div class="col-sm-9">
                                        <?= Redactor::widget([
                                             'name' => "Smk3Criteria[1][1][sctr_criteria]"
                                        ]) ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-sm-offset-8">
                                <?= Html::button(sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::CRITERIA), ['id' => 'criteria1', 'class' => 'addCriteriaButton btn btn-info btn-sm col-sm-8']); ?>
                            </div>
                        </div>
                        <hr/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-sm-offset-8">
                        <?= Html::button(sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::SMK3_SUBTITLE),['id' => 'subtitle1', 'class' => 'addSubtitleButton btn btn-info btn-sm col-sm-12']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else{ ?>

<div id="titleDiv">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label"><?= AppLabels::SMK3_TITLE ?> </label>
                <div class="col-sm-9">
                    <?= Html::activeTextInput($model, "sttl_title",  [ 'class' => 'form-control']); ?>
                </div>
            </div>

            <hr/>
            <div id="subtitleDiv">
                <?php foreach ($model->smk3Subtitles as $key => $subtitle): $key+=1; ?>
                    <div id="sDiv<?= $key ?>" class="sDiv">
                        <div class="form-group">
                            <label for="subtitle"
                                   class="col-sm-3 control-label"> <?= AppLabels::SMK3_SUBTITLE ?></label>
                            <div class="col-sm-9">
                                <?= Html::activeHiddenInput($subtitle, "[$key]id"); ?>
                                <?= Html::activeTextInput($subtitle, "[$key]ssub_subtitle", ['id' => 'subtitle', 'class' => 'form-control']); ?>
                                <?= Html::button(AppLabels::BTN_DELETE ." ". AppLabels::SMK3_SUBTITLE, ['class' => 'btn btn-xs btn-pink btn-remove-ajax-subtitle', 'data-id' => $subtitle->id, 'data-controller' => 'smk3-subtitle']); ?>
                            </div>
                        </div>
                        <div id="criteriaDiv<?= $key ?>">
                            <?php foreach ($subtitle->smk3Criterias as $key1 => $criteria): $key1 += 1; ?>
                                <div id="cDiv<?= $key1 ?>" class="cDiv">
                                    <div class="form-group">
                                        <label for="criteria"
                                               class="col-sm-3 control-label"> <?= AppLabels::CRITERIA ?> </label>
                                        <div class="col-sm-9">
                                            <?= Html::activeHiddenInput($criteria, "[$key][$key1]id"); ?>
                                            <?= $form->field($criteria, "[$key][$key1]sctr_criteria", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
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
                                                ->label(false, ['class' => '']); ?>
                                            <?= Html::button(AppLabels::BTN_DELETE ." ". AppLabels::CRITERIA, ['class' => 'btn btn-xs btn-pink btn-remove-ajax-criteria', 'data-id' => $criteria->id, 'data-controller' => 'smk3-criteria']); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php if(!isset($key1)){
                            $key1 = 0;

                        } ?>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-sm-offset-8">
                                <?= Html::button(sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::CRITERIA), ['id' => "criteria" . ($key1), 'class' => 'addCriteriaButton btn btn-info btn-sm col-sm-8']); ?>
                            </div>
                        </div>
                        <hr/>
                    </div>
                <?php  endforeach; ?>
            </div>
            <?php if(!isset($key)){
                $key = 0;
            } ?>

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-sm-offset-8">
                    <?= Html::button(sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::SMK3_SUBTITLE),['id' => "subtitle" . ($key), 'class' => 'addSubtitleButton btn btn-info btn-sm col-sm-12']); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<div class="row">
    <div class="col-xs-12 form-actions text-center">
        <?= SubmitLinkButton::widget(['formId' => 'smk3-title-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
