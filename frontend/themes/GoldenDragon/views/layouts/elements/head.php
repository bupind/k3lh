<?php
use yii\helpers\Html;
?>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= Yii::getAlias('@web'); ?>/favicon.ico" type="image/x-icon"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title); ?></title>
    <?php $this->head() ?>
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
</head>