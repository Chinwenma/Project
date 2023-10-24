<?php
session_start();
if(isset($_SESSION['auth']))
{
    $_SESSION['message'] ="you are already logged in";
    header('location: index.php');
    exit();
}
include('includes/header.php'); ?>
<div class="container mb-2 py-5" >
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php
            if (isset($_SESSION['message'])) {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey</strong>  <?=
                    $_SESSION['message'];
                    ?>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            unset($_SESSION['message']);
            }
            ?>
            <div class="card">
                <div class="card-header text-center">
                    <h2>Sign In!</h2>

                </div>
                <div class="card-body">
                    <form action="functions/authcode.php" method="POST">                   
                        <div class="mb-3">
                            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email Address" name="email">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        
                        <div class="text-center"><button class="btn btn-primary" type="submit" name="sign_in_btn">Sign In</button></div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>



<?php include('includes/footer.php'); ?>