<?php

use Slim\Views\Twig;

// Set view in Container
$container->set(Twig::class, function() {
    $cache = $_ENV['APP_ENV'] === 'development' ? false : __DIR__ . '/../cache';
    
    return Twig::create(__DIR__ . '/../templates', ['cache' => $cache]);
});

