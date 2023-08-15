<?php
include("query.php");
include("header.php");

?>

            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
            <h3 class="text-center text-info text-capitalize ">update category</h3>
            <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Basic Form</h6>
                            <?php
                            if(isset($_GET["cid"])){
                                $cid = $_GET['cid'];
                                $query= $pdo->prepare("select * from category where id =:pid");
                                $query->bindParam("pid",$cid);
                                $query->execute();
                                $data = $query->fetch(PDO::FETCH_ASSOC);
                                ?>
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">category name</label>
                                    <input type="text" class="form-control" name="cat_name"   value="<?php echo $data["name"] ?>"id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">ADD UNIQUE CATEGORY.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">image</label>
                                    <input type="file" class="form-control" name="cat_file" id="exampleInputPassword1">
                                <img src="img/<?php echo $data['image'];?>" width="100px" alt="">
                                </div>
                                <button type="submit" class="btn btn-primary" name="update_cat">update category</button>
                            </form>
                        </div>    
                        <?php
                            }

                            if(isset($_POST["update_cat"])){
                                $cname= $_POST["cat_name"];
                                $filename = $_FILES["cat_file"]["name"];
                                $tmpname= $_FILES["cat_file"]['tmp_name'];
                                $extension = pathinfo($filename,PATHINFO_EXTENSION);
                                $destination = "img/" . $filename;
                                if($extension=="jpg" || $extension=="png" ||$extension=="jpeg" || $extension=="webp" ){
if(move_uploaded_file($tmpname,$destination)){
    $query=$pdo->prepare("update category  set name =:cname, image=:cimg where id =:pid");
    $query->bindParam("pid",$cid);
    $query->bindParam("cname",$cname);
    $query->bindParam("cimg",$filename);
    $query->execute();
    echo "
    <script>alert('update category successfully')</script>
    ";

}
                                }
                            }
                            ?>
        </div>
            <!-- Blank End -->


           <?php
           include("footer.php")
           ?>