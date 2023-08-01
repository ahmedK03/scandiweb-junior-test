<?php

require_once(__DIR__ . '/../config/config.php');

class Database extends Config
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

    public function loadCategories()
    {
        $query = "SELECT * FROM product_category";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $types = $stmt->fetchAll();
        return $types;
    }
    public function selectVariantName($typeId)
    {
        $query = "SELECT name FROM variant_name WHERE product_category_id = :id LIMIT 1";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['id' => $typeId]);
        $varaintType = $stmt->fetch();
        return $varaintType;
    }
}
