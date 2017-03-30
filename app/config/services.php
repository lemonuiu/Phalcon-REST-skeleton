<?php
/**
Phalcon 3.1.1 Rest 
@ Author : lemonuiu
**/

$di = new \Phalcon\Di\FactoryDefault();

$config = require $dir . '/app/config/config.php';

$di->setShared('config', $config);

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function () use ($config) {
    $dbConfig = $config->database->toArray();
    $adapter = $dbConfig['adapter'];
    unset($dbConfig['adapter']);

    $class = 'Phalcon\Db\Adapter\Pdo\\' . $adapter;

    return new $class($dbConfig);
});

/**
 * Loader connection is created based in the parameters defined in the Loader.php file
 */
$loader = require $dir . '/app/config/loader.php';

$di->setShared('loader', $loader);


/*--- Setting up the view component  ---*/
        $di->setShared('view', function () {
            $config = $this->getConfig();

            $view = new View();
            $view->setDI($this);
            $view->setViewsDir($config->application->viewsDir);

            $view->registerEngines([
                '.volt' => function ($view) {
                    $config = $this->getConfig();

                    $volt = new VoltEngine($view, $this);

                    $volt->setOptions([
                        'compiledPath' => $config->application->cacheDir,
                        'compiledSeparator' => '_'
                    ]);

                    return $volt;
                },
                '.phtml' => PhpEngine::class

            ]);

            return $view;
        });



/**
 * Starting the application
 * Assign service locator to the application
 */
$app = new \Phalcon\Mvc\Micro($di);

/**
 * Router Connection is Created hare.
 */
require $dir . '/app/config/router.php';

return $app;