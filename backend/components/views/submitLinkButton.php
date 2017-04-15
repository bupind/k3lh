<?php 
use yii\helpers\Html; 
use common\vendor\AppLabels;
?>

<?= Html::a($isNewRecord ? '<i class="ace-icon fa fa-check bigger-110"></i> ' . AppLabels::BTN_SAVE : AppLabels::BTN_UPDATE, '#', ['id' => 'submit-link', 'data-confirm' => AppLabels::ALERT_ARE_YOU_SURE, 'data-form-id' => $formId, 'class' => $isNewRecord ? 'btn btn-success' : 'btn btn-primary']) . '&nbsp;'; ?>
<?= Html::a('<i class="ace-icon fa fa-times bigger-110"></i> ' . AppLabels::BTN_CANCEL, is_array($backAction) ? $backAction : [$backAction], ['class' => 'btn btn-danger']); ?>