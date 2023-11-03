<?php
include('../functions/myfunctions.php');
if(isset($_SESSION['auth']))
{
    if($_SESSION['role_as'] != 1)
    {
        redirect("../index.php", "Not aloowed");
        
    }

}
else{
    redirect("../signin.php", "signin  to continue");
    
}
?>