# Minimal Slim 4 MVC Framework

A minimal MVC framework built on top of Slim 4.

## Requirements

- PHP 7.4 or higher
- Composer

## Installation

1. Clone the repository
2. Run `composer install`
3. Copy `.env.example` to `.env` and configure your environment variables
4. Point your web server to the `public` directory

## Directory Structure

```
├── app/
│   ├── Controllers/     # Controller classes
│   ├── Models/          # Model classes
│   ├── views/           # Twig templates
│   └── routes.php       # Route definitions
├── public/
│   └── index.php        # Application entry point
├── vendor/              # Composer dependencies
├── .env                 # Environment configuration
└── composer.json        # Composer configuration
```

## Usage

### Creating a Controller

Create a new controller in `app/Controllers/`:

```php
<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class MyController extends Controller
{
    public function index(Request $request, Response $response): Response
    {
        return $this->render($response, 'template.twig', [
            'data' => 'Hello World'
        ]);
    }
}
```

### Adding Routes

Add routes in `app/routes.php`:

```php
$app->get('/path', [MyController::class, 'index']);
```

### Creating Views

Create Twig templates in `app/views/`:

```twig
<h1>{{ data }}</h1>
```

## License

MIT 