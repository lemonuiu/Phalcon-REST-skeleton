<?php
/**
Phalcon 3.1.1 Rest 
@ Author : lemonuiu
**/
return new \Phalcon\Config([

    'database' => [
        'adapter'    => 'Mysql',
        'host'       => 'localhost',
        'username'   => 'YOUR_USER_NAME',
        'password'   => 'YOUR_PASSWORD',
        'dbname'     => 'YOUR_DB_NAME',
        'charset'    => 'utf8',
    ],

    'application' => [
        'controllersDir' => $dir . '/app/controllers/',
        'modelsDir'      => $dir . '/app/models/',
        'viewsDir'       => $dir . '/app/views/',

        'baseUri'        => '/',
    ]
]);