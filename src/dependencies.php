<?php

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // view renderer
    $container['view'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        $view = new \Slim\Views\Twig($settings['template_path'], [
            'cache' => false,
        ]);
        $view->addExtension(new \Slim\Views\TwigExtension(
            $c->router,
            $c->request->getUri()
        ));
        return $view;
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    // Database settings
    $database = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'car_park_app',
        'username' => 'carpark',
        'password' => 'carpark',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ];

    // Service factory for the ORM
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($database);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    // Controller dependency
    $container['Controller'] = function ($c) {
        return new \App\Controllers\Controller($c);
    };

    // Home Controller dependency
    $container['HomeController'] = function ($c) {
        return new \App\Controllers\HomeController($c);
    };

    // User Controller dependency
    $container['UserController'] = function ($c) {
        return new \App\Controllers\UserController($c);
    };

    // Car Park Controller dependency
    $container['CarParkController'] = function ($c) {
        return new \App\Controllers\CarParkController($c);
    };

    // Role Controller dependency
    $container['RoleController'] = function ($c) {
        return new \App\Controllers\RoleController($c);
    };

    // Slot Controller dependency
    $container['SlotController'] = function ($c) {
        return new \App\Controllers\SlotController($c);
    };

    // Row Controller dependency
    $container['RowController'] = function ($c) {
        return new \App\Controllers\RowController($c);
    };

    // Not Found Error Handler - Error 404
    unset($container['notFoundHandler']);
    $container['notFoundHandler'] = function ($c) {
        return function ($request, $response) use ($c) {
            $response = new \Slim\Http\Response(404);
            $view = $c->get('view');
            return $view->render($response, '404.html');
        };
    };
};
