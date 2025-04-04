<?php

use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/../vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Create Container
$container = new Container();

// Set view in Container
$container->set(Twig::class, function() {
    return Twig::create(__DIR__ . '/../app/views', ['cache' => __DIR__ . '/../cache']);
});

// Create App from container
$app = AppFactory::createFromContainer($container);

// Add Twig-View Middleware
$app->add(TwigMiddleware::create($app, $container->get(Twig::class)));

// Add Error Middleware
$app->addErrorMiddleware(true, true, true);

// Register routes
require __DIR__ . '/../app/routes.php';

$app->run(); 