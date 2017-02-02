<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;
use yii\redactor\widgets\Redactor;

/* @var $this yii\web\View */
/* @var $model backend\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row profile-form">
    <?php
    $form = ActiveForm::begin([
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
    
    <div class="col-xs-12 col-sm-6">
        <div class="widget-box">
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php
    
                        echo $form->field($model, 'app_name', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control uppercase'])
                            ->label(null, ['class' => '']);
    
                        echo $form->field($model, 'address', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textarea(['class' => 'form-control'])
                            ->label(null, ['class' => '']);
    
                        echo $form->field($model, 'master_email', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);
    
                        ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-6">
        <div class="widget-box">
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php
    
                        echo $form->field($model, 'title_tag', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);
    
                        echo $form->field($model, 'meta_description', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(null, ['class' => '']);
    
                        echo $form->field($model, 'meta_keyword', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textarea(['class' => 'form-control'])
                            ->label(null, ['class' => '']);
    
                        ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xs-12">
        <h4 class="header green"><?= $model->getAttributeLabel('profile_left'); ?></h4>
        
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <?= $form->field($model, 'profile_left', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
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
            </div>
    
            <div class="col-xs-12 col-sm-4">
                <?= $form->field($model, 'profile_center', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
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
            </div>
    
            <div class="col-xs-12 col-sm-4">
                <?= $form->field($model, 'profile_right', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
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
            </div>
        </div>
    </div>
    
    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => 'index', 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
