<?php 
use yii\helpers\Html; 
use common\vendor\AppLabels;
?>

<?php if (!$widget): ?>
<div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
        <?= Html::submitButton($isNewRecord ? '<i class="ace-icon fa fa-check bigger-110"></i> ' . AppLabels::BTN_SAVE : AppLabels::BTN_UPDATE, ['class' => $isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
        <?= Html::a('<i class="ace-icon fa fa-times bigger-110"></i> ' . AppLabels::BTN_CANCEL, is_array($backAction) ? $backAction : [$backAction], ['class' => 'btn btn-danger']); ?>
    </div>
</div>
<?php else: ?>
<div class="form-actions center">
    <?= Html::submitButton($isNewRecord ? '<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i> ' . AppLabels::BTN_SAVE : AppLabels::BTN_UPDATE, ['class' => $isNewRecord ? 'btn btn-sm btn-success' : 'btn btn-sm btn-primary']); ?>
    <?= Html::a('<i class="ace-icon fa fa-times icon-on-right bigger-110"></i> ' . AppLabels::BTN_CANCEL, is_array($backAction) ? $backAction : [$backAction], ['class' => 'btn btn-sm btn-danger']); ?>
</div>
<?php endif; ?>
