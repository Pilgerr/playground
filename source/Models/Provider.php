<?php

namespace Source\Models;
use Source\Core\Connect;

class Provider {
    private $name;
    private $phoneNumber;
    private $linkInstagram;
    private $typeProduct;
	/**
	 * @param $name mixed 
	 * @param $phoneNumber mixed 
	 * @param $linkInstagram mixed 
	 * @param $typeProduct mixed 
	 */
	function __construct(string $name = NULL, string $phoneNumber = NULL, string $linkInstagram = NULL, string $typeProduct = NULL) {
	    $this->name = $name;
	    $this->phoneNumber = $phoneNumber;
	    $this->linkInstagram = $linkInstagram;
	    $this->typeProduct = $typeProduct;
	}

    public function insertProvider() : bool
    {
        $query = "INSERT INTO providers VALUES (NULL, :name, :phoneNumber, :linkInstagram, :typeProduct, NULL, NULL)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":phoneNumber", $this->phoneNumber);
        $stmt->bindParam(":linkInstagram", $this->linkInstagram);
        $stmt->bindParam(":typeProduct", $this->typeProduct);
        $stmt->execute();

        if ($stmt->rowCount()==1) {
            return true;
        } else {
            return false;
        }
    }

    public function selectAllProviders() 
    {
        $query = "SELECT * FROM providers";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();
        $providers = $stmt->fetchAll();

        if ($stmt->rowCount()>0) {
            return $providers;
        } else {
            echo "Erro";
        }
    }

    public function updateProvider(int $id, string $name, string $phoneNumber, string $linkInstagram, string $typeProduct)
    {
        $query = "UPDATE providers SET name = :name, phoneNumber = :phoneNumber, linkInstagram = :linkInstagram, typeProduct = :typeProduct WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phoneNumber", $phoneNumber);
        $stmt->bindParam(":linkInstagram", $linkInstagram);
        $stmt->bindParam(":typeProduct", $typeProduct);
        $stmt->execute();
        $products = $stmt->fetchAll();
        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $products;
        }
    }
}