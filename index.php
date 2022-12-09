<?php

ob_start();
session_start();

require __DIR__ . "/vendor/autoload.php";
use CoffeeCode\Router\Router;

$route = new Router(CONF_URL_BASE, ":");
//$route = new Router('localhost/acme-tarde', ":"); // Route para localhost

/**
 * Web Routes
 */

$route->namespace("Source\App");
$route->get("/","Web:home");
$route->get("/sobre","Web:about");
$route->get("/contato","Web:contact");
$route->get("/produtos","Web:products");
$route->get("/entrar","Web:loginAndRegister");
$route->get("/cadastro-usuario","Web:registerUser");
$route->post("/cadastro-usuario","Web:registerUser");
$route->get("/cadastro-endereco","Web:registerAddress");
$route->post("/cadastro-endereco","Web:registerAddress");
$route->get("/login","Web:login");
$route->post("/login","Web:login");
$route->get("/produtos/{idProduct}","Web:viewProduct");
$route->get("/carrinho", "Web:cart");
$route->get("/logout","Web:logout");
//$route->post("/produtos/{idProduct}","Web:viewProductAdd");
 
/*
 * App Routs
 */

$route->group("/app"); // agrupa em /app
$route->get("/","App:home");
$route->get("/logout","App:logout");
$route->get("/perfil", "App:profile");
$route->post("/perfil", "App:profile");

/*
 * Adm Routs
 */

$route->group("/adm");
$route->get("/", "Adm:home");
$route->get("/gerar-pdf", "Adm:homePdf");
$route->get("/cadastro-produto", "Adm:registerProduct");  
$route->post("/cadastro-produto", "Adm:registerProduct");  
$route->get("/edicao-produto", "Adm:editProduct");  
$route->post("/edicao-produto", "Adm:editProduct");  
$route->get("/cadastro-fornecedor", "Adm:registerProvider");  
$route->post("/cadastro-fornecedor", "Adm:registerProvider");  
$route->get("/edicao-fornecedor", "Adm:editProvider");  
$route->post("/edicao-fornecedor", "Adm:editProvider");  

/*
 * Erros Routes
 */

$route->group("error")->namespace("Source\App");
$route->get("/{errcode}", "Web:error");

$route->dispatch();

/*
 * Error Redirect
 */

if ($route->error()) {
    $route->redirect("/error/{$route->error()}");
}

ob_end_flush();