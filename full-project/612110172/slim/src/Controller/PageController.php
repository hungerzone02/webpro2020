<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;
use Slim\Routing\RouteContext;

class PageController
{
    public function registerAddInfo(
        Request $request,
        Response $response,
        $args
    ): Response {
        $post = $request->getParsedBody();
        $link = $request->getAttribute('mysqli')->connect();
        mysqli_query(
            $link,
            <<<EOT
        INSERT INTO user (
        id,pass,level,firstName,lastName,age,gender,email,city,bloodType      
        ) VALUES (      
            '{$post['id']}',
            '{$post['password']}',
            1,
            '{$post['firstname']}',
            '{$post['lastname']}',
            {$post['age']},
            '{$post['gender']}',
            '{$post['email']}',
            '{$post['city']}',
            '{$post['blood']}'
        )
        EOT
        ); 
        $routeContext = RouteContext::fromRequest($request);
        return $response->withHeader(
            'Location',
            $routeContext->getRouteParser()->urlFor('login')
        )->withStatus(302);
    }

    public function loginProcess(
        Request $request,
        Response $response,
        $args
    ): Response {
        $post = $request->getParsedBody();
        $link = $request->getAttribute('mysqli')->connect();
        $IDresult =  mysqli_query(
            $link,
            <<<EOT
        SELECT UserID,id,pass  FROM user 
        WHERE id = '{$post['id']}'
        EOT
        ); 
        $item = mysqli_fetch_assoc($IDresult);
        if($item['id'] == $post['id'] && $item['pass'] == $post['password'])
        {
            $routeContext = RouteContext::fromRequest($request);
            return $response->withHeader(
                'Location',
                $routeContext->getRouteParser()->urlFor('home')
            )->withStatus(302);
            session_start();
            $_SESSION['userID'] = $IDresult;
        }
        else{
            $request->getAttribute('session')
            ->getSegment(self::class)
            ->setFlash('message', "Username or Password has wrong");
            $routeContext = RouteContext::fromRequest($request);
            return $response->withHeader(
                'Location',
                $routeContext->getRouteParser()->urlFor('login')
            )->withStatus(302); 
        }        
    }

    public function login(
        Request $request,
        Response $response,
        $args
    ): Response {

        $link = $request->getAttribute('mysqli')->connect();
        $view = Twig::fromRequest($request);
        // Use product-view.html template
        return $view->render($response, 'login.html');
    }

    public function register(
        Request $request,
        Response $response,
        $args
    ): Response {

        $link = $request->getAttribute('mysqli')->connect();
        $view = Twig::fromRequest($request);
        // Use product-view.html template
        return $view->render($response, 'register.html');
    }

    public function home(
        Request $request,
        Response $response,
        $args
    ): Response {

        $link = $request->getAttribute('mysqli')->connect();
        $view = Twig::fromRequest($request);
        // Use product-view.html template
        return $view->render($response, 'main.html',
    [
        'listSum' => PageController::sum($link)
    ]);
    }

    public function suminfo(
        Request $request,
        Response $response,
        $args
    ): Response {

        $link = $request->getAttribute('mysqli')->connect();
        $view = Twig::fromRequest($request);
        // Use product-view.html template
        return $view->render($response, 'suminfo.html',
    [
        'listinfo' => PageController::getinfo($link)
    ]);
    }

    public static function sum($link): ?array
    {
        $result = mysqli_query(
            $link,
            <<<EOT
            select sum(addict) as cases, sum(waste) as wastes , sum(hill) as deads
            from corona
    EOT
    );
        return mysqli_fetch_assoc($result);
    }

    public static function getinfo($link): array
    {
        $result = mysqli_query(
            $link,
            <<<EOT
    SELECT * from corona
    EOT
        );
        $items = [];
        while ($item = mysqli_fetch_assoc($result)) {
            $items[] = $item;
        }
        return $items;
    }









    public static function getAll($link): array
    {
        $result = mysqli_query(
            $link,
            <<<EOT
    SELECT product.*, category.name AS category_name FROM product
    LEFT JOIN category ON (product.id_category = category.id)
    ORDER BY product.name
    EOT
        );
        $items = [];
        while ($item = mysqli_fetch_assoc($result)) {
            $items[] = $item;
        }
        return $items;
    }

    public static function getItem($link, $id): ?array
    {
        $result = mysqli_query(
            $link,
            <<<EOT
    SELECT product.*, category.name AS category_name FROM product
    LEFT JOIN category ON (product.id_category = category.id)
    WHERE product.id = '{$id}'
    EOT
        );
        return mysqli_fetch_assoc($result);
    }



    public function information(
        Request $request,
        Response $response,
        $args
    ): Response {

        $link = $request->getAttribute('mysqli')->connect();
        $view = Twig::fromRequest($request);
        // Use product-view.html template
        return $view->render($response, 'information.html');
    }
}
