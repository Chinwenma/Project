<?php

if(!isset($_SESSION['auth']))
 {
    redirect("signin.php","Sign In to View Cart" );
}


?>