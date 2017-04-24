<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use app\components\ViewButton;
use backend\models\Plb3Question;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3ChecklistDetail */
/* @var $questionGroups backend\models\Codeset[] */
/* @var $answerModels backend\models\Plb3ChecklistAnswer[] */
/* @var $plb3c_model backend\models\Plb3Checklist */
/* @var $pct string */


$this->title = sprintf("%s %s %s", AppLabels::BTN_VIEW, AppLabels::CHECKLIST, $model->plb3cd_company_name);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::CHECKLIST, $title), 'url' => ['index', 'plb3cId' => $model->plb3Checklist->id, 'pct' => $model->plb3cd_form_type_code]];
$this->params['breadcrumbs'][] = ['label' => $model->plb3cd_company_name];

$no = 1;
$index = 0;
$countAnswerYes = 0;
$countAnswerNo = 0;
?>
<div class="plb3-checklist-detail-view">
    <div class="page-header">
        <h1>
            <?= Html::encode($this->title) ?>
            <?php if (isset($this->params['subtitle'])): ?>
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <?= $this->params['subtitle']; ?>
                </small>
            <?php endif; ?>
        </h1>
    </div>

    <div class="col-xs-12 col-md-4 col-md-offset-4 ">
        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'excluded' => [ 'plb3_checklist_id'],
                'converter' => [
                    'plb3cd_form_type_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->plb3cd_form_type_code_desc],
                ]
            ]
        ]); ?>
        <hr/>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?php foreach ($questionGroups as $qKey => $qGroup): ?>
                <h4 class="header lighter green"><?= $qGroup->cset_value; ?></h4>
                <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                    <thead>
                    <tr>
                        <th rowspan="2" class="text-center" width="1%"><?= AppLabels::NUMBER_SHORT; ?>.</th>
                        <th rowspan="2" class="text-center"><?= AppLabels::TERMS; ?></th>
                        <th rowspan="1" colspan="2" class="text-center" width="10%"><?= AppLabels::ANSWER; ?></th>
                        <th rowspan="2" class="text-center" width="20%"><?= AppLabels::DESCRIPTION ?> </th>
                    </tr>
                    <tr>
                        <th class="text-center" width="5%">Ya</th>
                        <th class="text-center" width="5%">Tidak</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach (Plb3Question::map(new Plb3Question(), 'plb3_question', null, false, [
                        'where' => [
                            ['plb3_question_type_code' => $qGroup->cset_code, 'plb3_form_type_code' => $pct ]
                        ],
                        'empty' => false
                    ]) as $plb3QuestionId => $question): ?>
                        <tr>
                            <td class="text-right"> <?= $no++ ?> </td>
                            <td> <?= $question ?> </td>
                            <?php $ans = null; foreach($answerModels as $keyM => $answer) : ?>
                                <?php if($answer->plb3_question_id == $plb3QuestionId) {$ans = $answer;} ?>
                            <?php endforeach; ?>
                            <?php if(!is_null($ans)) { ?>
                                <td colspan="1" class="text-center"><?php if($ans->plb3ca_answer == "1"){ $countAnswerYes++;?> <i class="ace-icon fa fa-check bigger-120"></i> <?php } ?></td>
                                <td colspan="1" class="text-center"><?php if($ans->plb3ca_answer == "0"){ $countAnswerNo++;?> <i class="ace-icon fa fa-check bigger-120"></i> <?php } ?></td>
                                <td class="text-center">
                                    <?= Converter::attachment($ans->attachmentOwner, ['show_file_upload' => false, 'show_delete_file' => false, 'index' => $index]); ?>
                                </td>
                            <?php } ?>
                            <?php $index++; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                <tbody>
                    <tr>
                        <td class="text-center">Total Ya</td>
                        <td class="text-right"><?= $countAnswerYes ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">Total Tidak</td>
                        <td></td>
                        <td class="text-right"><?= $countAnswerNo ?></td>
                    </tr>

                    <tr>
                        <td class="text-center"><?= sprintf("%s %s %s", AppLabels::PERCENTAGE, AppLabels::OBLIGATION, AppLabels::LB3) ?></td>
                        <td class="text-right"><?= sprintf("%s%%", number_format($countAnswerYes/($countAnswerNo+$countAnswerYes)*100)); ?></td>
                    </tr>
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
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', 'plb3cId' => $model->plb3Checklist->id, 'pct' => $model->plb3cd_form_type_code], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', 'plb3cId' => $model->plb3Checklist->id, 'pct' => $model->plb3cd_form_type_code], ['class' => 'btn btn-white btn-danger btn-bold']),
                        'edit' => Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['update', 'plb3cId' => $model->plb3Checklist->id, 'pct' => $model->plb3cd_form_type_code, 'id' => $model->id], ['class' => 'btn btn-white btn-info btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>