<?php 

    /* @var $this \yii\web\View */
    /* @var $content string */

    use yii\helpers\Html;
    use common\widgets\Alert;
    use backend\assets\AppAsset;
    use backend\assets\IEAsset;
    
    AppAsset::register($this);
    IEAsset::register($this);

    $webProfile = Yii::$app->params['web_profile'];    
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>

        <title><?= Html::encode($this->title) ?></title>

        <?= $this->head(); ?>    
    </head>

    <body class="no-skin">
        
        <?php $this->beginBody() ?>
        
        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="page-content">
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <?= Alert::widget(); ?>
                                
                                <!-- PAGE CONTENT BEGINS -->
                                <?php echo $content; ?>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->
            
            <?php require_once('elements/footer.php') ?>
        </div><!-- /.main-container -->
                
        <?php $this->endBody(); ?>        
    </body>
</html>
<?php $this->endPage() ?>