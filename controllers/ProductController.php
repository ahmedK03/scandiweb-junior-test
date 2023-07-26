<?php

require_once('../modal/database.php');
require_once('../traits/utils.trait.php');


class ProductController extends Database
{
    // functions to add data to the db
    // import trait
    use Utils;
    public function showProducts()
    {
        $output = '';
        $productsList = Database::read();
        if (count($productsList) > 0) {
            foreach ($productsList as $product) {
                $output =
                    '<div class="col-sm-6 col-md-4 col-lg-3">
                        <article class="single-product d-flex flex-column justify-content-center align-items-center">
                                <div class="form-check align-self-start">
                                    <input class="delete-checkbox form-check-input"
                                    name="product_mass_delete[]" type="checkbox"
                                    value="' . $product['id'] . '"/>
                                </div>
                                <div class="sku">' . $product['sku'] . '</div>
                                <div class="product_name">' . $product['product_name'] . '</div>
                                <div class="product_price">' .
                    number_format($product['product_price'], 2, '.', '') . ' $</div>
                                <div class="product_details"><b class="type">Dimensions: </b>24x45x15</div>
                        </article>
                    </div>';
                echo $output;
            }
        }
        return true;
        // number_format($product['product_price'], 2, '.', '')
    }
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

    public function del($arr)
    {
        Database::massDelete($arr);
        return true;
    }
}
