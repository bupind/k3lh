<?php 

use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $attachmentMdl backend\models\Attachment */
?>

<?php if (is_null($attachmentMdl->atf_filename)): ?>
    <?= $form->field($attachmentMdl, 'image_file', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
        ->fileInput(['class' => AppConstants::ACTIVE_FORM_CLASS_FILE_IMAGE])
        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]); ?>
<?php else: ?>
    <div class="form-group">
        <label for="attachment-image_file" class="col-sm-3 control-label no-padding-right"><?= $attachmentMdl->getAttributeLabel('image_file'); ?></label>
        <div class="col-sm-4">
            <?= Html::img(sprintf('%s%s/%s', AppConstants::THEME_UPLOADED_IMG_PATH, $attachmentMdl->atf_location, $attachmentMdl->atf_filename), ['style' => 'max-width: 150px;']); ?>
            <?= Html::a('<i class="ace-icon fa fa-trash icon-only"></i>', ['/attachment/delete', 'id' => $attachmentMdl->id], ['class' => 'btn btn-danger btn-sm', 'data' => [
                'confirm' => AppLabels::ALERT_CONFIRM_DELETE_IMG,
                'method' => 'post',
            ],]) ?>
        </div>
    </div>
<?php endif; ?>