<?php

require_once('../modal/database.php');
require_once('../traits/utils.trait.php');


class ProductController extends Database
{
    // functions to add data to the db
    // import trait
    use Utils;

    public function addProduct($typeId, $name, $sku, $price)
    {
        Database::insertGeneralInfo($typeId, $name, $sku, $price);
        return true;
    }
}
