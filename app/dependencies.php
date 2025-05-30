<?php

use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

// Get the environment
$appEnv = $_ENV['APP_ENV'] ?? 'development';

// Configure logger
$container->set(LoggerInterface::class, function () use ($appEnv) {
    $loggerConfig = require __DIR__ . '/../app/config/logger.php';
    return $loggerConfig($appEnv);
});

// Set view in Container
$container->set(Twig::class, function() {
    $cache = $_ENV['APP_ENV'] === 'development' ? false : __DIR__ . '/../cache';
    
    return Twig::create(__DIR__ . '/../templates', ['cache' => $cache]);
});