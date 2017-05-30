<?php 
use yii\helpers\Html; 
use common\vendor\AppLabels;
?>

<?= Html::a('<i class="ace-icon fa fa-file-excel-o bigger-110"></i> ' . AppLabels::BTN_EXPORT, '#', ['id' => 'submit-link', 'data-confirm' => AppLabels::ALERT_ARE_YOU_SURE, 'data-form-id' => $formId, 'class' => 'btn btn-success']) . '&nbsp;'; ?>
<?= Html::a('<i class="ace-icon fa fa-times bigger-110"></i> ' . AppLabels::BTN_CANCEL, is_array($backAction) ? $backAction : [$backAction], ['class' => 'btn btn-danger']); ?>