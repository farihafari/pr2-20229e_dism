<?php
include("query.php");
include("header.php");

?>

            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
            <h3 class="text-center text-info text-capitalize ">add category</h3>
            <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Basic Form</h6>
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">category name</label>
                                    <input type="text" class="form-control" name="cat_name" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">ADD UNIQUE CATEGORY.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">image</label>
                                    <input type="file" class="form-control" name="cat_file" id="exampleInputPassword1">
                                </div>
                                <button type="submit" class="btn btn-primary" name="cat_add">add category</button>
                            </form>
                        </div>    
        
        </div>
            <!-- Blank End -->


           <?php
           include("footer.php")
           ?>