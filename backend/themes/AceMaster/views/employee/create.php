<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->title = Yii::t('app', 'Tambah Karyawan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Karyawan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
