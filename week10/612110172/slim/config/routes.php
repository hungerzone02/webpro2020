<?php
use Slim\Routing\RouteCollectorProxy;
use App\Controller\ProductController;
/**
* We use class and method instead of closure function.
* The method setName is set name to route
* that we use with url_for function in template.
*/
$app->get('/product',
ProductController::class.':listAction'
)->setName('product-list');
$app->get('/product/{id}',
ProductController::class.':viewAction'
)->setName('product-view');

