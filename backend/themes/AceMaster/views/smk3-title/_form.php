<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\components\SubmitLinkButton;
use common\vendor\AppLabels;
use backend\assets\Smk3TitleAsset;

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
<div id="titleDiv">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label"><?= AppLabels::SMK3_TITLE ?> 1</label>
                <div class="col-sm-9">
                    <?= Html::textInput("Smk3Title[sttl_title]", null, [ 'id' => 'title', 'class' => 'form-control']); ?>
                </div>
            </div>

            <hr/>
            <div id="subtitleDiv">
                <div  class="form-group">
                    <label for="subtitle" class="col-sm-3 control-label"> <?= AppLabels::SMK3_SUBTITLE ?> 1</label>
                    <div class="col-sm-9">
                        <?= Html::textInput("Smk3Subtitle[1][ssub_subtitle]", null, ['id' => 'subtitle', 'class' => 'form-control']); ?>
                    </div>
                </div>

                <div id="criteriaDiv1">
                    <div class="form-group">
                        <label for="criteria" class="col-sm-3 control-label"> <?= AppLabels::CRITERIA ?> 1.1</label>
                        <div class="col-sm-9">
                            <?= Html::textArea("Smk3Criteria[1][1][sctr_criteria]", null, ['rows' => '5', 'id' => 'criteria', 'class' => 'form-control']); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-sm-offset-8">
                        <?= Html::button(sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::CRITERIA),['id' => 'criteria11', 'class' => 'addCriteriaButton btn btn-info btn-sm col-sm-8']); ?>
                    </div>
                </div>
                <hr/>
            </div>



            <div class="row">
                <div class="col-xs-12 col-sm-4 col-sm-offset-8">
                    <?= Html::button(sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::SMK3_SUBTITLE),['id' => 'subtitle1', 'class' => 'addSubtitleButton btn btn-info btn-sm col-sm-8']); ?>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-xs-12 form-actions text-center">
        <?= SubmitLinkButton::widget(['formId' => 'smk3-title-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
