<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;


require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/controller/user.php';

$usersController = new UsersController();
$notification = new notification();
$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/users', function (Request $request, Response $response, $args) {
    $users = [
        ['name' => 'nbn Doe', 'age' => 35],
        ['name' => 'Jane sdfdsf', 'age' => 28],
        ['name' => 'Bob Johnson', 'age' => 42],
    ];

    $response->getBody()->write(json_encode($users));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/user', [$usersController, 'getUsers']);
$app->get('/notification', [$notification, 'getnotification']);


$app->run();