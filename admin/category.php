<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');



?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Categories</h3>

                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>IMAGE</th>
                                <th>STATUS</th>
                                <th>ACTION</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $category = getALL("categories");
                            if (mysqli_num_rows($category) > 0) {
                                foreach ($category as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td><img src="../uploads/<?= $item['image'] ?> " width="50px" height="50px" alt="<?= $item['name'] ?>"></td>
                                        <td><?= $item['status']=='0'? "Visible" : "Hidden" ?></td>
                                        <td><a href="edit-category.php?id=<?=$item['id'];?>" class="btn btn-success">Edit</a>
                                           <form action="code.php" method="post">
                                            <input type="hidden" name="category_id" value="<?= $item['id'] ?>">
                                    <button type="submit" class="btn btn-danger" name="delete_category_btn">Delete<button>
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