<?php
include('functions/userfunctions.php');
include('includes/header.php');

if(isset($_GET['category'])){


$category_slug = $_GET['category'];
$category_data = getSlugActive("categories", $category_slug);
$category = mysqli_fetch_array($category_data);
if ($category)
{


$cat_id = $category['id'];
?>
<div class="py-3 bg-primary">
    <div class="container">
        <h5 class="text-center text-white d-flex align-items-center justify-content-center" style="height: 30vh;"> 
            <a class="text-white" href="index.php">
                Home/
            </a> 
            <a class="text-white" href="categories.php"> 
                collections/
            </a>
            <?= $category['name']; ?></h5>
    </div>
</div>
<div class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2><?= $category['name']; ?></h2>
                <hr class="my-2 w-3">
                <div class="row ">
                    <?php
                    $products = getProdByCategory($cat_id);
                    if (mysqli_num_rows($products) > 0) {
                        foreach ($products as $item) {
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
                    } else {
                        echo "no data found";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
else
{
    echo"something went wrong";
}
}
else
{
    echo"something went wrong";
}
 include('includes/footer.php'); ?>