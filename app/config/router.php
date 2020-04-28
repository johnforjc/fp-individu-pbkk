<?php

/** @var \Phalcon\Mvc\Router $router */
$router = $di->getRouter();
$config = $di->getConfig();

$router->removeExtraSlashes(true);

// Mengatur routes
$router->add('/', [
    'controller' =>  'index',
    'action' =>  'index'
]);

$router->add(
    '/signup',
    [
        'controller'        => 'session',
        'action'            => 'signup',
    ]
);

$router->add(
    '/register',
    [
        'controller'        => 'session',
        'action'            => 'register',
    ]
);

$router->add(
    '/signin',
    [
        'controller'        => 'session',
        'action'            => 'signin',
    ]
);

$router->add(
    '/login',
    [
        'controller'        => 'session',
        'action'            => 'login',
    ]
);

$router->add(
    '/logout',
    [
        'controller'        => 'session',
        'action'            => 'logout',
    ]
);

$router->add(
    '/meja/read',
    [
        'controller'        => 'meja',
        'action'            => 'read'
    ]
);


$router->handle($di->get('request_uri'));