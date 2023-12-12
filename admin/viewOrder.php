<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');

if (isset($_GET['t'])) {
    $tracking_no = $_GET['t'];
    $orderData = checkVaildTrackingNo($tracking_no);
    if (mysqli_num_rows($orderData) <= 0) {
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

if ($data !== null) {
    $name = $data['name'];
    $email = $data['email'];
    $phone = $data['phone'];
    $tracking_no = $data['tracking_no'];
    $address = $data['address'];
    $pincode = $data['pincode'];
    $total_price = $data['total_price'];
    $payment_mode = $data['payment_mode'];
    $status = $data['status'];
} else {
    echo '<h4>Invalid data structure</h4>';
    die();
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <span class="text-white fs-3">Order Details</span>
                    <a href="orders.php" class="btn btn-warning float-end"> <i class="fa fa-reply"></i> Back</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Delivery Details</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 mb-2 ">
                                    <label class=" fw-bold">Name</label>
                                    <div class="border p-1"><?= $name; ?></div>
                                </div>
                                <!-- ... (repeat similar checks for other fields) ... -->
                                <div class="col-md-12 mb-2 ">
                                    <label class="fw-bold">Email</label>
                                    <div class="border p-1"><?= $email; ?></div>
                                </div>
                                <div class="col-md-12 mb-2 ">
                                    <label class="fw-bold">Phone</label>
                                    <div class="border p-1"><?= $phone; ?></div>
                                </div>
                                <div class="col-md-12 mb-2 ">
                                    <label class="fw-bold">Tracking No.</label>
                                    <div class="border p-1"><?= $tracking_no; ?></div>
                                </div>
                                <div class="col-md-12 mb-2 ">
                                    <label class="fw-bold">Address</label>
                                    <div class="border p-1"><?= $address; ?></div>
                                </div>
                                <div class="col-md-12 mb-2 ">
                                    <label class="fw-bold">Zip Code</label>
                                    <div class="border p-1"><?= $pincode; ?></div>
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
                                    $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty, p.* FROM orders o, order_items oi, products p  WHERE oi.order_id=o.id AND p.id=oi.prod_id AND o.tracking_no='$tracking_no' ";
                                    $order_query_run = mysqli_query($connection, $order_query);
                                    if ($order_query_run !== null && mysqli_num_rows($order_query_run) > 0) {
                                        foreach ($order_query_run as $item) {
                                            if ($item !== null) {
                                    ?>
                                                <tr>
                                                    <td class="align-middle">
                                                        <img src="../uploads/<?= $item['image']; ?>" alt="<?= $item['name']; ?>" width="50" height="50">
                                                        <?= $item['name']; ?>
                                                    </td>
                                                    <td class="align-middle"><?= $item['price']; ?></td>
                                                    <td class="align-middle"><?= $item['orderqty']; ?></td>
                                                </tr>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <hr>
                            <h5>Total Price: <span class="float-end fw-bold"><?= $total_price; ?></span></h5>
                            <hr>
                            <label class="fw-bold">Payment Mode</label>
                            <div class="border p-1 mb-3"><?= $payment_mode; ?></div>
                            <label class="fw-bold">Status</label>
                            <div class="mb-3">
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="tracking_no" value="<?= $tracking_no; ?>">
                                    <select name="order_status" id="" class="form-select">
                                        <option value="0" <?= $status == 0 ? "selected" : "" ?>>Processing</option>
                                        <option value="1" <?= $status == 1 ? "selected" : "" ?>>Completed</option>
                                        <option value="2" <?= $status == 2 ? "selected" : "" ?>>Canceled</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-3" name="update_order_btn">Update Orders Status</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
