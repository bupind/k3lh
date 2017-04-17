<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\Plb3BalanceSheetDetail */
/* @var $plb3bs_model backend\models\Plb3BalanceSheet */
/* @var $bst string */
/* @var $startDate DateTime */
/* @var $plb3bsdMonth backend\models\Plb3bsdMonth[] */
/* @var $plb3BalanceSheetTreatment backend\models\Plb3BalanceSheetTreatment[] */

$this->title = sprintf('%s %s %s', AppLabels::BTN_ADD, AppLabels::BALANCE_SHEET, $title);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::BALANCE_SHEET, $title), 'url' => ['index', 'plb3bsId' => $plb3bs_model->id, 'bst' => $bst]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plb3-balance-sheet-detail-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'startDate' => $startDate,
        'plb3bs_model' => $plb3bs_model,
        'bst' => $bst,
        'plb3bsdMonth' => $plb3bsdMonth,
        'plb3BalanceSheetTreatment' => $plb3BalanceSheetTreatment,
    ]) ?>

</div>
