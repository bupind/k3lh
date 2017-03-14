<?php

use yii\helpers\Html;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use yii\widgets\ActiveForm;
use common\components\helpers\Converter;
use app\components\SubmitButton;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PpuTechnicalProvisionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model backend\models\PpuTechnicalProvision */
/* @var $ppuQuestions backend\models\PpuQuestion[] */
/* @var $detailModels backend\models\PpuTechnicalProvisionDetail[] */
/* @var $ppuId int */
/* @var $ppuModel backend\models\Ppu */

$this->title = AppLabels::TECHNICAL_PROVISION;
$this->params['breadcrumbs'][] = ['label' => AppLabels::AIR_POLLUTION_CONTROL, 'url' => ['/ppu/index']];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', $ppuModel->sector->sector_name, $ppuModel->powerPlant->pp_name), 'url' => ['/ppu/view', 'id' => $ppuModel->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::BTN_UPDATE, 'url' => ["/ppu/update/$ppuModel->id"]];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$form = ActiveForm::begin([
    'id' => 'ppu-technical-provision-form',
    'options' => [
        'role' => 'form',
        'enctype' => 'multipart/form-data',
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div'
        ]
    ]
]);
?>

    <div class="ppu-technical-provision-index">

        <div class="page-header">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <div class="table-responsive">
                    <table id="table-pollution-load" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                        <thead>
                        <tr>
                            <?php
                            if ($model->getIsNewRecord()) {
                                echo Html::hiddenInput("PpuTechnicalProvision[ppu_id]", $ppuModel->id);
                            } else {
                                echo $form->field($model, 'ppu_id')
                                    ->hiddenInput([])->label(false);
                            }
                            ?>
                            <th><?= AppLabels::NUMBER_SHORT ?></th>
                            <th><?= AppLabels::TECHNICAL_PROVISION ?></th>
                            <th><?= AppLabels::SUPPORTING_EVIDENCE ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($ppuQuestions as $key => $question) : $keyQ = $key + 1; ?>
                            <tr>
                                <td>
                                    <?= $keyQ ?>
                                </td>
                                <td>
                                    <?php if (!$detailModels[$key]->getIsNewRecord()) { ?>
                                        <?= $form->field($detailModels[$key], "[$key]id")->hiddenInput()->label(false); ?>
                                    <?php  } ?>
                                    <?= $form->field($detailModels[$key], "[$key]ppu_question_id")->hiddenInput(['value' => $question->id])->label(false); ?>
                                    <?= $question->ppuq_question ?>
                                </td>
                                <td>
                                    <?= Converter::attachment($detailModels[$key]->attachmentOwner, ['show_file_upload' => true, 'show_delete_file' => true, 'index' => $key]); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <?= SubmitButton::widget(['backAction' => "ppu/update/$ppuModel->id", 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
        </div>

    </div>

<?php ActiveForm::end(); ?>