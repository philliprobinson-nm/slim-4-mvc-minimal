<?php

use Slim\Views\Twig;

// Set view in Container
$container->set(Twig::class, function() {
    return Twig::create(__DIR__ . '/../templates', ['cache' => __DIR__ . '/../cache']);
});

