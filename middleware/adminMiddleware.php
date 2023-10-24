<?php

if(isset($_SESSION['auth']))
{
    if($_SESSION['role_as'] != 1)
    {
        $_SESSION['message'] = "Not allowed";
        header('location: ../index.php');
    }

}
else{
    $_SESSION['message'] = "signin to move on";
    header('location: ../signin.php'); 
}
?>