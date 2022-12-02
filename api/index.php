<?php

ob_start();

require __DIR__ . "/../vendor/autoload.php";
use CoffeeCode\Router\Router;

$route = new Router(url(), ":");

$route->namespace("Source\App");

/* GET ROUTES */

$route->get("/user","Api:getUser");
$route->get("/users","Api:getUsers");
$route->get("/product","Api:getProduct");
$route->get("/products","Api:getProducts");
$route->get("/provider","Api:getProvider");
$route->get("/providers","Api:getProviders");

/* POST ROUTES */

// http://www.localhost/playground/api/user/post/email//name//phoneNumber//password//dtBorn/NAO ACEITOU 00/00/0000/document/
$route->post("/user/post/email/{email}/name/{name}/phoneNumber/{phoneNumber}/password/{password}/dtBorn/{dtBorn}/document/{document}","Api:insertUser");

/* PUT ROUTES */

// http://www.localhost/playground/api/user/put/photo//id/
$route->put("/user/put/photo/{photo}/id/{id}","Api:updateUser");

$route->dispatch();

/*
 * Error Redirect
 */

if ($route->error()) {
    header('Content-Type: application/json; charset=UTF-8');
    http_response_code(404);

    echo json_encode([
        "errors" => [
            "type " => "endpoint_not_found",
            "message" => "Não foi possível processar a requisição"
        ]
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

ob_end_flush();