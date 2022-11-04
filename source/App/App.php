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
            $data = filter_var_array($data,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $user = new User(
                $data['edit-email'], 
                $data['edit-name'], 
                $data['edit-phoneNumber'], 
                NULL,
                $data['edit-dtBorn'], 
                $data['edit-document']
            );
            $returnInsert = $user->updateUser($data['edit-id']);
            if ($returnInsert == true) {
                $json = [
                    "message" => "Sucesso"
                ];
                echo json_encode($json);
            } else {
                $json = [
                    "message" => "Erro"
                ];
                echo json_encode($json);
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