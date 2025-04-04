<?php

use DI\Container;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Create Container
$container = new Container();

// Create App from container
$app = AppFactory::createFromContainer($container);

// Register Dependencies
require __DIR__ . '/../app/dependencies.php';

// Register Middleware
require __DIR__ . '/../app/middleware.php';

// Register routes
require __DIR__ . '/../app/routes.php';

$app->run(); 