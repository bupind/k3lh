<?php 

    /* @var $this \yii\web\View */
    /* @var $content string */

    use yii\helpers\Html;
    use common\widgets\Alert;
    use common\vendor\AppConstants;
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
        <link rel="shortcut icon" href="<?= Yii::getAlias('@web'); ?>/favicon.png" type="image/x-icon" />
        <?= Html::csrfMetaTags() ?>

        <title><?= Html::encode($this->title) ?></title>

        <?= $this->head(); ?>    
    </head>

    <body class="no-skin">
        
        <?php $this->beginBody() ?>
        
        <div id="navbar" class="navbar navbar-default">
            <script type="text/javascript">
                try { ace.settings.check('navbar', 'fixed') } catch (e) {}
            </script>

            <div class="navbar-container" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>

                <div class="navbar-header pull-left">
                    <?= Html::a(sprintf('<small>
                            <i class="fa fa-cubes"></i>
                            %s
                        </small>', $webProfile->app_name),
                        Yii::$app->homeUrl,
                        ['class' => 'navbar-brand']
                    ); ?>
                </div>

                <?php require_once 'elements/notifications.php'; ?>
                
            </div><!-- /.navbar-container -->
        </div>
        
        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>

            <?php require_once 'elements/sidebar.php'; ?>

            <div class="main-content">
                <div class="main-content-inner">
                    
                    <?php require_once 'elements/breadcrumbs.php'; ?>

                    <div class="page-content">
                        <div class="row">
                            <div class="col-xs-12">
                                <?= Alert::widget(); ?>
                                
                                <!-- PAGE CONTENT BEGINS -->
                                <?php echo $content; ?>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->
            
            <?= $this->render('elements/footer', ['webProfile' => $webProfile]); ?>
        </div><!-- /.main-container -->
                
        <?php $this->endBody(); ?>        
    </body>
</html>
<?php $this->endPage() ?>