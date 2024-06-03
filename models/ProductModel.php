<?php

include 'CategoryProductsModel.php';

class ProductModel
{

    private $dbConnection;
    private $table_name = "Products";

    private $ProductName;
    private $ProductPrice;
    private $ProductDescription;
    private $CategoryId;
    private $ProductImage;

    public function getProductDescription()
    {
        return $this->ProductDescription;
    }

    public function getProductName()
    {
        return $this->ProductName;
    }

    public function getProductPrice()
    {
        return $this->ProductPrice;
    }

    public function __construct($ProductName, $ProductPrice, $ProductDescription, $CategoryId, $ProductImage, $dbConnection)
    {
        $this->ProductName = $ProductName;
        $this->ProductPrice = $ProductPrice;
        $this->ProductDescription = $ProductDescription;
        $this->CategoryId = $CategoryId;
        $this->ProductImage = $ProductImage;
        $this->dbConnection = $dbConnection;
    }

    public function getProductId()
    {
        $query = "SELECT ProductId FROM " . $this->table_name . " WHERE ProductName = :productName";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bindParam(':productName', $this->ProductName);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)["ProductId"];
    }
    
    public function addProduct()
    {
        $query = "INSERT INTO " . $this->table_name . " SET ProductName=:name, ProductPrice=:price, ProductDescription=:description, ProductImage=:image";
        $stmt = $this->dbConnection->prepare($query);
        $fileData = file_get_contents($this->ProductImage);

        $stmt->bindParam(":name", $this->ProductName);
        $stmt->bindParam(":price", $this->ProductPrice);
        $stmt->bindParam(":description", $this->ProductDescription);
        $stmt->bindValue(":image", $fileData);

        if ($stmt->execute()) {
            $ProductId = $this->getProductId();
            $CategoryProductItem = new CategoryProductsModel($this->CategoryId, $ProductId, $this->dbConnection);
            $resultAdd = $CategoryProductItem->addProductToCategory($this->CategoryId, $ProductId);
            if (!$resultAdd) return false;
            return true;
        } else {
            return false;
        }
    }

    function readAll()
    {
    }
}