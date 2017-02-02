<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $posts backend\models\Post[] */

?>

<h1><?= $this->title; ?></h1>

<div class="row">
    <?php foreach ($posts as $key => $post): ?>
        <div class="col-xs-12 col-sm-6">
            <?php if (!empty($post->featured_img)): ?>
                <?= Html::img($post->featured_img['src'], ['class' => isset($post->featured_img['class']) ? $post->featured_img['class'] : '']); ?>
            <?php endif; ?>
            <h3><?= Html::a($post->post_title, [ '/' . $post->slug]); ?></h3>
            <?= $post->post_intro; ?>
        </div>
        
        <?= ($key > 0 && $key%2 != 0) ? '<div class="clearfix"></div>' : ''; ?>
    <?php endforeach; ?>
</div>

<div class="row">
    <div class="col-xs-12">
        <?= LinkPager::widget([
            'pagination' => $pages
        ]) ?>
    </div>
</div>