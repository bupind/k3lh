<?php

use yii\helpers\Html;
use common\vendor\AppConstants;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use backend\models\Bank;
use backend\models\Game;

/* @var $this yii\web\View */
/* @var $model frontend\models\Deposit */

$webProfile = Yii::$app->params['web_profile'];
$this->title = sprintf('Penarikan - %s', $webProfile->title_tag);

$this->beginBlock('form');
$form = ActiveForm::begin([
    'options' => [
        'role' => 'form',
        'class' => 'default-dark-gold margin-bottom-20'
    ]
]);

echo $form->field($model, 'wd_name')
    ->textInput(['maxlength' => true, 'class' => 'form-control'])
    ->label(null, ['class' => '']);

echo $form->field($model, 'wd_username')
    ->textInput(['maxlength' => true, 'class' => 'form-control'])
    ->label(null, ['class' => '']);

echo $form->field($model, 'wd_email')
    ->textInput(['maxlength' => true, 'class' => 'form-control'])
    ->label(null, ['class' => '']);

echo $form->field($model, 'wd_amount')
    ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
    ->label(null, ['class' => '']);

echo $form->field($model, 'game_id')
    ->dropDownList(Game::map(new Game(), 'game_name'), ['class' => 'form-control'])
    ->label(null, ['class' => '']);

echo $form->field($model, 'wd_receiver_bank_id')
    ->dropDownList(Bank::map(new Bank(), 'bank_name'), ['class' => 'form-control'])
    ->label(null, ['class' => '']);

echo $form->field($model, 'wd_account_name')
    ->textInput(['maxlength' => true, 'class' => 'form-control'])
    ->label(null, ['class' => '']);

echo $form->field($model, 'wd_account_no')
    ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
    ->label(null, ['class' => '']);

echo $form->field($model, 'captcha')
    ->widget(Captcha::className(), [
        'template' => '<div class="row"><div class="col-xs-12 col-sm-3">{image}</div><div class="col-xs-12 col-sm-9">{input}</div></div>'
    ])
    ->label(null, ['class' => '']);

echo Html::submitButton('submit', ['class' => 'btn btn-dark-gold']);

ActiveForm::end();
$this->endBlock();
?>

<div class="row">
    <div class="col-xs-12 widget">
        <h1>Penarikan</h1>
        <div class="widget-body"><?= $this->blocks['form']; ?></div>
    </div>
</div>



