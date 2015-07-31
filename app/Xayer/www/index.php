<?php
require_once '../config/init.php';

$router = \Pecee\Router::GetInstance();
$router->addAlias(new \Xayer\Router\RouterAlias());

// Route request
try {
    $router->routeRequest();
} catch(\Pecee\Router\RouterException $e) {

    // Show widget here that displays 404
    throw $e;

} catch(\Exception $e) {
    throw $e;
}