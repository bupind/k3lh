<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Smk3 */

$this->title = 'Update Smk3: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Smk3s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="smk3-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
