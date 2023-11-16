<?php
include('functions/userfunctions.php');

include('includes/header.php'); ?>
<div class="py-3 bg-primary">
    <div class="container">
        <h5 class="text-center text-white d-flex align-items-center justify-content-center" style="height: 30vh;">
            <a href="index.php" class="text-white">
                Home/
            </a>
            <a href="cart.php" class="text-white">
                Cart
            </a>
        </h5>
    </div>
</div>

<div class="py-5 " style="background-color: blanchedalmond;">
    <div class="container">
        <div class="card card-body shadow">
            <div class="row">
                <div class="col-md-12">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <h6>Product</h6>
                        </div>
                        <div class="col-md-3">
                            <h6>price</h6>
                        </div>

                        <div class="col-md-2">
                            <h6>Quantity</h6>
                        </div>

                        <div class="col-md-2">
                            <h6>Action</h6>
                        </div>
                    </div>

                    <?php
                    $items = getCartItems();
                    foreach ($items as $citem) {
                    ?>
                        <div class="card shadow-sm mb-3 product_data">


                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="uploads/<?= $citem['image']; ?>" alt="" width="80px" class="mb-3 mt-3 ms-2">
                                </div>
                                <div class="col-md-3">
                                    <h5><?= $citem['name'] ?></h5>
                                </div>
                                <div class="col-md-3">
                                    <h5># <?= $citem['selling_price'] ?></h5>
                                </div>

                                <div class="col-md-2">
                                    <div class="input-group mb-3" style="width: 130px;">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" class="form-control text-center bg-white input-qty " disabled value="<?= $citem['prod_qty']; ?> ">
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash me-2"> Remove</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>



<?php include('includes/footer.php'); ?>