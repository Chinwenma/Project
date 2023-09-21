<?php
session_start();

include('includes/header.php'); ?>
session_start();
<div class="container mb-4" style="margin-top: 8rem;">
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
                    <h2>Sign Up!</h2>

                </div>
                <div class="card-body">
                    <form action="functions/authcode.php" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="First Name" name="firstname">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Last Name" name="lastname">
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Phone Number" name="phone">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email Address" name="email">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
                        </div>
                        <div class="text-center"><button class="btn btn-black" type="submit" name="sign_up_btn">Submit</button></div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>



<?php include('includes/footer.php'); ?>