<?php

require_once('../controllers/ProductController.php');

$products = new ProductController();
// here goes all the requests, post and get


// $size = $products->sanitizeInputs($_POST['size']);
// $weight = $products->sanitizeInputs($_POST['weight']);
// $height = $products->sanitizeInputs($_POST['height']);
// $width = $products->sanitizeInputs($_POST['width']);
// $length = $products->sanitizeInputs($_POST['length']);

if (isset($_POST['action'])) {
    // parse the fileds first
    $id = $products->sanitizeInputs($_POST['typeId']);
    $name = $products->sanitizeInputs($_POST['name']);
    $sku = $products->sanitizeInputs($_POST['sku']);
    $price = $products->sanitizeInputs($_POST['price']);


    if ($_POST['action'] === 'add') {
        // add the product
        $products->addProduct($id, $name, $sku, $price);
    }
}

if (isset($_GET['action'])) {
    // list all products
    $_GET['action'] == 'list' ? $products->showProducts() : null;
    // sku checker
    if ($_GET['action'] === 'check') {
        $sku = $products->sanitizeInputs($_GET['sku']);
        $products->skuChecker($sku);
    }
}
