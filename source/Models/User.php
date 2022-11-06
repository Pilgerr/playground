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
    private $photo;
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
                         ?string $document = NULL,
                         ?string $photo = NULL) {
                            
	    $this->email = $email;
	    $this->name = $name;
	    $this->phoneNumber = $phoneNumber;
	    $this->password = $password;
	    $this->dtBorn = $dtBorn;
	    $this->document = $document;
        $this->photo =  $photo;
	}

    public function insertUser() : bool
    {
        $query = "INSERT INTO users VALUES (NULL, :email, :name, :phoneNumber, :password, :dtBorn, :document, NULL, NULL, NULL)";
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

    public function updateUser(int $id)
    {
        $query = "UPDATE users SET email = :email, name = :name, phoneNumber = :phoneNumber, dtBorn = :dtBorn, document = :document, photo = :photo WHERE id = :id";
                              
        $stmt1 = Connect::getInstance()->prepare($query);
        $stmt1->bindParam(":email",$this->email);
        $stmt1->bindParam(":name",$this->name);
        $stmt1->bindParam(":phoneNumber",$this->phoneNumber); 
        $stmt1->bindParam(":dtBorn", $this->dtBorn);
        $stmt1->bindParam(":document", $this->document);
        $stmt1->bindParam(":photo", $this->photo);
        $stmt1->bindParam(":id",$id);
        $stmt1->execute();

        $query = "SELECT * FROM users WHERE id LIKE :id";
        $stmt2 = Connect::getInstance()->prepare($query);
        $stmt2->bindParam(":email", $id);
        $stmt2->execute();
        $user = $stmt2->fetch();

        if ($stmt1->rowCount()==1) {
            $arrayUser = [
                "id" => $user->id,
                "name" => $user->name,
                "email" => $user->email
            ];
            $_SESSION["user"] = $arrayUser;
            if (!isset($_SESSION["userPhoto"])) {
                $_SESSION["userPhoto"] = $this->photo;
            }
            return true;
        } else {
            return false;
        }
    }

    public function selectUser(int $id)
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $userLoged = $stmt->fetch();

        if ($stmt->rowCount()==1) {
            return $userLoged;
        } else {
            return false;
        }
    }

	public function getId() {
		return $this->id;
	}

	public function setId($id): self {
		$this->id = $id;
		return $this;
	}

    public function getEmail() {
		return $this->email;
	}

	public function setEmail($email): self {
		$this->email = $email;
		return $this;
	}

    public function getName() {
		return $this->name;
	}

	public function setName($name): self {
		$this->name = $name;
		return $this;
	}

    public function getPhoneNumber() {
		return $this->phoneNumber;
	}

	public function setPhoneNumber($phoneNumber): self {
		$this->phoneNumber = $phoneNumber;
		return $this;
	}

    public function getDtBorn() {
		return $this->dtBorn;
	}

	public function setDtBorn($dtBorn): self {
		$this->dtBorn = $dtBorn;
		return $this;
	}

    public function getDocument() {
		return $this->document;
	}

    public function setDocument($document) {
		$this->document = $document;
        return $this;
	}

    public function getPhoto() {
		return $this->photo;
	}

	public function setPhoto($photo): self {
		$this->photo = $photo;
		return $this;
	}
}