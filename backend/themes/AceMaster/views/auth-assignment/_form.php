<?php

use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use backend\models\User;
use backend\models\AuthItem;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row auth-assignment-form">
    
    <div class="col-xs-12">                
        <?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'form-horizontal',
                'role' => 'form'
            ]
        ]); ?>
        
        <?php 
                    
            echo $form->field($model, 'item_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
                    ->dropDownList(AuthItem::map(new AuthItem(), 'name', null, true, ['where' => [
                        ['type' => [3,4]]
                    ]]), ['class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN, 'autofocus' => 'autofocus'])
                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]); 
            
            echo $form->field($model, 'user_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
                    ->dropDownList(User::map(new User(), 'username'), ['class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
                    ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]); 
        
        ?>

        <?= SubmitButton::widget(['backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>

        <?php ActiveForm::end(); ?>
    </div>

</div>
