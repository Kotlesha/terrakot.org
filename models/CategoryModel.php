<?php

class CategoryModel
{
    private $dbConnection;
    private $table_name = "Categories";

    public $CategoryId;
    public $CategoryName;

    public function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    function readCategoriesInformation()
    {
        $query = "SELECT CategoryId, CategoryName CategoryName FROM" . " " . $this->table_name;

        $stmt = $this->dbConnection->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}