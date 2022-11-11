<?php

namespace Source\Models;
use Source\Core\Connect;

class Product {
    private $image;
    private $name;
    private $price;
    private $description;
    private $available;
	/**
	 * @param $image mixed 
	 * @param $name mixed 
	 * @param $price mixed 
	 * @param $description mixed 
	 * @param $available mixed 
	 */
	function __construct(?string $image = NULL, 
                            ?string $name = NULL, 
                            ?string $price = NULL, 
                            ?string $description = NULL,
                            ?string $available = NULL) {
	    $this->image = $image;
	    $this->name = $name;
	    $this->price = $price;
	    $this->description = $description;
	    $this->available = $available;
	}

    public function insertProduct() : bool
    {
        $query = "INSERT INTO products VALUES (NULL, :image, :name, :price, :description, :available, NULL, NULL)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":available", $this->available);
        $stmt->execute();

        if ($stmt->rowCount()==1) {
            return true;
        } else {
            return false;
        }
    }

    public function selectAllProducts() 
    {
        $query = "SELECT * FROM products";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();
        $products = $stmt->fetchAll();

        if ($stmt->rowCount()>0) {
            return $products;
        } else {
            return false;
        }
    }

    public function findProductById(int $idProduct)
    {
        $query = "SELECT * FROM products WHERE id = :idProduct";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":idProduct",$idProduct);
        $stmt->execute();
        $products = $stmt->fetchAll();
        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $products;
        }
    }

    public function updateProduct(int $id)
    {
        $query = "UPDATE products SET image = :image, name = :name, price = :price, description = :description, available = :available WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":available", $this->available);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $products = $stmt->fetchAll();
        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $products;
        }
    }
    
}