<?php
include('functions/userfunctions.php');
include('includes/header.php');
include('includes/slider.php'); 

?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Popular Products</h4>
                <hr>
                <div class="row">
                <?php
                $trendingProducts = getALLTrending();
                if (mysqli_num_rows($trendingProducts) > 0) 
                {
                    foreach ($trendingProducts as $item) 
                    {

                        ?>
                        <div class="col-md-3 mb-2">
                            <a href="product-view.php?product=<?= $item['slug']; ?> ">
                                <div class="card shadow ">
                                    <div class="card-body">
                                        <img src="uploads/<?= $item['image']; ?>" alt="" class="w-100">
                                        <h4 class="text-center"><?= $item['name']; ?></h4>

                                    </div>

                                </div>
                            </a>
                        </div>
                <?php

                    }               
                
                }
              
                ?>
                </div>
              
            </div>
        </div>
    </div>
</div>



<?php include('includes/footer.php'); ?>