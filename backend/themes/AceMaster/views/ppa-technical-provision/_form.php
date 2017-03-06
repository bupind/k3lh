<?php

use app\components\SubmitButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\PpaQuestion;
use common\components\helpers\Converter;
use backend\assets\PPAAsset;
use kartik\widgets\DatePicker;

PPAAsset::register($this);
DatePicker::widget(['name' => 'hide', 'options' => ['class' => 'hidden']]);

/* @var $this yii\web\View */
/* @var $model backend\models\PpaTechnicalProvision */
/* @var $form yii\widgets\ActiveForm */
/* @var $startDate DateTime */
/* @var $ppaModel \backend\models\Ppa */
/* @var $ppaTechProvDetailModels \backend\models\PpaTechnicalProvisionDetail[] */
/* @var $ppaLaboratoriumModels \backend\models\PpaLaboratorium[] */
/* @var $questionGroups \backend\models\Codeset[] */

$no = 1;
$index = 0;

?>

<div class="ppa-technical-provision-form">
    
    <?php
    $form = ActiveForm::begin([
        'options' => [
            'id' => 'ppa-form',
            'class' => 'form-horizontal calx',
            'role' => 'form',
            'enctype' => 'multipart/form-data'
        ],
        'fieldConfig' => [
            'options' => [
                'tag' => 'div'
            ]
        ]
    ]);
    
    echo $form->field($model, 'ppa_id')->hiddenInput(['value' => $ppaModel->id])->label(false)->error(false);
    ?>
    
    <div class="row">
        <div class="col-xs-12">
            <h3 class="row header smaller lighter blue">
                <span class="col-sm-7">
                    <i class="ace-icon fa fa-flask"></i>
                    <?= AppLabels::LABORATORIUM; ?>
                </span>
                <span class="col-sm-5">
                    <label class="pull-right inline">
                        <?= Html::button(sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::LABORATORIUM), ['class' => 'btn btn-minier btn-purple', 'id' => 'btn-add-labor']); ?>
                    </label>
                </span>
            </h3>
            <div id="labor-parent" class="<?= !$model->isNewRecord ? 'hidden' : ''; ?>">
                <div class="widget-box <?= !$model->isNewRecord ? '' : 'labor-widget'; ?>">
                    <div class="widget-body">
                        <div class="widget-main">
                            <?= $this->render('_labor_create', ['startDate' => $startDate]); ?>
                        </div>
                    </div>
                </div>
                <hr/>
            </div>
            
            <?php if (!$model->isNewRecord): ?>
                <?= $this->render('_labor_update', ['ppaLaboratoriumModels' => $ppaLaboratoriumModels, 'startDate' => $startDate]); ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div id="labor-append"></div>
        </div>
    </div>
         
    <div class="row">
        <div class="col-xs-12">
            <?php foreach ($questionGroups as $qKey => $qGroup): ?>
                <h4 class="header lighter green"><?= $qGroup->cset_value; ?></h4>
                <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                    <thead>
                    <tr>
                        <th><?= AppLabels::NUMBER_SHORT; ?>.</th>
                        <th><?= AppLabels::TECHNICAL_PROVISION; ?></th>
                        <th><?= AppLabels::DOCUMENTS; ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach (PpaQuestion::map(new PpaQuestion(), 'ppaq_question', null, true, [
                        'where' => [
                            ['ppaq_question_type_code' => $qGroup->cset_code]
                        ],
                        'empty' => false
                    ]) as $ppaqId => $question): ?>
                        <tr>
                            <td>
                                <?= $no++; ?>.
                                <?php
                                if (!$ppaTechProvDetailModels[$index]->isNewRecord) {
                                    echo Html::activeHiddenInput($ppaTechProvDetailModels[$index], "[$index]id");
                                }
                                echo Html::activeHiddenInput($ppaTechProvDetailModels[$index], "[$index]ppa_question_id", ['value' => $ppaqId]);
                                ?>
                            </td>
                            <td><?= $question; ?></td>
                            <td>
                                <?= Converter::attachments($ppaTechProvDetailModels[$index]->attachmentOwners, [
                                    'show_file_upload' => true,
                                    'show_delete_file' => true,
                                    'index' => $index
                                ]); ?>
                            </td>
                        </tr>
                    <?php $index++; endforeach; ?>
                    </tbody>
                </table>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['/ppa/update', 'id' => $ppaModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>