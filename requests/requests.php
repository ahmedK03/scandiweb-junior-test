<?php

/**
 * Handling all the requests
 */

require_once('../controllers/ProductController.php');

$products = new ProductController();

if (isset($_POST['action'])) {

    if ($_POST['action'] === 'add') {
        // add the product
        // parse the fileds first
        $height = $products->sanitizeInputs($_POST['height']);
        $width = $products->sanitizeInputs($_POST['width']);
        $length = $products->sanitizeInputs($_POST['length']);
        // sent to the controller
        $dimensions = implode(',', [$height, $width, $length]);
        $weight = $products->sanitizeInputs($_POST['weight']);
        $size = $products->sanitizeInputs($_POST['size']);
        $id = $products->sanitizeInputs($_POST['typeId']);
        $name = $products->sanitizeInputs($_POST['name']);
        $sku = $products->sanitizeInputs($_POST['sku']);
        $price = $products->sanitizeInputs($_POST['price']);

        // $products->addProduct($id, $name, $sku, $price);
        $products->setVarType($id);

        $typeVal1 = $products->getVarType();
        //expected output: dimensions is: $height,$width,$length
        // or $size or $weight
        echo "{$typeVal1} is: " . ${$typeVal1};
    }

    if ($_POST['action'] === 'del') {
        $all_ids = $_POST['product_mass_delete'];
        $products->del(implode(',', $all_ids));
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


// $arr
