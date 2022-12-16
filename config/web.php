<?php

use yii\helpers\Html;

$params = require __DIR__ . '/params.php';
if (file_exists(__DIR__ . '/params_local.php')) {
    $paramsLocal = require __DIR__ . '/params_local.php';
    $params = array_merge($params, $paramsLocal);
}

$config = [
    'id' => 'Anjab ABK Evjab',
    'name' => 'Anjab ABK Evjab',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'timeZone' => 'Asia/Jakarta',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'container' => [
        'definitions' => [
            yii\grid\ActionColumn::class => [
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="fa fa-eye"></span>', $url, [
                            'data-toggle'=>'tooltip',
                            'title' => 'Lihat',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="fa fa-pencil-alt"></span>', $url, [
                            'data-toggle'=>'tooltip',
                            'title' => 'Ubah',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="fa fa-trash"></span>', $url, [
                            'data-method' => 'post',
                            'data-confirm'=>'Yakin akan menghapus data?',
                            'data-toggle'=>'tooltip',
                            'title' => 'Hapus',
                        ]);
                    }
                ]
            ],
            \yii\widgets\LinkPager::class => \yii\bootstrap4\LinkPager::class,
            'yii\bootstrap4\LinkPager' => [
                'firstPageLabel' => 'Awal',
                'lastPageLabel'  => 'Akhir'
            ]
        ],
    ],
    'components' => [
        'view' => [
            'theme' => [
                'pathMap' => [
                   '@app/views' => '@app/themes/adminlte3/views'
                ],
            ],
        ],
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => '6LcsmysUAAAAAA-no9ZigXCqF-769IlTYdjCDkBr',
            'secret' => '6LcsmysUAAAAANifDc5tKASe4WJEyp75zGYrrYtb',
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'thousandSeparator' => '.',
            'decimalSeparator' => ',',
            'currencyCode' => 'Rp'
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Kt9LqQUDkRoWtXO2o-FeWUkPGYIMcw6-',
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
                'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => 'smtp.gmail.com',
                    'username' => 'dadananonim@gmail.com',
                    'password' => 'loremipsum123',
                    'port' => '587',
                    'encryption' => 'tls',
                ],
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
        'db' => require __DIR__ . '/db.php',
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],
        'bekasikab' => [
            'class' => 'app\modules\bekasikab\Module',
        ],
        'sop' => [
            'class' => 'app\modules\sop\Module',
        ],
        'api' => [
            'class' => 'app\modules\api\Module',
        ],
        'template' => [
            'class' => 'app\modules\template\Module',
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
        'allowedIPs' => ['127.0.0.1', '::1','125.165.63.54'],
    ];


    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
            'crud' => [
                'class' => 'yii\gii\generators\crud\Generator',
                'templates' => [
                    'Adminlte' => '@app/themes/adminlte/gii/crud',
                    'Adminlte 3' => '@app/themes/adminlte3/gii/crud',
                ]
            ],
        ],
    ];
    $config['modules']['utility'] = [
        'class' => 'c006\utility\migration\Module',
    ];
}

return $config;
