<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Product</h3>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <label clas="mb-0">Select Category</label>
                            <select name="category_id" class="form-select mb-2">
                               <option selected>Select Category</option>
                                <?php 
                                    $categories = getALL("categories");
                                    if(mysqli_num_rows($categories) > 0)
                                    {
                                        foreach ($categories as $item)
                                        {
                                            ?>
                                                <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>                                   
                                            <?php
                                        }
                                    }
                                    else 
                                    {
                                     echo "No category availbe";
                                    }
                                   
                                ?>
                               
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label clas="mb-0">Name</label>
                            <input required type="text" name="name" placeholder="Enter Category Name" class="form-control mb-2">
                        </div>
                        <div class="col-md-6">
                            <label clas="mb-0">Slug</label>
                            <input required type="text" name="slug" placeholder="Enter Slug" class="form-control mb-2">
                        </div>
                        <div class="col-md-12">
                            <label clas="mb-0">Small Description</label>
                            <textarea rows="3" name="small_description" placeholder="Enter Small Description" class="form-control mb-2"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label clas="mb-0">Description</label>
                            <textarea required rows="3" name="description" placeholder="Enter Description" class="form-control mb-2 "></textarea>
                        </div>
                        <div class="col-md-6">
                            <label clas="mb-0">Original Price</label>
                            <input required type="text" name="original_price" placeholder="Enter original price" class="form-control mb-2 ">
                        </div>
                        <div class="col-md-6">
                            <label clas="mb-0">Selling price</label>
                            <input required type="text" name="selling_price" placeholder="Enter Selling Price" class="form-control mb-2 ">
                        </div>
                        <div class="col-md-4">
                            <label clas="mb-0">Upload Image</label>
                            <input required type="file" name="image"  class="form-control mb-2 ">
                        </div>
                       <div class="row">
                       <div class="col-md-6">
                            <label clas="mb-0">Quantity</label>
                            <input required type="number" name="qty" placeholder="Enter quantity" class="form-control mb-2 ">
                        </div>
                            <div class="col-md-3 ">
                                <label clas="mb-0">Status</label><br>
                                <input name="status" type="checkbox" >
                            </div>
                            <div class="col-md-3 ">
                                <label clas="mb-0">trending</label> <br>
                                <input name="trending" type="checkbox">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="mb-0">Meta Title</label>
                            <input required name="meta_title" placeholder="Enter Meta Title" class="form-control mb-2 ">
                        </div>
                        <div class="col-md-12">
                            <label class="mb-0">Meta Description</label>
                            <textarea required rows="3" name="meta_description" placeholder="Enter Meta description" class="form-control mb-2 "></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="mb-0">Meta Keywords</label>
                            <textarea required rows="3" name="meta_keywords" placeholder="Enter Meta keyword" class="form-control mb-2 "> </textarea>
                        </div>
                      
                        <div class="col-md-12 ">
                            <button type="submit" class="btn btn-success" name="add_product_btn">Save</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>