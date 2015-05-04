<?php
use yii\helpers\ArrayHelper;

$params = ArrayHelper::merge(
    require(__DIR__.'/params.php'),
    require(__DIR__.'/params-local.php')
);

return [
    'basePath' => dirname(__DIR__),
    'name' => 'UserDB',
    'language' => 'ru',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<_c:[\w\-]+>/<id:\d+>' => '<_c>/view',
                '<_c:[\w\-]+>' => '<_c>/index',
                '<_c:[\w\-]+>/<_a:[\w\-]+>/<id:\d+>' => '<_c>/<_a>',
            ],
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'fileMap' => [
                        'menu' => 'menu.php' //main menu (bootstrap)
                    ],
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'cache' => [
            'class' => 'yii\caching\DummyCache',
        ],
        'log' => [
            'class' => 'yii\log\Dispatcher',
        ],
    ],
    'params' => $params,
];
