<?php

require_once(__DIR__ . '/../config/config.php');

class Database extends Config
{
    // here goes the crud operations only
    // functions are: read, app, mass delete
    // use interface for totalRowCount

    protected function read()
    {
        $query = "SELECT product.`id`, product.`product_name`, product.`sku`, product.`product_price`, v_name.`name`, var.`values` FROM `products` AS product JOIN `product_category` AS cate ON product.product_category_id = cate.id JOIN `variant_name` AS v_name ON v_name.product_category_id = cate.id JOIN `type_variants` AS var ON product.id = var.product_id";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    protected function insertGeneralInfo($typeId, $name, $sku, $price)
    {
        $query = "INSERT INTO products (product_category_id,product_name,sku,product_price) VALUES (:typeId, :name, :sku, :price)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['typeId' => $typeId, 'name' => $name, 'sku' => $sku, 'price' => $price]);
        return true;
    }


    protected function insertSwitcherValues($id, $typeVal)
    {
        $query = "INSERT INTO type_variants (var_name_id, `values`) SELECT name.id, inval.val FROM variant_name AS name JOIN  (SELECT :typeVal as val) inval WHERE name.product_category_id = :id LIMIT 0,3";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['typeVal' => $typeVal, 'id' => $id]);
        return true;
    }

    protected function search($sku)
    {
        $query = "SELECT sku FROM products WHERE sku LIKE :sku LIMIT 1";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['sku' => '%' . $sku . '%']);
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function massDelete($arr)
    {
        $query = "DELETE FROM products WHERE id IN($arr)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return true;
    }

    protected function loadCategories()
    {
        $query = "SELECT * FROM product_category";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $types = $stmt->fetchAll();
        return $types;
    }
    protected function selectVariantName($typeId)
    {
        $query = "SELECT name FROM variant_name WHERE product_category_id = :id LIMIT 1";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['id' => $typeId]);
        $varaintType = $stmt->fetch();
        return $varaintType;
    }
}
