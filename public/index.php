<?php
/**
Phalcon 3.1.1 Rest 
@ Author : lemonuiu
**/
error_reporting(E_ALL);
$debug = new \Phalcon\Debug();
$debug->listen();

$dir = dirname(__DIR__);


$app = require $dir . '/app/config/loader.php';
$app = require $dir . '/app/config/services.php';



$app->handle();