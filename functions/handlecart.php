<?php


session_start();
include('../config/dbconnect.php');

if (isset($_SESSION['auth'])) 
{
    if(isset($_POST['scope']))
    {
        $scope = $_POST['scope'];
        switch ($scope)
        {
            case "add":
                $prod_id =$_POST['prod_id'];
                $prod_qty =$_POST['prod_qty'];

                $user_id =$_POST['auth_user']['user_id'];

               $insert_query = "INSERT INTO carts (user_id, prod_id, prod_qty) VALUES ('$user_id','$prod_id','$user_qty')";
                $insert_query_run = mysqli_query($connection,$insert_query);

               if($insert_query_run) 
                {
                    echo 201;
                }
                else
                {
                    echo 500;
                }
                break;

            default:
                echo 500;

        }
    }   
} 
else 
{
    echo 401;
}
?>
