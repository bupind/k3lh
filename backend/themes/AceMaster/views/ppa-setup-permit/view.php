<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaSetupPermit */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ppa Setup Permits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-setup-permit-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'ppa_id',
            'ppasp_wastewater_source',
            'ppasp_setup_point_name',
            'ppasp_coord_ls',
            'ppasp_coord_bt',
            'ppasp_wastewater_tech_code',
            'ppasp_permit_number',
            'ppasp_permit_publisher',
            'ppasp_permit_publish_date',
            'ppasp_permit_end_date',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
        ],
    ]) ?>

</div>
