<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;
use common\components\helpers\Converter;
use backend\assets\FileUploadAsset;

FileUploadAsset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\models\CommonUpload */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel \backend\models\PowerPlant */
/* @var $codesetModel \backend\models\Codeset */

?>

<div class="common-upload-form">

    <div class="col-xs-12">
        <?php
        $form = ActiveForm::begin([
            'options' => [
                'id' => 'common-upload',
                'class' => 'form-horizontal',
                'role' => 'form',
                'enctype' => 'multipart/form-data'
            ]
        ]);
        
        echo $form->field($model, 'upload_type_code')->hiddenInput(['value' => $codesetModel->cset_code])->label(false)->error(false);
        ?>

        <div class="form-group">
            <label class="col-md-3 control-label no-padding-right"><?= $model->getAttributeLabel('files'); ?></label>
            <div class="col-md-9">
                <?= Converter::attachments($model->attachmentOwners, [
                    'show_file_upload' => true,
                    'show_delete_file' => true
                ]); ?>
                <span class="help-inline col-xs-12 col-md-7">
                    <span class="middle">
                        <div class="hint-block"><?= AppConstants::HINT_UPLOAD_FILES; ?></div>
                    </span>
                </span>
            </div>
        </div>
    
        <?php
        echo SubmitButton::widget(['backAction' => ['index', 'utc' => $codesetModel->cset_code, '_ppId' => $powerPlantModel->id], 'isNewRecord' => $model->isNewRecord]);
    
        ActiveForm::end();
        ?>
        
    </div>
</div>
