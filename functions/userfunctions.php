<?php
session_start();
include ('config/dbconnect.php');

// visibility to the users or not
function getALLActive($table)
{
    global $connection;
    $query = "SELECT * FROM $table WHERE status = '0' ";
    return $query_run = mysqli_query ($connection, $query);
}
function getALLTrending()
{
    global $connection;
    $query = "SELECT * FROM products WHERE trending = '1' ";
    return $query_run = mysqli_query ($connection, $query);
}
function getSlugActive($table, $slug)
{
    global $connection;
    $query = "SELECT * FROM $table WHERE slug='$slug' AND status='0' LIMIT 1";
    return $query_run = mysqli_query ($connection, $query);
}
function getProdByCategory($category_id)
{
   global $connection;
   $query = "SELECT * FROM products WHERE category_id = '$category_id' AND status = '0'";
   return $query_run = mysqli_query ($connection, $query);

}

function getIDActive($table, $id)
{
    global $connection;
    $query = "SELECT * FROM $table WHERE id='$id' AND status = '0' ";
    return $query_run = mysqli_query ($connection, $query);
}

function getCartItems()
{
    global $connection;
    $userId=$_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER by c.id DESC";

    return $query_run = mysqli_query($connection, $query);

}

function getOreder(){
    global $connection;
    $userId=$_SESSION['auth_user']['user_id'];
    $query ="SELECT * FROM orders WHERE user_id='$userId' ORDER BY id DESC";
   return $query_run = mysqli_query($connection, $query);




}




function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location:' .$url);
    exit(0);
}
function checkVaildTrackingNo($trackingNo)
{
    global $connection;
    $userId=$_SESSION['auth_user']['user_id']; 
    $query="SELECT * FROM orders WHERE tracking_no='$trackingNo' AND user_id='$userId'";
    return mysqli_query($connection, $query);


}
?>