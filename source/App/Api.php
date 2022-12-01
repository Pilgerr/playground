<?php

namespace Source\App;

use Source\Models\Product;
use Source\Models\Provider;
use Source\Models\User;

class Api
{

    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
    }

    public function getUser()
    {
        $headers = getallheaders();

        if(empty($headers["Email"]) || empty($headers["Password"])){
            $response = [
                "code" => 400,
                "type" => "bad_request",
                "message" => "Informe Email e Senha!"
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        $user = new User();

        if(!$user->validateUser($headers["Email"],$headers["Password"], true)){
            $response = [
                "code" => 401,
                "type" => "unauthorized",
                "message" => "E-mail ou Senha não cadastrados!"
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        echo json_encode($user->getArray(),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    }

    public function getProduct()
    {
        $headers = getallheaders();

        if(empty($headers["Id"])){
            $response = [
                "code" => 400,
                "type" => "bad_request",
                "message" => "Informe o ID!"
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        $product = new Product();

        if(!$product->findProductById($headers["Id"])){
            $response = [
                "code" => 401,
                "type" => "unauthorized",
                "message" => "Id não encontrado!"
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        echo json_encode($product->getArray(),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        
    }

    public function getProvider()
    {
        $headers = getallheaders();

        if(empty($headers["Id"])){
            $response = [
                "code" => 400,
                "type" => "bad_request",
                "message" => "Informe o ID!"
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        $provider = new Provider();

        if(!$provider->selectProvider($headers["Id"])){
            $response = [
                "code" => 401,
                "type" => "unauthorized",
                "message" => "Id não encontrado!"
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        echo json_encode($provider->getArray(),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        
    }

}