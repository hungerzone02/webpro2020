<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;

class ProductController
{
  // This is just a mock up data, the real data come from database
  private static $PRODUCT_DATA = [
    ['id' => 101, 'name' => 'Product A', 'price' => 1234.56, 'category' => 'Phone', 'qty' => 100],
    ['id' => 250, 'name' => 'Product B', 'price' => 2345.67, 'category' => 'Phone', 'qty' => 100],
    ['id' => 400, 'name' => 'Product C', 'price' => 3456.78, 'category' => 'Tablet', 'qty' => 100],
  ];

  // The other actions logic code will be add here.
  public function addAction(
    Request $request,
    Response $response,
    $args
  ): Response {
    $view = Twig::fromRequest($request);

    return $view->render($response, 'product-add-form.html');
  }





  public function listAction(
    Request $request,
    Response $response,
    $args
  ): Response {
    $view = Twig::fromRequest($request);

    return $view->render($response, 'product-list.html', [
      'data' => self::$PRODUCT_DATA, //ตรงนี้ก็ใช้ data นะครับพี่ไป๋
    ]);
  }


  public function viewAction(
    Request $request,
    Response $response,
    $args
  ): Response {
    // $args store value from placeholder that we want {id}
    $id = $args['id'];
    $item = null; // เพราะเราตั้งชื่อว่า item อ๋อ โอเคครับผม ผิดๆ

    foreach (self::$PRODUCT_DATA as $product)
      if ($product['id'] == $id) $item = $product;

    $view = Twig::fromRequest($request);

    return $view->render($response, 'product-view.html', [
      'data' => $item, // เพราะเราตั้งชื่อตรงนี้ว่า data เราใช้ตัวหน้าใช่ไหมครับ ใช่ครับ มันคือ key (associative array)
    ]);
  }

  public function updateAction(
    Request $request,
    Response $response,
    $args
  ): Response {
    // ตรงนี้ต้องดึง data มาด้วย เพราะเราไปเรียก data ใน product-update-form.html
    // ทำคล้ายตอน viewAction
    $id = $args['id'];
    $item = null;

    foreach (self::$PRODUCT_DATA as $product) {
      if ($product['id'] == $id) $item = $product;
    }

    $view = Twig::fromRequest($request);
    // น่าจะประมาณนี้

    return $view->render($response, 'product-update-form.html', ['data' => $item]);
  }


  public function loginAction(
    Request $request,
    Response $response,
    $args
  ): Response {
    $view = Twig::fromRequest($request);
    return $view->render($response, 'login-form.html');
  }
}
