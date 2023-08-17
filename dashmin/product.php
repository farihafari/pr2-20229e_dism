<?php
include("query.php");
include("header.php");

?>

            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
            <h3 class="text-center text-info text-capitalize ">add product</h3>
            <div class="bg-light rounded h-100 p-4">
                 
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">category name</label>
                                    <input type="text" class="form-control" name="pro_name" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">ADD UNIQUE CATEGORY.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">product qauntity</label>
                                    <input type="number" class="form-control" name="pro_qty" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">product price</label>
                                    <input type="number" class="form-control" name="pro_price" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">category type</label>
                                    <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="cat_type">
                                    <?php
                                    $query=$pdo->query("select * from category");
                                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($data as $cat_type){
                                        ?>
                                    <option selected value="<?php echo $cat_type['name'] ?>"><?php echo $cat_type['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">image</label>
                                    <input type="file" class="form-control" name="pro_img" id="exampleInputPassword1">
                                </div>
                                <button type="submit" class="btn btn-primary" name="product_add">add category</button>
                            </form>
                        </div>    
        
        </div>
            <!-- Blank End -->


           <?php
           include("footer.php")
           ?>