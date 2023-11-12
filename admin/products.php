<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');



?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Products</h3>

                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>IMAGE</th>
                                <th>STATUS</th>
                                <th>Edit</th>
                                <th>Delete</th>


                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $products = getALL("products");
                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td><img src="../uploads/<?= $item['image'] ?> " width="50px" height="50px" alt="<?= $item['name'] ?>"></td>
                                        <td><?= $item['status']=='0'? "Visible" : "Hidden" ?></td>
                                        <td><a href="edit-product.php?id=<?=$item['id'];?>" class="btn btn-success btn-sm">Edit</a>
                                       
                                        </td>
                                        <td>
                                        <form action="code.php" method="POST">
                                            <input type="hidden" name="product_id" value="<?= $item['id']; ?>">
                                            <button type="submit" class="btn btn-sm btn-danger" name="delete_product_btn">Delete</button>
                                        </form>
                                        </td>

                                    </tr>
                            <?php   
                                }
                            } else {
                                echo "no result found";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>