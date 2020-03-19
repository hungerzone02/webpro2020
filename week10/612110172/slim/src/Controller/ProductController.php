<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;

class ProductController
{
  // This is just a mock up data, the real data come from database
  private static $PRODUCT_DATA = [
    ['id' => 101, 'name' => 'Product A', 'price' => 1234.56, 'category' => 'Phone','qty' =>100],
    ['id' => 250, 'name' => 'Product B', 'price' => 2345.67, 'category' => 'Phone','qty' =>100],
    ['id' => 400, 'name' => 'Product C', 'price' => 3456.78, 'category' => 'Phone','qty' =>100],
  ];

  // The other actions logic code will be add here.
  public function addAction(
    Request $request, Response $response, $args
  ) : Response
  {
    $view = Twig::fromRequest($request);
    
    return $view->render($response, 'product-add-form.html');
  }





  public function listAction(
    Request $request, Response $response, $args
  ) : Response
  {
    $view = Twig::fromRequest($request);
   
    return $view->render($response, 'product-list.html', [
      'data' => self::$PRODUCT_DATA,
    ]);
  }
  public function viewAction(
    Request $request, Response $response, $args
  ) : Response
  {
    // $args store value from placeholder that we want {id}
    $id = $args['id'];
    $item = null;
    foreach(self::$PRODUCT_DATA as $product)
      if($product['id'] == $id) $item = $product;
    
    $view = Twig::fromRequest($request);
    
    return $view->render($response, 'product-view.html', [
      'data' => $item,
    ]);
  }

  public function updateAction(
    Request $request, Response $response, $args
  ) : Response
  {
    $view = Twig::fromRequest($request);
    
    return $view->render($response, 'product-update-form.html');
    
  }


  public function loginAction(
    Request $request, Response $response, $args
  ) : Response
  {
    $view = Twig::fromRequest($request);    
    return $view->render($response, 'login-form.html');
    
  }



}
