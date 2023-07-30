<?php
require_once('controllers/ProductController.php');
$product = new ProductController();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Product Add</title>
    <!-- Bootstap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awesome v6.4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom styling -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <main class="mt-3 mt-lg-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-6 offset-lg-1 ">
                    <h1 class="h2">Product Add</h1>
                </div>
                <div class="col-lg-3 col-md-6 col-6 offset-lg-1  text-end">
                    <button type="submit" form="product_form" id="addProductBtn" class="btn btn-success me-2">Save</button>
                    <a href="index.php" class="btn btn-secondary" id="cancel-btn">Cancel</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-5 offset-lg-1">
                    <div class="loading"></div>
                    <form action="" method="POST" id="product_form">
                        <div class="form-group">
                            <label class="form-label fs-4" for="sku">SKU</label>
                            <input type="text" id="sku" name="sku" required class="form-control form-control-sm">
                            <span class="sku-error text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label class="form-label fs-4" for="name">Name</label>
                            <input type="text" name="name" id="name" required class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label class="form-label fs-4" for="price">Price ($)</label>
                            <input type="number" name="price" id="price" required class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label class="form-label fs-4" for="productType">Type Switcher</label>
                            <select class="form-select form-select-sm" name="type" id="productType" required aria-label="product type">
                                <option disabled="" selected="">Open this select menu</option>
                                <?php
                                // load all the categories
                                print_r($product->loadProductTypes());
                                ?>
                            </select>
                        </div>
                        <div class="product-type_inputs">
                            <input type="hidden" name="typeId" id="typeId" value="">
                            <div class="form-group d-none" id="dvd">
                                <label class="form-label fs-4" for="size">Size (MB)</label>
                                <input type="number" required name="size" id="size" class="form-control form-control-sm">
                                <div id="sizeHelp" class="form-text"><b>Please, provide disc space in MB</b></div>
                            </div>
                            <div class="form-group d-none" id="furniture">
                                <div class="mb-3">
                                    <label for="height" class="form-label fs-4">Height (CM) </label>
                                    <input type="number" required id="height" name="height" class="form-control form-control-sm" />
                                </div>
                                <div class="mb-3">
                                    <label for="width" class="form-label fs-4">Width (CM) </label>
                                    <input type="number" required id="width" name="width" class="form-control form-control-sm" />
                                </div>
                                <div class="mb-3">
                                    <label for="length" class="form-label fs-4">Length (CM) </label>
                                    <input type="number" required id="length" name="length" class="form-control form-control-sm" />
                                </div>
                                <div id="furnitureHelp" class="form-text"><b>Please, provide the height,width and length of the furniture piece in cm</b></div>
                            </div>
                            <div class="form-group d-none" id="book">
                                <label class="form-label fs-4" for="weight">Weight (KG)</label>
                                <input type="number" required name="weight" id="weight" class="form-control form-control-sm">
                                <div id="bookHelp" class="form-text"><b>Please, provide the weight of the book in kg</b></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>


    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- bootstrap bundle js min -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js" integrity="sha512-VK2zcvntEufaimc+efOYi622VN5ZacdnufnmX7zIhCPmjhKnOi9ZDMtg1/ug5l183f19gG1/cBstPO4D8N/Img==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- jquery validate -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <!-- font awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- custom script -->
    <script src="assets/js/main.js"></script>
</body>

</html>