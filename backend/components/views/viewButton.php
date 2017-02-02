<?php 
use yii\helpers\Html; 
use common\vendor\AppLabels;
use common\vendor\AppConstants;

$template = isset($options['template']) ? $options['template'] : AppConstants::VIEW_BUTTON_TEMPLATE;

$optionButtons = isset($options['buttons']) && is_array($options['buttons']) ? $options['buttons'] : [];
$optionBackAction = isset($options['backAction']) && !empty($options['backAction']) ? $options['backAction'] : 'index';
$buttons = array_merge([
    'edit' => Html::a('<i class="ace-icon fa fa-pencil bigger-120 blue"></i> ' . AppLabels::BTN_UPDATE, ['update', 'id' => $model->id], ['class' => 'btn btn-white btn-info btn-bold']),
    'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create'], ['class' => 'btn btn-white btn-success btn-bold']),
    'delete' => Html::a('<i class="ace-icon fa fa-trash-o bigger-120 orange"></i> ' . AppLabels::BTN_DELETE, ['delete', 'id' => $model->id], [
            'class' => 'btn btn-white btn-warning btn-bold',
            'data' => [
                'confirm' => AppLabels::ALERT_CONFIRM_DELETE,
                'method' => 'post',
            ],
        ]),
    'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, [$optionBackAction], ['class' => 'btn btn-white btn-danger btn-bold']),
    'printing' => Html::a('<i class="ace-icon fa fa-print bigger-120"></i> ' . AppLabels::BTN_PRINT, ['printing', 'id' => $model->id], ['class' => 'btn btn-white btn-primary btn-bold', 'target' => 'blank']),
], $optionButtons);

?>

<div class="hr hr-8 dotted"></div>

<div class="center"><?= Yii::t('app', $template, $buttons); ?></div>