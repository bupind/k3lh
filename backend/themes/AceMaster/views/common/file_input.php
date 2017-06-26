<?php 

use yii\helpers\Html;
use common\vendor\AppConstants;
use backend\models\Attachment;

/* @var $attachmentOwners backend\models\AttachmentOwner[] */
/* @var $attachmentMdl backend\models\Attachment */

$options['attribute'] = isset($options['attribute']) ? $options['attribute'] : 'file';
$options['class'] = isset($options['class']) ? $options['class'] : AppConstants::ACTIVE_FORM_CLASS_FILE_SINGLE;
$options['multiple'] = isset($options['multiple']) ? $options['multiple'] : false;

$attachmentMdl = new Attachment();
?>

<?php

if (isset($attachmentOwners) && !empty($attachmentOwners)) {
    $link = '';
    foreach ($attachmentOwners as $key => $attachmentOwner) {
        $link .= Html::beginTag('div', ['id' => "att_$index$key"]);
        $link .= Html::a($attachmentOwner->attachment->atf_filename, sprintf('%s/uploads/%s/%s', \Yii::getAlias(AppConstants::THEME_BASE_URL), strtolower($attachmentOwner->attachment->atf_location), $attachmentOwner->attachment->atf_filename), ['target' => '_blank']);
        
        if (isset($options['show_delete_file']) && $options['show_delete_file'] == true) {
            $link .= ' ';
            $link .= Html::button('<i class="ace-icon fa fa-trash bigger-110 icon-only"></i>', ['class' => 'btn btn-minier btn-danger btn-delete-attachment', 'data-id' => $attachmentOwner->attachment_id, 'data-index' => $index . $key]);
        }
        $link .= Html::endTag('div');
    }
}

if (isset($options['show_file_upload']) && $options['show_file_upload'] == true) {
    echo $form->field($attachmentMdl, $options['attribute'], ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
        ->fileInput([
            'class' => $options['class'],
            'multiple' => $options['multiple']
        ])
        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
}

?>