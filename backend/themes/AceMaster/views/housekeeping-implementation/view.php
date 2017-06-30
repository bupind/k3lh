<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\HousekeepingImplementation */
/* @var $questionList backend\models\HousekeepingQuestion[] */
/* @var $answerList backend\models\HiDetail[] */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->hi_auditor);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_HOUSEKEEPING_IMPLEMENTATION), 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;

$index = 0;
$alphabet = range('A', 'Z');
$totalCriteria = 0;
$totalQuality = 0;
?>
<div class="housekeeping-implementation-view">

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
                    ],
                    'extraAttributes' => [
                        'files' => Converter::attachments($model->attachmentOwners)
                    ],
                ]
            ]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table id="table-housekeeping-implementation" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL ?>">
                <thead>
                <tr>
                    <th> <?= AppLabels::NUMBER_SHORT ?> </th>
                    <th class="center" width="35%">
                        <?= sprintf("%s Implementasi 5S", AppLabels::CRITERIA);  ?>
                    </th>
                    <th class="center" colspan="2" width="3%">
                        <?= sprintf("%s Nilai", AppLabels::CRITERIA);  ?>
                    </th>
                    <th class="center" colspan="2" width="5%">
                        <?= sprintf("%% %s", AppLabels::QUALITY);  ?>
                    </th>
                    <th class="center">
                        <?= sprintf("%s", AppLabels::RECOMMENDATION);  ?>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($questionList as $key => $question): ?>
                    <tr>
                        <td class="center">
                            <?= sprintf("%s.", $alphabet[$key]); ?>
                        </td>
                        <td colspan="6">
                            <?= $question->hq_title ?>
                        </td>
                    </tr>
                    <?php foreach ($question->hqDetails as $keyD => $detail): ?>
                        <tr>
                            <td class="center">
                                <?= $keyD + 1 ?>
                            </td>
                            <td colspan="6">
                                <?= $answerList[$detail->id]->hqDetail->hqd_subtitle ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                a.
                            </td>
                            <td>
                                <?= $answerList[$detail->id]->hqDetail->hqd_criteria_1 ?>
                            </td>
                            <td class="center">
                                5
                            </td>
                            <td class="center" rowspan="5">
                                <?= $answerList[$detail->id]->hi_criteria_value ?>
                                <?php $totalCriteria += $answerList[$detail->id]->hi_criteria_value; ?>
                            </td>
                            <td class="center">
                                90-100
                            </td>
                            <td class="center" rowspan="5">
                                <?= $answerList[$detail->id]->hi_quality_value ?>
                                <?php $totalQuality += $answerList[$detail->id]->hi_quality_value; ?>
                            </td>
                            <td class="center" rowspan="5">
                                <?= $answerList[$detail->id]->hi_recommendation ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                b.
                            </td>
                            <td>
                                <?= $answerList[$detail->id]->hqDetail->hqd_criteria_2 ?>
                            </td>
                            <td class="center">
                                4
                            </td>
                            <td class="center">
                                76-90
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                c.
                            </td>
                            <td>
                                <?= $answerList[$detail->id]->hqDetail->hqd_criteria_3 ?>
                            </td>
                            <td class="center">
                                3
                            </td>
                            <td class="center">
                                56-75
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                d.
                            </td>
                            <td>
                                <?= $answerList[$detail->id]->hqDetail->hqd_criteria_4 ?>
                            </td>
                            <td class="center">
                                2
                            </td>
                            <td class="center">
                                31-55
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                e.
                            </td>
                            <td>
                                <?= $answerList[$detail->id]->hqDetail->hqd_criteria_5 ?>
                            </td>
                            <td class="center">
                                1
                            </td>
                            <td class="center">
                                10-30
                            </td>
                        </tr>
                        <?php $index++; endforeach; ?>
                    <tr>
                        <td></td>
                        <td>
                            <?= AppLabels::AMOUNT ?>
                        </td>
                        <td></td>
                        <td>
                            <?= Html::textInput("TotalCriteria", $totalCriteria, ['disabled' => true, 'class' => 'form-control text-right']); ?>
                        </td>
                        <td></td>
                        <td>
                            <?= Html::textInput("TotalQuality", $totalQuality, ['disabled' => true, 'class' => 'form-control text-right']); ?>
                        </td>
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
