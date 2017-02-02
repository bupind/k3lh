<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<?= $this->render('elements/head'); ?>
<body>
<?php $this->beginBody() ?>

<div class="container-fluid header-wrapper">
    <?= $this->render('elements/header'); ?>
    <?= $this->render('elements/top_content'); ?>
    
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <?= Alert::widget(); ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- PAGE CONTENT BEGINS -->
    <?php echo $content; ?>
    <!-- PAGE CONTENT ENDS -->
    
    <?= $this->render('elements/footer'); ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
