<?php

require_once('../controllers/ProductController.php');
require_once('../traits/utils.trait.php');



$products = new ProductController();
// $inputSanitzer = new Utils;
// here goes all the requests, post and get

if (isset($_POST['action'])) {
    // parse the fileds first
    $id = $products->sanitizeInputs($_POST['typeId']);
    $name = $products->sanitizeInputs($_POST['name']);
    $sku = $products->sanitizeInputs($_POST['sku']);
    $price = $products->sanitizeInputs($_POST['price']);
    $size = $products->sanitizeInputs($_POST['size']);
    $weight = $products->sanitizeInputs($_POST['weight']);
    $height = $products->sanitizeInputs($_POST['height']);
    $width = $products->sanitizeInputs($_POST['width']);
    $length = $products->sanitizeInputs($_POST['length']);

    if ($_POST['action'] === 'add') {
        // add the product
        $products->addProduct($id, $sku, $name, $price);
    }
}