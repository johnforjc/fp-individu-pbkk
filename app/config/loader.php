<?php

$loader = new \Phalcon\Loader();

/** @var \Phalcon\Config $config */

// Melakukan register namespace
$loader->registerNamespaces([
    'Phalcon\Db' => APP_PATH . '/library/Phalcon/Db',
]);

$loader->registerDirs([
    $config->application->controllersDir,
    $config->application->modelsDir,
]);

$loader->register();