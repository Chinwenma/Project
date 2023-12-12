<?php
session_start();

include ('../config/dbconnect.php');

function getAll($table)
{
    global $connection;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query ($connection, $query);
}

function getByID($table, $id)
{
    global $connection;
    $query = "SELECT * FROM $table WHERE id='$id' ";
    return $query_run = mysqli_query ($connection, $query);
}


function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location:' .$url);
    exit(0);
}
function getAllOreders(){
    global $connection;
    $query = "SELECT * FROM orders WHERE status='0'";
    return $query_run = mysqli_query ($connection, $query);  
}
function checkVaildTrackingNo($trackingNo)
{
    global $connection;
    $query="SELECT * FROM orders WHERE tracking_no='$trackingNo'";
    return mysqli_query($connection, $query);


}
function getOrederHistory()
{
    global $connection;
    $query = "SELECT * FROM orders WHERE status !='0'";
    return $query_run = mysqli_query ($connection, $query); 
}
?>