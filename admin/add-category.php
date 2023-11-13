<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Category</h3>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input type="text" name="name" placeholder="Enter Category Name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Slug</label>
                            <input type="text" name="slug" placeholder="Enter Slug" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Description</label>
                            <textarea rows="3" name="description" placeholder="Enter Description" class="form-control"></textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="">Upload Image</label>
                            <input type="file" name="image"  class="form-control">
                        </div>

                        <div class="col-md-12">
                            <label for="">Meta Title</label>
                            <input name="meta_title" placeholder="Enter Meta Title" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Description</label>
                            <textarea rows="3" name="meta_description" placeholder="Enter Meta description" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Keywords</label>
                            <textarea rows="3" name="meta_keywords" placeholder="Enter Meta keyword" class="form-control"> </textarea>
                        </div>
                        <div class="col-md-6 ">
                            <label for="">Status</label>
                            <input name="status" type="checkbox" >
                        </div>
                        <div class="col-md-6 ">
                            <label for="">Popular</label>
                            <input name="popular" type="checkbox">
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success" name="add_category_btn">Save</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>