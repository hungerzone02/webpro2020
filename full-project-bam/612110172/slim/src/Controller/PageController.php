<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;
use Slim\Routing\RouteContext;
session_start();
class PageController
{

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


    public function registerAdd(
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
        id,pass,level,first_name,last_name,age,birth_date,gender,blood_type,email,city     
        ) VALUES (      
            '{$post['id']}',
            '{$post['password']}',
            1,
            '{$post['fname']}',
            '{$post['lname']}',
            {$post['age']},
            '{$post['birth']}',
            '{$post['gender']}',
            '{$post['blood']}',
            '{$post['email']}',
            '{$post['city']}'
        )
        EOT
        ); 
        $routeContext = RouteContext::fromRequest($request);
        return $response->withHeader(
            'Location',
            $routeContext->getRouteParser()->urlFor('login')
        )->withStatus(302);
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
        $_SESSION['UserID'] = $item['UserID'];
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
    
    public function home(
        Request $request,
        Response $response,
        $args
    ): Response {

        $link = $request->getAttribute('mysqli')->connect();
        $view = Twig::fromRequest($request);
        // Use product-view.html template
        return $view->render($response, 'homepage.html',
    [
        'listSum' => PageController::sum($link)
    ]);
    }

    public static function sum($link): ?array
    {
        $result = mysqli_query(
            $link,
            <<<EOT
            select sum(addict) as cases, sum(waste) as wasted , sum(hill) as recovered
            from information
    EOT
    );
        return mysqli_fetch_assoc($result);
    }

    public function service(
        Request $request,
        Response $response,
        $args
    ): Response {

        $link = $request->getAttribute('mysqli')->connect();
        $view = Twig::fromRequest($request);
        // Use product-view.html template
        return $view->render($response, 'service.html');
    }
    public function killTel(
        Request $request,
        Response $response,
        $args
    ): Response {

        $link = $request->getAttribute('mysqli')->connect();
        $view = Twig::fromRequest($request);
        // Use product-view.html template
        return $view->render($response, 'kill.html',
    [
        'telephone' => PageController::tel($link)
    ]);
    }

    public static function tel($link): ?array
    {
        $result = mysqli_query(
            $link,
            <<<EOT
            select service_name as service,Tel as telephone from services
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

    public function kill(
        Request $request,
        Response $response,
        $args
    ): Response {

        $link = $request->getAttribute('mysqli')->connect();
        $view = Twig::fromRequest($request);
        // Use product-view.html template
        return $view->render($response, 'kill.html');
    }

    public function jel(
        Request $request,
        Response $response,
        $args
    ): Response {

        $link = $request->getAttribute('mysqli')->connect();
        $view = Twig::fromRequest($request);
        // Use product-view.html template
        return $view->render($response, 'jel.html');
    }

    public function form(
        Request $request,
        Response $response,
        $args
    ): Response {

        $link = $request->getAttribute('mysqli')->connect();
        $view = Twig::fromRequest($request);
        return $view->render($response, 'measure.html');
    }

    public function formAdd(
        Request $request,
        Response $response,
        $args
    ): Response {
        $post = $request->getParsedBody();
        $link = $request->getAttribute('mysqli')->connect();

        $userQuery = "INSERT INTO measure_form (UserID,age,fever,cough,shortness_of_breath)
                    VALUES({$_SESSION['UserID']},{$_POST['age']},{$_POST['fever']},{$_POST['cough']},{$_POST['breath']})";
        
        mysqli_query($link,$userQuery);
        if($_POST['fever'] == 1)
        {
            $_POST['fever'] = 33.33;
        }
        else
        {
            $_POST['fever'] = 0;
        }


        if($_POST['cough'] == 1)
        {
            $_POST['cough'] = 33.33;
        }
        else
        {
            $_POST['cough'] = 0;
        }


        if($_POST['breath'] == 1)
        {
            $_POST['breath'] = 33.33;
        }
        else
        {
            $_POST['breath'] = 0;
        }

        $percentage = $_POST['fever'] + $_POST['cough'] + $_POST['breath'];
        $request->getAttribute('session')
        ->getSegment(self::class)
        ->setFlash('message', "You have a chance to be infected with Covid $percentage %");

        $routeContext = RouteContext::fromRequest($request);
        return $response->withHeader(
            'Location',
            $routeContext->getRouteParser()->urlFor('formAdd')
        )->withStatus(302);
    }

    public function allCountryDetail(
        Request $request,
        Response $response,
        $args
    ): Response {

        $link = $request->getAttribute('mysqli')->connect();
        $view = Twig::fromRequest($request);
        // Use product-view.html template
        return $view->render($response, 'allCountryDetail.html',
    [
        'list' => PageController::getinfo($link)
    ]);
    }

    public static function getinfo($link): array
    {
        $result = mysqli_query(
            $link,
            <<<EOT
    SELECT * from information
    EOT
        );
        $items = [];
        while ($item = mysqli_fetch_assoc($result)) {
            $items[] = $item;
        }
        return $items;
    }

    public function dropCountry(
        Request $request,
        Response $response,
        $args
    ): Response {
        $post = $request->getParsedBody();
        $link = $request->getAttribute('mysqli')->connect();
        $userQuery = "DELETE FROM information where id = {$_POST['id']}";
        mysqli_query($link,$userQuery);
        $view = Twig::fromRequest($request);
        $routeContext = RouteContext::fromRequest($request);
        return $response->withHeader(
            'Location',
            $routeContext->getRouteParser()->urlFor('allCountryDetail')
        )->withStatus(302);
    }

    public function updateCountryAction(
        Request $request,
        Response $response,
        $args
    ): Response {
        $link = $request->getAttribute('mysqli')->connect();
        $view = Twig::fromRequest($request);
        $post = $request->getParsedBody();
        $result = mysqli_query(
            $link,
            <<<EOT
    SELECT * from information where id = {$_POST['id']}
    EOT
        );
        $item = mysqli_fetch_assoc($result);
        return $view->render($response, 'update_country.html', [
            'data' => $item
        ]);
    }

    public function updateCountryProcess(
        Request $request,
        Response $response,
        $args
    ): Response {
        $post = $request->getParsedBody();
        $link = $request->getAttribute('mysqli')->connect();
        $userQuery = "UPDATE information SET Country = '{$_POST['country']}',
                                            addict = '{$_POST['addict']}',
                                            waste = '{$_POST['waste']}',
                                            hill = '{$_POST['recovered']}'
        WHERE id = {$_POST['id']}";                 
        mysqli_query($link,$userQuery);
        $view = Twig::fromRequest($request);
        $routeContext = RouteContext::fromRequest($request);
        return $response->withHeader(
            'Location',
            $routeContext->getRouteParser()->urlFor('allCountryDetail')
        )->withStatus(302);
    }
}