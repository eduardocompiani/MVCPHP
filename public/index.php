<?php

use App\Controller\Foo;
use App\Core\Main;
use App\Core\Route;
use App\Enum\ControllerDefaultMethods;
use App\Enum\HTTPMethod;

require_once "../vendor/autoload.php";
$URI = $_SERVER['REQUEST_URI'];

$router = new \App\Core\Router();
$router->setURI($URI);

// Definicao das rotas
$router->addRoute(Route::createRoute(HTTPMethod::GET, '/', new App\View\Index()));
$router->addRoute(Route::createRoute(HTTPMethod::GET, '/Teste', new Foo(), ControllerDefaultMethods::INDEX->value));

(new Main($router))->run();

//\App\TestDatabase::run();