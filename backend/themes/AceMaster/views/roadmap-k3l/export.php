<?php

use yii\helpers\Html;
use common\vendor\AppLabels;
use yii\widgets\ActiveForm;
use app\components\ExportLinkButton;
use common\vendor\AppConstants;
use backend\models\Sector;
use backend\assets\RoadmapAsset;

RoadmapAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RoadmapK3lSearch */
/* @var $powerPlantList \backend\models\PowerPlant[] */

$this->title = sprintf('%s %s %s', AppLabels::BTN_DOWNLOAD_EXCEL, AppLabels::ROADMAP_PROGRAM, $title);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::ROADMAP_PROGRAM, $title), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin([
    'id' => 'roadmap-form',
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

<div class="roadmap-k3l-export">
    
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <div class="row roadmap-k3l-form">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <?php
            echo Html::activeHiddenInput($searchModel, 'form_type_code');
            echo $form->field($searchModel, 'sector_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->dropDownList(Sector::map(new Sector(), 'sector_name'), ['class' => 'sector-list ' . AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            
            echo $form->field($searchModel, 'power_plant_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->dropDownList($powerPlantList, ['id' => 'power-plant-list', 'class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            
            echo $form->field($searchModel, 'k3l_year', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
            ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 form-actions text-center">
            <?= ExportLinkButton::widget(['formId' => 'roadmap-form', 'backAction' => 'index']); ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
