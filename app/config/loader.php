<?php
/**
Phalcon 3.1.1 Rest 
@ Author : lemonuiu
**/

$loader = new \Phalcon\Loader();

/*-- We're a registering a set of directories taken from the config file --*/
	$loader->registerDirs(
		[
			$config->application->controllersDir,
		    $config->application->modelsDir,
		    $config->application->viewsDir,
		]
	)->register();
