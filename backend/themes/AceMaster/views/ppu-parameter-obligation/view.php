<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuParameterObligation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ppu Parameter Obligations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-parameter-obligation-view">

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

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ppu_emission_source_id',
            'ppupo_parameter_code',
            'ppupo_parameter_unit_code',
            'ppupo_qs',
            'ppupo_qs_unit_code',
            'ppupo_qs_ref',
            'ppupo_qs_max_pollution_load',
            'ppupo_qs_load_unit_code',
            'ppupo_qs_max_pollution_load_ref',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
        ],
    ]) ?>

</div>
