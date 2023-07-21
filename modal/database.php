<?php

require_once('../config/config.php');
require_once('../interfaces/operations.interface.php');

class Database extends Config implements Operations
{
    // here goes the crud operations only
    // functions are: read, app, mass delete
    // use interface for totalRowCount

    public function insertGeneralInfo($typeId, $name, $sku, $price)
    {
        $query = "INSERT INTO products (product_type_id,product_name,sku,product_price) VALUES (:typeId, :name, :sku, :price)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['typeId' => $typeId, 'name' => $name, 'sku' => $sku, 'price' => $price]);
        return true;
    }



    public function totalRowsCount()
    {
        $query = "SELECT * FROM products";
        $stmt =  $this->connection->prepare($query);
        $stmt->execute();
        $rowsCount = $stmt->rowCount();
        return $rowsCount;
    }
}
