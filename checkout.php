<?php
include('functions/userfunctions.php');
include('includes/header.php');
include('authenticate.php');
?>
<div class="py-3 bg-primary">
    <div class="container">
        <h5 class="text-center text-white d-flex align-items-center justify-content-center" style="height: 30vh;">
            <a href="index.php" class="text-white">
                Home/
            </a>
            <a href="checkout.php" class="text-white">
                Checkout
            </a>
        </h5>
    </div>
</div>

<div class="py-5 ">
    <div class="container">
        <div class="card ">
            <div class=" card-body shadow">
                <form action="functions/placeorder.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Basic Details</h5>
                            <hr>
                            <div class="row">
                                <div class="form-group col-sm-6 mb-3">
                                    <label class="fw-bold">Name:</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Your full Name" requried>
                                </div>
                                <div class="form-group col-sm-6 mb-3">
                                    <label class="fw-bold">E-mail:</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email" requried>
                                </div>
                                <div class="form-group col-sm-6 mb-3">
                                    <label class="fw-bold">Phone:</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone Number" requried>
                                </div>
                                <div class="form-group col-sm-6 mb-3">
                                    <label class="fw-bold">Pin Code:</label>
                                    <input type="text" name="pincode" class="form-control" placeholder="Enter Your pincode" requried>
                                </div>
                                <div class="form-group col-md-12 mb-3">
                                    <label class="fw-bold">Address:</label>
                                    <textarea rows="5" name="address" class="form-control" requried></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">

                            <h5>Order Details</h5>
                            <hr>
                            <?php $items = getCartItems();
                            $totalPrice = 0;
                            foreach ($items as $citem) {
                            ?>
                                <div class="mb-1 border">


                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="uploads/<?= $citem['image']; ?>" alt="" width="65px" class="">
                                        </div>

                                        <div class="col-md-5">
                                            <label><?= $citem['name'] ?></label>
                                        </div>

                                        <div class="col-md-3">
                                            <label><?= $citem['selling_price'] ?></label>
                                        </div>
                                        <div class="col-md-2">
                                            <label>x<?= $citem['prod_qty'] ?></label>
                                        </div>

                                    </div>
                                </div>
                            <?php
                                $totalPrice +=  $citem['selling_price']  *  $citem['prod_qty'];
                            }
                            ?>
                            <hr>
                            <h5>Total Price: <span class="float-end fw-bold"><?= $totalPrice ?></span></h5>
                            <div class="">
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100">Confirm and Place Order # COD</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php include('includes/footer.php'); ?>