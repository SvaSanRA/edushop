<?php

return [
    'root_dir' => $_SERVER['DOCUMENT_ROOT'] . "/../",
    'controller_namespaces' => '\app\controllers\\',
    'components' => [
        'db' => [
            'class' => \app\services\Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'admin',
            'password' => '123',
            'database' => 'edushop',
            'charset' => 'UTF8'
        ],
        'mainController' => [
            'class' => \app\controllers\FrontController::class
        ],
        'auth' => [
            'class' => \app\services\Auth::class
        ],
        'request' => [
            'class' => \app\services\Request::class
        ]
    ]
];