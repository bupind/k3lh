<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Plb3BalanceSheet */


$this->title = 'Create Plb3 Balance Sheet';
$this->params['breadcrumbs'][] = ['label' => 'Plb3 Balance Sheets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plb3-balance-sheet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
