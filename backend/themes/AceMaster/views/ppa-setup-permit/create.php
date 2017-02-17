<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PpaSetupPermit */

$this->title = 'Create Ppa Setup Permit';
$this->params['breadcrumbs'][] = ['label' => 'Ppa Setup Permits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-setup-permit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
