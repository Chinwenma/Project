<?php

include('functions/userfunctions.php');
include('includes/header.php');

if (isset($_GET['product'])) {
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("products", $product_slug);
    $product = mysqli_fetch_array($product_data);
    if ($product) {
   ?>
        <div class="py-3 bg-primary" >
            <div class="container">
                <h5 class="text-center text-white d-flex align-items-center justify-content-center" >
                    <a class="text-white" href="index.php">
                        Home/
                    </a>
                    <a class="text-white" href="categories.php">
                        collections/
                    </a>
                    <?= $product['name']; ?>
                </h5>
            </div>
        </div>
        <div class=" py-4" style="background-color: burlywood;">
            <div class="container product_data">
                <div class="row mt-5">
                    <div class="col-md-5">
                        <div class="shadow mt-5">
                            <img src="uploads/<?= $product['image']; ?>" alt="" class="w-100">

                        </div>
                    </div>
                    <div class="col-md-7 ">
                        <h4 class="fw-bold"> <?= $product['name']; ?>
                            <span class="float-end text-success"><?php if($product['trending']){echo "Trending";}; ?></span>
                        </h4>
                        <hr>
                        <p><?= $product['small_description']; ?></p>
                        <div class="row">
                        <div class="col-md-6">
                                <h4>discount Price:<span class="text-success fw-bold"> <?= $product['selling_price']; ?></span></h4>
                            </div>
                            <div class="col-md-6">
                                <h5><s class="text-danger">Price: <?= $product['original_price']; ?></s></h5>
                            </div>
                            
                        </div>
                      
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3" style="width: 130px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" class="form-control text-center bg-white input-qty " disabled value="1">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <button class="btn btn-primary px-4 addToCartBtn" value="<?= $product['id']; ?>"><i class="fa fa-shopping-cart me-2">  Add to Cart</i></button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-danger px-4"><i class="fa fa-heart me-2"> Add to Whishlist</i></button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Product Description:</h5>

                        <p><?= $product['description']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {
        echo "Product Not Found";
    }
} else {
    echo "something went wrong";
}





include('includes/footer.php');
?>