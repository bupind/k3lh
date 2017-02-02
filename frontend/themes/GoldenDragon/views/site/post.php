<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use backend\models\Bank;
use backend\models\Game;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $post backend\models\Post */

$this->title = $post->post_title;
?>

<h1><?= $post->post_title; ?></h1>

<div class="margin-bottom-40">
    <?php
        if (!empty($post->post_intro)) {
            echo $post->post_intro;
        }
    
        echo $post->post_content;
    ?>
</div>

<div class="text-center">
    <?= Html::a('Kembali', Yii::$app->request->referrer, ['class' => 'btn-me btn-me-primary']); ?>
</div>
