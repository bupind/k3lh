<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitLinkButton;
use common\vendor\AppConstants;
use backend\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItemChild */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row auth-item-child-form">
    <div class="col-xs-12">
        <?php $form = ActiveForm::begin([
            'options' => [
                'id' => 'form-auth-item-child',
                'class' => 'form-horizontal',
                'role' => 'form'
            ]
        ]); ?>

        <?php

            echo $form->field($model, 'parent', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
                ->dropDownList(AuthItem::map(new AuthItem(), 'name', null, true, ['where' => [
                    ['type' => [3, 4]]
                ]]), ['class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        ?>
        <hr />
        <div class="form-group">
            <?= Html::checkboxList('childs', null, AuthItem::map(new AuthItem(), 'name', null, true, ['empty' => false, 'where' => [
                ['type' => 2]
            ]]), [
                'class' => 'control-group row',
                'item' => function ($index, $label, $name, $checked, $value) {
                    $checkbox = Html::checkbox($name, $checked, [
                        'value' => $value,
                        'class' => 'ace ace-checkbox-2',
                        'label' => '<span class="lbl" for="' . $label . '"> ' . $label . '</span>',
                    ]);
                    return sprintf('<div class="checkbox col-sm-4">%s</div>', $checkbox);
                }
            ]); ?>
        </div>

        <hr />
        <div class="text-center">
            <?= SubmitLinkButton::widget(['backAction' => '/auth-item-child', 'formId' => 'form-auth-item-child', 'isNewRecord' => $model->isNewRecord]); ?>
        </div>

        <?php ActiveForm::end(); ?>
        
    </div>
</div>
