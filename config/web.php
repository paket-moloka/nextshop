<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
define('TEMP_PRODUCT_ID', 3776);
define('CAT_IDS', [
    13,61,62,63,64,94,95,97,
    106,121,148,157,256,150,
    125,164,165,166,167,168,
    169,170,171,172,173,174,
    175,176,241,17,39,40,41,
    42,43,44,45,46,47,263,96,
    147,154,253,18,30,31,32,33,
    34,35,36,37,38,115,155,239]);
$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru',
    'sourceLanguage' => 'ru',
    'aliases' => [
        '@data' => '@vendor',
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'sphinx' => [
            'class' => 'yii\sphinx\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=nexshop',
            'username' => 'root',
            'password' => '',
        ],
        'request' => [
            'baseUrl' => '',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => md5(time()."uJHYe12elLdk2@$)(".date('d_-m_Y')),
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
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

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/auth' => '/site/login',
                '/register' => '/site/register',
                '/logout' => '/site/logout',
                '/createOrder' => '/site/create-order',
                '/users' => '/users/main/index',
                '/getCartProducts' => '/site/get-cart-products',
                '/addToCart' => '/site/add-to-cart',
                '/checkout' => '/site/checkout',
                '/search' => '/site/search',
                '/hots' => '/site/hots',
                '/contact' => '/site/contact',
                '/products/<id:>/' => '/site/products',
                '/products/' => '/site/products',
                '/product/<id:>/' => '/site/product',
                '/filters/<cat_id:>' => '/site/filters',
                '/productsFilter' => '/site/filter-products',
                '/pay' => '/site/pay',
                '/delivery' => '/site/delivery',
                '/guarantee' => '/site/guarantee',
                '/cooperation' => '/site/cooperation',
                '/service' => '/site/service',
                '/purchase/returns' => '/site/purchase-returns',
            ],
        ],
    ],
    'modules' => [
        'shop' => [
            'class' => 'app\modules\shop\Module',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
}

return $config;
