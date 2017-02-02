<?php 
    use yii\helpers\Html;
    use common\widgets\Alert;
    use backend\assets\AppAsset;
    use backend\assets\IEAsset;
    
    AppAsset::register($this);
    IEAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?= Yii::getAlias('@web'); ?>/favicon.png" type="image/x-icon" />
        <?= Html::csrfMetaTags() ?>

        <title><?= Html::encode($this->title) ?></title>

        <?= $this->head(); ?>    
		<!-- </head> -->
    </head>
    
    <body class="login-layout">
        
        <?php $this->beginBody() ?>
        
        <div class="main-container">
            <div class="main-content">
                <?= Alert::widget() ?>
                <!-- Include content pages -->
                <?php echo $content; ?>
            </div>
        </div>        
        
        <?php $this->endBody(); ?>
        
		<!-- </body></html> -->
    </body>
</html>
<?php $this->endPage() ?>