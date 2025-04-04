<?php

use App\Controllers\HomeController;
use Slim\Routing\RouteCollectorProxy;

$app->get('/', [HomeController::class, 'index']);

// Group routes example
$app->group('/api', function (RouteCollectorProxy $group) {
    // Add API routes here
}); 