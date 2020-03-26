<?php 
use Dotenv\Dotenv;
use Slim\Factory\AppFactory;
use Middlewares\AuraSession;

// Load composer auto-loading script
require_once __DIR__.'/../vendor/autoload.php';

// Load environment variables from .env
$dotenv =
  Dotenv::createImmutable(__DIR__."/..");
$env = $dotenv->load();

// Create application
$app = AppFactory::create();
$app->setBasePath($_SERVER['BASE_PATH']);

    // ... other code
    
    $session = new AuraSession();
    
    // Assign cookie name to isolate our session from other applications,
    
    // change 612110xxx to your student ID
    
    $session->name('612110172_SLIM');
    
    // Add Aura.Session middleware
    
    // code in controller

    $session = $request->getAttribute('session');
    $segment = $session->getSegment(self::class);

    $segment->set('user', $user);
    $user = $segment->get('user', null);

    $segment->setFlash('error', 'Login Fail!!!');
    $error = $segment->getFlash('error', null);
    
    $app->add($session);
// Load middlewares
require_once __DIR__.'/../config/middlewares.php';

$app->addRoutingMiddleware();
$app->addErrorMiddleware(
  $_SERVER['APP_ENV'] == 'dev',
  true, true
);

// Load routes
require_once __DIR__.'/../config/routes.php';

// Run application
$app->run();

    
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

    <?php require_once "header.php"; ?>

    <div class="main-content">
		<div class="logo">
            <img title="Captain Marvel" src="images/logo.jpg">
        </div>
	</div>

    <?php include_once "footer.php"?>

</body>
</html>