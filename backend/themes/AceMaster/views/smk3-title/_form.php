<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\components\SubmitLinkButton;

/* @var $this yii\web\View */
/* @var $model backend\models\Smk3Title */
/* @var $form yii\widgets\ActiveForm */
$baseUrl = Url::base();

?>
<?php
echo Html::hiddenInput('baseUrl', $baseUrl, ['id' => 'baseUrl']);
$form = ActiveForm::begin([
    'id' => 'budget-monitoring-form',
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

<div class="row budget-monitoring-LH-form">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
                <?= Html::hiddenInput("Smk3Title[title_number]", $model->countRows()+1); ?>
                <?= Html::textInput("Smk3Title[title]", null, [ 'id' => 'title', 'class' => 'form-control']); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="subtitle" class="col-sm-2 control-label">Subtitle</label>
            <div class="col-sm-10">
                <?= Html::hiddenInput("Smk3Subtitle[subtitle_number]", $model->smk3Subtitles); ?>
                <?= Html::textInput("Smk3Subtitle[subtitle]", null, ['id' => 'subtitle', 'class' => 'form-control']); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="criteria" class="col-sm-2 control-label">Subtitle</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" id="criteria"></textarea>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 form-actions text-center">
        <?= SubmitLinkButton::widget(['formId' => 'budget-monitoring-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
