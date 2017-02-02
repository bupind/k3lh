<?php

use common\vendor\AppConstants;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

require_once(__DIR__ . '/../../common/components/helpers/debug.php');

return [
    'id' => 'app-frontend',
    'homeUrl' => AppConstants::APP_FRONTEND_BASE_URL,
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'baseUrl' => AppConstants::APP_FRONTEND_BASE_URL,
            'csrfParam' => '_backendCSRF',
            'csrfCookie' => [
                'httpOnly' => true,
                'path' => AppConstants::APP_FRONTEND_BASE_URL,
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'baseUrl' => AppConstants::APP_FRONTEND_BASE_URL,
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'rules' => [
                '/' => 'site/index',
                'bonus' => 'site/bonus',
                'produk' => 'site/produk',
                'togel' => 'site/togel',
                'jadwal-pertandingan-bola' => 'site/big-match-schedule',
                'panduan' => 'site/panduan',
                'berita' => 'site/berita',
                'deposit' => 'deposit/index',
                'member' => 'member/index',
                'penarikan' => 'withdrawal/index',
                'transfer-game' => 'transfer-game/index',
                '<slug>' => 'site/post',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<ACTION:\w+>/<id:\d+>' => '<controller>/<ACTION>',
                '<controller:\w+>/<ACTION:\w+>' => '<controller>/<ACTION>',
            ]
        ],
        'view' => [
            'theme' => [
                'basePath' => AppConstants::FRONTEND_THEME_BASE_PATH,
                'baseUrl' => AppConstants::FRONTEND_THEME_BASE_URL,
                'pathMap' => [
                    '@app/views' => AppConstants::FRONTEND_THEME_VIEW_PATH,
                ]
            ]
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'locale' => 'id_ID',
            'defaultTimeZone' => 'Asia/Jakarta',
            'dateFormat' => 'dd-MM-yyyy',
            'timeFormat' => 'php:H:i:s',
            'currencyCode' => 'IDR',
            'numberFormatterOptions' => [
                NumberFormatter::MIN_FRACTION_DIGITS => 2,
                NumberFormatter::MAX_FRACTION_DIGITS => 2
            ],
//            'decimalSeparator' => ',',
//            'thousandSeparator' => '.',
            'nullDisplay' => '-'
        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => [YII_ENV_DEV ? 'jquery.js' : 'jquery.min.js']
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [] // remove default bootstrap.css
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js'=>[] // remove default bootstrap.js
                ],
            ],
        ],
    ],
    'timeZone' => 'Asia/Jakarta',
    'params' => $params,
];
