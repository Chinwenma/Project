<?php
session_start();
    include('../config/dbconnect.php');

    if(isset($_SESSION['auth'])) {

        if (isset($_POST['placeOrderBtn'])) {
            $name = mysqli_real_escape_string($connection, $_POST['name']);
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $phone = mysqli_real_escape_string($connection, $_POST['phone']);
            $pincode = mysqli_real_escape_string($connection, $_POST['pincode']);
            $address = mysqli_real_escape_string($connection, $_POST['address']);
            $payment_mode = mysqli_real_escape_string($connection, $_POST['payment_mode']);
            $payment_id = mysqli_real_escape_string($connection, $_POST['payment_id']);

            if ($name == "" || $email == "" || $phone == "" || $pincode == "" || $address == "") {
                $_SESSION['message'] = "All fields are required";
                header('Location: ../checkout.php');
                exit(0);
            }

            $userId = $_SESSION['auth_user']['user_id'];
            $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER by c.id DESC";
            $query_run = mysqli_query($connection, $query);

            $totalPrice = 0;

            foreach ($query_run as $citem) {
                $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
            }


            $tracking_no = "Matrix" . rand(1111, 9999) . substr($phone, 2);
            $insert_query = "INSERT INTO orders (tracking_no, user_id, name, email, phone, address, pincode, total_price, payment_mode, payment_id) VALUES ('$tracking_no', '$userId', '$name', '$email', '$phone', '$address', '$pincode', '$totalPrice', '$payment_mode', '$payment_id')";

            $insert_query_run =mysqli_query($connection, $insert_query);
            if($insert_query_run)
            {
                
                $order_id = mysqli_insert_id($connection);
                foreach ($query_run as $citem) {
                    $prod_id = $citem['prod_id'];
                    $prod_qty = $citem['prod_qty'];
                    $price = $citem['selling_price'];
                
                    $insert_items_query = "INSERT INTO order_items (order_id, prod_id, qty, price) VALUES ('$order_id', '$prod_id', '$prod_qty', '$price')";
                    $insert_items_query_run = mysqli_query($connection, $insert_items_query);
                    $product_query ="SELECT * FROM products WHERE id='$prod_id' LIMIT 1 ";
                    $product_query_run=mysqli_query($connection, $product_query );
                    $productData =  mysqli_fetch_array($product_query_run);
                    $current_qty = $productData['qty'];
                    
                    $new_qty = $current_qty - $prod_qty;
                    $updateQty_query = "UPDATE products SET qty='$new_qty' WHERE id ='$prod_id' ";
                    $updateQty_query_run = mysqli_query($connection,  $updateQty_query);

              }
              $deleteCartQuery ="DELETE FROM carts WHERE user_id='$userId' ";
              $deleteCartQuery_run = mysqli_query($connection, $deleteCartQuery);


              $_SESSION['message'] = "Order Placed Successfully";
              header('Location: ../myOrders.php');
              die();

            }

        } 
    } else {
        header('Location: ../index.php');
    }
?>
