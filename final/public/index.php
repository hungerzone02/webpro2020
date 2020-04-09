<?php

use Dotenv\Dotenv;
use Slim\Factory\AppFactory;

// Load composer auto-loading script
require_once __DIR__ . '/../vendor/autoload.php';

// Load environment variables from .env
$dotenv = Dotenv::createImmutable(__DIR__ . "/..");
$env = $dotenv->load();

// Create application
$app = AppFactory::create();
$app->setBasePath($_SERVER['BASE_PATH']);

// Load middlewares
require_once __DIR__ . '/../config/middlewares.php';

$app->addRoutingMiddleware();
$app->addErrorMiddleware(
    $_SERVER['APP_ENV'] == 'dev',
    true,
    true
);

// Load routes
require_once __DIR__ . '/../config/routes.php';

// Run application
$app->run();
