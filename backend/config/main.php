<?php

use common\vendor\AppConstants;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php'),
    require(__DIR__ . '/container.php')
);

//require_once(__DIR__ . '/ts-stuff.php');
require_once(__DIR__ . '/../../common/components/helpers/debug.php');

return [
    'id' => 'app-backend',
    'homeUrl' => AppConstants::APP_BACKEND_BASE_URL,
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module',
        ]
    ],
    'components' => [
        'request' => [
            'baseUrl' => AppConstants::APP_BACKEND_BASE_URL,
            'csrfParam' => '_backendCSRF',
            'csrfCookie' => [
                'httpOnly' => true,
                'path' => AppConstants::APP_BACKEND_BASE_URL,
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => 'PHPBACKCOOKIEIDNAGA188',
                'path' => AppConstants::APP_BACKEND_BASE_URL
            ]
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
            'baseUrl' => AppConstants::APP_BACKEND_BASE_URL,
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => array(
                    '<controller:\w+>/<id:\d+>' => '<controller>/view',
                    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ],
        'view' => [
            'theme' => [
                'basePath' => AppConstants::THEME_BASE_PATH,
                'baseUrl' => AppConstants::THEME_BASE_URL,
                'pathMap' => [
                    '@app/views' => AppConstants::THEME_VIEW_PATH,
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
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [] // remove default bootstrap.css
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js'=>[] // remove default bootstrap.js
                ],
            ],
        ],
        'session' => [
            'name' => 'PHPBACKSESSIDNAGA188',
            'savePath' => __DIR__ . '/../tmp',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager'
        ]
    ],
    'timeZone' => 'Asia/Jakarta',
    'params' => $params,
];
