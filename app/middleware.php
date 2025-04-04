<?php

use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

// Add Twig-View Middleware
$app->add(TwigMiddleware::create($app, $container->get(Twig::class)));

// Add Error Middleware
$app->addErrorMiddleware(true, true, true);