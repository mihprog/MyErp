<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=myerp',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ],
        'request' => [
           // 'csrfParam' => false,
            'enableCsrfValidation'=>false,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                "profile/<userId>/rmpos/<positionId>" => "warehouse/remove",
                "profile/<userId>/setfield/<fieldName>/<fieldValue>" => "profile/set",
                "/profile/<userId>/warehouses" => "warehouse/index",
                "/profile/<userId>/<warehouseId>" => "warehouse/items",
                "/profile/<userId>" => "profile/index",
                "/about" => "site/about",
                "/contact" => "site/contact",
                "/signup" => "site/signup",
                "/login" => "site/login",
                "/logout" => "site/logout",
                "/" => "site/index"
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['user'],
        ],

    ],
    'params' => $params,
];
