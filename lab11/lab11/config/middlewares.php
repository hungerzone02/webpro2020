<?php
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Slim\Routing\RouteContext;

// add session to template, we start variable name

// with _ to prevent name collision.

$app->add(function(

    Request $request, RequestHandler $handler
    
    ) : Response {
    
    $view = Twig::fromRequest($request);
    
    // get session object from middleware
    
    $session = $request->getAttribute('session');
    
    // add global session with name _global
    
    $view->offsetSet('_global', $session->getSegment('global'));

    // add segment session that is related with controller

// with name _session

$routeContext = RouteContext::fromRequest($request);

$callable = $routeContext->getRoute()->getCallable();

if(is_string($callable)) {

$className = explode(':', $callable, 2)[0];

$view->offsetSet('_session', $session->getSegment($className));

}

return $handler->handle($request);

});