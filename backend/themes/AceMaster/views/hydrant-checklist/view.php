<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use app\components\ViewButton;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\HydrantChecklist */
/* @var $questionList backend\models\HydrantQuestion[] */
/* @var $answerList backend\models\HcDetail[] */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->hc_location);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_CHECKLIST_HYDRANT), 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;
$index = 0;
?>
<div class="hydrant-checklist-view">

    <div class="page-header">
        <h1>
            <?= Html::encode(sprintf("%s %s", sprintf("Form %s", AppLabels::FORM_CHECKLIST_HYDRANT), $this->title)) ?>
            <?php if (isset($this->params['subtitle'])): ?>
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <?= $this->params['subtitle']; ?>
                </small>
            <?php endif; ?>
        </h1>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">

            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'converter' => [
                        'sector_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sector->sector_name],
                        'power_plant_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->powerPlant->pp_name],
                    ]
                ]
            ]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table id="table-work-env-data" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL ?>">
                <thead>
                <tr>
                    <th class="center" colspan="5">
                        Ikuti rekomendasi pembuat, Seluruh informasi yang diperlukan harus didokumentasi dan ditandatangani
                    </th>
                </tr>
                <tr>
                    <th rowspan="2" class="center">
                        <?= sprintf("%s %s", AppLabels::ITEM, AppLabels::INSPECTION);  ?>
                    </th>
                    <th class="center" rowspan="1" colspan="3">
                        <?= AppLabels::CONDITION ?>
                    </th>
                    <th class="center" rowspan="2">
                        <?= AppLabels::DESCRIPTION ?>
                    </th>
                </tr>
                <tr>
                    <th class="center">
                        <?= AppLabels::GOOD ?>
                    </th>
                    <th class="center">
                        <?= AppLabels::ENOUGH ?>
                    </th>
                    <th class="center">
                        <?= AppLabels::BAD ?>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($questionList as $key => $question): ?>
                    <tr>
                        <td class="center">
                            <?= $answerList[$question->id]->hydrantQuestion->hq_question ?>
                        </td>
                        <td colspan="1" class="text-center"><?php if($answerList[$question->id]->hcd_answer == "0"){ ?> <i class="ace-icon fa fa-check bigger-120"></i> <?php } ?></td>
                        <td colspan="1" class="text-center"><?php if($answerList[$question->id]->hcd_answer == "1"){ ?> <i class="ace-icon fa fa-check bigger-120"></i> <?php } ?></td>
                        <td colspan="1" class="text-center"><?php if($answerList[$question->id]->hcd_answer == "2"){ ?> <i class="ace-icon fa fa-check bigger-120"></i> <?php } ?></td>
                        <?php $index++; ?>
                        <?php if ($index == 1) : ?>
                            <td rowspan="<?= count($questionList) ?>" class="center" width="15%">
                                Isi pada kolom: Baik; Cukup; Kurang, sesuai dengan kondisi sebenarnya.
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'buttons' => [
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', '_ppId' => $model->power_plant_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', '_ppId' => $model->power_plant_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                        'edit' => Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['update', '_ppId' => $model->power_plant_id, 'id' => $model->id], ['class' => 'btn btn-white btn-info btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
