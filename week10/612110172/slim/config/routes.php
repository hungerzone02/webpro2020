<?PHP

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

$app->get('/product/add',
  ProductController::class.':ADDAction'
)->setName('product-add');

$app->get('/product/{id}',
  ProductController::class.':viewAction'
)->setName('product-view');

$app->get('/product/{id}/update',
  ProductController::class.':updateAction'
)->setName('product-update');

$app->get('/login',
  ProductController::class.':loginAction'
)->setName('product-login');