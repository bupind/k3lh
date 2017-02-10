<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Smk3 */

$this->title = 'Create Smk3';
$this->params['breadcrumbs'][] = ['label' => 'Smk3s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="smk3-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
