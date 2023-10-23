<?php
session_start();
include('../config/dbconnect.php');
if (isset($_POST['sign_up_btn']))
{
    $firstname = mysqli_real_escape_string($connection, $_POST['fisrtname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($connection, $_POST['confirm_password']);
    //Check if email already exists
    $check_email_query = "SELECT email FROM users WHERE email ='$email' ";

    $check_email_query_run = mysqli_query($connection, $check_email_query);
    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['message'] = 'Email already exists';
        header('Location:../signup.php');
    } else {


        if ($password == $confirm_password) {
            //insert into users
            $insert_query = "INSERT INTO users ( firstname,lastname,phone,email,password) VALUES('$firstname','$lastname','$phone','$email', '$password')";
            $insert_query_run = mysqli_query($connection, $insert_query);
            if ($insert_query_run) {
                $_SESSION['message'] = "I LOVE YOU reg";
                header('Location:../signin.php');
            } else {
                $_SESSION['message'] = "I hate YOU reg";
                header('Location:../signup.php');
            }
        } else {
            $_SESSION['message'] = 'Please do the needfull before I slap you';
            header('Location:../signup.php');
        }
    }
}
elseif(isset($_POST['sign_in_btn']))
{
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $login_query = "SELECT * FROM users WHERE email ='  $email'AND password = ' $password' ";
    $login_query_run = mysqli_query($connection, $login_query);
    if (mysqli_num_rows($login_query_run)> 0)
    {
    $_SESSION['auth']=true;
    $userdata = mysqli_fetch_array($login_query_run );
    $username =$userdata ['name'];
    $_SESSION['auth_user']=[
    'name' => $username,
    'email' => $useremail
    ];
    $_SESSION['message'] = "loged in successfully";
    header('location:../index.php');
        }
 else{
    $_SESSION['message']="You are not logged in!";
    header('location:../signin.php');
    }

}

?>
