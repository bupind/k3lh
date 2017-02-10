<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EnvironmentPermit */

$this->title = 'Create Environment Permit';
$this->params['breadcrumbs'][] = ['label' => 'Environment Permits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="environment-permit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
