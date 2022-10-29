<?php

namespace Source\App;

use League\Plates\Engine;

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

    public function profile () : void
    {
        echo $this->view->render("profile");
    }

}

?>