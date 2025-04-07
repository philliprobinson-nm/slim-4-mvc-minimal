<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Formatter\LineFormatter;

return function (string $appEnv) {
    // Create the logger
    $logger = new Logger('app');

    // Set up the formatter
    $dateFormat = "Y-m-d H:i:s";
    $output = "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n";
    $formatter = new LineFormatter($output, $dateFormat);

    // Set up handlers based on environment
    if ($appEnv === 'production') {
        // In production, use rotating files with a maximum of 7 days
        $stream = new RotatingFileHandler(
            __DIR__ . '/../../logs/app.log',
            7,
            Logger::INFO
        );
    } else {
        // In development, log everything to a single file
        $stream = new StreamHandler(
            __DIR__ . '/../../logs/app.log',
            Logger::DEBUG
        );
    }

    $stream->setFormatter($formatter);
    $logger->pushHandler($stream);

    return $logger;
}; 