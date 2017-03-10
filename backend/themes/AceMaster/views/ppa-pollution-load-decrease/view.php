<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaPollutionLoadDecrease */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::POLLUTION_LOAD_DECREASE);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::PPA, $model->ppa->getSummary()), 'url' => ['/ppa/update', 'id' => $model->ppa->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::POLLUTION_LOAD_DECREASE, 'url' => ['index', 'ppaId' => $model->ppa->id]];
$this->params['subtitle'] = $model->ppapld_activity;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-pollution-load-decrease-view">

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

    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h3 class="header smaller lighter green"><?= AppLabels::POLLUTION_LOAD_DECREASE; ?></h3>
            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'excluded' => ['ppa_id'],
                    'extraAttributes' => ['attachment' => $model->attachment],
                ]
            ]); ?>
        </div>
        <div class="col-xs-12 col-md-6">
            <h3 class="header smaller lighter green"><?= AppLabels::YEAR; ?></h3>
            <?php foreach ($model->ppaPollutionLoadDecreaseYears as $pollutionLoadDecreaseYear): ?>
                <div class="col-xs-12 col-sm-3 text-right">
                    <label><strong><?= $pollutionLoadDecreaseYear->ppapldy_year; ?></strong></label>
                    <p><?= $pollutionLoadDecreaseYear->ppapldy_value; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'buttons' => [
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', 'ppaId' => $model->ppa_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', 'ppaId' => $model->ppa_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
