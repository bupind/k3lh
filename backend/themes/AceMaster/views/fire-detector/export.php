<?php

use yii\helpers\Html;
use common\vendor\AppLabels;
use yii\widgets\ActiveForm;
use app\components\ExportLinkButton;
use common\vendor\AppConstants;
use backend\models\Codeset;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\FireDetectorSearch */
/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf('%s %s', AppLabels::BTN_DOWNLOAD_EXCEL, AppLabels::FORM_FIRE_DETECTOR);
$this->params['breadcrumbs'][] = ['label' => sprintf('Form %s', AppLabels::FORM_FIRE_DETECTOR), 'url' => ['index', '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin([
    'id' => 'fire-detector-export',
    'options' => [
        'class' => 'form-horizontal',
        'role' => 'form'
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div'
        ]
    ]
]);

?>

<div class="fire-detector-export">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="row fire-detector-form">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <?php

            echo$form->field($searchModel, "fd_form_month_type_code", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->dropDownList(Codeset::customMap(AppConstants::CODESET_FORM_MONTH_TYPE_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($searchModel, "fd_year", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 form-actions text-center">
            <?= ExportLinkButton::widget(['formId' => 'slo-tools-form', 'backAction' => 'index']); ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
