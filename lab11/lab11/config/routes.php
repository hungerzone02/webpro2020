<?php

use Slim\Routing\RouteCollectorProxy;
use App\Controller\ProductController;
use App\Controller\LoginController;

/**
 * We use class and method instead of closure function.
 * The method setName is set name to route
 * that we use with url_for function in template.
 */

$app->get(
    '/product',
    ProductController::class . ':listAction'
)->setName('product-list');

$app->get(
    '/product/add',
    ProductController::class . ':addFormAction'
)->setName('product-add-form');
$app->post('/product/add',
    ProductController::class.':addAction'
)->setName('product-add');
$app->get(
    '/product/{id}',
    ProductController::class . ':viewAction'
)->setName('product-view');

$app->get(
    '/product/{id}/update',
    ProductController::class . ':updateFormAction'
)->setName('product-update-form');;

$app->get(
    '/login',
    LoginController::class . ':loginFormAction'
)->setName('login-form');
