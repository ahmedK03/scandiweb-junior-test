<?php

require_once('../config/config.php');
require_once('../interfaces/operations.interface.php');

class Database extends Config implements Operations
{
    // here goes the crud operations only
    // functions are: read, app, mass delete
    // use interface for totalRowCount

    public function read()
    {
        $query = "SELECT * FROM products";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function insertGeneralInfo($typeId, $name, $sku, $price)
    {
        $query = "INSERT INTO products (product_type_id,product_name,sku,product_price) VALUES (:typeId, :name, :sku, :price)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['typeId' => $typeId, 'name' => $name, 'sku' => $sku, 'price' => $price]);
        return true;
    }

    public function search($sku)
    {
        $query = "SELECT sku FROM products WHERE sku LIKE :sku LIMIT 1";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['sku' => '%' . $sku . '%']);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function massDelete($arr)
    {
        $query = "DELETE FROM products WHERE id IN($arr)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
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
