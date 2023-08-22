<?php
include("query.php");
include("header.php");

?>

            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
            <h3 class="text-center text-info text-capitalize ">edit product</h3>
            <div class="bg-light rounded h-100 p-4">
                 
            <?php
if(isset($_GET['pid'])){
    $pid=$_GET['pid'];
    $query=$pdo->prepare("select * from product where id =:pid");
    $query->bindParam("pid",$pid);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    ?>

                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">product name</label>
                                    <input type="text" class="form-control" name="pro_name" value="<?php echo $row['product_name'] ?>">
                                    <div id="emailHelp" class="form-text">ADD UNIQUE product.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">product qauntity</label>
                                    <input type="number" class="form-control" name="pro_qty" value="<?php echo $row['product_qty'] ?>">

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">product price</label>
                                    <input type="number" class="form-control" name="pro_price" value="<?php echo $row['product_price'] ?>">
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">category type</label>
                                    <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="cat_type">
                                    <?php
                                    $query=$pdo->query("select * from category");
                                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($data as $cat){
                                        ?>
                                    <option value="<?= $cat['id'] ?>" <?=$row['category_type_id'] == $cat['id'] ? 'selected' : ''?> >
                                
                                    <?php echo $cat['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">image</label>
                                    <input type="file" class="form-control" name="pro_img" id="exampleInputPassword1">
                                    <img src="<?php echo $row['product_image'] ?>" width="100px" alt="">
                                </div>
                                <button type="submit" class="btn btn-primary" name="product_add">add category</button>
                            </form>
                        </div>    
        
        </div>
        <?php
}
            ?>
            <!-- Blank End -->


           <?php

           include("footer.php")
           ?>