<?php 

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $maturityLevelTitleMdl \backend\models\MaturityLevelTitle */

?>

<div id="maturity-level-title-modal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger"><?= sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::TITLE) ?></h4>
            </div>
            
            <?php 
            
                $form = ActiveForm::begin([
                        'action' => ['/maturity-level-title/ajax-create'],
                        'id' => 'maturity-level-title-form',                    
                        'options' => [
                            'class' => 'form-horizontal',
                            'role' => 'form'
                        ]
                    ]); 
            
            ?>
            
            <div class="modal-body">
                <?php 

                    echo Html::hiddenInput('model_name', null, ['id' => 'model-name']);
                    echo $form->field($maturityLevelTitleMdl, 'title_text', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                        ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_MODAL_CLASS_INPUT_TEXT_UPPERCASE, 'tabindex' => '1', 'autofocus' => 'autofocus'])
                        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                ?>
            </div>
            <div class="modal-footer">
                <i class="fa fa-spinner fa-spin fa-lg fa-fw hide"></i>
                <?= Html::submitButton('<i class="ace-icon fa fa-check"></i> ' . AppLabels::BTN_SAVE, ['tabindex' => '2', 'class' => 'btn btn-sm btn-primary']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>