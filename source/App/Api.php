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

    public function validateUser()
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

    public function getUser()
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

        $user = new User();

        if(!$user->selectUser($headers["Id"])){
            $response = [
                "code" => 401,
                "type" => "unauthorized",
                "message" => "Id não encontrado!"
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        echo json_encode($user->getArray(),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function getUsers()
    {
        $users = new User();
        echo json_encode($users->selectAllUsers(),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function insertUser(array $data)
    {
        if (!empty($data)) {
            $user = new User(
                $data["email"],
                $data["name"],
                $data["phoneNumber"],
                $data["password"],
                $data["dtBorn"], 
                $data["document"],
                NUll
            );
            $user->insertUser();
        } else {
            $response = [
                "code" => 400,
                "type" => "bad_request",
                "message" => "Informe todos os dados do usuário!"
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        } 
    }

    public function updateUser(array $data)
    {
        if (!empty($data)) {
            $user = new User();
            $user->updatePhotoUser($data["photo"], $data["id"]);
        } else {
            $response = [
                "code" => 400,
                "type" => "bad_request",
                "message" => "Informe todos os dados do usuário!"
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }
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

        if(!$product->selectProduct($headers["Id"])){
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

    public function getProducts()
    {
        $products = new Product();
        echo json_encode($products->selectAllProducts(),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function insertProduct(array $data)
    {
        if (!empty($data)) {
            $product = new Product(
                $data["image"], // ACERTAR ENVIO DA URL
                $data["name"],
                $data["price"],
                $data["description"],
                "on"
            );
            $product->insertProduct();
        } else {
            $response = [
                "code" => 400,
                "type" => "bad_request",
                "message" => "Informe todos os dados do produto!"
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }
    }

    public function updateProduct(array $data)
    {
        if (!empty($data)) {
            $product = new Product(
                $data["image"],
                $data["name"],
                $data["price"],
                $data["description"],
                $data["available"]
            );
            $product->updateProduct($data["id"]);
        } else {
            $response = [
                "code" => 400,
                "type" => "bad_request",
                "message" => "Informe todos os dados do usuário!"
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }
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

    public function getProviders()
    {
        $providers = new Provider();
        echo json_encode($providers->selectAllProviders(),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

}