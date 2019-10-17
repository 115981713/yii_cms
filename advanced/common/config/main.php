<?php
preg_match('/^([a-z\-]+)/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $matches);
$lang = $matches[1];
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => $lang,
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        
    ],
    'modules' => [
    	'api' => [
    		'class' => 'app\modules\api\Api'
    	],
    	'index' => [
    		'class' => 'app\modules\index\index'
    	]
    ]
];
