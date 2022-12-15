<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Product;
use Source\Models\User;

class Web
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(CONF_VIEW_WEB,'php');
    }

    public function home() : void
    {
        echo $this->view->render("home");
    }

    public function about() : void
    {
        echo $this->view->render("about"); 
    }

    public function products()
    {
        $product = new Product();
        $products = $product->selectAllProducts();

        echo $this->view->render("products",[ "products" => $products ]);

    }

    public function loginAndRegister() : void 
    {
        echo $this->view->render("login-register");
    }

    public function contact() : void 
    {
        echo $this->view->render("contact");
    }

    public function registerAddress(array $data)
    {
        if ($data) {

        if (empty($_POST['register-street']) && empty($_POST['register-number']) && 
            empty($_POST['register-complement']) && empty($_POST['register-city']) &&
            empty($_POST['register-state']) && empty($_POST['register-zipCode'])) 
        {
            ?> <div class="register-msg">Preencha todos os campos!</div> <?php
        }

        elseif (empty($_POST['register-street']) || empty($_POST['register-number']) || 
                empty($_POST['register-complement']) || empty($_POST['register-city']) ||
                empty($_POST['register-state']) || empty($_POST['register-zipCode'])) 
        {
            if (empty($_POST['register-street'])) {
                ?> <div class="register-msg">Preencha a rua!</div> <?php
            }
            elseif (empty($_POST['register-number'])) {
                ?> <div class="register-msg">Preencha o n° da residência!</div> <?php
            }
            elseif (empty($_POST['register-complement'])) {
                ?> <div class="register-msg">Preencha o complemento!</div> <?php
            }
            elseif (empty($_POST['register-city'])) {
                ?> <div class="register-msg">Preencha a cidade!</div> <?php
            }
            elseif (empty($_POST['register-state'])) {
                ?> <div class="register-msg">Preencha o estado!</div> <?php
            }
            elseif (empty($_POST['register-zipCode'])) {
                ?> <div class="register-msg">Preencha o CEP!</div> <?php
            }
        }

        else 
        {
            $userSession = $_SESSION['user'];
            $address = new \Source\Models\Address(
                $data['register-street'],
                $data['register-number'],
                $data['register-complement'],
                $data['register-city'],
                $data['register-state'],
                $data['register-zipCode'],
                $userSession["id"]
            );
            
            $returnInsert = $address->insertAddress();
            
            if ($returnInsert == true) {
                ?> <div class="register-msg-sucess">Cadastrando endereço...</div> 
                       <script>
                        setTimeout(()=>{window.location.href = '<?=url("app")?>'}, 2000)
                       </script>
                <?php
            } else {
                ?> <div class="register-msg">Endereço já cadastrado!</div> <?php
            }
        }
        
        }

        echo $this->view->render("register-address");
    }

    public function registerUser(array $data){
    
    if($data){
    
        if (empty($_POST['register-email']) && empty($_POST['register-name']) && 
            empty($_POST['register-phoneNumber']) && empty($_POST['register-password']) &&
            empty($_POST['register-dtBorn']) && empty($_POST['register-document'])) 
        {
            ?> <div class="register-msg">Preencha todos os campos!</div> <?php
        }

        elseif (empty($_POST['register-email']) || empty($_POST['register-name']) || 
                empty($_POST['register-phoneNumber']) || empty($_POST['register-password']) ||
                empty($_POST['register-dtBorn']) || empty($_POST['register-document'])) 
        {
            if (empty($_POST['register-email'])) {
                ?> <div class="register-msg">Preencha seu email!</div> <?php
            }
            elseif (empty($_POST['register-name'])) {
                ?> <div class="register-msg">Preencha seu nome completo!</div> <?php
            }
            elseif (empty($_POST['register-phoneNumber'])) {
                ?> <div class="register-msg">Preencha seu número de telefone!</div> <?php
            }
            elseif (empty($_POST['register-password'])) {
                ?> <div class="register-msg">Preencha sua senha!</div> <?php
            }
            elseif (empty($_POST['register-dtBorn'])) {
                ?> <div class="register-msg">Preencha sua data de nascimento!</div> <?php
            }
            elseif (empty($_POST['register-document'])) {
                ?> <div class="register-msg">Preencha seu CPF!</div> <?php
            }
        }

        elseif (!empty($_POST['register-email']) && !empty($_POST['register-name']) && 
                !empty($_POST['register-phoneNumber']) && !empty($_POST['register-password']) &&
                !empty($_POST['register-dtBorn']) && !empty($_POST['register-document']))  
        {
            if (strlen($_POST['register-password']) <= 3) {
                ?> <div class="register-msg">Senha fraquíssima! Preencha com no mínimo 8 caracteres</div> <?php
            }

            elseif (strlen($_POST['register-password']) <= 5) {
                ?> <div class="register-msg">Senha mediana! Preencha com no mínimo 8 caracteres</div> <?php
            }

            elseif (strlen($_POST['register-password']) <= 7) {
                ?> <div class="register-msg">Quase lá! Preencha sua senha com no mínimo 8 caracteres</div> <?php
            }

            else {
                $user = new User(
                    $data['register-email'],
                    $data['register-name'],
                    $data['register-phoneNumber'],
                    $data['register-password'],
                    $data['register-dtBorn'],
                    $data['register-document']
                );
            
                $returnInsert = $user->insertUser();
                
                if ($returnInsert == true) {
                    ?> <div class="register-msg-sucess">Cadastrando usuário...</div> 
                       <script>
                        setTimeout(()=>{window.location.href = '<?=url("cadastro-endereco")?>'}, 2000)
                       </script>
                    <?php
                } else {
                    ?> <div class="register-msg">Usuário já cadastrado!</div> <?php
                }
            }

        }


    }
        echo $this->view->render("register-user");
    }

    public function login(array $data)
    {
        if ($data) {

        if (empty($_POST['login-email']) && empty($_POST['login-password'])) 
        {
            ?> <div class="register-msg">Preencha todos os campos!</div> <?php
        }

        elseif (empty($_POST['login-email']) || empty($_POST['login-password'])) 
        {
            if (empty($_POST['login-email'])) {
                ?> <div class="register-msg">Preencha seu email!</div> <?php
            }
            else {
                ?> <div class="register-msg">Preencha sua senha!</div> <?php
            }
        }

        else 
        {
            $email = $data["login-email"];
            $password = $data["login-password"];

            if(!empty($data["login-remember"])){
                $remember = true;
            } else {
                $remember = false;
            }

            $user = new User();

            $returnValidate = $user->validateUser($email,$password,$remember);

            if ($returnValidate == true) {
                ?> <div class="register-msg-sucess">Login efetuado com sucesso! Redirecionando ...</div> 
                    <?php
                        $id = $_SESSION["user"]["id"];
                        $user = new User();
                        $validate = $user->validateAdmUser($id);

                    if ($validate == false) {
                    ?>
                    <script>
                    setTimeout(()=>{window.location.href = '<?= url("app"); ?>'}, 2000);
                    </script>
                <?php
                    } elseif ($validate == true) {
                            ?>
                            <script>
                            setTimeout(()=>{window.location.href = '<?= url("adm"); ?>'}, 2000);
                            </script>
                        <?php
                    }
            } else {
                ?> <div class="register-msg">Não possível efetuar o login</div> <?php
            }
        }
        }
            if (!empty($_COOKIE["user"]["email"])) {
                $emailCookie = $_COOKIE["user"]["email"];
                echo $this->view->render("login",[ "emailCookie" => $emailCookie]);
            }
            echo $this->view->render("login");
            }

            public function viewProduct(array $data)
            {
                if(!empty($data)){
                    $pdct = new Product();
                    $product = $pdct->selectProduct($data["idProduct"]);
                }
                echo $this->view->render("view-product",[ "product" => $product]);
            }
            public function cart () : void
            {
                $product = new Product();
                $products = $product->selectAllProducts();
        
                echo $this->view->render("cart",[ "products" => $products ]);
            }

    public function error(array $data) : void
    {
//      echo "<h1>Erro {$data["errcode"]}</h1>";
//      include __DIR__ . "/../../themes/web/404.php";
        echo $this->view->render("404", [
            "title" => "Erro {$data["errcode"]} | " . CONF_SITE_NAME,
            "error" => $data["errcode"]
        ]);
    }

    public function logout () : void 
    {
        unset( $_SESSION['cart'] ); 
        unset( $_SESSION['cartItem'] ); 
        header("location:". url("carrinho"));
    }

}