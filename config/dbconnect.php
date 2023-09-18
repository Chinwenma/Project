<?php
$host="localhost";
$username="root";
$password="";
$database="project";

// Database connection Creation
$connection = mysqli_connect($host, $username, $password, $database);
// Checking for Database Connection
if(!$connection)
{
   die("Connection Unsuccessful:". mysqli_connect_error());
}

?>