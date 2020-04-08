<?php

use Slim\Routing\RouteCollectorProxy;
use App\Controller\PageController;
/**
 * We use class and method instead of closure function.
 * The method setName is set name to route
 * that we use with url_for function in template.
 */

 
$app->get(
    '/login',
    PageController::class . ':login'
)->setName('login');
$app->post(
    '/login',
    PageController::class . ':loginProcess'
)->setName('login-process');

$app->get(
    '/register',
    PageController::class . ':register'
)->setName('register-form');
$app->post(
    '/register',
    PageController::class . ':registerAddInfo'
)->setName('register-addInfo');

$app->get(
    '/information',
    PageController::class . ':information'
)->setName('information');

$app->get(
    '/home',
    PageController::class . ':home'
)->setName('home');

$app->post(
    '/logout',
    PageController::class . ':logout'
)->setName('logout');

$app->get(
    '/suminfo',
    PageController::class . ':suminfo'
)->setName('sum');

$app->get(
    '/form',
    PageController::class . ':form'
)->setName('form');

$app->get(
    '/news',
    PageController::class . ':news'
)->setName('news');
