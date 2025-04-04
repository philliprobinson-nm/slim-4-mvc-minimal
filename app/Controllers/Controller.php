<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

abstract class Controller
{
    protected $view;

    public function __construct(Twig $view)
    {
        $this->view = $view;
    }

    protected function render(Response $response, string $template, array $data = []): Response
    {
        return $this->view->render($response, $template, $data);
    }
} 