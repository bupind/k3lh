<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\Plb3SaQuestion;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3SaForm */
/* @var $form yii\widgets\ActiveForm */
/* @var $startDate DateTime */
/* @var $plb3SAModel \backend\models\Plb3SelfAssessment */
/* @var $plb3SaFormDetailModels \backend\models\Plb3SaFormDetail[] */
/* @var $plb3SaFormDetailStaticModel \backend\models\Plb3SaFormDetailStatic */
/* @var $plb3SaFormDetailStaticQuarterModels \backend\models\Plb3SaFormDetailStaticQuarter[] */
/* @var $questionGroups \backend\models\Codeset[] */

$index = 0;
?>

<div class="plb3-sa-form-form">
    <?php
    $form = ActiveForm::begin([
        'options' => [
            'id' => 'plb3-sa-form',
            'class' => 'form-horizontal',
            'role' => 'form',
            'enctype' => 'multipart/form-data'
        ],
        'fieldConfig' => [
            'options' => [
                'tag' => 'div'
            ]
        ]
    ]);
    
    echo $form->field($model, 'plb3_self_assessment_id')->hiddenInput(['value' => $plb3SAModel->id])->label(false)->error(false);
    ?>

    <div class="row">
        <div class="col-xs-12">
            <?php foreach ($questionGroups as $qKey => $qGroup):; ?>
                <?= $this->render('_form_category_' . strtolower($qGroup->cset_code), [
                    'form' => $form,
                    'codeset' => $qGroup,
                    'plb3SAModel' => $plb3SAModel,
                    'plb3SaFormDetailModels' => $plb3SaFormDetailModels,
                    'plb3SaFormDetailStaticModel' => $plb3SaFormDetailStaticModel,
                    'plb3SaFormDetailStaticQuarterModels' => $plb3SaFormDetailStaticQuarterModels,
                    'index' => $index,
                    'startDate' => $startDate
                ]); ?>
                <?php $index += Plb3SaQuestion::find()->where(['category_code' => $qGroup->cset_code])->count(); ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['/plb3-self-assessment/update', 'id' => $plb3SAModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
