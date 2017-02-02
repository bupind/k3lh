<?php
use yii\helpers\Html;
use yii\captcha\Captcha;
use yii\widgets\ActiveForm;
use backend\models\Bank;
use backend\models\Game;

/* @var $this yii\web\View */

$memberMdl = $this->params['memberMdl'];

$form = ActiveForm::begin([
    'action' => ['/member'],
    'options' => [
        'role' => 'form',
        'class' => 'default-dark-gold',
    ]
]);

echo $form->field($memberMdl, 'member_account_name')
    ->textInput(['maxlength' => true, 'class' => 'form-control'])
    ->label(null, ['class' => '']);

echo $form->field($memberMdl, 'member_account_no')
    ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
    ->label(null, ['class' => '']);

echo $form->field($memberMdl, 'bank_id')
    ->dropDownList(Bank::map(new Bank(), 'bank_name'), ['class' => 'form-control'])
    ->label(null, ['class' => '']);

echo $form->field($memberMdl, 'game_id')
    ->dropDownList(Game::map(new Game(), 'game_name', 'gameCategory.gcat_name'), ['class' => 'form-control'])
    ->label(null, ['class' => '']);

echo $form->field($memberMdl, 'member_phone')
    ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
    ->label(null, ['class' => '']);

echo $form->field($memberMdl, 'member_email')
    ->textInput(['maxlength' => true, 'class' => 'form-control'])
    ->label(null, ['class' => '']);

echo $form->field($memberMdl, 'captcha')
    ->widget(Captcha::className(), [
        'template' => '{input}<div class="space-4"></div> <div class="row"><div class="col-xs-12">{image}</div></div>'
    ])
    ->label(null, ['class' => '']);

echo Html::submitButton('submit', ['class' => 'btn btn-dark-gold']);

ActiveForm::end();
?>
