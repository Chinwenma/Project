<?php
include('functions/userfunctions.php');
include('includes/header.php');
include('authenticate.php');

if (isset($_GET['t'])) {
    $tracking_no = $_GET['t'];
    $orderData = checkVaildTrackingNo($tracking_no);
    if (mysqli_num_rows($orderData) < 0) {
?>
        <h4>Something went wrong</h4>
    <?php
        die();
    }
} else {
    ?>
    <h4>Something went wrong</h4>
<?php
    die();
}

$data = mysqli_fetch_array($orderData);
?>








<div class="py-3 bg-primary">
    <div class="container">
        <h5 class="text-center text-white d-flex align-items-center justify-content-center" style="height: 30vh;">
            <a href="index.php" class="text-white">
                Home/
            </a>
            <a href="myOrders.php" class="text-white">
                My Orders/
            </a>
            <a href="viewOrders.php" class="text-white">
                Order Details/
            </a>
        </h5>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-danger">
                            <span class="text-white fs-4">Order Details</span>
                            <a href="myOrders.php" class="btn btn-warning float-end"> <i class="fa fa-reply"></i> Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Delivery Details</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-2 ">
                                            <label class=" fw-bold">Name</label>
                                            <div class="border p-1"><?= $data['name']; ?></div>
                                        </div>
                                        <div class="col-md-12 mb-2 ">
                                            <label class="fw-bold">Email</label>
                                            <div class="border p-1"><?= $data['email']; ?></div>
                                        </div>
                                        <div class="col-md-12 mb-2 ">
                                            <label class="fw-bold">Phone</label>
                                            <div class="border p-1"><?= $data['phone']; ?></div>
                                        </div>
                                        <div class="col-md-12 mb-2 ">
                                            <label class="fw-bold">Tracking No.</label>
                                            <div class="border p-1"><?= $data['tracking_no']; ?></div>
                                        </div>
                                        <div class="col-md-12 mb-2 ">
                                            <label class="fw-bold">Address</label>
                                            <div class="border p-1"><?= $data['address']; ?></div>
                                        </div>
                                        <div class="col-md-12 mb-2 ">
                                            <label class="fw-bold">Zip Code</label>
                                            <div class="border p-1"><?= $data['pincode']; ?></div>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <h4>Order Summary</h4>
                                    <hr>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>

                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php


                                            $userId = $_SESSION['auth_user']['user_id'];
                                            $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty, p.* FROM orders o, order_items oi, products p  WHERE o.user_id='$userId'AND oi.order_id=o.id AND p.id=oi.prod_id AND o.tracking_no='$tracking_no' ";
                                            $order_query_run = mysqli_query($connection, $order_query);
                                            if (mysqli_num_rows($order_query_run) > 0) {
                                                foreach ($order_query_run as $item) {
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <img src="uploads/<?= $item['image']; ?>" alt="<?= $item['name']; ?> " width="50" height="50">
                                                            <?= $item['name']; ?>
                                                        </td>
                                                        <td><?= $item['price']; ?></td>
                                                        <td><?= $item['orderqty']; ?></td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                    <hr>
                                    <h5>Total Price: <span class="float-end fw-bold"><?=$data['total_price']; ?></span></h5>
                                    <hr>
                                    <label class="fw-bold">Payment Mode</label>

                                    <div class="border p-1 mb-3">
                                        <?=$data['payment_mode'];?>
                                    </div>
                                    <label class="fw-bold">Status</label>

                                    <div class="border p-1 mb-3">
                                        <?php 
                                        if($data['status'] == 0)
                                        {
                                            echo  "Proccessing";
                                        }
                                        elseif ($data['status'] == 1) {
echo "Completed";
                                        }
                                        elseif ($data['status'] == 2) {
                                            echo "Canceled";
                                                                                    }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



<?php include('includes/footer.php'); ?>