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

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location:' .$url);
    exit(0);
}
?>