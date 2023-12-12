<?php
include('functions/userfunctions.php');
include('includes/header.php');
include('includes/slider.php'); 

?>

<div class="py-5 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Popular Products</h4>
                <div class="underline mb-3"></div>
             
                    <div class="owl-carousel owl-theme">
                <?php
                $trendingProducts = getALLTrending();
                if (mysqli_num_rows($trendingProducts) > 0) 
                {
                    foreach ($trendingProducts as $item) 
                    {

                        ?>
                        <div class="item">
                            <a href="product-view.php?product=<?= $item['slug']; ?> ">
                                <div class="card shadow ">
                                    <div class="card-body">
                                        <img src="uploads/<?= $item['image']; ?>" alt="" class="w-100 mb-3">
                                    
                                        <h6 class="text-center"><?= $item['name']; ?></h6>

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
<div class="py-5 bg-f2f2f2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>About Us</h4>
                <div class="underline mb-3"></div>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque necessitatibus, at non corrupti error numquam, sed aliquid natus dignissimos animi cupiditate ex aspernatur rem dolores possimus culpa. At, aspernatur consequatur.</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque necessitatibus, at non corrupti error numquam, sed aliquid natus dignissimos animi cupiditate ex aspernatur rem dolores possimus culpa. At, aspernatur consequatur.</p>
             
         
              
            </div>
        </div>
    </div>
</div>






<?php include('includes/footer.php'); ?>

<script>
   $(document).ready(function () {
    $('.owl-carousel',).owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
}) 
});


</script>