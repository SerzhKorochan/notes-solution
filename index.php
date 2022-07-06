<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require __DIR__ . '/vendor/autoload.php';

$loader = new FilesystemLoader('frontend/templates');
$view = new Environment($loader);

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) use ($view) {
    $content = $view->render('main_page.twig');
    $response->getBody()->write($content);
    return $response;
});

$app->get('/login', function (Request $request, Response $response, $args) use ($view) {
    $content = $view->render('auth_page.twig');
    $response->getBody()->write($content);
    return $response;
});

$app->run();