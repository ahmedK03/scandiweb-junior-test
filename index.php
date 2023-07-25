<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Product List</title>
    <!-- Bootstap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awesome v6.4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom styling -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <main class="mt-md-3 mt-lg-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-6">
                    <h1 class="h2">Prodcuts List</h1>
                </div>
                <div class="col-lg-4 col-md-6 offset-lg-1 text-end">
                    <a href="add-product.php" class="btn btn-info me-2">ADD</a>
                    <button class="btn btn-danger" id="delete-product-btn">MASS DELETE</button>
                </div>
            </div>
            <hr>
            <section class="listing-products">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <div id="all__products" class="d-none">
                            <div class="row">

                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <article class="single-product d-flex flex-column justify-content-center align-items-center">
                                        <div class="form-check align-self-start">
                                            <input class="delete-checkbox form-check-input" type="checkbox" value="" id="mass-del">
                                            <label class="form-check-label d-none" for="mass-del">
                                                Default checkbox
                                            </label>
                                        </div>
                                        <div class="sku">TR120555</div>
                                        <div class="product_name">Chair</div>
                                        <div class="product_price">40.00 $</div>
                                        <div class="product_details"><b class="type">Dimensions: </b>24x45x15</div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    <div id="all_products">
                        <div class="row">
                            <!-- list all products -->
                        </div>
                    </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- jquery validate -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <!-- bootstrap bundle js min -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js" integrity="sha512-VK2zcvntEufaimc+efOYi622VN5ZacdnufnmX7zIhCPmjhKnOi9ZDMtg1/ug5l183f19gG1/cBstPO4D8N/Img==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- font awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- custom script -->
    <script src="assets/js/main.js"></script>
</body>

</html>