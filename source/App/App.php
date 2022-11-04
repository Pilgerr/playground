<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\User;

class App
{
    private $view;

    public function __construct()
    {
          if (empty($_SESSION["user"])) {
              header("location:". url(""));
          } 

        $this->view = new Engine(CONF_VIEW_APP, 'php');
    }

    public function home () : void 
    {
        echo $this->view->render("home");
    }

    public function logout () : void 
    {
        session_destroy();
        setcookie("user", "", time()-3600, "/");
        header("location:". url(""));
    }

    public function profile (array $data) 
    {
        if(!empty($data)){
            if(!empty($_FILES['edit-photo']['tmp_name'])) {
                $upload = uploadImage($_FILES['edit-photo']);
                unlink($_SESSION["userPhoto"]);
            } else {
                // se não houve alteração da imagem, manda a imagem que está na sessão
                $upload = $_SESSION["userPhoto"];
            }
            $user = new User(
                $data['edit-email'], 
                $data['edit-name'], 
                $data['edit-phoneNumber'], 
                NULL,
                $data['edit-dtBorn'], 
                $data['edit-document'],
                $upload
            );
            var_dump($upload);
            $returnInsert = $user->updateUser($data['edit-id']);
            if ($returnInsert == true) {
                $userJson = [
                    "type" => "alert-success",
                    "name" => $user->name,
                    "email" => $user->email,
                    "photo" => url($user->photo)
                ];
                echo json_encode($userJson);
            } else {
                $userJson = [
                    "type" => "alert-error",
                    "photo" => CONF_SITE_LOGO
                ];
                echo json_encode($userJson);
            }
            return;

        } else {
            $user = new User();
            $userLoged = $user->selectUser($_SESSION['user']['id']);
    
            echo $this->view->render("profile",[ "userLoged" => $userLoged ]);
        }
    }

}

?>