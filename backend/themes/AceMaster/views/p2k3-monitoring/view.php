<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use app\components\ViewButton;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\P2k3Monitoring */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->pm_form_month_type_code_desc);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_P2K3_MONITORING), 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2k3-monitoring-view">

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
                        'pm_form_month_type_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->pm_form_month_type_code_desc],
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
                        <th class="text-center"><?= AppLabels::NUMBER_SHORT ?></th>
                        <th class="text-center"><?= AppLabels::FINDING ?></th>
                        <th class="text-center"><?= "Tindak Lanjut" ?></th>
                        <th class="text-center"><?= "Deadline Penyelesaian" ?></th>
                        <th class="text-center"><?= "Status (Open/ On Progres/ Close)" ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $close = 0;
                        foreach($model->p2k3MonitoringDetails as $key => $value) : ?>
                        <tr>
                            <td class="text-center"><?= ($key+1) ?></td>
                            <td class="text-center"><?= $value->pmd_finding?></td>
                            <td class="text-center"><?= $value->pmd_action?></td>
                            <td class="text-center"><?= $value->pmd_deadline?></td>
                            <td class="text-center"><?= $value->pmd_status_desc?></td>

                            <?php if($value->pmd_status == AppConstants::P2K3M_STATUS_CLOSE){ $close++; } ?>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="2" class="text-center">
                            Progres Penyelesaian
                        </td>
                        <td colspan="3" class="text-center">
                            <?= sprintf("%s%%", $close/($key+1)*100); ?>
                        </td>
                    </tr>
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
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', '_ppId' => $model->power_plant_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', '_ppId' => $model->power_plant_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                        'edit' => Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['update', '_ppId' => $model->power_plant_id, 'id' => $model->id], ['class' => 'btn btn-white btn-info btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
