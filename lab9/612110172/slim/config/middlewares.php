<?php 
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
// Create Twig.
// We don't want cache on development environment.
$twig = Twig::create(__DIR__.'/../templates',
($_SERVER['APP_ENV'] == 'dev')? [] : ['cache' => __DIR__.'/../cache']);
// Add twig-view Middleware.
$app->add(TwigMiddleware::create($app, $twig));