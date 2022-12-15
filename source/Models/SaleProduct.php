<?php

namespace Source\Models;
use Source\Core\Connect;

class SaleProduct
{
    private $id;
    private $idSale;
    private $idProduct;
    private $price;
    private $created_at;

    /**
     * @param mixed $id 
     * @param mixed $idSale 
     * @param mixed $idProduct 
     * @param mixed $price 
     * @param mixed $created_at 
     */
    public function __construct(?int $id = NULL, ?int $idSale = NULL, ?int $idProduct = NULL, ?int $price = NULL, ?string $created_at = NULL) {
    	$this->id = $id;
    	$this->idSale = $idSale;
    	$this->idProduct = $idProduct;
    	$this->price = $price;
    	$this->created_at = $created_at;
    }

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getIdSale() {
		return $this->idSale;
	}
	
	/**
	 * @param mixed $idSale 
	 * @return self
	 */
	public function setIdSale($idSale): self {
		$this->idSale = $idSale;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getIdProduct() {
		return $this->idProduct;
	}
	
	/**
	 * @param mixed $idProduct 
	 * @return self
	 */
	public function setIdProduct($idProduct): self {
		$this->idProduct = $idProduct;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPrice() {
		return $this->price;
	}
	
	/**
	 * @param mixed $price 
	 * @return self
	 */
	public function setPrice($price): self {
		$this->price = $price;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCreated_at() {
		return $this->created_at;
	}
	
	/**
	 * @param mixed $created_at 
	 * @return self
	 */
	public function setCreated_at($created_at): self {
		$this->created_at = $created_at;
		return $this;
	}
    public function getArray() : array
    {
        return ["user" => [
            "id" => $this->getId(),
            "idSale" => $this->getIdSale(),
            "idProduct" => $this->getIdProduct(),
            "price" => $this->getPrice(),
            "created_at" => $this->getCreated_at()
        ]];
    }
}