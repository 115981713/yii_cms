<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'zh-CN',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        //语言包配置
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    // 'basePath' => '/messages',
                    'fileMap' => [
                        'common' => 'common.php',
                    ],
                ]
            ]
        ],
    ],
];
