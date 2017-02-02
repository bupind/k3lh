<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use backend\models\Bank;
use backend\models\Game;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $posts backend\models\Post[] */

$webProfile = Yii::$app->params['web_profile'];
$this->title = sprintf('Bonus - %s', $webProfile->title_tag);
?>

<h1>Bonus</h1>

<div class="row">
    <?php foreach ($posts as $key => $post): ?>
        <div class="col-xs-12 col-sm-6">
            <h3><?= Html::a($post->post_title, [ '/' . $post->slug]); ?></h3>
            <?php if (!empty($post->featured_img)): ?>
                <?= Html::img($post->featured_img['src'], ['class' => isset($post->featured_img['class']) ? $post->featured_img['class'] : '']); ?>
            <?php endif; ?>
        </div>
        <?= ($key > 0 && $key%2 != 0) ? '<div class="clearfix"></div>' : ''; ?>
    <?php endforeach; ?>
</div>
