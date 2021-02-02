<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
	'name' => 'Casa Paellas - Pedidos',
	'language' => 'pt-BR',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
	     'formatter' => [
			//'locale' => 'cs_CZ',
			// Only effective when the "PHP intl extension" is installed else "language" above is used:
			// https://www.php.net/manual/en/book.intl.php

			//'language' => 'cs-CZ',
			// If not set, "locale" above will be used:
			// https://www.yiiframework.com/doc/api/2.0/yii-i18n-formatter#$language-detail

			// Following values might be usefull for your situation:
			'booleanFormat' => ['Não', 'Sim'],
			'dateFormat' => 'dd-mm-yyyy', // or 'php:Y-m-d'
			'datetimeFormat' => 'dd-mm-yyyy HH:mm:ss', // or 'php:Y-m-d H:i:s'
			'decimalSeparator' => ',',
			'defaultTimeZone' => 'America/Salvador',
			'thousandSeparator' => '.',
			'timeFormat' => 'php:H:i:s', //  or HH:mm:ss
			'currencyCode' => 'R$',
		   ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'bITsgfpCNmpL4zSYqavTFofFXofkHiz0',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
		/*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
		 ],
		 */

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*'],
    ];
}

return $config;
