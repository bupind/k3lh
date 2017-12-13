<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use app\components\ViewButton;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\WorkAccidentDetail */
/* @var $wat string */
/* @var $title string */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->wad_type_desc);
$this->params['breadcrumbs'][] = ['label' => sprintf("Detail %s", $title), 'url' => ['index', '_ppId' => $model->workAccident->power_plant_id, 'waId' => $model->work_accident_id, 'wat' => $wat]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-accident-detail-view">

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
                        'wad_type' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->wad_type_desc],
                    ],
                ]
            ]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'buttons' => [
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', '_ppId' => $model->workAccident->power_plant_id, 'waId' => $model->work_accident_id, 'wat' => $wat], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', '_ppId' => $model->workAccident->power_plant_id, 'waId' => $model->work_accident_id, 'wat' => $wat], ['class' => 'btn btn-white btn-danger btn-bold']),
                        'edit' => Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['update', '_ppId' => $model->workAccident->power_plant_id, 'id' => $model->id, 'waId' => $model->work_accident_id, 'wat' => $wat], ['class' => 'btn btn-white btn-info btn-bold']),
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
