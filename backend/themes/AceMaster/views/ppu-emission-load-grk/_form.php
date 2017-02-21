<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\PpuEmissionSource;
use backend\models\Codeset;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuEmissionLoadGrk */
/* @var $form yii\widgets\ActiveForm */
/* @var $ppuModel backend\models\Ppu */
?>

<?php $form = ActiveForm::begin([
    'id' => 'ppu-compulsory-monitored-emission-source-form',
    'options' => [
        'class' => 'form-horizontal calx',
        'role' => 'form',
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div',
        ]
    ]
]); ?>

<div class="col-xs-12">
    <?= SubmitButton::widget(['backAction' => ['index', 'ppuId' => $ppuModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
</div>
<?php ActiveForm::end(); ?>
