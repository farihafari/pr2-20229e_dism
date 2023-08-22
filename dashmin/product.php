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
                                    <label for="exampleInputEmail1" class="form-label">product name</label>
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
                                    <option selected value="<?php echo $cat_type['id'] ?>"><?php echo $cat_type['name'] ?></option>
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

if(isset($_POST['product_add'])){
$pname=$_POST['pro_name'];
$pQty=$_POST['pro_qty'];
$pPrice=$_POST['pro_price'];
$pCatTypeId=$_POST['cat_type'];
$checkpro = $pdo->prepare("select * from product where product_name=:pname");
$checkpro->bindParam("pname",$pname);
$checkpro->execute();
$count= $checkpro->fetchColumn();
if($count>0){
    echo "<script>
    alert('already exist')
    </script>";
}else{
$pImgName=$_FILES['pro_img']['name'];
$pTmpName=$_FILES['pro_img']['tmp_name'];
$pSize=$_FILES['pro_img']['size'];
$extension =pathinfo($pImgName,PATHINFO_EXTENSION);
$destination="img/".$pImgName;
if($extension=="png"|| $extension=="jpg"|| $extension=="jpeg"||$extension=="webp"){
    if(move_uploaded_file($pTmpName,$destination)){
       $query=$pdo->prepare("insert into product (product_name,product_qty,product_price,category_type_id,product_image )values (:pname,:pqty,:pprice,:pcatid,:pimg)");
       $query->bindParam("pname",$pname);
       $query->bindParam("pqty",$pQty);
       $query->bindParam("pprice",$pPrice);
       $query->bindParam("pcatid",$pCatTypeId);
       $query->bindParam("pimg",$pImgName);
       $query->execute();
       echo "<script>alert('product add successfully')</script>";

       
    }
}
}
}
?>
           <?php

           include("footer.php")
           ?>