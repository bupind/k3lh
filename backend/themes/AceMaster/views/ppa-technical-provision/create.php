<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PpaTechnicalProvision */

$this->title = 'Create Ppa Technical Provision';
$this->params['breadcrumbs'][] = ['label' => 'Ppa Technical Provisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-technical-provision-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
