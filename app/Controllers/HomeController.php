<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends Controller
{
    public function index(Request $request, Response $response): Response
    {
        return $this->render($response, 'home.html.twig', [
            'title' => 'Welcome to Slim MVC',
            'message' => 'This is a minimal Slim 4 MVC framework'
        ]);
    }
} 