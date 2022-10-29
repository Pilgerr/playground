<?php

namespace Source\Models;
use Source\Core\Connect;

class User {
    private $id;
    private $email;
    private $name;
    private $phoneNumber;
    private $password;
    private $dtBorn;
    private $document;
	/**
	 * @param $email mixed 
	 * @param $name mixed 
	 * @param $phoneNumber mixed 
	 * @param $password mixed 
	 * @param $dtBorn mixed 
	 * @param $document mixed 
	 */
	function __construct(?string $email = NULL, 
                         ?string $name = NULL, 
                         ?string $phoneNumber = NULL, 
                         ?string $password = NULL, 
                         ?string $dtBorn = NULL, 
                         ?string $document = NULL) {
                            
	    $this->email = $email;
	    $this->name = $name;
	    $this->phoneNumber = $phoneNumber;
	    $this->password = $password;
	    $this->dtBorn = $dtBorn;
	    $this->document = $document;
	}

    public function insertUser() : bool
    {
        $query = "INSERT INTO users VALUES (NULL, :email, :name, :phoneNumber, :password, :dtBorn, :document, NULL, NULL)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":phoneNumber", $this->phoneNumber);
        $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt->bindParam(":password", $passwordHash);
        $stmt->bindParam(":dtBorn", $this->dtBorn);
        $stmt->bindParam(":document", $this->document);
        $stmt->execute();

        if ($stmt->rowCount()==1) {
            $arrayUser = [
                "id" => Connect::getInstance()->lastInsertId(),
                "name" => $this->name,
                "email" => $this->email
            ];
            $_SESSION["user"] = $arrayUser;
            setcookie("user", $arrayUser, time()+60*60*24, "/");
            
            return true;
        } else {
            return false;
        }
    }

    public function validateUser (string $email, string $password, bool $remember) : bool
    {
        $query = "SELECT * FROM users WHERE email LIKE :email";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->rowCount()==1) {
            $user = $stmt->fetch();
            if(password_verify($password, $user->password)){    
                $arrayUser = [
                    "id" => $user->id,
                    "name" => $user->name,
                    "email" => $email
                ];
                $_SESSION["user"] = $arrayUser;

                if ($remember ==  true) {
                    setcookie("user", json_encode($arrayUser), time()+60*60*24, "/");
                    setcookie("userName", $user->name, time()+60*60*24, "/");
                } 
                return true;
            }
            return false;
        } else {
            return false;
        }
    }

}