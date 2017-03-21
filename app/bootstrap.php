<?php

/*
 * This file is part of the Slim Api Base package.
 *
 * Copyright (c) 2017 Inderjeet Kaler
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$container = $app->getContainer();

// Monolog
$container["logger"] = function ($container) {
    $settings = $container->get('settings');
    $logger = new Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['logger']['path'], $settings['logger']['level']));
    return $logger;
};

// Error Handler
/*$container["errorHandler"] = function ($container) {
    return new App\Handlers\Error($container['logger']);
};*/

// Twig
/*$container["view"] = function($container) {
    $settings = $container->get('settings');
    $view = new \Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);

    $view->addExtension(new \Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));
    $view->addExtension(new Twig_Extension_Debug());
    return $view;
};*/

// Flash messages
/*$container['flash'] = function ($container) {
    return new Slim\Flash\Messages;
};*/

// Database
$container["dbConn"] = function($container) {
    return \App\Services\DatabaseService::getConnection($container);
};

// Controllers
$container["UserController"] = function($container) {
    return new \App\Controllers\UserController($container);
};

// Models
$container["UserModel"] = function($container) {
    return new \App\Models\UserModel($container);
};

// unset($app->getContainer()['errorHandler']);
// unset($app->getContainer()['phpErrorHandler']);

// Routes
require '../app/routes/routes.php';
require '../app/routes/api.php';