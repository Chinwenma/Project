<?php
function redirect($url, $message)
{
    $_SESSEION['message']= $message;
    header("Location: " .$url);
    exit();
}
?>