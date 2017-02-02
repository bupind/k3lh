<?php
use yii\helpers\Html;
use backend\models\Codeset;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model common\models\Member */
/* @var $supports backend\models\Support[] */

/*
 * background #370200 red
 * background #B3AB31 gold
 * text #e4d59f gold
 * text #352A00 dark brown
 */

//$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
$webProfile = Yii::$app->params['web_profile'];
$homeUrl = Yii::$app->urlManager->createAbsoluteUrl(Yii::$app->homeUrl);
$bonusUrl = Yii::$app->urlManager->createAbsoluteUrl(['/bonus']);
$depositUrl = Yii::$app->urlManager->createAbsoluteUrl(['/deposit']);
?>
<table class="table-row"
       style="table-layout: auto; padding-right: 24px; padding-left: 24px; width: 600px; background-color: #370200;"
       width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#370200">
    <tbody>
    <tr style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; height: 55px;"
        height="55px">
        <td class="table-row-td"
            style="height: 55px; padding-right: 16px; font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; vertical-align: middle;"
            valign="middle" align="left">
            <?= Html::a($webProfile->app_name, $homeUrl, [
                'style' => 'color: #e4d59f; text-decoration: none; padding: 0px; font-size: 18px; line-height: 20px; height: 50px; background-color: transparent;'
            ]); ?>
        </td>
        
        <td class="table-row-td"
            style="height: 55px; font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; text-align: right; vertical-align: middle;"
            valign="middle" align="right">
            <?= Html::a('BONUS', $bonusUrl, [
                'style' => 'color: #e4d59f; text-decoration: none; font-size: 15px; background-color: transparent;'
            ]); ?>
            &nbsp;
            <?= Html::a('DEPOSIT', $depositUrl, [
                'style' => 'color: #e4d59f; text-decoration: none; font-size: 15px; background-color: transparent;'
            ]); ?>
        </td>
    </tr>
    </tbody>
</table>

<table class="table-space" style="height: 6px; font-size: 0px; line-height: 0; width: 600px; background-color: #e4e6e9;" width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#E4E6E9" height="6"><tbody><tr><td class="table-space-td" style="height: 6px; width: 600px; background-color: #e4e6e9;" width="600" valign="middle" bgcolor="#E4E6E9" align="left" height="6">&nbsp;</td></tr></tbody></table>
<table class="table-space" style="height: 16px; font-size: 0px; line-height: 0; width: 600px; background-color: #370200;" width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" height="16"><tbody><tr><td class="table-space-td" style="height: 16px; width: 600px; background-color: #370200;" width="600" valign="middle" bgcolor="#FFFFFF" align="left" height="16">&nbsp;</td></tr></tbody></table>

<table class="table-row" style="table-layout: fixed; background-color: #370200;" width="600" cellspacing="0"
       cellpadding="0" border="0" bgcolor="#370200">
    <tbody>
    <tr>
        <td class="table-row-td"
            style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 24px; padding-right: 24px;"
            valign="top" align="left">
            <table class="table-col" style="table-layout: fixed;" width="552" cellspacing="0" cellpadding="0" border="0"
                   align="left">
                <tbody>
                <tr>
                    <td class="table-col-td"
                        style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;"
                        width="390" valign="top" align="left">
                        <div style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; text-align: center;">
                            <?= Html::img('http://naga188.com/themes/GoldenDragon/img/logo.png', [
                                'style' => 'border: 0px none #444444; vertical-align: middle; display: block; padding-bottom: 9px; margin: 0 auto;',
                                'vspace' => 0,
                                'border' => 0,
                                'hspace' => 0
                            ]); ?>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>

<table class="table-space" style="height: 16px; font-size: 0px; line-height: 0; width: 600px; background-color: #370200;" width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" height="16"><tbody><tr><td class="table-space-td" style="height: 16px; width: 600px; background-color: #370200;" width="600" valign="middle" bgcolor="#FFFFFF" align="left" height="16">&nbsp;</td></tr></tbody></table>

<table class="table-row" style="table-layout: fixed; background-color: #B3AB31;" width="600" cellspacing="0"
       cellpadding="0" border="0" bgcolor="#B3AB31">
    <tbody>
    <tr>
        <td class="table-row-td"
            style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;"
            valign="top" align="left">
            <table class="table-col" style="table-layout: fixed;" width="528" cellspacing="0" cellpadding="0" border="0"
                   align="left">
                <tbody>
                <tr>
                    <td class="table-col-td"
                        style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;"
                        width="528" valign="top" align="left">
                        <table class="header-row" style="table-layout: fixed;" width="528" cellspacing="0"
                               cellpadding="0" border="0">
                            <tbody>
                            <tr>
                                <td class="header-row-td"
                                    style="font-size: 28px; margin: 0px; font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #352A00; padding-bottom: 10px; padding-top: 15px;"
                                    width="528" valign="top" align="left">Halo Boss <?= strtoupper($model->member_account_name); ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="header-row" style="table-layout: fixed;" width="528" cellspacing="0"
                               cellpadding="0" border="0">
                            <tbody>
                            <tr>
                                <td class="header-row-td"
                                    style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #352A00; margin: 0px; font-size: 18px; padding-bottom: 8px; padding-top: 10px;"
                                    width="528" valign="top" align="left">
                                    Selamat Datang di <?= $webProfile->app_name; ?>.<br />
                                    Terima kasih Anda telah bergabung bersama kami.
                                </td>
                            </tr>
                            <tr>
                                <td class="header-row-td"
                                    style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #352A00; margin: 0px; font-size: 18px; padding-bottom: 8px; padding-top: 10px;"
                                    width="528" valign="top" align="left">
                                    <span style="font-family: Arial, sans-serif; line-height: 19px; color: #352A00; font-size: 14px;">
                                        Silahkan perika ulang data Anda dibawah ini dan pastikan bahwa data tersebut sudah benar:
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>

<table class="table-space" style="height: 24px; font-size: 0px; line-height: 0; width: 600px; background-color: #B3AB31;" width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#B3AB31" height="24"><tbody><tr><td class="table-space-td" style="height: 24px; width: 600px; padding-left: 18px; padding-right: 18px; background-color: #B3AB31;" width="600" valign="middle" bgcolor="#B3AB31" align="center" height="24">&nbsp;<table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#C9C05C" height="0"><tbody><tr><td style="height: 1px; font-size:0;" width="100%" valign="top" bgcolor="#C9C05C" align="left" height="1">&nbsp;</td></tr></tbody></table></td></tr></tbody></table>

<div style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px;">
    <table class="table-row"
           style="table-layout: auto; padding-right: 24px; padding-left: 24px; width: 600px; background-color: #B3AB31;"
           width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#B3AB31">
        <tbody>
                
        <tr style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px;">
            <td class="table-row-td"
                style="padding-right: 16px; padding-bottom: 12px; font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;"
                valign="top" align="left" width="35%">
                <span style="font-family: Arial, sans-serif; line-height: 19px; color: #ffffff; font-size: 13px; font-weight: bold;">
                    <?= $model->getAttributeLabel('member_account_name') ?>
                </span>
            </td>
            <td class="table-row-td"
                style="padding-bottom: 12px; font-family: Arial, sans-serif; line-height: 19px; color: #ffffff; font-size: 13px; font-weight: normal;"
                valign="top" align="left">
                : <?= $model->member_account_name; ?>
            </td>
        </tr>
        <tr style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px;">
            <td class="table-row-td"
                style="padding-right: 16px; padding-bottom: 12px; font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;"
                valign="top" align="left" width="35%">
                <span style="font-family: Arial, sans-serif; line-height: 19px; color: #ffffff; font-size: 13px; font-weight: bold;">
                    <?= $model->getAttributeLabel('member_account_no') ?>
                </span>
            </td>
            <td class="table-row-td"
                style="padding-bottom: 12px; font-family: Arial, sans-serif; line-height: 19px; color: #ffffff; font-size: 13px; font-weight: normal;"
                valign="top" align="left">
                : <?= $model->member_account_no; ?>
            </td>
        </tr>
        <tr style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px;">
            <td class="table-row-td"
                style="padding-right: 16px; padding-bottom: 12px; font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;"
                valign="top" align="left" width="35%">
                <span style="font-family: Arial, sans-serif; line-height: 19px; color: #ffffff; font-size: 13px; font-weight: bold;">
                    <?= $model->getAttributeLabel('bank_id') ?>
                </span>
            </td>
            <td class="table-row-td"
                style="padding-bottom: 12px; font-family: Arial, sans-serif; line-height: 19px; color: #ffffff; font-size: 13px; font-weight: normal;"
                valign="top" align="left">
                : <?= $model->bank->bank_name; ?>
            </td>
        </tr>
        <tr style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px;">
            <td class="table-row-td"
                style="padding-right: 16px; padding-bottom: 12px; font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;"
                valign="top" align="left" width="35%">
                <span style="font-family: Arial, sans-serif; line-height: 19px; color: #ffffff; font-size: 13px; font-weight: bold;">
                    <?= $model->getAttributeLabel('game_id') ?>
                </span>
            </td>
            <td class="table-row-td"
                style="padding-bottom: 12px; font-family: Arial, sans-serif; line-height: 19px; color: #ffffff; font-size: 13px; font-weight: normal;"
                valign="top" align="left">
                : <?= $model->game->game_name; ?>
            </td>
        </tr>
        <tr style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px;">
            <td class="table-row-td"
                style="padding-right: 16px; padding-bottom: 12px; font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;"
                valign="top" align="left" width="35%">
                <span style="font-family: Arial, sans-serif; line-height: 19px; color: #ffffff; font-size: 13px; font-weight: bold;">
                    <?= $model->getAttributeLabel('member_phone') ?>
                </span>
            </td>
            <td class="table-row-td"
                style="padding-bottom: 12px; font-family: Arial, sans-serif; line-height: 19px; color: #ffffff; font-size: 13px; font-weight: normal;"
                valign="top" align="left">
                : <?= $model->member_phone; ?>
            </td>
        </tr>
        <tr style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px;">
            <td class="table-row-td"
                style="padding-right: 16px; padding-bottom: 12px; font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;"
                valign="top" align="left" width="35%">
                <span style="font-family: Arial, sans-serif; line-height: 19px; color: #ffffff; font-size: 13px; font-weight: bold;">
                    <?= $model->getAttributeLabel('member_email') ?>
                </span>
            </td>
            <td class="table-row-td"
                style="padding-bottom: 12px; font-family: Arial, sans-serif; line-height: 19px; color: #ffffff; font-size: 13px; font-weight: normal;"
                valign="top" align="left">
                : <?= $model->member_email; ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<table class="table-space" style="height: 24px; font-size: 0px; line-height: 0; width: 600px; background-color: #B3AB31;" width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#B3AB31" height="24"><tbody><tr><td class="table-space-td" style="height: 24px; width: 600px; padding-left: 18px; padding-right: 18px; background-color: #B3AB31;" width="600" valign="middle" bgcolor="#B3AB31" align="center" height="24">&nbsp;<table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#C9C05C" height="0"><tbody><tr><td style="height: 1px; font-size:0;" width="100%" valign="top" bgcolor="#C9C05C" align="left" height="1">&nbsp;</td></tr></tbody></table></td></tr></tbody></table>

<table class="table-row" style="table-layout: fixed; background-color: #B3AB31;" width="600" cellspacing="0"
       cellpadding="0" border="0" bgcolor="#B3AB31">
    <tbody>
    <tr>
        <td class="table-row-td"
            style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;"
            valign="top" align="left">
            <table class="table-col" style="table-layout: fixed;" width="528" cellspacing="0" cellpadding="0" border="0"
                   align="left">
                <tbody>
                <tr>
                    <td class="table-col-td"
                        style="font-family: Arial, sans-serif; line-height: 19px; color: #352A00; font-size: 13px; font-weight: normal;"
                        width="528" valign="top" align="left">
                        <p style="font-family: Arial, sans-serif; line-height: 19px; color: #352A00; font-size: 14px; text-align: justify;">
                            Customer Service kami akan segera mengirimkan Username permainan ke email anda. Apabila dalam 60 menit Anda belum menerima balasan email, harap segera menghubungi Customer Service <?= $webProfile->app_name; ?>.<br /><br />
                            No. Rekening Bank <?= $webProfile->app_name; ?> akan diberikan oleh Customer Service.<br /><br />
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>

<table class="table-row" style="table-layout: fixed; background-color: #370200;" width="600" cellspacing="0"
       cellpadding="0" border="0" bgcolor="#370200">
    <tbody>
    <tr>
        <td class="table-row-td"
            style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;"
            valign="top" align="left">
            <table class="table-col" style="table-layout: fixed;" width="255" cellspacing="0" cellpadding="0" border="0"
                   align="left">
                <tbody>
                <tr>
                    <td class="table-col-td"
                        style="font-family: Arial, sans-serif; line-height: 19px; color: #B3AB31; font-size: 13px; font-weight: normal;"
                        width="255" valign="top" align="left">
                        <table class="header-row" style="table-layout: fixed;" width="255" cellspacing="0"
                               cellpadding="0" border="0">
                            <tbody>
                            <tr>
                                <td class="header-row-td"
                                    style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #e4d59f; margin: 0px; font-size: 18px; padding-bottom: 8px; padding-top: 10px;"
                                    width="255" valign="top" align="left">
                                    HUBUNGI KAMI
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        Livechat: <?= Html::a(Html::decode($homeUrl), $homeUrl, ['style' => 'color: #ffffff; text-decoration: none;']); ?><br />
                        
                        <?php foreach ($supports as $support): ?>
                            <?= sprintf('%s: %s <br />', Codeset::getCodesetValue(AppConstants::CODESET_NAME_SUPPORT_TYPE_CODE, $support->supp_type_code), $support->supp_value); ?>
                        <?php endforeach; ?>
                        
                    </td>
                    <td class="table-col-td"
                        style="font-family: Arial, sans-serif; line-height: 19px; color: #B3AB31; font-size: 13px; font-weight: normal;"
                        width="255" valign="bottom" align="right">
    
                        <?= Html::img('http://naga188.com/themes/GoldenDragon/img/logo-small.png', [
                            'style' => 'border: 0px none #444444; vertical-align: middle; display: block; padding-bottom: 9px;',
                            'vspace' => 0,
                            'border' => 0,
                            'hspace' => 0
                        ]); ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>

<table class="table-space" style="height: 16px; font-size: 0px; line-height: 0; width: 600px; background-color: #370200;" width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" height="16"><tbody><tr><td class="table-space-td" style="height: 16px; width: 600px; background-color: #370200;" width="600" valign="middle" bgcolor="#FFFFFF" align="left" height="16">&nbsp;</td></tr></tbody></table>
<table class="table-space" style="height: 8px; font-size: 0px; line-height: 0; width: 600px; background-color: #e4e6e9;" width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#E4E6E9" height="8"><tbody><tr><td class="table-space-td" style="height: 8px; width: 600px; background-color: #e4e6e9;" width="600" valign="middle" bgcolor="#E4E6E9" align="left" height="8">&nbsp;</td></tr></tbody></table>