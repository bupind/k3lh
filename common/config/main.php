<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules' => [
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => '@frontend/web/upload75u49I1M',
            'uploadUrl' => '@frontend_web/upload75u49I1M',
            'imageAllowExtensions'=>['jpeg','jpg','png']
        ]
    ],
];
