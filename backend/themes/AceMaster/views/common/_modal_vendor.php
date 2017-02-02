<?php 

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use backend\models\City;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

?>

<div id="vendor-modal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger"><?= sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::VENDOR) ?></h4>
            </div>
            
            <?php 
            
                $formSupplier = ActiveForm::begin([
                        'action' => ['/vendor/ajax-create'],
                        'id' => 'vendor-form',                    
                        'options' => [
                            'class' => 'form-horizontal',
                            'role' => 'form'
                        ]
                    ]); 
            
            ?>
            
            <div class="modal-body">
                <?php 

                    echo Html::hiddenInput('model_name', null, ['id' => 'model-name']);
                    echo $formSupplier->field($vendorMdl, 'vendor_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                        ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_MODAL_CLASS_INPUT_TEXT_UPPERCASE, 'tabindex' => '1', 'autofocus' => 'autofocus'])
                        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                    echo $formSupplier->field($vendorMdl, 'vendor_handphone', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                        ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_MODAL_CLASS_INPUT_TEXT_NUMBERSONLY, 'tabindex' => '2'])
                        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                    echo $formSupplier->field($vendorMdl, 'vendor_address_1', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                        ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_MODAL_CLASS_INPUT_TEXT, 'tabindex' => '3'])
                        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                    
                    echo $formSupplier->field($vendorMdl, 'city_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                        ->dropDownList(City::map(new City(), 'city_name'), ['class' => AppConstants::ACTIVE_FORM_MODAL_CLASS_INPUT_TEXT, 'tabindex' => '4'])
                        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                ?>
            </div>
            <div class="modal-footer">
                <i class="fa fa-spinner fa-spin fa-lg fa-fw hide"></i>
                <?= Html::submitButton('<i class="ace-icon fa fa-check"></i> ' . AppLabels::BTN_SAVE, ['tabindex' => '5', 'class' => 'btn btn-sm btn-primary']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>