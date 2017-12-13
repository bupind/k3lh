<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use app\components\ViewButton;

/* @var $this yii\web\View */
/* @var $model backend\models\WorkAccident */
/* @var $wat string */

$this->title = sprintf("%s %s %s", AppLabels::BTN_VIEW, $title,  $model->wa_year);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", $title), 'url' => ['index', '_ppId' => $model->power_plant_id, 'wat' => $wat]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-accident-view">

    <div class="page-header">
        <h1>
            <?= Html::encode(sprintf("%s", $this->title)) ?>
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
                ]
            ]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table id="table-k3-supervision-view" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                    <thead>
                    <tr>
                        <th rowspan="3" class="text-center"><?= AppLabels::NUMBER_SHORT ?></th>
                        <th class="text-center" colspan="7"><?= "Accident / Nearmiss" ?></th>
                        <th rowspan="3" class="text-center"><?= "Kronologis Kejadian" ?></th>
                        <th rowspan="1" class="text-center" colspan="5"><?= "Investigasi Kecelakaan" ?></th>
                        <th rowspan="3" class="text-center"><?= "Kesimpulan Investigasi" ?></th>
                    </tr>
                    <tr>
                        <th rowspan="2" class="text-center"><?= sprintf("%s %s", AppLabels::DATE, AppLabels::EVENT) ?></th>
                        <th rowspan="2" class="text-center"><?= AppLabels::EVENT ?></th>
                        <th rowspan="2" class="text-center"><?= "Jenis Kecelakaan" ?></th>
                        <th class="text-center" colspan="2"><?= AppLabels::LOCATION ?></th>
                        <th class="text-center" colspan="2"><?= "Kerugian / Dampak" ?></th>
                        <th rowspan="2" class="text-center"><?= AppLabels::DATE ?></th>
                        <th rowspan="2" class="text-center"><?= "Tim Investigasi" ?></th>
                        <th class="text-center" colspan="3"><?= "Fakta di Lapangan Saat Investigasi" ?></th>
                    </tr>
                    <tr>
                        <th class="text-center"><?= AppLabels::WORK_AREA ?></th>
                        <th class="text-center"><?= AppLabels::ADDRESS ?></th>
                        <th class="text-center"><?= "Perusahaan" ?></th>
                        <th class="text-center"><?= "Individu" ?></th>
                        <th class="text-center"><?= "Penerapan K3" ?></th>
                        <th class="text-center"><?= "Unsafe Condition" ?></th>
                        <th class="text-center"><?= "Unsafe Act" ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model->workAccidentDetails as $key => $value) : ?>
                        <tr>
                            <td class="text-center"><?= ($key + 1) ?></td>
                            <td class="text-center"><?= $value->wad_date ?></td>
                            <td class="text-center"><?= $value->wad_event ?></td>
                            <td class="text-center"><?= $value->wad_type_desc ?></td>
                            <td class="text-center"><?= $value->wad_work_area ?></td>
                            <td class="text-center"><?= $value->wad_address ?></td>
                            <td class="text-center"><?= $value->wad_impact_corp ?></td>
                            <td class="text-center"><?= $value->wad_impact_indi ?></td>
                            <td class="text-center"><?= $value->wad_chronology ?></td>
                            <td class="text-center"><?= $value->wad_inv_date ?></td>
                            <td class="text-center"><?= $value->wad_inv_team ?></td>
                            <td class="text-center"><?= $value->wad_inv_k3_action ?></td>
                            <td class="text-center"><?= $value->wad_inv_uns_condition ?></td>
                            <td class="text-center"><?= $value->wad_inv_uns_action ?></td>
                            <td class="text-center"><?= $value->wad_result ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'template' => AppConstants::VIEW_BUTTON_TEMPLATE_EXCEL,
                    'buttons' => [
                        'excel' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_EXPORT, ['export', '_ppId' => $model->power_plant_id, 'id' => $model->id], ['class' => 'btn btn-white btn-purple btn-bold']),
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', '_ppId' => $model->power_plant_id, 'wat' => $wat], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', '_ppId' => $model->power_plant_id, 'wat' => $wat], ['class' => 'btn btn-white btn-danger btn-bold']),
                        'edit' => Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['update', '_ppId' => $model->power_plant_id, 'id' => $model->id, 'wat' => $wat], ['class' => 'btn btn-white btn-info btn-bold']),
                        'delete' => Html::a('<i class="ace-icon fa fa-trash-o bigger-120 orange"></i> ' . AppLabels::BTN_DELETE, ['delete', 'id' => $model->id, 'wat' => $wat], [
                            'class' => 'btn btn-white btn-warning btn-bold',
                            'data' => [
                                'confirm' => AppLabels::ALERT_CONFIRM_DELETE,
                                'method' => 'post',
                            ],
                        ]),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
