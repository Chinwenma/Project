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

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location:' .$url);
    exit(0);
}
?>