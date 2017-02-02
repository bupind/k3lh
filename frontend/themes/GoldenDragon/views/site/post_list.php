<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use backend\models\Bank;
use backend\models\Game;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $posts backend\models\Post[] */

?>

<h1><?= $this->title; ?></h1>

<ul class="list">
    <?php foreach ($posts as $post): ?>
        <li><?= Html::a($post->post_title, ['/' . $post->slug], ['target' => '_blank']); ?></li>
    <?php endforeach; ?>
</ul>