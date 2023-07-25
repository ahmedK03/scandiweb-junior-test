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
    /**
     * check if sku exists in the database onfocusout js event
     */
    public function skuChecker($sku)
    {
        $searchResults = Database::search($sku);
        if (count($searchResults) > 0) {
            echo 'sku already exists';
        }
        return true;
    }
}
