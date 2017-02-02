<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="initial-scale=1.0"/>
    <title><?= Html::encode($this->title) ?></title>
    
    <style type="text/css">
        body {
            width: 100%;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }
        
        @media only screen and (max-width: 600px) {
            table[class="table-row"] {
                float: none !important;
                width: 98% !important;
                padding-left: 20px !important;
                padding-right: 20px !important;
            }
            
            table[class="table-row-fixed"] {
                float: none !important;
                width: 98% !important;
            }
            
            table[class="table-col"], table[class="table-col-border"] {
                float: none !important;
                width: 100% !important;
                padding-left: 0 !important;
                padding-right: 0 !important;
                table-layout: fixed;
            }
            
            td[class="table-col-td"] {
                width: 100% !important;
            }
            
            table[class="table-col-border"] + table[class="table-col-border"] {
                padding-top: 12px;
                margin-top: 12px;
                border-top: 1px solid #E8E8E8;
            }
            
            table[class="table-col"] + table[class="table-col"] {
                margin-top: 15px;
            }
            
            td[class="table-row-td"] {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }
            
            table[class="navbar-row"], td[class="navbar-row-td"] {
                width: 100% !important;
            }
            
            img {
                max-width: 100% !important;
                display: inline !important;
            }
            
            img[class="pull-right"] {
                float: right;
                margin-left: 11px;
                max-width: 125px !important;
                padding-bottom: 0 !important;
            }
            
            img[class="pull-left"] {
                float: left;
                margin-right: 11px;
                max-width: 125px !important;
                padding-bottom: 0 !important;
            }
            
            table[class="table-space"], table[class="header-row"] {
                float: none !important;
                width: 98% !important;
            }
            
            td[class="header-row-td"] {
                width: 100% !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            table[class="table-row"] {
                padding-left: 16px !important;
                padding-right: 16px !important;
            }
        }
        
        @media only screen and (max-width: 320px) {
            table[class="table-row"] {
                padding-left: 12px !important;
                padding-right: 12px !important;
            }
        }
        
        @media only screen and (max-width: 608px) {
            td[class="table-td-wrap"] {
                width: 100% !important;
            }
        }
    </style>
    
    <?php $this->head() ?>
</head>
<body style="font-family: Arial, sans-serif; font-size:13px; color: #444444; min-height: 200px;" bgcolor="#E4E6E9"
      leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table width="100%" height="100%" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td width="100%" align="center" valign="top" bgcolor="#E4E6E9"
            style="background-color:#E4E6E9; min-height: 200px;">
            <table>
                <tr>
                    <td class="table-td-wrap" align="center" width="608">
                        <?php $this->beginBody() ?>
                        <?= $content ?>
                        <?php $this->endBody() ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
<?php $this->endPage() ?>
