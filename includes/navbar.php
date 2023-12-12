<nav class="navbar navbar-expand-lg  shadow navbar-dark bg-dark sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories.php">Collections</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart</a>
        </li>
        <?php 
        if(isset($_SESSION['auth'])) 
        {
            ?>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['auth_user']['name'] ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="myOrders.php">Orders</a></li>
              <li><a class="dropdown-item" href="#">MyOrders</a></li>
              <li><a class="dropdown-item" href="signout.php">Sign Out</a></li>
            </ul>
          </li>
          <?php
        }
        else{
          ?>
             <li class="nav-item">
          <a class="nav-link" href="signin.php">Sign in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php">Sign up</a>
        </li>
          <?php  
        }
        ?>
     
        
      </ul>
    </div>
  </div>
</nav>