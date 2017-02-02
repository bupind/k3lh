<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->title = Yii::t('app', 'Ubah {modelClass}: ', [
    'modelClass' => 'Karyawan',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Karyawan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Ubah');
?>
<div class="employee-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
