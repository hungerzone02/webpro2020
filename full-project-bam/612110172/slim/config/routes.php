<?php

use Slim\Routing\RouteCollectorProxy;
use App\Controller\PageController;

/**
 * We use class and method instead of closure function.
 * The method setName is set name to route
 * that we use with url_for function in template.
 */
$app->get(
    '/',
    PageController::class . ':login'
)->setName('login');
$app->post(
    '/',
    PageController::class . ':loginProcess'
)->setName('login-process');

$app->get(
    '/register',
    PageController::class . ':register'
)->setName('register');
$app->post(
    '/register',
    PageController::class . ':registerAdd'
)->setName('register-add');

$app->get(
    '/information',
    PageController::class . ':information'
)->setName('information');

$app->get(
    '/home',
    PageController::class . ':home'
)->setName('home');

$app->get(
    '/service',
    PageController::class . ':service'
)->setName('service');

$app->get(
    '/kill',
    PageController::class . ':killTel'
)->setName('kill');

$app->get(
    '/jel',
    PageController::class . ':jel'
)->setName('jel');

$app->get(
    '/allCountryDetail',
    PageController::class . ':allCountryDetail'
)->setName('allCountryDetail');

$app->get(
    '/form',
    PageController::class . ':form'
)->setName('form');

$app->post(
    '/form',
    PageController::class . ':formAdd'
)->setName('formAdd');

$app->get(
    '/CountryDetail',
    PageController::class . ':dropCountry'
)->setName('dropCountry');