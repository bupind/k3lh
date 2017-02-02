<?php use yii\widgets\Breadcrumbs; ?>

<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
    </script>

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
</div>