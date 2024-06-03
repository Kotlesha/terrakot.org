<?php

class CategoryProductsModel
{
    private $CategoryId;
    private $ProductId;
    private $dbConnection;
    private $table_name = "CategoryProducts";

    public function getCategoryId()
    {
        return $this->CategoryId;
    }

    public function getProductId()
    {
        return $this->ProductId;
    }

    public function __construct($CategoryId, $ProductId, $dbConnection)
    {
        $this->CategoryId = $CategoryId;
        $this->ProductId = $ProductId;
        $this->dbConnection = $dbConnection;
    }

    public function addProductToCategory(){
        $query = "INSERT CategoryProducts(CategoryId, ProductId) VALUES (:categoryId, :productId)";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bindParam(':categoryId', $this->CategoryId);
        $stmt->bindParam(':productId', $this->ProductId);
        if ($stmt->execute()) return true;
        return false;
    }
}