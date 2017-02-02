<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppLabels;
use backend\models\Sector;
use backend\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */

$assignments = ArrayHelper::getColumn($model->authAssignments, 'item_name');
$sectors = ArrayHelper::getColumn($model->userSectors, 'sector_id');
?>

<div class="user-form">
    
    <?php $form = ActiveForm::begin([
        'options' => [
            'class' => 'form-horizontal',
            'role' => 'form'
        ],
        'fieldConfig' => [
                'options' => [
                    'tag' => 'div'
                ]
            ]
    ]); ?>
    
    <div class="col-xs-12 col-sm-4 col-sm-offset-1">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><?= AppLabels::USER; ?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">                    
                    <fieldset>
                        <?php 
                            
                            echo Html::activeHiddenInput($model, 'employee_id');
                        
                            echo $form->field($employeeMdl, 'name', ['template' => '{label}{input}<span class="help-block">{error}{hint}</span>'])
                                ->textInput(['maxlength' => true, 'class' => 'form-control', 'autofocus' => 'autofocus'])
                                ->label(null, ['class' => '']);

                            echo $form->field($employeeMdl, 'address', ['template' => '{label}{input}<span class="help-block">{error}{hint}</span>'])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(null, ['class' => '']);

                            echo $form->field($employeeMdl, 'email', ['template' => '{label}{input}<span class="help-block">{error}{hint}</span>'])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(null, ['class' => '']);
                            
                            echo $form->field($employeeMdl, 'phone', ['template' => '{label}{input}<span class="help-block">{error}{hint}</span>'])
                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
                                ->label(null, ['class' => '']);

                            echo $form->field($model, 'username', ['template' => '{label}{input}<span class="help-block">{error}{hint}</span>'])
                                ->textInput(['maxlength' => true, 'readonly' => !$model->isNewRecord, 'class' => 'form-control'])
                                ->label(null, ['class' => '']); 

                            echo $form->field($model, 'password', ['template' => '{label}{input}<span class="help-block">{error}{hint}</span>'])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(null, ['class' => ''])
                                ->hint(!$model->isNewRecord ? \common\vendor\AppConstants::HINT_LEAVE_EMPTY : ''); 
                        
                        ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    
    <div id="widget-wrapper-address" class="col-xs-12 col-sm-6">
        <div class="row">
            <div class="col-xs-12">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title"><?= AppLabels::ROLE; ?></h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <fieldset>
                                <?= Html::checkboxList('auth_items', null, AuthItem::map(new AuthItem(), 'name', null, true, ['empty' => false, 'where' => [
                                    ['type' => [3,4]]
                                ]]), [
                                    'class' => 'control-group row',
                                    'item' => function ($index, $label, $name, $checked, $value) use ($assignments) {
                                        $checkbox = Html::checkbox($name, in_array($value, $assignments), [
                                            'value' => $value,
                                            'class' => 'ace ace-checkbox-2',
                                            'label' => '<span class="lbl" for="' . $label . '"> ' . $label . '</span>',
                                        ]);
                                        return sprintf('<div class="checkbox col-sm-6">%s</div>', $checkbox);
                                    }
                                ]); ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-xs-12">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title"><?= AppLabels::SECTOR; ?></h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <fieldset>
                                <?= Html::checkboxList('user_sectors', null, Sector::map(new Sector(), 'sector_name', null, true, ['empty' => false]), [
                                    'class' => 'control-group row',
                                    'item' => function ($index, $label, $name, $checked, $value) use ($sectors) {
                                        $checkbox = Html::checkbox($name, in_array($value, $sectors), [
                                            'value' => $value,
                                            'class' => 'ace ace-checkbox-2',
                                            'label' => '<span class="lbl" for="' . $label . '"> ' . $label . '</span>',
                                        ]);
                                        return sprintf('<div class="checkbox col-sm-6">%s</div>', $checkbox);
                                    }
                                ]);
                                ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>
