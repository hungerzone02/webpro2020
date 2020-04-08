<?php

use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Middlewares\AuraSession;
use Slim\Routing\RouteContext;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use App\Middleware\MysqliMiddleware;

$app->add(function (
    Request $request,
    RequestHandler $handler
): Response {
    $view = Twig::fromRequest($request);
    $session = $request->getAttribute('session');
    $view->offsetSet('_global', $session->getSegment('global'));
    $routeContext = RouteContext::fromRequest($request);
    $callable = $routeContext->getRoute()->getCallable();
    if (is_string($callable)) {
        $className = explode(':', $callable, 2)[0];
        $view->offsetSet('_session', $session->getSegment($className));
    }
    return $handler->handle($request);
});
$twig = Twig::create(
    __DIR__ . '/../templates',
    ($_SERVER['APP_ENV'] == 'dev') ? [] : ['cache' => __DIR__ . '/../cache']
);
$app->add(TwigMiddleware::create($app, $twig));
$session = new AuraSession();
$session->name('612110175_SLIM');
$app->add($session);

$app->add(new MysqliMiddleware(

    $_SERVER['DB_HOST'],
    $_SERVER['DB_USERNAME'],
    $_SERVER['DB_PASSWORD'],
    $_SERVER['DB_DBNAME']

));
